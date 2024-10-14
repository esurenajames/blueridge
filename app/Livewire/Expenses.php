<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Expense;
use Barryvdh\DomPDF\Facade as PDF; // Add DomPDF facade

class Expenses extends Component
{
    public $expenses;
    public $editingExpense;

    protected $rules = [
        'editingExpense.object_of_expenditure' => 'required|string',
        'editingExpense.proposed_budget' => 'required|numeric',
        'editingExpense.jan' => 'nullable|numeric',
        'editingExpense.feb' => 'nullable|numeric',
        'editingExpense.mar' => 'nullable|numeric',
        'editingExpense.apr' => 'nullable|numeric',
        'editingExpense.may' => 'nullable|numeric',
        'editingExpense.jun' => 'nullable|numeric',
        'editingExpense.jul' => 'nullable|numeric',
        'editingExpense.aug' => 'nullable|numeric',
        'editingExpense.sep' => 'nullable|numeric',
        'editingExpense.oct' => 'nullable|numeric',
        'editingExpense.nov' => 'nullable|numeric',
        'editingExpense.dec' => 'nullable|numeric',
        'editingExpense.current_expenses' => 'nullable|numeric',
        'editingExpense.ytd' => 'nullable|numeric',
        'editingExpense.balance' => 'nullable|numeric',
    ];

    public function mount()
    {
        $this->expenses = Expense::all();
        $this->editingExpense = new Expense();
    }

    public function save()
    {
        $this->validate();
        $this->editingExpense->save();
        $this->expenses = Expense::all();
        $this->editingExpense = new Expense();
    }

    public function edit(Expense $expense)
    {
        $this->editingExpense = $expense;
    }

    public function delete(Expense $expense)
    {
        $expense->delete();
        $this->expenses = Expense::all();
    }

    // New method for exporting PDF
    public function exportToPDF()
    {
        $expenses = Expense::all(); // Fetch all expenses

        // Generate PDF
        $pdf = PDF::loadView('pdf.expenses', ['expenses' => $expenses]);

        // Download the generated PDF file
        return $pdf->download('expenses_report.pdf');
    }

    public function render()
    {
        return view('livewire.expenses');
    }
}
