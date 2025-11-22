<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $table = 'wallets';

    // اگر لازم داری، مشخص کن چه فیلدهایی قابل mass assignment هستند
    protected $fillable = ['holder_id', 'balance'];

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'holder_id', 'id');
    // }
}
