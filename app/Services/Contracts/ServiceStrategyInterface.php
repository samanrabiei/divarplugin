<?php

namespace App\Services\Contracts;

interface ServiceStrategyInterface
{
    /**
     * Handle service after payment
     */
    public function handle($transaction);
}
