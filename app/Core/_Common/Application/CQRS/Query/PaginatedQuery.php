<?php

declare(strict_types=1);

namespace App\Core\_Common\Application\CQRS\Query;

class PaginatedQuery implements IQuery, IQueryPagination
{
    public function __construct(
        public ?int $page = null,
        public ?int $perPage = null
    ) {}

    public function page(): int
    {
        return $this->page;
    }

    public function perPage(): int
    {
        return $this->perPage;
    }
}
