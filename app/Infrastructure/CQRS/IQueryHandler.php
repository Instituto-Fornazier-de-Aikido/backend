<?php

declare(strict_types=1);

namespace App\Infrastructure\CQRS;

interface IQueryHandler
{
    public function handle(IQuery $query): ?IQueryResult;
}
