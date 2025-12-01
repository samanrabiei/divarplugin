<?php

namespace App\Models\Admin;

use App\Models\Admin\Customers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DivarTransaction extends Model
{
    protected $table = 'divar_transactions';

    protected $primaryKey = 'transaction_id';

    public $timestamps = true;

    protected $fillable = [
        'transaction_id',
        'profit',
        'amount',
        'service_shnase',
        'user_id',
    ];

    public function users()
    {
        return $this->hasOne(Customers::class, 'id', 'user_id');
    }
}
