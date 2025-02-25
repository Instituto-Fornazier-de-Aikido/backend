<?php

declare(strict_types=1);

namespace App\Core\Dojo\Application\Query\ShowDojo;

use App\Core\_Common\Application\CQRS\Query\IQuery;
use App\Core\_Common\Application\CQRS\Query\IQueryHandler;
use App\Core\_Common\Application\CQRS\Query\IQueryResult;
use App\Core\Dojo\Application\IDojoRepository;

/** @template-implements IQueryHandler<\App\Core\Dojo\Domain\Dojo> */
readonly class ShowDojo implements IQueryHandler
{
    public function __construct(
        private IDojoRepository $repository
    ) {}

    /** @param  ShowDojoQuery  $query */
    public function handle(IQuery $query): IQueryResult
    {
        return $this->repository->getByUuid($query->uuid);
    }
}
