<?php

declare(strict_types=1);

namespace App\Dto\Mastery;

readonly class MasteryListDto
{
    /** @param MasteryListItemDto[] $items */
    public function __construct(
        private array $items
    ) {
    }

    public function getItems(): array
    {
        return $this->items;
    }
}
