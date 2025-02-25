<?php

declare(strict_types=1);

namespace Tests\Unit\Core\_Common\Infrastructure;

use App\Core\_Common\Domain\VO\UuidV4;
use App\Core\_Common\Infrastructure\UuidGenerator;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class UuidGeneratorTest extends TestCase
{
    #[Test]
    public function itShouldGenerateValidV4UuidsAsString(): void
    {
        $uuidGenerator = new UuidGenerator();
        $uuid = $uuidGenerator->v4AsString();

        $this->assertMatchesRegularExpression(
            '/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/',
            $uuid,
        );
    }

    #[Test]
    public function itShouldGenerateAUuidV4Object(): void
    {
        $uuidGenerator = new UuidGenerator();
        $uuid = $uuidGenerator->v4();

        $this->assertInstanceOf(UuidV4::class, $uuid);
    }
}
