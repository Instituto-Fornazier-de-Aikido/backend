<?php

declare(strict_types=1);

namespace Tests\Framework\Core\_Common\Infrastructure\Facades;

use App\Core\_Common\Domain\IUuidGenerator;
use App\Core\_Common\Infrastructure\Facades\Uuid;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class UuidTest extends TestCase
{
    #[Test]
    public function itShouldFacadeAnUuidGenerator(): void
    {
        $this->assertInstanceOf(IUuidGenerator::class, Uuid::getFacadeRoot());
    }
}
