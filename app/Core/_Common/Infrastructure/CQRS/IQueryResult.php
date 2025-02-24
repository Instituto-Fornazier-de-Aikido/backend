<?php

declare(strict_types=1);

namespace App\Core\_Common\Infrastructure\CQRS;

interface IQueryResult
{
    public function getResult(): mixed;
}
