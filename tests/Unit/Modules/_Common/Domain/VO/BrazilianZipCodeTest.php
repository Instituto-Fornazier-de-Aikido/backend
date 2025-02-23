<?php

declare(strict_types=1);

namespace Tests\Unit\Modules\_Common\Domain\VO;

use App\Modules\_Common\Domain\VO\BrazilianZipCode;
use DomainException;
use Ds\Set;
use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class BrazilianZipCodeTest extends TestCase
{
    public static function validZipCodesProvider(): Iterator
    {
        $validZipCodes = new Set([
            '01001000', '20040002', '30140071', '40010000', '50010000', '60010000', '70040900', '80010000', '90010000',
        ]);
        foreach ($validZipCodes as $zipCode) {
            yield [$zipCode];
        }
    }

    public static function invalidZipCodesProvider(): Iterator
    {
        $invalidZipCodes = [
            '1234567', '123456789', '1234567a', '1234567-', '1234567.', '1234567/', '1234567\\', '1234567@', '1234567#',
            '1234567$', '1234567%', '1234567&', '1234567*', '1234567(', '1234567)', '1234567=', '1234567+', '1234567{',
            '1234567}', '1234567[', '1234567]', '1234567?', '1234567!', '1234567;', '1234567:', '1234567,', '1234567<',
            '1234567>', '1234567|', '1234567_', '1234567~', '1234567^', '1234567`',
        ];
        foreach ($invalidZipCodes as $zipCode) {
            yield [$zipCode];
        }
    }

    #[Test]
    #[DataProvider('validZipCodesProvider')]
    public function itShouldCreateBrazilianZipCode(string $zipCode): void
    {
        $zipCodeVO = new BrazilianZipCode($zipCode);
        $this->assertEquals($zipCode, $zipCodeVO->value());
    }

    #[Test]
    #[DataProvider('invalidZipCodesProvider')]
    public function itShouldThrowWithInvalidZipCode(string $zipCode): void
    {
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage('Invalid zip code');
        new BrazilianZipCode($zipCode);
    }
}
