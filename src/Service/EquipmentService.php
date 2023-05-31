<?php

declare(strict_types=1);

namespace App\Service;

use App\Dto\Equipment\EquipmentListDto;
use App\DtoMapper\EquipmentMapper;
use App\Repository\EquipmentRepository;

readonly class EquipmentService
{
    public function __construct(
        private EquipmentRepository $equipmentRepository,
        private EquipmentMapper $equipmentMapper
    ) {
    }

    public function getEquipments(): EquipmentListDto
    {
        return $this->equipmentMapper->mapEquipmentSToDto(
            $this->equipmentRepository->findAll()
        );
    }
}
