<?php

declare(strict_types=1);

namespace App\Core\_Common\Application\CQRS;

use App\Core\_Common\Application\CQRS\Query\IQueryPaginatedResult;
use App\Core\_Common\Application\CQRS\Query\IQueryPagination;
use App\Core\_Common\Application\CQRS\Query\IQueryResult;

/** @template T */
interface IBaseRepository
{
    /** @return IQueryResult<T> */
    public function getByUuid(string $uuid): IQueryResult;

    /** @return IQueryResult<T[]> | IQueryPaginatedResult<T> */
    public function list(?IQueryPagination $pagination = null): IQueryResult|IQueryPaginatedResult;

    /** @param T $entity */
    public function save(mixed $entity): void;

    public function remove(string $uuid): void;
}
