<?php

declare(strict_types=1);

namespace Tests\_fixtures;

final class BrazilianStateAcronymFixture
{
    public const STATE_ACRONYMS = [
        'AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI',
        'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO',
    ];

    public static function get(): string
    {
        $key = array_rand(self::STATE_ACRONYMS);

        return self::STATE_ACRONYMS[$key];
    }
}
