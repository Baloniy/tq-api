<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MasteryClassRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'mastery_classes')]
#[ORM\Entity(repositoryClass: MasteryClassRepository::class)]
class MasteryClass
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Mastery::class)]
    #[ORM\JoinColumn(name: 'mastery_id', referencedColumnName: 'id')]
    private Mastery $mastery;

    #[ORM\ManyToOne(targetEntity: Mastery::class)]
    #[ORM\JoinColumn(name: 'additional_mastery_id', referencedColumnName: 'id')]
    private ?Mastery $additional_mastery;

    public function __construct(
        #[ORM\Column(type: 'string', length: 255)]
        private readonly string $name,
        #[ORM\Column(type: 'string', length: 255, nullable: true)]
        private readonly ?string $description = null
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

    public function setMastery(Mastery $mastery): void
    {
        $this->mastery = $mastery;
    }

    public function getAdditionalMastery(): ?Mastery
    {
        return $this->additional_mastery;
    }

    public function setAdditionalMastery(?Mastery $additional_mastery): void
    {
        $this->additional_mastery = $additional_mastery;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }
}
