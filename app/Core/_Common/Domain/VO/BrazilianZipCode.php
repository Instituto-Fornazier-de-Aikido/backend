<?php

declare(strict_types=1);

namespace App\Core\_Common\Domain\VO;

use DomainException;

class BrazilianZipCode
{
    public function __construct(
        private string $value,
    ) {
        $this->value = preg_replace('/\D/', '', $this->value);
        $this->validate();
    }

    public function value(): string
    {
        return $this->value;
    }

    private function validate(): void
    {
        if (mb_strlen($this->value) !== 8) {
            throw new DomainException('Invalid zip code');
        }
    }
}
