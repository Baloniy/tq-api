<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MasteryProgressionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'mastery_progressions')]
#[ORM\Entity(repositoryClass: MasteryProgressionRepository::class)]
class MasteryProgression
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function __construct(
        #[ORM\ManyToOne(targetEntity: Mastery::class, inversedBy: 'progressions')]
        #[ORM\JoinColumn(name: 'mastery_id', nullable: false)]
        private readonly Mastery $mastery,
        #[ORM\Column(name: 'level', type: 'smallint')]
        private readonly int $level,
        #[ORM\Column(name: 'health', type: 'smallint')]
        private readonly int $health,
        #[ORM\Column(name: 'energy', type: 'smallint', nullable: true)]
        private readonly ?int $energy = null,
        #[ORM\Column(name: 'strength', type: 'smallint', nullable: true)]
        private readonly ?int $strength = null,
        #[ORM\Column(name: 'intelligence', type: 'smallint', nullable: true)]
        private readonly ?int $intelligence = null,
        #[ORM\Column(name: 'dexterity', type: 'smallint', nullable: true)]
        private readonly ?int $dexterity = null,
    ) {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMastery(): Mastery
    {
        return $this->mastery;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function getHealth(): int
    {
        return $this->health;
    }

    public function getEnergy(): ?int
    {
        return $this->energy;
    }

    public function getStrength(): ?int
    {
        return $this->strength;
    }

    public function getIntelligence(): ?int
    {
        return $this->intelligence;
    }

    public function getDexterity(): ?int
    {
        return $this->dexterity;
    }
}
