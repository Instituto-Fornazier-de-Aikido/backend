<?php

declare(strict_types=1);

namespace App\Core\Dojo\Application;

use App\Core\Dojo\Domain\Dojo;

interface IDojoRepository
{
    public function getByUuid(): Dojo;
}
