<?php

namespace App\Http\Controllers;

use App\Models\RequestModel;
use Illuminate\Http\Request;

class RequestTableController extends Controller
{
    public function index(Request $request)
    {
        // Get the number of items per page from the request or default to 10
        $perPage = $request->input('per_page', 10);
    
        // Fetch the requests with pagination
        $requests = RequestModel::paginate($perPage);
    
        // Pass the requests to the view
        return view('request-table', compact('requests'));
    }
}
