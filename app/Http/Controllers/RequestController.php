<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; // Correct import
use App\Models\RequestModel;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class RequestController extends Controller
{
    public function showDetails($id)
{
    // Fetch the request by ID
    $request = RequestModel::find($id);

    if (!$request) {
        return redirect()->back()->with('error', 'Request not found.');
    }

    // Fetch the requestor
    $requestor = User::find($request->requestor_id);

    // Fetch collaborators
    $collaboratorIds = json_decode($request->collaborators, true);
    
    // Ensure $collaboratorIds is an array
    $collaboratorIds = is_array($collaboratorIds) ? $collaboratorIds : [];
    
    $collaborators = User::whereIn('id', $collaboratorIds)->get();

    // Pass these variables to the view
    return view('details-2', [
        'request' => $request,
        'requestor' => $requestor,
        'collaborators' => $collaborators
    ]);
}


public function viewAll()
{
    $userId = auth()->user()->id;

    // Fetch requests where the user is either a requestor or a collaborator
    $requests = RequestModel::where('requestor_id', $userId)
        ->orWhere('collaborators', 'like', '%' . $userId . '%')
        ->orderBy('created_at', 'desc')
        ->get();

    // Fetch unique requestor IDs from the requests
    $requestorIds = $requests->pluck('requestor_id')->unique();
    $requestors = User::whereIn('id', $requestorIds)->get();

    // Fetch unique collaborator IDs from the requests
    $collaboratorIds = $requests->flatMap(function ($request) {
        return json_decode($request->collaborators, true) ?: [];
    })->unique();

    // Fetch all collaborators for these requests
    $allCollaborators = User::whereIn('id', $collaboratorIds)->get();

    // Fetch counts based on filtered requests
    $counts = [
        'view_all' => $requests->whereIn('steps', [1, 2, 3, 4])->count(),
        'request_form' => $requests->where('steps', 1)->where('status', 1)->count(),
        'quotation' => $requests->where('steps', 2)->where('status', 1)->count(),
        'purchase_request' => $requests->where('steps', 3)->where('status', 1)->count(),
        'purchase_order' => $requests->where('steps', 4)->where('status', 1)->count(),
        'declined' => $requests->where('status', 3)->count(),
        'history' => $requests->whereIn('status', [2, 3])->count(),
    ];

    // Pass data to the view
    return view('view-all', [
        'requests' => $requests,
        'requestors' => $requestors,
        'allCollaborators' => $allCollaborators, // Pass all collaborators
        'counts' => $counts
    ]);
}




    public function submit(Request $request)
    {
        try {
            // Validate incoming request data
            $request->validate([
                'request_name' => 'required|string|max:255',
                'request_description' => 'required|string',
                'files.*' => 'file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx|max:2048',
                'collaborators' => 'array',
                'collaborators.*' => 'integer|exists:users,id', // Ensure each user ID is valid
            ]);

            // Process file uploads and store file paths
            $filePaths = [];
            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    // Use Laravel's store method for secure file uploads
                    $filePath = $file->store('uploads', 'public'); // Store in 'storage/app/public/uploads'
                    $filePaths[] = '/storage/' . $filePath; // Adjust path based on your storage setup
                }
            }

            // Save the request data to the database
            $newRequest = new RequestModel();
            $newRequest->request_name = $request->request_name;
            $newRequest->request_description = $request->request_description;
            $newRequest->files = json_encode($filePaths); // Store file paths as JSON string
            $newRequest->request_type = '2'; 
            $newRequest->collaborators = json_encode($request->collaborators); // Save CC user IDs as JSON
            $newRequest->steps = '1'; 
            $newRequest->status = '1'; 
            $newRequest->updated_at = now();

            // Assign the current user's ID as the requestor_id
            $newRequest->requestor_id = Auth::id();

            // Save the request
            $newRequest->save();

            // Return JSON response indicating success
            return response()->json(['success' => true, 'message' => 'Request submitted successfully']);
        } catch (\Exception $e) {
            // Log the error and return a failure response
            Log::error('Error submitting request: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'An error occurred while submitting the request'], 500);
        }
    }

    public function show(Request $request)
    {
        $files = $request->files; // Assuming $request->files is an array of file paths
        return view('details-2', ['files' => json_encode($files)]);
    }

    public function getRequestStatus($id)
    {
        $request = RequestModel::findOrFail($id);
        return response()->json([
            'status' => $request->status,
        ]);
    }

    public function filterByStep($step)
    {
        $request = RequestModel::find($id);
        

        $this-> requests = RequestModel::where('steps', $step)->get();
    }

    public function createRequestForm()
    {
        // Fetch users with role_id = 1
        $users = User::where('role_id', 1)->get();

        // Pass users to the form view
        return view('forms', ['users' => $users]);
    }

}