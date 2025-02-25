<?php

declare(strict_types=1);

namespace App\Core\_Common\Application\CQRS\Query;

interface IQueryPagination
{
    public function page(): int;

    public function perPage(): int;
}
