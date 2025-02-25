<?php

declare(strict_types=1);

namespace App\Core\_Common\Application\CQRS\Factory;

use App\Core\_Common\Application\CQRS\Query\IQuerySort;
use App\Core\_Common\Application\CQRS\SortDirection;

class QuerySortFactory
{
    public function build(string $subject, SortDirection $direction): IQuerySort
    {
        return new class($subject, $direction) implements IQuerySort
        {
            public function __construct(
                private readonly string $subject,
                private readonly SortDirection $direction
            ) {}

            public function subject(): string
            {
                return $this->subject;
            }

            public function direction(): SortDirection
            {
                return $this->direction;
            }
        };
    }
}
