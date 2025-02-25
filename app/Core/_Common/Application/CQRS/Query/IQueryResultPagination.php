<?php

declare(strict_types=1);

namespace App\Core\_Common\Application\CQRS\Query;

/** @template-covariant T */
interface IQueryResultPagination
{
    public function totalItems(): int;

    public function page(): int;

    public function perPage(): int;

    public function totalPages(): int;

    public function nextPage(): int;

    public function previousPage(): int;
}
