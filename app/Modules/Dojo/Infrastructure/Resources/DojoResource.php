<?php

declare(strict_types=1);

namespace App\Modules\Dojo\Infrastructure\Resources;

use App\Modules\Dojo\Infrastructure\Model\Dojo;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Dojo */
class DojoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $this->additional([
            'timestamps' => [
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ],
        ]);

        return [
            'uuid' => $this->uuid,
            'name' => $this->name,
            'address' => [
                'street' => $this->street,
                'number' => $this->number,
                'neighborhood' => $this->neighborhood,
                'city' => $this->city,
                'state' => $this->state,
                'zipCode' => $this->zipCode,
                'complement' => $this->complement,
            ],
        ];
    }
}
