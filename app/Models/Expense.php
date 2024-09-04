<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $table = 'expense_table';

    // Specify the fields that can be mass-assigned
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

    /**
     * Optionally, you could add validation logic here
     * to ensure that section_id only takes the values 1, 2, or 3.
     */
}
