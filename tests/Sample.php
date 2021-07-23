<?php

declare(strict_types=1);

namespace Tests\CodingStandard;

class Sample
{
    public const BAR = 'bar';

    public function foo(): void
    {
    }

    public static function choices(): array
    {
        return [
            'foo' => 'bar',
        ];
    }
}
