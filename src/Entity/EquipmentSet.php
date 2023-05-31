<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\EquipmentSetRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'equipment_sets')]
#[ORM\Entity(repositoryClass: EquipmentSetRepository::class)]
class EquipmentSet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function __construct(
        #[ORM\Column(name: 'name', type: 'string')]
        private readonly string $name,
        #[ORM\Column(name: 'tag', type: 'string')]
        private readonly string $tag,
        #[ORM\Column(name: 'items', type: 'simple_array')]
        private readonly string $items,
        #[ORM\Column(name: 'properties', type: 'json', nullable: true)]
        private readonly ?array $properties = null
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

    public function getItems(): string
    {
        return $this->items;
    }

    public function getProperties(): ?array
    {
        return $this->properties;
    }
}
