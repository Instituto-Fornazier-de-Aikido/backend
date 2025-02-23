<?php

declare(strict_types=1);

namespace App\Modules\_Common\Infrastructure;

use App\Modules\_Common\Domain\IUuidGenerator;
use App\Modules\_Common\Domain\VO\UuidV4;
use Ramsey\Uuid\Uuid;

class UuidGenerator implements IUuidGenerator
{
    public function v4(): UuidV4
    {
        return new UuidV4($this->v4AsString());
    }

    public function v4AsString(): string
    {
        return Uuid::uuid4()->toString();
    }
}
