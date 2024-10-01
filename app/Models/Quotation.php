<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    // Define the table associated with this model (optional if it's named "quotations")
    protected $table = 'quotations';

    // Define the fields that are mass assignable
    protected $fillable = [
        'request_id',
        'company_id',
        'company_name',
        'item_description',
        'qty',
        'unit',
        'unit_price',
        'amount'
    ];

    // Define relationships, if needed
    public function request()
    {
        return $this->belongsTo(RequestModel::class, 'request_id');
    }
}
