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
}
