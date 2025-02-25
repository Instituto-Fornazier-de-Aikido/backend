<?php

declare(strict_types=1);

namespace App\Core\_Common\Application\CQRS\Factory;

use App\Core\_Common\Application\CQRS\Query\IQueryPagination;

class QueryPaginationFactory
{
    public function build(int $page, int $perPage): ?IQueryPagination
    {
        return new class($page, $perPage) implements IQueryPagination
        {
            public function __construct(
                private readonly int $page,
                private readonly int $perPage
            ) {}

            public function page(): int
            {
                return $this->page;
            }

            public function perPage(): int
            {
                return $this->perPage;
            }
        };
    }
}
