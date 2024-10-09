<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RequestModel;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_id',
        'company_id',
        'company_name',
        'request_date',
        'description',
        'item_description',
        'item_type',
        'qty',
        'unit',
        'unit_price',
        'amount',
    ];

    // Relationship back to the RequestModel
    public function request()
    {
        return $this->belongsTo(RequestModel::class, 'request_id');
    }
}
