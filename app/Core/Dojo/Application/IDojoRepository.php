<?php

declare(strict_types=1);

namespace App\Core\Dojo\Application;

use App\Core\_Common\Application\CQRS\IBaseRepository;
use App\Core\Dojo\Domain\Dojo;

/** @template-extends IBaseRepository<Dojo> */
interface IDojoRepository extends IBaseRepository {}
