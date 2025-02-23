<?php

declare(strict_types=1);

namespace App\Modules\Dojo\Domain;

use App\Modules\_Common\Domain\VO\UuidV4;
use App\Modules\Dojo\Domain\VO\DojoName;

class Dojo
{
    public function __construct(
        private UuidV4 $id,
        private DojoName $name,
        private Address $address,
    ) {}

    public function getId(): string
    {
        return $this->id->value();
    }

    public function getName(): string
    {
        return $this->name->value();
    }

    public function getAddress(): Address
    {
        return $this->address;
    }
}
