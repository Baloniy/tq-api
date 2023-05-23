<?php

declare(strict_types=1);

namespace App\DtoMapper;

use App\Dto\Mastery\SkillDto;
use App\Entity\Mastery;
use App\Entity\MasteryProgression;
use App\Dto\Mastery\MasteryDto;
use App\Dto\Mastery\MasteryListItemDto;
use App\Dto\Mastery\ProgressionDto;
use App\Dto\Mastery\MasteryListDto;
use App\Entity\Skill;

class MasteryMapper
{
    public function mapMasteryToDto(Mastery $mastery): MasteryDto
    {
        $progressions = [];

        /** @var MasteryProgression $progression */
        foreach ($mastery->getProgressions() as $progression) {
            $progressions[] = new ProgressionDto(
                level: $progression->getLevel(),
                health: $progression->getHealth(),
                energy: $progression->getHealth(),
                strength: $progression->getStrength(),
                intelligence: $progression->getIntelligence(),
                dexterity: $progression->getDexterity()
            );
        }

        $skills = [];

        /** @var Skill $skill */
        foreach ($mastery->getSkills() as $skill) {
            $skills[] = new SkillDto(
                id: $skill->getId(),
                name: $skill->getName(),
                tag: $skill->getTag(),
                tear: $skill->getTier(),
                column: $skill->getColumn(),
                maximumLevel: $skill->getMaximumLevel(),
                type: $skill->getType()->value,
                icon: $skill->getIcon(),
                coolDown: $skill->getCoolDown(),
                description: $skill->getDescription()
            );
        }

        return new MasteryDto(
            id: $mastery->getId(),
            name: $mastery->getName(),
            slug: $mastery->getSlug(),
            tag: $mastery->getTag(),
            image: $mastery->getImage(),
            description: $mastery->getDescription(),
            progressions: $progressions,
            skills: $skills
        );
    }


    public function mapMasteryListToDto(array $masteries): MasteryListDto
    {
        $items = [];

        foreach ($masteries as $mastery) {
            $items[] = new MasteryListItemDto(
                id: $mastery->getId(),
                name: $mastery->getName(),
                slug: $mastery->getSlug(),
                tag: $mastery->getTag(),
                image: $mastery->getImage(),
                description: $mastery->getDescription(),
            );
        }

        return new MasteryListDto($items);
    }
}
