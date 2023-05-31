<?php

declare(strict_types=1);

namespace App\Dto\Equipment;

readonly class EquipmentDto
{
    public function __construct(
        private int $id,
        private string $name,
        private string $tag,
        private int $itemLevel,
        private EquipmentTypeDto $type,
        private ?int $levelRequirement = null,
        private ?int $dexterityRequirement = null,
        private ?int $intelligenceRequirement = null,
        private ?int $strengthRequirement = null,
        private ?string $description = null,
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

    public function getTag(): string
    {
        return $this->tag;
    }

    public function getType(): EquipmentTypeDto
    {
        return $this->type;
    }

    public function getItemLevel(): int
    {
        return $this->itemLevel;
    }

    public function getLevelRequirement(): ?int
    {
        return $this->levelRequirement;
    }

    public function getDexterityRequirement(): ?int
    {
        return $this->dexterityRequirement;
    }

    public function getIntelligenceRequirement(): ?int
    {
        return $this->intelligenceRequirement;
    }

    public function getStrengthRequirement(): ?int
    {
        return $this->strengthRequirement;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }
}
