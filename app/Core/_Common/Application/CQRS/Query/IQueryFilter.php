<?php

declare(strict_types=1);

namespace App\Core\_Common\Application\CQRS\Query;

interface IQueryFilter
{
    public function subject(): string;

    public function operator(): mixed;

    public function value(): mixed;
}
