<?php

namespace App\Services;

use App\Services\Strategies\Shahkar;
use App\Services\Strategies\ServiceB;
use App\Services\Strategies\ServiceC;
use App\Services\Contracts\ServiceStrategyInterface;

class ServiceDispatcher
{
    protected static $map = [
        'shahkar' => Shahkar::class,
        'service_b' => ServiceB::class,
    ];

    public static function dispatch($serviceType, $transaction)
    {
        if (!isset(self::$map[$serviceType])) {
            throw new \Exception("Service handler not found for type: {$serviceType}");
        }

        $class = self::$map[$serviceType];

        /** @var ServiceStrategyInterface $service */
        $service = new $class;

        return $service->handle($transaction);
    }
}
