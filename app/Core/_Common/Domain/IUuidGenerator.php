<?php

declare(strict_types=1);

namespace App\Core\_Common\Domain;

use App\Core\_Common\Domain\VO\UuidV4;

interface IUuidGenerator
{
    public function v4(): UuidV4;

    public function v4AsString(): string;
}
