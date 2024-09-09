<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; // Correct import
use App\Models\RequestModel;
use Illuminate\Http\Request;


class RequestController extends Controller
{
    public function showRequest($id)
    {
        $request = RequestModel::find($id);
        
        if (!$request) {
            return redirect()->back()->with('error', 'Request not found.');
        }
        
        return view('details-2', ['request' => $request]);
    }

    public function viewAll()
{
    // Retrieve all requests from the database
    $requests = RequestModel::orderBy('created_at', 'desc')->get();
    
    // Fetch counts
    $counts = [
        'view_all' => $requests->whereIn('steps', [1, 2, 3, 4, 5])->count(),
        'approval' => $requests->where('steps', 1)->where('status', 1)->count(),
        'request_form' => $requests->where('steps', 2)->where('status', 1)->count(),
        'quotation' => $requests->where('steps', 3)->where('status', 1)->count(),
        'purchase_request' => $requests->where('steps', 4)->where('status', 1)->count(),
        'purchase_order' => $requests->where('steps', 5 )->where('status', 1)->count(),
        'declined' => $requests->where('status', 3)->count(),
        'history' => $requests->whereIn('status', [2, 3])->count(),
    ];

    // Pass requests and counts to the view
    return view('view-all', ['requests' => $requests, 'counts' => $counts]);
}

    public function submit(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'request_name' => 'required|string|max:255',
            'request_description' => 'required|string',
            'request_type' => 'required|string', // Validate request_type
            'files.*' => 'file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx|max:2048',
        ]);
    
        // Process file uploads and store file paths
        $filePaths = [];
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                // Generate a unique name for the file
                $fileName = time() . '_' . $file->getClientOriginalName();
                
                // Move the file to a storage directory (public/uploads for example)
                $file->move(public_path('uploads'), $fileName);
    
                // Store the file path
                $filePaths[] = '/uploads/' . $fileName; // Adjust path as per your storage setup
            }
        }
    
        // Save the request data to the database
        $newRequest = new RequestModel();
        $newRequest->request_name = $request->request_name;
        $newRequest->request_description = $request->request_description;
        $newRequest->request_type = $request->request_type; // Assign request_type
        $newRequest->files = json_encode($filePaths); // Store file paths as JSON string
        $newRequest->steps = '1'; 
        $newRequest->status = '1'; 
        $newRequest->updated_at = now();
    
        // Assign the current user's ID as the requestor_id
        $newRequest->requestor_id = Auth::user()->id;
    
        // Save the request
        $newRequest->save();
    
        // Return JSON response indicating success or failure
        return response()->json(['success' => true, 'message' => 'Request submitted successfully']);
    }
    
    public function showDetails($id)
    {
        $request = RequestModel::find($id);

        if (!$request) {
            return abort(404, 'Request not found');
        }

        return view('details-2', compact('request'));
    }

    // Controller method
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
    $this->requests = RequestModel::where('steps', $step)->get();
}



}
