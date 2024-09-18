<?php

namespace App\Http\Controllers;

use App\Models\RequestModel;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class RequestApprovalController extends Controller
{
    public function index(Request $request)
    {
        // Fetch counts for each status
        $pendingCount = RequestModel::where('status', 1)->count();
        $inProgressCount = RequestModel::where('status', 2)->count();
        $historyCount = RequestModel::whereIn('status', [3])->count();

        // Define the number of items per page, default is 10
        $perPage = $request->input('perPage', 10);

        // Get the active tab from the request or default to 'Pending Request'
        $activeTab = $request->input('activeTab', 'Pending Request');

        // Fetch request details with pagination based on the active tab
        $pendingRequests = RequestModel::with('requestor')
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->paginate($perPage, ['*'], 'pendingPage')
            ->appends($request->except('pendingPage'));

        $inProgressRequests = RequestModel::with('requestor')
            ->where('status', 2)
            ->orderBy('created_at', 'desc')
            ->paginate($perPage, ['*'], 'inProgressPage')
            ->appends($request->except('inProgressPage'));

        $historyRequests = RequestModel::with('requestor')
            ->whereIn('status', [3])
            ->orderBy('created_at', 'desc')
            ->paginate($perPage, ['*'], 'historyPage')
            ->appends($request->except('historyPage'));

        // Return the view with the data
        return view('approval-management', compact('pendingCount', 'inProgressCount', 'historyCount', 'pendingRequests', 'inProgressRequests', 'historyRequests', 'perPage', 'activeTab'));
    }

    public function show(Request $request)
    {
        // Get the ID from the query string
        $id = $request->query('id');
    
        // Fetch the request record by ID
        $request = RequestModel::findOrFail($id);
    
        // Decode files and collaborators fields
        $files = json_decode($request->files, true) ?? [];
        $collaboratorIds = json_decode($request->collaborators, true) ?? [];
        
        // Fetch collaborators' details
        $collaborators = User::whereIn('id', $collaboratorIds)->get();
            
        // Fetch specific request details by ID
        $requestData = RequestModel::with('requestor')->findOrFail($id);
    
        // Decode the fields
        $files = json_decode($requestData->files, true) ?? [];
        $ccRequest = json_decode($requestData->collaborators, true) ?? [];
        $ccUsers = User::whereIn('id', $ccRequest)->get();
        $approvalDates = json_decode($requestData->approval_dates, true) ?? [];
        $approvalIds = json_decode($requestData->approval_ids, true) ?? [];
        $approvalStatus = json_decode($requestData->approval_status, true) ?? [];
    
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
            4 => 'Completed'
        ];
    
        // Prepare the data to pass to the view
        $approvalDetails = [];
        foreach ($approvalDates as $index => $date) {
            $approvalDetails[] = [
                'date' => $date,
                'user' => $approvers[$approvalIds[$index]] ?? null,
                'status' => $approvalStatus[$index] ?? null
            ];
        }
        
        // Pass the data to the view
        return view('request-approval', compact('requestData', 'ccUsers', 'steps', 'status', 'files', 'approvalDates', 'approvalIds', 'approvalStatus', 'approvers', 'collaborators'));
    }
       

    public function approveRequest(Request $request, $id)
    {
        // Find the request by ID
        $requestData = RequestModel::findOrFail($id);
    
        // Increment the step (assuming max step is 4)
        if ($requestData->steps < 4) {
            $requestData->steps += 1;
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
    
        return redirect()->back()->with('success', 'Request approved successfully.');
    }    

    public function declineRequest(Request $request, $id)
    {
        // Find the request by ID
        $requestData = RequestModel::findOrFail($id);

        // Set the status to 'Declined' (assuming '3' means declined)
        $requestData->status = 3;

        // Get the current date and approver's ID
        $currentDate = Carbon::now()->toDateTimeString();
        $approverId = auth()->user()->id;

        // Append the new approval date and approver ID to the arrays
        $approvalDates = json_decode($requestData->approval_dates, true) ?? [];
        $approvalIds = json_decode($requestData->approval_ids, true) ?? [];
        $approvalStatus = json_decode($requestData->approval_status, true) ?? [];

        $approvalDates[] = $currentDate;
        $approvalIds[] = $approverId;
        $approvalStatus[] = 3; // 3 = Declined

        // Save the remarks for the decline action
        $requestData->remarks = $request->input('remarks');

        // Save back as JSON
        $requestData->approval_dates = json_encode($approvalDates);
        $requestData->approval_ids = json_encode($approvalIds);
        $requestData->approval_status = json_encode($approvalStatus);

        // Save the updated request
        $requestData->save();

        return redirect()->back()->with('success', 'Request declined successfully.');
    }
}
