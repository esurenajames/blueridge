<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; // Correct import
use App\Models\RequestModel;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Expense;
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
            'category_id' => 'required|string|max:255', 
            'category' => 'required|string|max:255', 
            'files.*' => 'file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx|max:2048',
            'collaborators' => 'array',
            'collaborators.*' => 'integer|exists:users,id', // Ensure each user ID is valid
        ]);

        // Get the request ID (create a new request first to get its ID)
        // Note: Ensure you have the logic to create a request before handling file uploads
        $newRequest = new RequestModel();
        $newRequest->request_name = $request->request_name;
        $newRequest->request_description = $request->request_description;
        $newRequest->category_id = $request->category_id;
        $newRequest->category = $request->category;
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
        $filePaths = $this->processFiles($request, $newRequest->id, 1);

            $newRequest->update([
                'files' => json_encode($filePaths),
                'collaborators' => json_encode($request->collaborators),
            ]);

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
    return $this->handleFileUpload($request, 2);
}

public function purchaseRequestSubmit(Request $request)
{
    return $this->handleFileUpload($request, 3);
}

public function purchaseOrderSubmit(Request $request)
{
    return $this->handleFileUpload($request, 4);
}

private function handleFileUpload(Request $request, $step)
{
    try {
        $request->validate([
            'id' => 'required|integer|exists:requests,id',
            'files.*' => 'file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx|max:2048',
        ]);

        $requestModel = RequestModel::find($request->input('id'));
        $filePaths = $this->processFiles($request, $requestModel->id, $step, $requestModel->files);

        $requestModel->update(['files' => json_encode($filePaths)]);

        return response()->json(['success' => true, 'message' => 'Files uploaded successfully']);
    } catch (\Exception $e) {
        Log::error('Error uploading files: ' . $e->getMessage());
        return response()->json(['success' => false, 'message' => 'An error occurred while uploading files'], 500);
    }
}

private function processFiles(Request $request, $requestId, $step, $existingFiles = '[]')
{
    $folder = public_path("uploads/$requestId");
    if (!File::exists($folder)) {
        File::makeDirectory($folder, 0755, true);
    }

    $existingFiles = json_decode($existingFiles, true) ?: [];
    $existingFilePaths = array_column($existingFiles, 'file_path');

    foreach ($request->file('files', []) as $file) {
        $originalName = $file->getClientOriginalName();
        $filePath = $this->resolveDuplicate($folder, $originalName);

        $file->move($folder, basename($filePath));

        $existingFiles[] = [
            'file_path' => str_replace(public_path(), '', $filePath),
            'step' => $step,
        ];
    }

    return $existingFiles;
}

private function resolveDuplicate($folder, $filename)
{
    $filePath = "$folder/$filename";
    $counter = 1;

    while (file_exists($filePath)) {
        $nameWithoutExt = pathinfo($filename, PATHINFO_FILENAME);
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $newName = "{$nameWithoutExt}($counter).{$extension}";
        $filePath = "$folder/$newName";
        $counter++;
    }

    return $filePath;
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
        $expenditures = Expense::all(); 
        $users = User::where('role_id', 1)->get();

        return view('forms', [
            'expenditures' => $expenditures,
            'users' => $users,
        ]);
    }
    

}