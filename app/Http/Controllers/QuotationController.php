<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Add this line
use App\Models\Quotation; // Ensure this is included if you are using the Quotation model
use Illuminate\Support\Facades\Log; // Include this for logging
use PDF;

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
                    'company_address' => 'required|string|max:255', // ensure this is present
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
                // Log before creating to check values
                Log::info('Creating quotation:', [
                    'request_id' => $data['request_id'],
                    'company_id' => $data['company_id'],
                    'company_name' => $data['company_name'],
                    'company_address' => $data['company_address'],
                    'items' => $data['items'],
                ]);

                foreach ($data['items'] as $item) {
                    Quotation::create([
                        'request_id' => $data['request_id'],
                        'company_id' => $data['company_id'],
                        'item_status' => '0',
                        'company_name' => $data['company_name'],
                        'company_address' => $data['company_address'],
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

        public function generatePDF($id)
        {
            // Fetch all quotations for the given request_id = 149
            $quotations = Quotation::where('request_id', $id)->get();
    
            if ($quotations->isEmpty()) {
                return back()->with('error', 'No data found for this request.');
            }
    
            // Load the Blade view and pass the data
            $pdf = PDF::loadView('quotations.pdf', ['quotations' => $quotations]);
    
            // Download the generated PDF
            return $pdf->download('quotation_' . $id . '.pdf');
        }

}
