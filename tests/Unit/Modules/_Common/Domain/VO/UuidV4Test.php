<?php

declare(strict_types=1);

namespace Tests\Unit\Core\_Common\Domain\VO;

use App\Core\_Common\Domain\VO\UuidV4;
use DomainException;
use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class UuidV4Test extends TestCase
{
    public static function invalidUuidsProvider(): Iterator
    {
        $uuids = [
            'invalid-uuid',
            '',
            'a5764857-ae35-34dc-8f25-a9c9e73aa898', // v3
            'b79cb3ba-745e-5d9a-8903-4a02327a7e09', // v5
        ];
        foreach ($uuids as $uuid) {
            yield [$uuid];
        }
    }

    public static function uuidsProvider(): Iterator
    {
        $uuids = [
            '20354d7a-e4fe-47af-8ff6-187bca92f3f9',
            'f7b3b3b4-3b1b-4b3b-8b3b-3b1b3b1b3b3b',
            'caa8b54a-eb5e-4134-8ae2-a3946a428ec7',
            'bd2cbad1-6ccf-48e3-bb92-bc9961bc011e',
        ];
        foreach ($uuids as $uuid) {
            yield [$uuid];
        }
    }

    #[Test]
    #[DataProvider('invalidUuidsProvider')]
    public function itShouldThrowWithInvalidUuid(string $uuid): void
    {
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage('Invalid UUID');

        new UuidV4($uuid);
    }

    #[Test]
    #[DataProvider('uuidsProvider')]
    public function itShouldCorrectlyConstructWithValidUuid(string $uuid): void
    {
        $uuidVo = new UuidV4($uuid);
        $this->assertEquals($uuid, $uuidVo->value());
    }
}
