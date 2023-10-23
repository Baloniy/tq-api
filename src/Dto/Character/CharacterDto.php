<?php

declare(strict_types=1);

namespace App\Dto\Character;

use App\Dto\Equipment\EquipmentTypeDto;

readonly class CharacterDto
{
    public function __construct(
        private int $id,
        private string $name,
        private CharacterClassDto $characterClass,
        private int $health,
        private int $mana,
        private int $dexterity,
        private int $intelligence,
        private int $strength,
        private int $defence,
        private int $averageDamage,
        private int $attackSpeed,
        private int $damagePerSecond
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

    public function getCharacterClass(): CharacterClassDto
    {
        return $this->characterClass;
    }

    public function getHealth(): int
    {
        return $this->health;
    }

    public function getMana(): int
    {
        return $this->mana;
    }

    public function getDexterity(): int
    {
        return $this->dexterity;
    }

    public function getIntelligence(): int
    {
        return $this->intelligence;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function getDefence(): int
    {
        return $this->defence;
    }

    public function getAverageDamage(): int
    {
        return $this->averageDamage;
    }

    public function getAttackSpeed(): int
    {
        return $this->attackSpeed;
    }

    public function getDamagePerSecond(): int
    {
        return $this->damagePerSecond;
    }
}
