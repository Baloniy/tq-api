<?php

declare(strict_types=1);

namespace App\Service;

use App\Dto\Mastery\MasteryDto;
use App\DtoMapper\MasteryMapper;
use App\Dto\Mastery\MasteryListItemDto;
use App\Dto\Mastery\MasteryListDto;
use App\Repository\MasteryRepository;

readonly class MasteryService
{
    public function __construct(
        private MasteryRepository $masteryRepository,
        private MasteryMapper     $masteryMapper
    ) {
    }

    public function getMasteryList(): MasteryListDto
    {
        return $this->masteryMapper->mapMasteryListToDto(
            $this->masteryRepository->findAllSortedByName()
        );
    }

    public function getMastery(int $id): MasteryDto
    {
        return $this->masteryMapper->mapMasteryToDto(
            $this->masteryRepository->findOneById($id)
        );
    }
}
