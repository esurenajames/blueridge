<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Add this line
use App\Models\Quotation; // Ensure this is included if you are using the Quotation model
use Illuminate\Support\Facades\Log; // Include this for logging


class QuotationController extends Controller
{
    public function store(Request $request)
{
    try {
        // Validate each quotation entry
        $requestData = $request->all();
        foreach ($requestData as $data) {
            $validatedData = Validator::make($data, [
                'company_name' => 'required|string|max:255',
                'request_date' => 'required|date',
                'description' => 'required|string|max:255',
                'items' => 'required|array',
                'items.*.item_type' => 'required|string',
                'items.*.qty' => 'required|integer',
                'items.*.unit' => 'required|string',
                'items.*.item_description' => 'required|string',
                'items.*.unit_price' => 'required|numeric',
                'items.*.amount' => 'required|numeric',
            ])->validate();
        }

        // Log the validated data
        Log::info('Validated Quotation Data:', $requestData);

        // Loop through items and create a quotation entry for each
        foreach ($requestData as $data) {
            foreach ($data['items'] as $item) {
                Quotation::create([
                    'request_id' => $data['request_id'],
                    'company_id' => $data['company_id'],
                    'company_name' => $data['company_name'],
                    'request_date' => $data['request_date'],
                    'description' => $data['description'],
                    'item_description' => $item['item_description'],
                    'item_type' => $item['item_type'],
                    'qty' => $item['qty'],
                    'unit' => $item['unit'],
                    'unit_price' => $item['unit_price'],
                    'amount' => $item['amount'],
                ]);
            }
        }

        return response()->json(['message' => 'Quotations saved successfully!'], 201);
    } catch (\Exception $e) {
        Log::error('Error saving quotation:', [
            'error' => $e->getMessage(),
            'request_data' => $request->all()
        ]);

        return response()->json(['message' => 'Error saving quotation', 'error' => $e->getMessage()], 500);
    }
}
}
