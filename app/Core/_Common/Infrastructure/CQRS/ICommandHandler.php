<?php

declare(strict_types=1);

namespace App\Core\_Common\Infrastructure\CQRS;

interface ICommandHandler
{
    public function handle(ICommand $command): void;
}
