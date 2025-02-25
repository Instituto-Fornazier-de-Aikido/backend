<?php

declare(strict_types=1);

namespace App\Core\_Common\Application\CQRS\Factory;

use App\Core\_Common\Application\CQRS\Query\IQueryResult;

class QueryResultFactory
{
    public function build(mixed $data): IQueryResult
    {
        return new class($data) implements IQueryResult
        {
            public function __construct(
                private readonly mixed $data
            ) {}

            public function getResult(): mixed
            {
                return $this->data;
            }
        };
    }
}
