<?php

declare(strict_types=1);

namespace App\Service\ExceptionHandler;

use InvalidArgumentException;

class ExceptionMappingResolver
{
    /** @var ExceptionMapping[] */
    private array $mappings = [];

    public function __construct(array $mappings)
    {
        foreach ($mappings as $class => $mapping) {
            if (empty($mapping['code'])) {
                throw new InvalidArgumentException('code is mandatory for class ' . $class);
            }

            $this->addMapping($class, $mapping['code'], $mapping['loggable'] ?? false);
        }
    }

    public function resolve(string $throwableClass): ?ExceptionMapping
    {
        $foundMapping = null;

        foreach ($this->mappings as $class => $mapping) {
            if ($throwableClass === $class || is_subclass_of($throwableClass, $class)) {
                $foundMapping = $mapping;
            }
        }

        return $foundMapping;
    }

    private function addMapping(int | string $class, mixed $code, mixed $loggable): void
    {
        $this->mappings[$class] = new ExceptionMapping(code: $code, loggable: $loggable);
    }
}
