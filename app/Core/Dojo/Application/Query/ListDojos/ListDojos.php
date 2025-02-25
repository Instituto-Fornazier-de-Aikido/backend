<?php

declare(strict_types=1);

namespace App\Core\Dojo\Application\Query\ListDojos;

use App\Core\_Common\Application\CQRS\Factory\QueryPaginationFactory;
use App\Core\_Common\Application\CQRS\Query\IQuery;
use App\Core\_Common\Application\CQRS\Query\IQueryHandler;
use App\Core\_Common\Application\CQRS\Query\IQueryPaginatedResult;
use App\Core\_Common\Application\CQRS\Query\IQueryResult;
use App\Core\Dojo\Application\IDojoRepository;

/** @template-implements IQueryHandler<\App\Core\Dojo\Domain\Dojo[]> */
readonly class ListDojos implements IQueryHandler
{
    public function __construct(
        private IDojoRepository $repository,
        private QueryPaginationFactory $paginationFactory
    ) {}

    /** @param  ListDojosQuery  $query */
    public function handle(IQuery $query): IQueryResult|IQueryPaginatedResult
    {
        $pagination = $query->page
            ? $this->paginationFactory->build($query->page, $query->perPage)
            : null;

        return $this->repository->list($pagination);
    }
}
