<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\EquipmentTypeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'equipment_types')]
#[ORM\Entity(repositoryClass: EquipmentTypeRepository::class)]
class EquipmentType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function __construct(
        #[ORM\Column(name: 'name', type: 'string')]
        private readonly string $name,
        #[ORM\Column(type: 'string', length: 255)]
        private readonly string $tag
    ) {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getTag(): string
    {
        return $this->tag;
    }
}
