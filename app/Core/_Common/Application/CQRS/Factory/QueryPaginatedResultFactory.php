<?php

declare(strict_types=1);

namespace App\Core\_Common\Application\CQRS\Factory;

use App\Core\_Common\Application\CQRS\Query\IQueryPaginatedResult;
use App\Core\_Common\Application\CQRS\Query\IQueryResultPagination;

readonly class QueryPaginatedResultFactory
{
    public function __construct(
        private QueryResultPaginationFactory $paginationFactory
    ) {}

    public function build(mixed $data, int $totalItems, int $page, int $perPage): IQueryPaginatedResult
    {
        $pagination = $this->paginationFactory->build($totalItems, $page, $perPage);

        return new class($data, $pagination) implements IQueryPaginatedResult
        {
            public function __construct(
                private readonly mixed $data,
                private readonly IQueryResultPagination $pagination
            ) {}

            public function getResult(): mixed
            {
                return $this->data;
            }

            public function getPagination(): IQueryResultPagination
            {
                return $this->pagination;
            }
        };
    }
}
