<?php

declare(strict_types=1);

namespace App\Dto\Mastery;

readonly class MasteryListItemDto
{
    public function __construct(
        private int $id,
        private string $name,
        private string $slug,
        private string $tag,
        private string $image,
        private string $description
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

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getTag(): string
    {
        return $this->tag;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
