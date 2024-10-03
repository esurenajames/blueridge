<?php

namespace App\Http\Controllers;

use App\Models\RequestModel;
use App\Models\Quotation;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RequestApprovalController extends Controller
{
    public function index(Request $request)
    {
        
        $steps = [
            1 => 'Request Form',
            2 => 'Quotation Form',
            3 => 'Purchase Request',
            4 => 'Purchase Order'
        ];
        
        // Fetch counts for each status
        $pendingCount = RequestModel::where('status', 1)
        ->where('steps', '!=', 4) // Exclude requests with steps = 4
        ->count();
    
        $inProgressCount = RequestModel::where(function ($query) {
            $query->where('status', 4)
                  ->orWhere('steps', 4);
        })->count();

        $historyCount = RequestModel::where(function ($query) {
            $query->where('status', 3)  // Declined
                  ->orWhere('status', 4) // Completed
                  ->orWhere('steps', 4); // Add requests with steps = 4
        })->count();

        $returnCount = RequestModel::where(function ($query) {
            $query->where('status', 5);
        })->count();
    
        // Define the number of items per page, default is 10
        $perPage = $request->input('perPage', 10);
    
        // Get the active tab from the request or default to 'Pending Request'
        $activeTab = $request->input('activeTab', 'Pending Request');
    
        // Fetch request details with pagination based on the active tab
        $pendingRequests = RequestModel::with('requestor')
            ->where('status', 1)
            ->where('steps', '!=', 4) // Exclude requests with steps = 4
            ->orderBy('created_at', 'desc')
            ->paginate($perPage, ['*'], 'pendingPage')
            ->appends($request->except('pendingPage'));


        $returnRequests = RequestModel::with('requestor')
            ->where(function ($query) {
                $query->where('status', 5);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($perPage, ['*'], 'inProgressPage')
            ->appends($request->except('inProgressPage'));
    
        $historyRequests = RequestModel::with('requestor')
        ->where(function ($query) {
            $query->where('status', 3)  // Declined
                ->orWhere('status', 4) // Completed
                ->orWhere('steps', 4); // Add requests with steps = 4
        })
        ->orderBy('created_at', 'desc')
        ->paginate($perPage, ['*'], 'historyPage')
        ->appends($request->except('historyPage'));
    
        // Return the view with the datas
        return view('approval-management', compact('pendingCount', 'historyCount', 'returnCount', 'pendingRequests', 'returnRequests', 'historyRequests', 'perPage', 'activeTab', 'steps'));
    }
    

    public function show(Request $request)
    {
        // Get the ID from the query string
        $id = $request->query('id');

        // Fetch the request record by ID
        $requestData = RequestModel::findOrFail($id);

        // If the request is in Step 2, redirect to Quotation Approval with ID
        if ($requestData->steps == 2) {
            return redirect()->route('quotation-approval', ['id' => $id]);
        }

        // Decode files and collaborators fields
        $files = json_decode($requestData->files, true) ?? [];
        $collaboratorIds = json_decode($requestData->collaborators, true) ?? [];

        // Fetch collaborators' details
        $collaborators = User::whereIn('id', $collaboratorIds)->get();

        // Decode the approval history fields
        $approvalDates = json_decode($requestData->approval_dates, true) ?? [];
        $approvalIds = json_decode($requestData->approval_ids, true) ?? [];
        $approvalStatus = json_decode($requestData->approval_status, true) ?? [];

        // Fetch approvers
        $approvers = User::whereIn('id', $approvalIds)->get()->keyBy('id');

        // Define mappings for steps and status
        $steps = [
            1 => 'Request Form',
            2 => 'Quotation Form',
            3 => 'Purchase Request',
            4 => 'Purchase Order'
        ];

        $status = [
            1 => 'Pending',
            2 => 'Approved',
            3 => 'Declined',
            4 => 'Completed',
            5 => 'Returned'
        ];

        // Prepare approval details
        $approvalDetails = [];
        foreach ($approvalDates as $index => $date) {
            $approvalDetails[] = [
                'date' => $date,
                'user' => $approvers[$approvalIds[$index]] ?? null,
                'status' => $approvalStatus[$index] ?? null
            ];
        }

        // Pass the data to the view
        return view('request-approval', compact('requestData', 'collaborators', 'steps', 'status', 'files', 'approvalDates', 'approvalIds', 'approvalStatus', 'approvers'));
    }

    public function showQuotation(Request $request)
    {
        // Get the ID from the query string
        $id = $request->query('id');
        
        // Fetch the request record by ID
        $requestData = RequestModel::findOrFail($id);
        
        // Fetch quotations related to the request
        $quotations = Quotation::where('request_id', $id)->get();
        
        // Decode files and collaborators fields
        $files = json_decode($requestData->files, true) ?? [];
        $collaboratorIds = json_decode($requestData->collaborators, true) ?? [];
        
        // Fetch collaborators' details
        $collaborators = User::whereIn('id', $collaboratorIds)->get();
        
        // Decode the approval history fields
        $approvalDates = json_decode($requestData->approval_dates, true) ?? [];
        $approvalIds = json_decode($requestData->approval_ids, true) ?? [];
        $approvalStatus = json_decode($requestData->approval_status, true) ?? [];
        
        // Fetch approvers
        $approvers = User::whereIn('id', $approvalIds)->get()->keyBy('id');
        
        // Define mappings for steps and status
        $steps = [
            1 => 'Request Form',
            2 => 'Quotation Form',
            3 => 'Purchase Request',
            4 => 'Purchase Order'
        ];
        
        $status = [
            1 => 'Pending',
            2 => 'Approved',
            3 => 'Declined',
            4 => 'Completed',
            5 => 'Returned'
        ];
        
        // Prepare approval details
        $approvalDetails = [];
        foreach ($approvalDates as $index => $date) {
            $approvalDetails[] = [
                'date' => $date,
                'user' => $approvers[$approvalIds[$index]] ?? null,
                'status' => $approvalStatus[$index] ?? null
            ];
        }
        
        // Get unique company names from quotations
        $companyNames = $quotations->pluck('company_name')->unique()->toArray();

        // Pass the data to the view
        return view('quotation-approval', compact('requestData', 'collaborators', 'steps', 'status', 'files', 'approvalDates', 'approvalIds', 'approvalStatus', 'approvers', 'quotations', 'companyNames'));
    }

    public function approveRequest(Request $request, $id)
    {
        // Find the request by ID
        $requestData = RequestModel::findOrFail($id);
    
        // Increment the step (assuming max step is 4)
        if ($requestData->steps < 4) {
            $requestData->steps += 1;
        }

        $selectedIds = explode(',', $request->input('selected_ids'));

        foreach ($selectedIds as $itemId) {
            // Update the item status in the quotation table
            DB::table('quotations') // Change 'quotations' to your actual table name
                ->where('id', $itemId)
                ->update(['item_status' => 1]); // Set item status to 'Approved'
        }
    
        // Set the status to 'Approved' (assuming '1' means approved)
        $requestData->status = 1;
    
        // Get the current approval date and approver's ID
        $currentDate = Carbon::now()->toDateTimeString();
        $approverId = auth()->user()->id;
    
        // Append the new approval date and approver ID to the arrays
        $approvalDates = json_decode($requestData->approval_dates, true) ?? [];
        $approvalIds = json_decode($requestData->approval_ids, true) ?? [];
        $approvalStatus = json_decode($requestData->approval_status, true) ?? [];
    
        $approvalDates[] = $currentDate;
        $approvalIds[] = $approverId;
        $approvalStatus[] = 1; // 1 = Approved
    
        // Save remarks
        $requestData->remarks = $request->input('remarks');
    
        // Save back as JSON
        $requestData->approval_dates = json_encode($approvalDates);
        $requestData->approval_ids = json_encode($approvalIds);
        $requestData->approval_status = json_encode($approvalStatus);
    
        // Save the updated request
        $requestData->save();

        session()->flash('success', 'Request has been approved successfully!');
        session()->flash('success_message', '');
    
        return redirect()->back()->with('success', 'Request approved successfully.');
    }    

    public function declineRequest(Request $request, $id)
    {
        // Find the request by ID
        $requestData = RequestModel::findOrFail($id);
    
        // Get the current date and approver's ID
        $currentDate = Carbon::now()->toDateTimeString();
        $approverId = auth()->user()->id;
    
        // Append the new approval date and approver ID to the arrays
        $approvalDates = json_decode($requestData->approval_dates, true) ?? [];
        $approvalIds = json_decode($requestData->approval_ids, true) ?? [];
        $approvalStatus = json_decode($requestData->approval_status, true) ?? [];
    
        $approvalDates[] = $currentDate;
        $approvalIds[] = $approverId;
    
        // Check if the action is 'decline' or 'return'
        if ($request->input('action') === 'decline') {
            // Set status to 'Declined' (3)
            $requestData->status = 3;
            $approvalStatus[] = 3; // 3 = Declined
            
            // Save the decline reason
            $requestData->reason = $request->input('decline_reason');

            session()->flash('success', 'Request has been declined successfully!');
            session()->flash('success_message', '');
        
        } elseif ($request->input('action') === 'return') {
            // Set status to 'Returned' (5)
            $requestData->status = 5;
            $approvalStatus[] = 5; // 5 = Returned
            
            // Save the return reason
            $requestData->reason = $request->input('return_reason');

            session()->flash('success', 'Request has been returned successfully!');
            session()->flash('success_message', '');
        }
    
        // Save the remarks for the action (decline or return)
        $requestData->remarks = $request->input('remarks');
    
        // Save back as JSON
        $requestData->approval_dates = json_encode($approvalDates);
        $requestData->approval_ids = json_encode($approvalIds);
        $requestData->approval_status = json_encode($approvalStatus);
    
        // Save the updated request
        $requestData->save();


        return redirect()->back()->with('success', 'Request was updated successfully.');
    }    
}
