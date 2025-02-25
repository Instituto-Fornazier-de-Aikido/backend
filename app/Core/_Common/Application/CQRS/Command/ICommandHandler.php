<?php

declare(strict_types=1);

namespace App\Core\_Common\Application\CQRS\Command;

interface ICommandHandler
{
    public function handle(ICommand $command): void;
}
