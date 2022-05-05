<?php

/*
 * This file is part of the Soliso project.
 *
 * (c) Mobizel
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Tests\CodingStandard;

use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Sample>
 *
 * @method static Sample|Proxy createOne(array $attributes = [])
 * @method static Sample[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Sample|Proxy find(object|array|mixed $criteria)
 * @method static Sample|Proxy findOrCreate(array $attributes)
 * @method static Sample|Proxy first(string $sortedField = 'id')
 * @method static Sample|Proxy last(string $sortedField = 'id')
 * @method static Sample|Proxy random(array $attributes = [])
 * @method static Sample|Proxy randomOrCreate(array $attributes = [])
 * @method static Sample[]|Proxy[] all()
 * @method static Sample[]|Proxy[] findBy(array $attributes)
 * @method static Sample[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Sample[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method Sample|Proxy create(array|callable $attributes = [])
 */
final class DealerFactory extends ModelFactory
{
    protected function getDefaults(): array
    {
        return array_merge(parent::getDefaults(), [
            'company_name' => self::faker()->company(),
        ]);
    }

    protected static function getClass(): string
    {
        return Dealer::class;
    }
}
