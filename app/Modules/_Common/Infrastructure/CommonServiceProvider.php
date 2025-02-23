<?php

declare(strict_types=1);

namespace App\Modules\_Common\Infrastructure;

use App\Modules\_Common\Domain\IUuidGenerator;
use Illuminate\Support\ServiceProvider;

class CommonServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $bindings = [
            IUuidGenerator::class => UuidGenerator::class,
        ];
        foreach ($bindings as $abstract => $concrete) {
            $this->app->bind($abstract, $concrete);
        }
    }
}
