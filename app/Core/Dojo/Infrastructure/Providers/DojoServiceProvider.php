<?php

declare(strict_types=1);

namespace App\Core\Dojo\Infrastructure\Providers;

use App\Core\Dojo\Application\IDojoRepository;
use App\Core\Dojo\Infrastructure\DojoRepository;
use Illuminate\Support\ServiceProvider;

class DojoServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $bindings = [
            IDojoRepository::class => DojoRepository::class,
        ];
        foreach ($bindings as $abstract => $concrete) {
            $this->app->bind($abstract, $concrete);
        }
    }
}
