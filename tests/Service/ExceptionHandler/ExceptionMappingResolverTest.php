<?php

declare(strict_types=1);

namespace App\Tests\Service\ExceptionHandler;

use App\Service\ExceptionHandler\ExceptionMappingResolver;
use PHPUnit\Framework\TestCase;
use InvalidArgumentException;
use LogicException;

class ExceptionMappingResolverTest extends TestCase
{
    public function testThrowsExceptionOnEmptyCode(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new ExceptionMappingResolver(['classname' => ['loggable']]);
    }

    public function testResolvesToNullWhenNotFound(): void
    {
        $resolver = new ExceptionMappingResolver([]);

        $this->assertNull($resolver->resolve(InvalidArgumentException::class));
    }

    public function testResolvesClassItself(): void
    {
        $resolver = new ExceptionMappingResolver([InvalidArgumentException::class => ['code' => 400]]);
        $mapping = $resolver->resolve(InvalidArgumentException::class);

        $this->assertEquals(400, $mapping->getCode());
        $this->assertFalse($mapping->isLoggable());
    }

    public function testResolvesSubClass(): void
    {
        $resolver = new ExceptionMappingResolver([LogicException::class => ['code' => 500]]);
        $mapping = $resolver->resolve(InvalidArgumentException::class);

        $this->assertEquals(500, $mapping->getCode());
    }

    public function testResolvesLoggable(): void
    {
        $resolver = new ExceptionMappingResolver([
            LogicException::class => ['code' => 500, 'loggable' => true]
        ]);

        $mapping = $resolver->resolve(LogicException::class);

        $this->assertTrue($mapping->isLoggable());
    }
}
