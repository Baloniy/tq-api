<?php

declare(strict_types=1);

namespace App\Service;

use App\Dto\Character\CharacterDto;
use App\Dto\Character\CharacterListDto;
use App\Dto\Character\CharacterRequestDto;
use App\DtoMapper\CharacterMapper;
use App\Entity\Character;
use App\Entity\MasteryClass;
use App\Exception\CharacterAlreadyExistException;
use App\Exception\MasteryClassNotFoundException;
use App\Repository\CharacterRepository;
use Doctrine\ORM\EntityManagerInterface;

readonly class CharacterService
{
    public function __construct(
        private EntityManagerInterface $em,
        private CharacterRepository $repository,
        private CharacterMapper $characterMapper
    ) {
    }

    public function getAllUserCharacters(): CharacterListDto
    {
        return $this->characterMapper->mapCharactersToDto($this->repository->findAll());
    }

    public function getCharacter(int $id): CharacterDto
    {
        return $this->characterMapper->mapCharacterToDto(
            $this->repository->findOneById($id)
        );
    }

    public function create(CharacterRequestDto $request): void
    {
        if ($this->repository->existsByName($request->getName())) {
            throw new CharacterAlreadyExistException();
        }

        $masteryClass = $this->em->getRepository(MasteryClass::class)->find($request->getClassId());

        if (!$masteryClass) {
           throw new MasteryClassNotFoundException();
        }

        $character = new Character(
            masteryClass: $masteryClass,
            name: $request->getName()
        );

        $this->em->persist($character);
        $this->em->flush();
    }
}
