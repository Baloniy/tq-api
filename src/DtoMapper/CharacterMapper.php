<?php

declare(strict_types=1);

namespace App\DtoMapper;

use App\Dto\Character\CharacterClassDto;
use App\Dto\Character\CharacterDto;
use App\Dto\Character\CharacterListDto;
use App\Entity\Character;

readonly class CharacterMapper
{
    public function mapCharactersToDto(array $characters): CharacterListDto
    {
        $items = [];

        /** @var Character $character */
        foreach ($characters as $character) {
            $items[] = $this->createCharacterDtoInstance($character);
        }

        return new CharacterListDto(items: $items);
    }

    public function mapCharacterToDto(Character $character): CharacterDto
    {
        return $this->createCharacterDtoInstance($character);
    }

    private function createCharacterDtoInstance(Character $character): CharacterDto
    {
        $characterClass = new CharacterClassDto(
            id: $character->getMasteryClass()->getId(),
            name: $character->getMasteryClass()->getName()
        );

        return new CharacterDto(
            id: $character->getId(),
            name: $character->getName(),
            characterClass: $characterClass,
            health: $character->getHealth(),
            mana: $character->getMana(),
            dexterity: $character->getDexterity(),
            intelligence: $character->getIntelligence(),
            strength: $character->getStrength(),
            defence: $character->getDefence(),
            averageDamage: $character->getAverageDamage(),
            attackSpeed: $character->getAttackSpeed(),
            damagePerSecond: $character->getDamagePerSecond()
        );
    }
}
