<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'comment';

    public function post()
    {
        return $this->belongsTo(blog::class, 'post_id', 'id');
    }
}
