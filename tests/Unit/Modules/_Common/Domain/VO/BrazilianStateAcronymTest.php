<?php

declare(strict_types=1);

namespace Tests\Unit\Core\_Common\Domain\VO;

use App\Core\_Common\Domain\VO\BrazilianStateAcronym;
use DomainException;
use Ds\Set;
use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class BrazilianStateAcronymTest extends TestCase
{
    public static function validBrazilianStateAcronymsProvider(): Iterator
    {
        $states = new Set([
            'AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI',
            'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO',
        ]);
        foreach ($states as $stateAcronym) {
            yield [$stateAcronym];
        }
    }

    public static function invalidBrazilianStateAcronymsProvider(): Iterator
    {
        $states = [
            'invalid-state-acronym', 'AC1', 'AL1', 'AP1', 'AM1', 'BA1', 'CE1', 'DF1', 'ES1', 'GO1', 'MA1', 'MT1', 'MS1',
            'MG1', 'PA1', 'PB1', 'PR1', 'PE1', 'PI1', 'RJ1', 'RN1', 'RS1', 'RO1', 'RR1', 'SC1', 'SP1', 'SE1', 'TO1',
        ];
        foreach ($states as $stateAcronym) {
            yield [$stateAcronym];
        }
    }

    #[Test]
    #[DataProvider('validBrazilianStateAcronymsProvider')]
    public function itShouldCreateBrazilianStateAcronym(string $stateAcronym): void
    {
        $stateAcronymVO = new BrazilianStateAcronym($stateAcronym);
        $this->assertEquals($stateAcronym, $stateAcronymVO->value());
    }

    #[Test]
    #[DataProvider('invalidBrazilianStateAcronymsProvider')]
    public function itShouldThrowWithInvalidStateAcronym(string $stateAcronym): void
    {
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage('Invalid state acronym');
        new BrazilianStateAcronym($stateAcronym);
    }
}
