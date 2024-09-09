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

    protected $fillable = [
        'request_name', 'request_description', 'files', 'status', 'steps', 'updated_at',
    ];

    protected $casts = [
        'files' => 'array', // Cast files attribute to array
    ];
} 