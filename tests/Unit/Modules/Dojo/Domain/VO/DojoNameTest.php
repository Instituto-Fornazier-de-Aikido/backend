<?php

declare(strict_types=1);

namespace Tests\Unit\Core\Dojo\Domain\VO;

use App\Core\Dojo\Domain\VO\DojoName;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class DojoNameTest extends TestCase
{
    #[Test]
    public function itShouldNotAllowBlankNames(): void
    {
        $this->expectExceptionMessage('Dojo name cannot be empty');
        new DojoName('');
    }

    #[Test]
    public function itShouldReturnTheName(): void
    {
        $name = 'Dojo ' . uniqid('', true);
        $dojoName = new DojoName($name);
        $this->assertEquals($name, $dojoName->value());
    }
}
