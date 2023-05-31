<?php

declare(strict_types=1);

namespace App\Dto\Equipment;

readonly class EquipmentListDto
{
    public function __construct(
        /** @var EquipmentDto[] */
        private array $items = []
    ) {
    }

    public function getItems(): array
    {
        return $this->items;
    }
}
