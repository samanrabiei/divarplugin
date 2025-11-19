<?php

namespace App\Services\Strategies;

use App\Services\Contracts\ServiceStrategyInterface;

class ServiceB implements ServiceStrategyInterface
{
    public function handle($transaction)
    {
        // عملیات سرویس B
    }
}
