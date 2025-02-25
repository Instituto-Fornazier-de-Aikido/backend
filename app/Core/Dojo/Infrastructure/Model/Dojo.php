<?php

declare(strict_types=1);

namespace App\Core\Dojo\Infrastructure\Model;

use App\Core\_Common\Domain\VO\BrazilianStateAcronym;
use App\Core\_Common\Domain\VO\BrazilianZipCode;
use App\Core\_Common\Domain\VO\UuidV4;
use App\Core\Dojo\Domain\Address;
use App\Core\Dojo\Domain\Dojo as DojoAggregate;
use App\Core\Dojo\Domain\VO\DojoName;
use App\Core\Dojo\Infrastructure\Factories\DojoFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dojo extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    public static $factory = DojoFactory::class;

    protected $primaryKey = 'uuid';

    public static function fromAggregate(DojoAggregate $aggregate): self
    {
        return new self([
            'uuid' => $aggregate->getId(),
            'name' => $aggregate->getName(),
            'street' => $aggregate->getAddress()->getStreet(),
            'number' => $aggregate->getAddress()->getNumber(),
            'neighborhood' => $aggregate->getAddress()->getNeighborhood(),
            'city' => $aggregate->getAddress()->getCity(),
            'state' => $aggregate->getAddress()->getState(),
            'zipCode' => $aggregate->getAddress()->getZipCode(),
            'complement' => $aggregate->getAddress()->getComplement(),
        ]);
    }

    public function toAggregate(): DojoAggregate
    {
        $attributes = $this->getAttributes();

        return new DojoAggregate(
            new UuidV4($attributes['uuid']),
            new DojoName($attributes['name']),
            new Address(
                $attributes['street'],
                $attributes['number'],
                $attributes['neighborhood'],
                $attributes['city'],
                new BrazilianStateAcronym($attributes['state']),
                new BrazilianZipCode($attributes['zipCode']),
                $attributes['complement']
            )
        );
    }
}
