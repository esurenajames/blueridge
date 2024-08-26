<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'object_of_expenditure',
        'proposed_budget',
        'first_half_jan',
        'first_half_feb',
        'first_half_mar',
        'first_half_apr',
        'first_half_may',
        'first_half_jun',
        'second_half_jul',
        'second_half_aug',
        'second_half_sep',
        'second_half_oct',
        'second_half_nov',
        'second_half_dec',
        'current_expenses',
        'ytd',
        'balance',
    ];
}
