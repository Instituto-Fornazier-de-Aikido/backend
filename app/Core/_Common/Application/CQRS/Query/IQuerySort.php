<?php

declare(strict_types=1);

namespace App\Core\_Common\Application\CQRS\Query;

use App\Core\_Common\Application\CQRS\SortDirection;

interface IQuerySort
{
    public function subject(): string;

    public function direction(): SortDirection;
}
