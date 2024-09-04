<?php

namespace App\Http\Controllers;

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
        return view('view-all', ['requests' => $requests]);
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
        $newRequest->status = '1'; // Set status to 'pending'
        $newRequest->updated_at = now(); // Set updated_at timestamp

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

}
