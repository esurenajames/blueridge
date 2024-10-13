<?php

namespace App\Http\Controllers;

use App\Models\RequestModel;
use App\Models\Quotation;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Expense;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Item;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Exception\Exception as PhpWordException;

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
    
        // Fetch the request record by ID along with quotations
        $requestData = RequestModel::with('quotations')->findOrFail($id);

        $category = $requestData->category ? $requestData->category->object_of_expenditure : 'No Category';
    
        // If the request is in Step 2, redirect to Quotation Approval with ID
        if ($requestData->steps == 2) {
            return redirect()->route('quotation-approval', ['id' => $id]);
        }
    
        // Access the quotations for the request
        $quotations = $requestData->quotations;
    
        // Filter the items where item_status = 1
        $itemsListed = $quotations->where('item_status', 1);
    
        // Calculate the total price of listed items
        $totalPrice = $itemsListed->sum('amount');
    
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
    
        // Pass the data to the view, including filtered items and total price
        return view('request-approval', compact(
            'requestData', 
            'collaborators', 
            'steps', 
            'status', 
            'files', 
            'approvalDates', 
            'approvalIds', 
            'approvalStatus', 
            'approvers', 
            'itemsListed', 
            'totalPrice',
            'category'
        ));
    }
    
    public function showQuotation(Request $request)
    {
        // Get the ID from the query string
        $id = $request->query('id');
        
        // Fetch the request record by ID
        $requestData = RequestModel::findOrFail($id);
        
        // Fetch quotations related to the request
        $quotations = Quotation::where('request_id', $id)->get();

        $category = $requestData->category ? $requestData->category->object_of_expenditure : 'No Category';

        // Count the number of rows (quotations)
        $rowCount = $quotations->count();
        
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
        return view('quotation-approval', compact('requestData', 'collaborators', 'steps', 'status', 'files', 'approvalDates', 'approvalIds', 'approvalStatus', 'approvers', 'quotations', 'companyNames','rowCount','category'));
    }

    public function approveRequest(Request $request, $id)
    {
        // Find the request by ID
        $requestData = RequestModel::findOrFail($id);
    
        // Check if the request is at step 2
        if ($requestData->steps == 2) {
            $requestData->steps += 1; // Increment the step to 3 (Quotation approved)
            $requestData->status = 1;  // Set status to Pending
            $this->insertItemsIntoPurchaseOrder($id);  // Generate the Word document
        } elseif ($requestData->steps == 4) {
            $requestData->status = 4; // Completed
        } else {
            if ($requestData->steps < 4) {
                $requestData->steps += 1;
            }
            $requestData->status = 1; // Approved
        }
    
        // Process selected items
        $selectedIds = explode(',', $request->input('selected_ids'));
        $totalAmount = 0;
        foreach ($selectedIds as $itemId) {
            // Update the item status in the quotation table
            $item = DB::table('quotations')->where('id', $itemId)->first();
    
            // Check if the item exists before trying to access its properties
            if ($item) {
                DB::table('quotations')->where('id', $itemId)->update(['item_status' => 1]); // Approved
                $totalAmount += $item->amount;  // Sum the amount of the approved items
            } else {
                continue;
            }
        }
    
        // Deduct from the correct month in the expense table
        $currentMonth = strtolower(Carbon::now()->format('M'));  // Get current month abbreviation in lowercase
        $expense = Expense::find($requestData->category_id);  // Fetch corresponding expense by category
    
        // Update the corresponding month column
        if ($expense) {
            // Check if the current month expense is null or undefined
            if (is_null($expense->$currentMonth)) {
                $expense->$currentMonth = 0;  // Initialize to zero if null
            }
            $expense->$currentMonth += $totalAmount;  // Add total amount to the current month's column
            $expense->current_expenses += $totalAmount; // Update current expenses
            $expense->balance -= $totalAmount;  // Update balance
            $expense->save();  // Save the updated expense record
        }
    
        // Get the current approval date and approver's ID
        $currentDate = Carbon::now()->toDateTimeString();
        $approverId = auth()->user()->id;
    
        // Append approval details
        $approvalDates = json_decode($requestData->approval_dates, true) ?? [];
        $approvalIds = json_decode($requestData->approval_ids, true) ?? [];
        $approvalStatus = json_decode($requestData->approval_status, true) ?? [];
    
        $approvalDates[] = $currentDate;
        $approvalIds[] = $approverId;
        $approvalStatus[] = 1;
    
        // Save remarks and approval details
        $requestData->remarks = $request->input('remarks');
        $requestData->approval_dates = json_encode($approvalDates);
        $requestData->approval_ids = json_encode($approvalIds);
        $requestData->approval_status = json_encode($approvalStatus);
        $requestData->save();
    
        // Create notifications for requestor and collaborators
        $this->createNotifications($requestData, 'approve');
    
        // Flash success message
        session()->flash('success', 'Request has been approved and expenses updated successfully!');
    
        return redirect()->back()->with('success', 'Request approved successfully.');
    }
    
    private function createNotifications($requestData, $notificationType)
    {
        // Get requestor ID and collaborators
        $userIds = [$requestData->requestor_id]; // Start with the requestor ID
        if ($requestData->collaborators) {
            $collaborators = json_decode($requestData->collaborators, true);
            $userIds = array_merge($userIds, $collaborators); // Merge with collaborators
        }
    
        // Initialize notification title and message based on the type
        $title = '';
        $message = '';
    
        switch ($notificationType) {
            case 'approve':
                $title = 'Request Approved';
                $message = 'Your request "' . $requestData->request_name . '" has been approved.';
                break;
    
            case 'decline':
                $title = 'Request Declined';
                $message = 'Your request "' . $requestData->request_name . '" has been declined. Reason: ' . $requestData->reason;
                break;
    
            case 'return':
                $title = 'Request Returned';
                $message = 'Your request "' . $requestData->request_name . '" has been returned. Reason: ' . $requestData->reason;
                break;
    
            default:
                return; // If the notification type is unknown, do not create a notification
        }
    
        // Create notifications for each user
        foreach ($userIds as $userId) {
            Notification::create([
                'user_id' => $userId,
                'title' => $title,
                'message' => $message,
                'is_read' => false,
            ]);
        }
    }
    

    public function insertItemsIntoPurchaseOrder($requestId)
    {
        // Path to the existing Word document
        $filePath = public_path('storage/docs/Purchase_Order.docx');

        // Load the existing Word document
        try {
            $phpWord = IOFactory::load($filePath);
        } catch (PhpWordException $e) {
            // Handle error if the file cannot be loaded
            return response()->json(['error' => 'Error loading document: ' . $e->getMessage()], 500);
        }

        // Fetch approved quotations for the given request ID
        $approvedQuotations = DB::table('quotations')
                                ->where('request_id', $requestId)
                                ->where('item_status', 1) // 1 = Approved
                                ->get();

        // Check if there are approved items
        if ($approvedQuotations->isEmpty()) {
            return; // If no approved quotations, do nothing
        }

        // Get the first section of the document (assuming there's only one section)
        $section = $phpWord->getSections()[0];

        // Add a heading for the purchase details if not already present
        $section->addText('Purchase Details:', ['bold' => true]);

        // Add approved items to the document
        foreach ($approvedQuotations as $quotation) {
            $section->addText("Company: {$quotation->company_name}");
            $section->addText("Item Description: {$quotation->item_description}");
            $section->addText("Quantity: {$quotation->qty}");
            $section->addText("Unit: {$quotation->unit}");
            $section->addText("Unit Price: {$quotation->unit_price}");
            $section->addText("Total Amount: {$quotation->amount}");
            $section->addText('----------------------------------------');
        }

        // Save the modified document back to the same location or a new location
        $newFilePath = public_path('storage/docs/Purchase_Order_Updated.docx');
        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($newFilePath);

        // Optionally, you can return the new document for download
        return response()->download($newFilePath)->deleteFileAfterSend(true);
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
    
            // Create a notification for the decline action
            $this->createNotifications($requestData, 'decline');
    
            session()->flash('success', 'Request has been declined successfully!');
            session()->flash('success_message', '');
    
        } elseif ($request->input('action') === 'return') {
            // Set status to 'Returned' (5)
            $requestData->status = 5;
            $approvalStatus[] = 5; // 5 = Returned
            
            // Save the return reason, check for 'Other'
            $returnReason = $request->input('return_reason');
            if ($returnReason === 'Other') {
                $returnReason = $request->input('other_return_reason'); // Get custom reason
            }
            $requestData->reason = $returnReason;
    
            // Create a notification for the return action
            $this->createNotifications($requestData, 'return');
    
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
