<?php

declare(strict_types=1);

namespace App\Core\Dojo\Domain;

use App\Core\_Common\Domain\VO\UuidV4;
use App\Core\Dojo\Domain\VO\DojoName;

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
