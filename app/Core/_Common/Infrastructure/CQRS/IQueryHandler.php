<?php

declare(strict_types=1);

namespace App\Core\_Common\Infrastructure\CQRS;

interface IQueryHandler
{
    public function handle(IQuery $query): ?IQueryResult;
}
