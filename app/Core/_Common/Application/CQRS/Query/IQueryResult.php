<?php

declare(strict_types=1);

namespace App\Core\_Common\Application\CQRS\Query;

/** @template T */
interface IQueryResult
{
    /** @return T */
    public function getResult(): mixed;
}
