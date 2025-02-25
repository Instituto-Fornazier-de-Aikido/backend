<?php

declare(strict_types=1);

namespace App\Core\Dojo\Infrastructure;

use App\Core\_Common\Application\CQRS\Factory\QueryPaginatedResultFactory;
use App\Core\_Common\Application\CQRS\Factory\QueryResultFactory;
use App\Core\_Common\Application\CQRS\IBaseRepository;
use App\Core\_Common\Application\CQRS\Query\IQueryPaginatedResult;
use App\Core\_Common\Application\CQRS\Query\IQueryPagination;
use App\Core\_Common\Application\CQRS\Query\IQueryResult;
use App\Core\Dojo\Application\IDojoRepository;
use App\Core\Dojo\Infrastructure\Model\Dojo;

/** @template-implements IBaseRepository<\App\Core\Dojo\Domain\Dojo> */
readonly class DojoRepository implements IDojoRepository
{
    public function __construct(
        private QueryPaginatedResultFactory $paginatedResultFactory,
        private QueryResultFactory $resultFactory
    ) {}

    public function getByUuid(string $uuid): IQueryResult
    {
        $dojoModel = Dojo::query()->findOrFail($uuid);

        return $this->resultFactory->build($dojoModel->toAggregate());
    }

    public function list(?IQueryPagination $pagination = null): IQueryResult|IQueryPaginatedResult
    {
        $query = Dojo::query();
        if ($pagination) {
            $paginatedResults = $query->paginate($pagination->perPage(), ['*'], 'page', $pagination->page());

            return $this->paginatedResultFactory->build(
                $this->transformModelsIntoAggregates($paginatedResults->items()),
                $paginatedResults->total(),
                $paginatedResults->currentPage(),
                $paginatedResults->perPage()
            );
        }

        return $this->resultFactory->build(
            $this->transformModelsIntoAggregates($query->get()->all())
        );
    }

    public function save(mixed $entity): void
    {
        $dojo = Dojo::fromAggregate($entity);
        $dojo->save();
    }

    public function remove(string $uuid): void
    {
        Dojo::query()->findOrFail($uuid)->delete();
    }

    private function transformModelsIntoAggregates(array $items): array
    {
        return collect($items)->map(fn (Dojo $dojo) => $dojo->toAggregate())->all();
    }
}
