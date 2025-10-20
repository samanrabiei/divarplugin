<?php

namespace App\Models;

use PhpParser\Node\Expr\FuncCall;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class test extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'blogs';

    protected $guarded = [];

    // protected static function booted(): void
    // {
    //     static::addGlobalScope('ancient', function ($builder) {
    //         $builder->where('status', '1');
    //     });
    // }

    public function scopeStatus($query, $status)
    {
        $query->where('status', $status);
    }

    // protected function firstName()
    // {
    //     return Attribute::make(
    //         get: fn($value) => strtolower($value),
    //     );
    // }

    public function getTitleAttribute($value)
    {
        return strtolower($value);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = strtolower($value);
    }


    protected function casts()
    {
        return [
            'status' => 'boolean'
        ];
    }
}
