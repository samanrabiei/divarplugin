<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'endpoint',
        'payload',
        'status',
        'response',
        'user_id'
    ];

    protected $casts = [
        'payload' => 'array',
        'response' => 'array',
    ];
}
