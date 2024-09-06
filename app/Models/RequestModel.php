<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestModel extends Model
{
    // Specify the table associated with the model
    protected $table = 'requests';

    // Define the primary key if it's not 'id'
    protected $primaryKey = 'id';

    // Indicate if the IDs are auto-incrementing
    public $incrementing = true;

    // Set the data type of the primary key
    protected $keyType = 'int';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'requestor_id',
        'request_name',
        'request_description',
        'request_type',
        'status',
        'steps',
        'files',
        'remarks'
    ];

    // Specify attributes that should be cast to native types
    protected $casts = [
        'files' => 'array', // Assuming 'files' column stores JSON data
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}