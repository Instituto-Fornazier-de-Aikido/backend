<?php

declare(strict_types=1);

namespace App\Modules\Dojo\Infrastructure\Controllers;

use App\Modules\Dojo\Infrastructure\Model\Dojo;
use App\Modules\Dojo\Infrastructure\Resources\DojoResource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class DojoController
{
    use AuthorizesRequests;

    public function index(): AnonymousResourceCollection
    {
        $this->authorize('viewAny', Dojo::class);

        return DojoResource::collection(Dojo::all());
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

    public function show(Dojo $dojo): DojoResource
    {
        $this->authorize('view', $dojo);

        return new DojoResource($dojo);
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
}
