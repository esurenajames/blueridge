<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestModel extends Model
{
    protected $table = 'requests'; // Specify the table name 'requests'

    protected $fillable = [
        'request_name', 'request_description', 'files', 'status', 'updated_at',
    ];

    protected $casts = [
        'files' => 'array', // Cast files attribute to array
    ];
} 