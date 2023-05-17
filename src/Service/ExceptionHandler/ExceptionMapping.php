<?php

declare(strict_types=1);

namespace App\Service\ExceptionHandler;

readonly class ExceptionMapping
{
    public function __construct(
        private int $code,
        private bool $loggable = false
    ) {
    }

    public static function fromCode(int $code): self
    {
        return new self($code);
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function isLoggable(): bool
    {
        return $this->loggable;
    }
}
