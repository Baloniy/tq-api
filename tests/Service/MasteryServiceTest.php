<?php

declare(strict_types=1);

namespace App\Tests\Service;

use App\Entity\Mastery;
use App\DtoMapper\MasteryMapper;
use App\Repository\MasteryRepository;
use App\Service\MasteryService;
use App\Tests\AbstractTestCase;

class MasteryServiceTest extends AbstractTestCase
{
    private Mastery $entity;

    private MasteryRepository $repository;

    private MasteryMapper $mapper;

    protected function setUp(): void
    {
        $params = [
            'id' => 1,
            'name' => 'Dream',
            'slug' => 'dream',
            'tag' => 'xtagSkillDreamName001',
            'image' => 'dream.png',
            'description' => 'Drawing power from the dream world',
        ];

        $this->entity = new Mastery(
            name: $params['name'],
            slug: $params['slug'],
            tag: $params['tag'],
            image: $params['image'],
            description: $params['description']
        );
        $this->setEntityId($this->entity, $params['id']);

        $this->repository = $this->createMock(MasteryRepository::class);
        $this->mapper = new MasteryMapper();
    }

    public function testGetMasteryList(): void
    {
        $this->repository->expects($this->once())
            ->method('findAllSortedByName')
            ->willReturn([$this->entity]);

        $expected = $this->mapper->mapMasteryListToDto([$this->entity]);

        $this->assertEquals($expected, $this->createService()->getMasteryList());
    }

    public function testGetMastery(): void
    {
        $this->repository->expects($this->once())
            ->method('findOneById')
            ->with(1)
            ->willReturn($this->entity);

        $expected = $this->mapper->mapMasteryToDto($this->entity);

        $this->assertEquals($expected, $this->createService()->getMastery(1));
    }

    private function createService(): MasteryService
    {
        return new MasteryService($this->repository, $this->mapper);
    }
}
