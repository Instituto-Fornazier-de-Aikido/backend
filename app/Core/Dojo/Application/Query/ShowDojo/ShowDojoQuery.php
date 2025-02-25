<?php

declare(strict_types=1);

namespace App\Core\Dojo\Application\Query\ShowDojo;

use App\Core\_Common\Application\CQRS\Query\IQuery;

readonly class ShowDojoQuery implements IQuery
{
    public function __construct(
        public string $uuid
    ) {}
}
