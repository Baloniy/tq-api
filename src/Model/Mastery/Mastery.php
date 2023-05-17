<?php

declare(strict_types=1);

namespace App\Model\Mastery;

class Mastery
{
    public function __construct(
        private readonly int $id,
        private readonly string $name,
        private readonly string $description
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
