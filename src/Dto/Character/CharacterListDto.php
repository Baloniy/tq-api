<?php

declare(strict_types=1);

namespace App\Dto\Character;

readonly class CharacterListDto
{
    public function __construct(
        /** @var CharacterDto[] */
        private array $items = []
    ) {
    }

    public function getItems(): array
    {
        return $this->items;
    }
}
