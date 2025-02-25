<?php

declare(strict_types=1);

namespace App\Core\_Common\Application\CQRS\Factory;

use App\Core\_Common\Application\CQRS\Query\IQueryFilter;

class QueryFilterFactory
{
    public function build(
        string $subject,
        mixed $operator,
        mixed $value
    ): IQueryFilter {
        return new class($subject, $operator, $value) implements IQueryFilter
        {
            public function __construct(
                private readonly string $subject,
                private readonly mixed $operator,
                private readonly mixed $value
            ) {}

            public function subject(): string
            {
                return $this->subject;
            }

            public function operator(): mixed
            {
                return $this->operator;
            }

            public function value(): mixed
            {
                return $this->value;
            }
        };
    }
}
