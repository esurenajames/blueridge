<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class ExpenseTableController extends Controller
{
    public function index()
    {
        // Map section IDs to their corresponding names
        $sectionNames = [
            1 => 'I. Cash Balance',
            2 => 'II. Receipts',
            3 => 'III. Expenditures',
        ];

        // Group expenses by section_id
        $groupedExpenses = Expense::all()->groupBy('section_id');

        // Get the current month (e.g., 9 for September)
        $currentMonth = now()->month;

         // Group expenses by section_id and summaries
        $groupedExpenses = Expense::all()->groupBy('section_id');

        // Calculate the first half, second half, and YTD summaries
        foreach ($groupedExpenses as $sectionId => $expenses) {
            foreach ($expenses as $expense) {
                $expense->first_half = $expense->jan + $expense->feb + $expense->mar + $expense->apr + $expense->may + $expense->jun;
                $expense->second_half = $expense->jul + $expense->aug + $expense->sept + $expense->oct + $expense->nov + $expense->dec;

                // Calculate YTD based on the current month
                $ytdTotal = 0;
                for ($month = 1; $month <= $currentMonth; $month++) {
                    $monthName = strtolower(date('M', mktime(0, 0, 0, $month, 10))); // jan, feb, mar, etc.
                    $ytdTotal += $expense->$monthName;
                }
                $expense->ytd = $ytdTotal;

                $expense->balance = $expense->proposed_budget - $expense->ytd;
            }
        }

        // Pass grouped expenses and section names to the view
        return view('expense-table', [
            'groupedExpenses' => $groupedExpenses,
            'sectionNames' => $sectionNames,
        ]);
    }

    public function store(Request $request)
    {
        // Determine the section_id based on the selected type
        $sectionId = match ($request->input('type')) {
            'Cash Balance' => 1,
            'Receipts' => 2,
            'Expenditures' => 3,
            default => null,
        };

        // Validate and store the expense
        $request->validate([
            'object_of_expenditure' => 'required|string|max:255',
        ]);

        Expense::create([
            'object_of_expenditure' => $request->input('object_of_expenditure'),
            'section_id' => $sectionId,
            // Add default values for other fields or leave them null
            'proposed_budget' => 0,
            'current_expenses' => 0,
            'ytd' => 0,
            'balance' => 0,
            'jan' => 0,
            'feb' => 0,
            'mar' => 0,
            'apr' => 0,
            'may' => 0,
            'jun' => 0,
            'jul' => 0,
            'aug' => 0,
            'sept' => 0,
            'oct' => 0,
            'nov' => 0,
            'dec' => 0,
        ]);

        // Redirect back to the index or wherever you need
        return redirect()->route('expense.index')->with('success', 'Expense added successfully.');
    }

    public function getExpenseDetails($id)
    {
        // Fetch the expense with the given id
        $expense = Expense::find($id);
    
        if ($expense) {
            Log::info('Expense found:', ['id' => $expense->id, 'proposed_budget' => $expense->proposed_budget]);
    
            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $expense->id,
                    'proposed_budget' => $expense->proposed_budget,
                ]
            ], 200, ['Content-Type' => 'application/json']); // Add Content-Type explicitly
        } else {
            Log::warning('Expense not found for ID:', ['id' => $id]);
    
            return response()->json([
                'success' => false,
                'message' => 'Expense not found'
            ], 404, ['Content-Type' => 'application/json']);
        }
    }
    
    public function updateProposedBudget(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'proposed_budget' => 'required|numeric|min:0',
        ]);

        // Find the expense and update the proposed budget
        $expense = Expense::find($id);

        if ($expense) {
            $expense->proposed_budget = $request->input('proposed_budget');
            $expense->save();

            return response()->json([
                'success' => true,
                'message' => 'Proposed budget updated successfully',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Expense not found',
            ], 404);
        }
    }
    
}
