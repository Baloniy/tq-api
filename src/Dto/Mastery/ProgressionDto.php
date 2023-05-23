<?php

declare(strict_types=1);

namespace App\Dto\Mastery;

readonly class ProgressionDto
{
    public function __construct(
        private int $level,
        private int $health,
        private ?int $energy = null,
        private ?int $strength = null,
        private ?int $intelligence = null,
        private ?int $dexterity = null,
    ) {
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function getHealth(): int
    {
        return $this->health;
    }

    public function getEnergy(): ?int
    {
        return $this->energy;
    }

    public function getStrength(): ?int
    {
        return $this->strength;
    }

    public function getIntelligence(): ?int
    {
        return $this->intelligence;
    }

    public function getDexterity(): ?int
    {
        return $this->dexterity;
    }
}
