<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestModel;
use App\Models\Quotation;
use App\Models\User;
use App\Models\Expense;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB; // Correct placement of DB facade
use App\Models\Item;

class DashboardController extends Controller
{
    public function index()
    {
        // Total current expenses for the year
        $currentExpensesYear = DB::table('expense_table')->sum('current_expenses');

        $currentYear = date('Y'); // Get the current year

        // Total proposed budget for the year
        $totalProposedBudgetYear = DB::table('expense_table')->sum('proposed_budget');

        $remainingBudgetYear = $totalProposedBudgetYear - $currentExpensesYear;

        // Cash balance (section 1)
        $cashBalanceTotalBudget = DB::table('expense_table')->where('section_id', 1)->sum('proposed_budget');
        $cashBalanceCurrentExpenses = DB::table('expense_table')->where('section_id', 1)->sum('current_expenses');
        $cashBalanceRemainingBudget = $cashBalanceTotalBudget - $cashBalanceCurrentExpenses;

        // Receipts (section 2)
        $receiptsTotalBudget = DB::table('expense_table')->where('section_id', 2)->sum('proposed_budget');
        $receiptsCurrentExpenses = DB::table('expense_table')->where('section_id', 2)->sum('current_expenses');
        $receiptsRemainingBudget = $receiptsTotalBudget - $receiptsCurrentExpenses;

        // Expenditures (section 3)
        $expendituresTotalBudget = DB::table('expense_table')->where('section_id', 3)->sum('proposed_budget');
        $expendituresCurrentExpenses = DB::table('expense_table')->where('section_id', 3)->sum('current_expenses');
        $expendituresRemainingBudget = $expendituresTotalBudget - $expendituresCurrentExpenses;

        $activeRequestsCount = DB::table('requests')
        ->whereIn('request_type', [1, 2, 3]) // Count request types 1 (PBC), 2 (Request Form), and 3 (Petty Cash)
        ->when(2, function ($query) {
            return $query->whereIn('steps', [1, 2, 3, 4]) // Only apply this for request_type 2
                         ->whereIn('status', [1, 5]); // Apply status filter for request_type 2
        })
        ->count();

        $punongBarangayCertificationCount = DB::table('requests')
            ->where('request_type', 1)
            ->count();

        $pettyCashVoucherCount = DB::table('requests')
            ->where('request_type', 3)
            ->count();    

        $requestFormCount = DB::table('requests')
            ->where('request_type', 2)
            ->where('steps', 1)
            ->whereIn('status', [1, 5])
            ->count();

        $quotationFormCount = DB::table('requests')
            ->where('request_type', 2)
            ->where('steps', 2)
            ->whereIn('status', [1, 5])
            ->count();

        $purchaseRequestCount = DB::table('requests')
            ->where('request_type', 2)
            ->where('steps', 3)
            ->whereIn('status', [1, 5])
            ->count();

        $purchaseOrderCount = DB::table('requests')
            ->where('request_type', 2)
            ->where('steps', 4)
            ->whereIn('status', [1, 5])
            ->count();

        return view('/main-secretary', compact(
            'currentExpensesYear',
            'totalProposedBudgetYear',
            'remainingBudgetYear',
            'cashBalanceTotalBudget',
            'cashBalanceRemainingBudget',
            'cashBalanceCurrentExpenses',
            'receiptsTotalBudget',
            'receiptsRemainingBudget',
            'receiptsCurrentExpenses',
            'expendituresTotalBudget',
            'expendituresRemainingBudget',
            'expendituresCurrentExpenses',
            'punongBarangayCertificationCount',
            'requestFormCount',
            'quotationFormCount',
            'purchaseRequestCount',
            'purchaseOrderCount',
            'pettyCashVoucherCount',
            'activeRequestsCount',
            'currentYear'
        ));
    }
}
