<?php

declare(strict_types=1);

namespace App\Core\_Common\Application\CQRS\Query;

/** @template T */
interface IQueryHandler
{
    /** @return IQueryResult<T>|IQueryPaginatedResult<T> */
    public function handle(IQuery $query): IQueryResult|IQueryPaginatedResult;
}
