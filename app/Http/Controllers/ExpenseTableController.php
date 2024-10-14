<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\PDF; // Using the Barryvdh dompdf package

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
    
        // Get the current month
        $currentMonth = now()->month;
    
        // Calculate summaries
        foreach ($groupedExpenses as $sectionId => $expenses) {
            foreach ($expenses as $expense) {
                $expense->first_half = $expense->jan + $expense->feb + $expense->mar + $expense->apr + $expense->may + $expense->jun;
                $expense->second_half = $expense->jul + $expense->aug + $expense->sept + $expense->oct + $expense->nov + $expense->dec;
    
                // Calculate YTD based on the current month
                $ytdTotal = 0;
                for ($month = 1; $month <= $currentMonth; $month++) {
                    $monthName = strtolower(date('M', mktime(0, 0, 0, $month, 10)));
                    $ytdTotal += $expense->$monthName;
                }
                $expense->ytd = $ytdTotal;
    
                $expense->balance = $expense->proposed_budget - $expense->ytd;
    
                // Format monetary values
                $expense->proposed_budget = number_format($expense->proposed_budget, 2);
                $expense->first_half = number_format($expense->first_half, 2);
                $expense->second_half = number_format($expense->second_half, 2);
                $expense->ytd = number_format($expense->ytd, 2);
                $expense->balance = number_format($expense->balance, 2);
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
        $sectionId = match ($request->input('type')) {
            'Cash Balance' => 1,
            'Receipts' => 2,
            'Expenditures' => 3,
            default => null,
        };

        $request->validate([
            'object_of_expenditure' => 'required|string|max:255',
        ]);

        Expense::create([
            'object_of_expenditure' => $request->input('object_of_expenditure'),
            'section_id' => $sectionId,
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

        return redirect()->route('expense.index')->with('success', 'Expense added successfully.');
    }

    public function getExpenseDetails($id)
    {
        $expense = Expense::find($id);
    
        if ($expense) {
            Log::info('Expense found:', ['id' => $expense->id, 'proposed_budget' => $expense->proposed_budget]);
    
            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $expense->id,
                    'proposed_budget' => $expense->proposed_budget,
                ]
            ], 200, ['Content-Type' => 'application/json']);
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
        $request->validate([
            'proposed_budget' => 'required|numeric|min:0',
        ]);
    
        $expense = Expense::find($id);
    
        if ($expense) {
            $expense->proposed_budget = $request->input('proposed_budget');
            $expense->save();
    
            // Set session variables for success message
            session()->flash('success', 'Success');
            session()->flash('success_message', 'Proposed budget updated successfully!');
    
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Expense not found'], 404);
        }
    }    

    public function exportToPDF()
    {
        // Map section IDs to their corresponding names
        $sectionNames = [
            1 => 'I. Cash Balance',
            2 => 'II. Receipts',
            3 => 'III. Expenditures',
        ];
    
        // Fetch and group expenses by section_id
        $groupedExpenses = Expense::all()->groupBy('section_id');
    
        // Prepare a flat list of expenses with section names
        $expensesData = [];
        foreach ($groupedExpenses as $sectionId => $expenses) {
            foreach ($expenses as $expense) {
                $expense->section_name = $sectionNames[$sectionId] ?? 'Unknown Section';
                $expensesData[] = $expense; // Add expense to the flat list
            }
        }
    
        // Load the view with the flat expenses data
        $pdf = PDF::loadView('expenses.pdf', compact('expensesData')); // Ensure this view exists
    
        // Generate the filename based on the current date
        $filename = now()->format('Y-M') . ' Expenses Report.pdf'; // e.g., 2024-Oct Expenses.pdf
    
        // Return the generated PDF for download
        return $pdf->download($filename);
    }    
}
