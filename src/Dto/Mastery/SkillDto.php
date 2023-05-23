<?php

declare(strict_types=1);

namespace App\Dto\Mastery;

readonly class SkillDto
{
    public function __construct(
        private int  $id,
        private string  $name,
        private string  $tag,
        private int     $tear,
        private int     $column,
        private int     $maximumLevel,
        private string  $type,
        private ?string $icon = null,
        private ?int $coolDown = null,
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

    public function getTear(): int
    {
        return $this->tear;
    }

    public function getColumn(): int
    {
        return $this->column;
    }

    public function getMaximumLevel(): int
    {
        return $this->maximumLevel;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function getCoolDown(): ?int
    {
        return $this->coolDown;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }
}
