<?php

namespace App\Http\Controllers;

use App\Models\RequestModel;
use Illuminate\Http\Request;

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
    
        // Fetch a specific request detail by ID
        $requestData = RequestModel::with('requestor')->findOrFail($id); // Renamed to $requestData to avoid conflict with $request from the Request object

        $files = json_decode($requestData->files, true) ?? []; 
    
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
    
        // Pass the data to the view
        return view('request-approval', compact('requestData', 'steps', 'status', 'files'));
    }    
}
