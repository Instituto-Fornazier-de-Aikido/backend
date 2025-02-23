<?php

declare(strict_types=1);

namespace App\Modules\Dojo\Domain;

use App\Modules\_Common\Domain\VO\BrazilianStateAcronym;
use App\Modules\_Common\Domain\VO\BrazilianZipCode;

class Address
{
    public function __construct(
        private string $street,
        private string $number,
        private string $neighborhood,
        private string $city,
        private BrazilianStateAcronym $state,
        private BrazilianZipCode $zipCode,
        private ?string $complement,
    ) {}

    public function getStreet(): string
    {
        return $this->street;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function getComplement(): ?string
    {
        return $this->complement;
    }

    public function getNeighborhood(): string
    {
        return $this->neighborhood;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getState(): string
    {
        return $this->state->value();
    }

    public function getZipCode(): string
    {
        return $this->zipCode->value();
    }
}
