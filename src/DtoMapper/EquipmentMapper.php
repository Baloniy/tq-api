<?php

declare(strict_types=1);

namespace App\DtoMapper;

use App\Dto\Equipment\EquipmentDto;
use App\Dto\Equipment\EquipmentTypeDto;
use App\Dto\Equipment\EquipmentListDto;
use App\Entity\Equipment;

class EquipmentMapper
{
    public function mapEquipmentSToDto(array $equipments): EquipmentListDto
    {
        $items = [];

        /** @var Equipment $equipment */
        foreach ($equipments as $equipment) {
            $items[] = new EquipmentDto(
                id: $equipment->getId(),
                name: $equipment->getName(),
                tag: $equipment->getTag(),
                itemLevel: $equipment->getItemLevel(),
                type: new EquipmentTypeDto(
                    id: $equipment->getEquipmentType()->getId(),
                    name: $equipment->getEquipmentType()->getName()
                ),
                levelRequirement: $equipment->getLevelRequirement(),
                dexterityRequirement: $equipment->getDexterityRequirement(),
                intelligenceRequirement: $equipment->getIntelligenceRequirement(),
                strengthRequirement: $equipment->getStrengthRequirement(),
                description: $equipment->getDescription()
            );
        }

        return new EquipmentListDto($items);
    }
}
