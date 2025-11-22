<?php

namespace App\Models\Admin;

use Bavix\Wallet\Models\Wallet;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customers extends Model
{
    use HasFactory;


    protected $table = 'users';

    public function wallet()
    {
        return $this->hasOne(Wallet::class, 'holder_id', 'id');
    }
}
