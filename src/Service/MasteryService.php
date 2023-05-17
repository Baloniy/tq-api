<?php

namespace App\Service;

use App\Entity\Mastery;
use App\Model\Mastery\Mastery as MasteryModel;
use App\Model\Mastery\MasteryList;
use App\Repository\MasteryRepository;

readonly class MasteryService
{
    public function __construct(
        private MasteryRepository $masteryRepository
    ) {
    }

    public function getMasteryList(): MasteryList
    {
        $items = array_map(
            static fn (Mastery $mastery): MasteryModel => new MasteryModel(
                id: $mastery->getId(),
                name: $mastery->getName(),
                description: $mastery->getDescription()
            ),
            $this->masteryRepository->findAllSortedByName()
        );

        return new MasteryList($items);
    }

    public function getMastery(int $id): MasteryModel
    {
        $mastery = $this->masteryRepository->findOneById($id);

        return new MasteryModel(
            id: $mastery->getId(),
            name: $mastery->getName(),
            description: $mastery->getDescription()
        );
    }
}
