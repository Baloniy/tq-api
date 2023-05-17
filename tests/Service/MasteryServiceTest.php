<?php

declare(strict_types=1);

namespace App\Tests\Service;

use App\Entity\Mastery;
use App\Model\Mastery\MasteryList;
use App\Model\Mastery\Mastery as MasteryModel;
use App\Repository\MasteryRepository;
use App\Service\MasteryService;
use App\Tests\AbstractTestCase;

class MasteryServiceTest extends AbstractTestCase
{
    public function testGetMasteryList(): void
    {
        $mastery = new Mastery(
            name: 'Dream',
            slug: 'dream',
            tag: 'xtagSkillDreamName001',
            image: 'dream.png',
            description: 'Drawing power from the dream world'
        );
        $this->setEntityId($mastery, 1);

        $repository = $this->createMock(MasteryRepository::class);

        $repository->expects($this->once())
            ->method('findAllSortedByName')
            ->willReturn([$mastery]);

        $service = new MasteryService($repository);

        $expected = new MasteryList([
            new MasteryModel(
                id: 1,
                name: 'Dream',
                description: 'Drawing power from the dream world'
            )
        ]);

        $this->assertEquals($expected, $service->getMasteryList());
    }

    public function testGetMastery()
    {

    }
}
