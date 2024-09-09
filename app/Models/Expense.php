<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $table = 'expense_table';

    protected $fillable = [
        'object_of_expenditure',
        'proposed_budget',
        'current_expenses',
        'ytd',
        'balance',
        'jan',
        'feb',
        'mar',
        'apr',
        'may',
        'jun',
        'jul',
        'aug',
        'sept',
        'oct',
        'nov',
        'dec',
        'section_id',  // Added section_id to the fillable array
    ];
}
