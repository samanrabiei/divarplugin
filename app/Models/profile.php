<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class profile extends Model
{
    protected $table = 'profile';
    use HasFactory;


    public function user()
    {
        return $this->belongsTo(User::class, 'karbar_id', 'id');
    }
}
