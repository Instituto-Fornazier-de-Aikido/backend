<?php

declare(strict_types=1);

namespace App\Core\Dojo\Infrastructure\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Core\Dojo\Domain\Dojo */
class DojoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'uuid' => $this->getId(),
            'name' => $this->getName(),
            'address' => [
                'street' => $this->getAddress()->getStreet(),
                'number' => $this->getAddress()->getNumber(),
                'neighborhood' => $this->getAddress()->getNeighborhood(),
                'city' => $this->getAddress()->getCity(),
                'state' => $this->getAddress()->getState(),
                'zipCode' => $this->getAddress()->getZipCode(),
                'complement' => $this->getAddress()->getComplement(),
            ],
        ];
    }
}
