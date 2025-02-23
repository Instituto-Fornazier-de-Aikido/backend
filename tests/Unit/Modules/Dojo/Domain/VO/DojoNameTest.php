<?php

declare(strict_types=1);

namespace Tests\Unit\Modules\Dojo\Domain\VO;

use App\Modules\Dojo\Domain\VO\DojoName;
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
