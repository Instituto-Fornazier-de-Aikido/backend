<?php

declare(strict_types=1);

namespace App\Modules\_Common\Infrastructure\Facades;

use App\Modules\_Common\Domain\IUuidGenerator;
use Illuminate\Support\Facades\Facade;

class Uuid extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return IUuidGenerator::class;
    }
}
