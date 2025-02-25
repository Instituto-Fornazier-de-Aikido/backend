<?php

declare(strict_types=1);

namespace App\Core\_Common\Infrastructure\Providers;

use App\Core\_Common\Domain\IUuidGenerator;
use App\Core\_Common\Infrastructure\UuidGenerator;
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
