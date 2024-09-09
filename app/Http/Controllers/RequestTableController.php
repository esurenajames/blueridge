<?php

namespace App\Http\Controllers;

use App\Models\RequestModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RequestTableController extends Controller
{
    public function index(Request $request)
    {
        // Get the number of items per page from the request or default to 10
        $perPage = $request->input('per_page', 10);

        // Fetch the requests with the requestor relationship and paginate
        $requests = RequestModel::with('requestor')->paginate($perPage);

        // Calculate completion percentage based on steps
        foreach ($requests as $req) {
            $req->completion_percentage = $this->calculateCompletionPercentage($req->steps);
        }

        // Pass the requests to the view
        return view('request-table', compact('requests'));
    }

    // Function to calculate completion percentage
    private function calculateCompletionPercentage($steps)
    {
        switch ($steps) {
            case 1:
                return 20;
            case 2:
                return 40;
            case 3:
                return 60;
            case 4:
                return 80;
            case 5:
                return 100;
            default:
                return 0;
        }
    }

    // Method to get request details
    public function getRequestDetails($id)
    {
        // Fetch the request with the requestor relationship
        $request = RequestModel::with('requestor')->find($id);
    
        if ($request) {
            // Decode the files JSON string to an array and ensure it's an array
            $files = json_decode($request->files, true) ?? [];
    
            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $request->id,
                    'requestor_name' => $request->requestor->fname . ' ' . $request->requestor->lname, // Full name from the user table
                    'requestor_profile_picture' => $request->requestor->profile_picture, // Profile picture from user table
                    'request_name' => $request->request_name,
                    'request_type' => $request->request_type,
                    'request_description' => $request->request_description, // Adding the request description
                    'created_at' => $request->created_at->format('Y-m-d'),
                    'last_approved_by' => null, // Leave as is, or you can adjust based on your logic
                    'files' => $files, // Return files as an array
                ]
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Request not found'
            ]);
        }
    }

    public function updateRequest(Request $request)
    {
        try {
            $validated = $request->validate([
                'id' => 'required|integer|exists:requests,id',
                'request_type' => 'required|string|max:255',
                'request_name' => 'required|string|max:255',
                'request_description' => 'nullable|string',
            ]);

            // Log the validated data for debugging
            Log::info('Update Request Data:', $validated);

            $requestModel = RequestModel::findOrFail($validated['id']);

            // Check current values
            Log::info('Current Request Data:', $requestModel->toArray());

            $requestModel->update([
                'request_type' => $validated['request_type'],
                'request_name' => $validated['request_name'],
                'request_description' => $validated['request_description'],
            ]);

            // Log updated data
            Log::info('Updated Request Data:', $requestModel->toArray());

            return response()->json(['success' => true, 'message' => 'Request updated successfully!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function deleteRequest($id)
    {
        Log::info('Attempting to delete request with ID: ' . $id);
    
        try {
            $request = RequestModel::findOrFail($id);
            $request->delete();
        
            return response()->json(['success' => true, 'message' => 'Request deleted successfully!']);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::error('Request not found with ID: ' . $id);
            return response()->json(['success' => false, 'message' => 'Request not found']);
        } catch (\Exception $e) {
            Log::error('Error deleting request with ID: ' . $id . '. Error: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
