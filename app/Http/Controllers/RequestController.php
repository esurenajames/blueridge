<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; // Correct import
use App\Models\RequestModel;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File; 

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
    $collaboratorIds = is_array($collaboratorIds) ? $collaboratorIds : [];
    $collaborators = User::whereIn('id', $collaboratorIds)->get();

    // Decode approval_dates JSON
    $approval_dates = json_decode($request->approval_dates, true) ?: []; // Ensure it's an array

    // Pass these variables to the view
    return view('details-2', [
        'request' => $request,
        'requestor' => $requestor,
        'collaborators' => $collaborators,
        'approval_dates' => $approval_dates // Now defined
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
            'category' => 'required|string|max:255', // Validate category
            'files.*' => 'file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx|max:2048',
            'collaborators' => 'array',
            'collaborators.*' => 'integer|exists:users,id', // Ensure each user ID is valid
        ]);

        // Get the request ID (create a new request first to get its ID)
        // Note: Ensure you have the logic to create a request before handling file uploads
        $newRequest = new RequestModel();
        $newRequest->request_name = $request->request_name;
        $newRequest->request_description = $request->request_description;
        $newRequest->category = $request->category; // Assign the category value
        $newRequest->request_type = '2'; 
        $newRequest->steps = '1'; 
        $newRequest->status = '1'; 
        $newRequest->updated_at = now();
        $newRequest->requestor_id = Auth::id(); // Assign the current user's ID as the requestor_id

        // Save the request to get the ID for file uploads
        $newRequest->save();

        // Get the ID of the newly created request
        $requestId = $newRequest->id; 

        // Process file uploads and store file paths
        $filePaths = [];
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                // Create a directory for the request ID
                $directoryPath = 'uploads/' . $requestId;

                // Use Laravel's store method for secure file uploads
                $filePath = $file->store($directoryPath, 'public'); // Store in 'storage/app/public/uploads/{request_id}'

                // Append new file info to the existing files array with step info
                $filePaths[] = [
                    'file_path' => '/storage/' . $filePath,
                    'step' => 1,  // For step 1 upload
                ];
            }
        }

        // Save file paths and collaborators
        $newRequest->files = json_encode($filePaths); // Store file paths as JSON string
        $newRequest->collaborators = json_encode($request->collaborators); // Save CC user IDs as JSON
        $newRequest->save(); // Save again after file paths and collaborators are added

        // Return JSON response indicating success
        return response()->json(['success' => true, 'message' => 'Request submitted successfully']);
    } catch (\Exception $e) {
        // Log the error and return a failure response
        Log::error('Error submitting request: ' . $e->getMessage());
        return response()->json(['success' => false, 'message' => 'An error occurred while submitting the request'], 500);
    }
}

public function quotationSubmit(Request $request)
{
    try {
        Log::info('Incoming request data:', $request->all());

        $request->validate([
            'id' => 'required|integer|exists:requests,id',
            'files.*' => 'file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx|max:2048',
        ]);

        $requestId = $request->input('id');
        $requestModel = RequestModel::find($requestId);

        if (!$requestModel) {
            return response()->json(['success' => false, 'message' => 'Request not found'], 404);
        }

        Log::info('Retrieved Request ID:', ['id' => $requestModel->id]);

        $requestFolder = public_path('uploads/' . $requestModel->id);
        if (!File::exists($requestFolder)) {
            File::makeDirectory($requestFolder, 0755, true);
        }

        // Get the existing files (if any)
        $existingFiles = json_decode($requestModel->files, true) ?: [];

        // Create a set to store existing file paths for quick lookup
        $existingFilePaths = array_column($existingFiles, 'file_path');

        // Process file uploads
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filePath = '/uploads/' . $requestModel->id . '/' . time() . '_' . $file->getClientOriginalName();

                // Check if the file already exists in existingFiles
                if (!in_array($filePath, $existingFilePaths)) {
                    $file->move($requestFolder, basename($filePath));

                    // Append new file info to the existing files array
                    $existingFiles[] = [
                        'file_path' => $filePath,
                        'step' => 2,  // Indicate the step for this file
                    ];
                }
            }
        }

        // Update the files column with the new file paths
        $requestModel->files = json_encode($existingFiles);
        $requestModel->save();

        return response()->json(['success' => true, 'message' => 'Files uploaded successfully']);
    } catch (\Exception $e) {
        Log::error('Error uploading quotation files: ' . $e->getMessage());
        return response()->json(['success' => false, 'message' => 'An error occurred while uploading the files'], 500);
    }
}

public function purchaseRequestSubmit(Request $request)
{
    try {
        Log::info('Incoming purchase request data:', $request->all());

        $request->validate([
            'id' => 'required|integer|exists:requests,id',
            'files.*' => 'file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx|max:2048',
        ]);

        $requestId = $request->input('id');
        $requestModel = RequestModel::find($requestId);

        if (!$requestModel) {
            return response()->json(['success' => false, 'message' => 'Request not found'], 404);
        }

        Log::info('Retrieved Request ID:', ['id' => $requestModel->id]);

        $requestFolder = public_path('uploads/' . $requestModel->id);
        if (!File::exists($requestFolder)) {
            File::makeDirectory($requestFolder, 0755, true);
        }

        // Get the existing files (if any)
        $existingFiles = json_decode($requestModel->files, true) ?: [];

        // Create a set to store existing file paths for quick lookup
        $existingFilePaths = array_column($existingFiles, 'file_path');

        // Process file uploads
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filePath = '/uploads/' . $requestModel->id . '/' . time() . '_' . $file->getClientOriginalName();

                // Check if the file already exists in existingFiles
                if (!in_array($filePath, $existingFilePaths)) {
                    $file->move($requestFolder, basename($filePath));

                    // Append new file info to the existing files array
                    $existingFiles[] = [
                        'file_path' => $filePath,
                        'step' => 3,  // Step 3 for purchase request
                    ];
                }
            }
        }

        // Update the files column with the new file paths
        $requestModel->files = json_encode($existingFiles);
        $requestModel->save();

        return response()->json(['success' => true, 'message' => 'Purchase request files uploaded successfully']);
    } catch (\Exception $e) {
        Log::error('Error uploading purchase request files: ' . $e->getMessage());
        return response()->json(['success' => false, 'message' => 'An error occurred while uploading the files'], 500);
    }
}



public function  purchaseOrderSubmit(Request $request)
{
    try {
        Log::info('Incoming purchase request data:', $request->all());

        $request->validate([
            'id' => 'required|integer|exists:requests,id',
            'files.*' => 'file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx|max:2048',
        ]);

        $requestId = $request->input('id');
        $requestModel = RequestModel::find($requestId);

        if (!$requestModel) {
            return response()->json(['success' => false, 'message' => 'Request not found'], 404);
        }

        Log::info('Retrieved Request ID:', ['id' => $requestModel->id]);

        $requestFolder = public_path('uploads/' . $requestModel->id);
        if (!File::exists($requestFolder)) {
            File::makeDirectory($requestFolder, 0755, true);
        }

        // Get the existing files (if any)
        $existingFiles = json_decode($requestModel->files, true) ?: [];

        // Create a set to store existing file paths for quick lookup
        $existingFilePaths = array_column($existingFiles, 'file_path');

        // Process file uploads
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filePath = '/uploads/' . $requestModel->id . '/' . time() . '_' . $file->getClientOriginalName();

                // Check if the file already exists in existingFiles
                if (!in_array($filePath, $existingFilePaths)) {
                    $file->move($requestFolder, basename($filePath));

                    // Append new file info to the existing files array
                    $existingFiles[] = [
                        'file_path' => $filePath,
                        'step' => 4,  // Step 3 for purchase request
                    ];
                }
            }
        }

        // Update the files column with the new file paths
        $requestModel->files = json_encode($existingFiles);
        $requestModel->save();

        return response()->json(['success' => true, 'message' => 'Purchase request files uploaded successfully']);
    } catch (\Exception $e) {
        Log::error('Error uploading purchase request files: ' . $e->getMessage());
        return response()->json(['success' => false, 'message' => 'An error occurred while uploading the files'], 500);
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