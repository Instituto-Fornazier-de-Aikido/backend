<?php

declare(strict_types=1);

namespace App\Modules\Dojo\Domain\VO;

use DomainException;

class DojoName
{
    public function __construct(private string $value)
    {
        if ($value === '') {
            throw new DomainException('Dojo name cannot be empty');
        }
    }

    public function value(): string
    {
        return $this->value;
    }
}
