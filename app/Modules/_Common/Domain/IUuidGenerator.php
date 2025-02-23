<?php

declare(strict_types=1);

namespace App\Modules\_Common\Domain;

use App\Modules\_Common\Domain\VO\UuidV4;

interface IUuidGenerator
{
    public function v4(): UuidV4;

    public function v4AsString(): string;
}
