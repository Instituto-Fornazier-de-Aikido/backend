<?php

declare(strict_types=1);

namespace App\Core\_Common\Domain\VO;

use DomainException;

class UuidV4
{
    private string $value;

    public function __construct(string $value)
    {
        $pattern = '/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/';
        if (preg_match($pattern, $value) !== 1) {
            throw new DomainException('Invalid UUID');
        }
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
