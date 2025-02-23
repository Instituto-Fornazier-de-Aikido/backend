<?php

declare(strict_types=1);

namespace App\Modules\Dojo\Application;

use App\Modules\Dojo\Domain\Dojo;

interface IDojoRepository
{
    public function getByUuid(): Dojo;
}
