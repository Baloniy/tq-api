<?php

declare(strict_types=1);

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;

abstract class AbstractFixture extends Fixture
{
    protected static array $data;

    public static function getRow(int $index = 0)
    {
        return static::$data[$index] ?? [];
    }

    public static function getData(): array
    {
        return self::$data;
    }
}
