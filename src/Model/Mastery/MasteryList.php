<?php

declare(strict_types=1);

namespace App\Model\Mastery;

class MasteryList
{
    /** @param Mastery[] $items */
    public function __construct(
        private readonly array $items
    ) {
    }

    public function getItems(): array
    {
        return $this->items;
    }
}
