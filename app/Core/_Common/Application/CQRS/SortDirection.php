<?php

declare(strict_types=1);

namespace App\Core\_Common\Application\CQRS;

enum SortDirection: string
{
    case ASC = 'asc';
    case DESC = 'desc';
}
