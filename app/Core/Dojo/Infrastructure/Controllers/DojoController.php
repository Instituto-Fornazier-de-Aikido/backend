<?php

declare(strict_types=1);

namespace App\Core\Dojo\Infrastructure\Controllers;

use App\Core\_Common\Application\CQRS\Query\IQueryPaginatedResult;
use App\Core\Dojo\Application\Query\ListDojos\ListDojos;
use App\Core\Dojo\Application\Query\ListDojos\ListDojosQuery;
use App\Core\Dojo\Application\Query\ShowDojo\ShowDojo;
use App\Core\Dojo\Application\Query\ShowDojo\ShowDojoQuery;
use App\Core\Dojo\Infrastructure\Model\Dojo;
use App\Core\Dojo\Infrastructure\Resources\DojoResource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Pagination\Paginator;

class DojoController
{
    use AuthorizesRequests;

    public function index(Request $request, ListDojos $query): AnonymousResourceCollection
    {
        $this->authorize('viewAny', Dojo::class);
        $queryResult = $query->handle(new ListDojosQuery(
            page: $request->query('page') ? (int) $request->query('page') : null,
            perPage: $request->query('perPage') ? (int) $request->query('perPage') : null,
        ));

        if ($queryResult instanceof IQueryPaginatedResult) {
            return $this->returnPaginatedResource($queryResult);
        }

        return DojoResource::collection($queryResult);
    }

    public function store(Request $request): DojoResource
    {
        $this->authorize('create', Dojo::class);

        $data = $request->validate([
            'name' => ['required'],
            'street' => ['required'],
            'number' => ['required'],
            'neighborhood' => ['required'],
            'city' => ['required'],
            'state' => ['required'],
            'zipCode' => ['required'],
            'complement' => ['nullable'],
        ]);

        return new DojoResource(Dojo::create($data));
    }

    public function show(Dojo $dojo, ShowDojo $query): DojoResource
    {
        $this->authorize('view', $dojo);

        $queryResult = $query->handle(new ShowDojoQuery(uuid: $dojo->uuid));

        return new DojoResource($queryResult->getResult());
    }

    public function update(Request $request, Dojo $dojo): DojoResource
    {
        $this->authorize('update', $dojo);

        $data = $request->validate([
            'name' => ['required'],
            'street' => ['required'],
            'number' => ['required'],
            'neighborhood' => ['required'],
            'city' => ['required'],
            'state' => ['required'],
            'zipCode' => ['required'],
            'complement' => ['nullable'],
        ]);

        $dojo->update($data);

        return new DojoResource($dojo);
    }

    public function destroy(Dojo $dojo): JsonResponse
    {
        $this->authorize('delete', $dojo);

        $dojo->delete();

        return response()->json();
    }

    private function returnPaginatedResource(IQueryPaginatedResult $queryResult): AnonymousResourceCollection
    {
        $paginator = new Paginator(
            items: $queryResult->getResult(),
            perPage: $queryResult->getPagination()->perPage(),
            currentPage: $queryResult->getPagination()->page(),
            options: ['path' => Paginator::resolveCurrentPath()]
        );

        return DojoResource::collection($paginator);
    }
}
