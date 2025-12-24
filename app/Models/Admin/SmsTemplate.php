<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsTemplate extends Model
{

    public $table = 'sms_templates';

    use HasFactory;

    protected $fillable = [
        'title',
        'key',
        'content',
        'is_active',
        'type',
    ];
}
