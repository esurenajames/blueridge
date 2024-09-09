<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class RequestModel extends Model
{
    public function requestor()
    {
        return $this->belongsTo(User::class, 'requestor_id');
    }
    
    protected $table = 'requests'; // Specify the table name 'requests'

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