<?php

declare(strict_types=1);

namespace App\Core\_Common\Domain\VO;

use DomainException;
use Ds\Set;

class BrazilianStateAcronym
{
    public function __construct(
        private string $value,
    ) {
        $this->value = mb_strtoupper($this->value);
        $this->validate();
    }

    public function value(): string
    {
        return $this->value;
    }

    private function validate(): void
    {
        $states = new Set([
            'AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI',
            'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO',
        ]);
        if ( ! $states->contains($this->value)) {
            throw new DomainException('Invalid state acronym');
        }
    }
}
