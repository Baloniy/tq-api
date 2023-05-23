<?php

declare(strict_types=1);

namespace App\Dto;

readonly class ErrorDebugDetails
{
    public function __construct(
        private string $trace
    ) {
    }

    public function getTrace(): string
    {
        return $this->trace;
    }
}
