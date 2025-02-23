<?php

declare(strict_types=1);

namespace App\Infrastructure\CQRS;

interface IQueryResult
{
    public function getResult(): mixed;
}
