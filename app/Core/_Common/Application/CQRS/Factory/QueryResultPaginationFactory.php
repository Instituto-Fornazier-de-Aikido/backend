<?php

declare(strict_types=1);

namespace App\Core\_Common\Application\CQRS\Factory;

use App\Core\_Common\Application\CQRS\Query\IQueryResultPagination;

class QueryResultPaginationFactory
{
    public function build(int $totalItems, int $page, int $perPage): IQueryResultPagination
    {
        return new class($totalItems, $page, $perPage) implements IQueryResultPagination
        {
            public function __construct(
                private readonly int $totalItems,
                private readonly int $page,
                private readonly int $perPage
            ) {}

            public function totalItems(): int
            {
                return $this->totalItems;
            }

            public function page(): int
            {
                return $this->page;
            }

            public function perPage(): int
            {
                return $this->perPage;
            }

            public function totalPages(): int
            {
                return (int) ceil($this->totalItems / $this->perPage);
            }

            public function nextPage(): int
            {
                return min($this->page + 1, $this->totalPages());
            }

            public function previousPage(): int
            {
                return max($this->page - 1, 1);
            }
        };
    }
}
