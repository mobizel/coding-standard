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

    public function run(): void
    {
        /** @var string|null $description */
        $description = true ? 'This is a description' : null;
    }
}
