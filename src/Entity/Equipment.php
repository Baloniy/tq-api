<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\EquipmentRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'equipments')]
#[ORM\Entity(repositoryClass: EquipmentRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Equipment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(name: 'created_at', type: 'datetime_immutable')]
    private DateTimeImmutable $created_at;

    public function __construct(
        #[ORM\ManyToOne(targetEntity: EquipmentType::class)]
        #[ORM\JoinColumn(name: 'type_id', referencedColumnName: 'id', nullable: false)]
        private readonly EquipmentType $equipmentType,
        #[ORM\Column(name: 'item_level', type: 'smallint', length: 5)]
        private readonly int $itemLevel,
        #[ORM\Column(type: 'string', length: 255)]
        private readonly string $name,
        #[ORM\Column(type: 'string', length: 255, unique: true)]
        private readonly string $tag,
        #[ORM\Column(name: 'properties', type: 'json')]
        private readonly array $properties = [],
        #[ORM\Column(name: 'level_requirement', type: 'smallint', length: 5, nullable: true)]
        private readonly ?int $levelRequirement = null,
        #[ORM\Column(type: 'string', length: 255, nullable: true)]
        private readonly ?string $classification = null,
        #[ORM\Column(type: 'string', length: 255, nullable: true)]
        private readonly ?string $dropsIn = null,
        #[ORM\Column(name: 'dexterity_requirement', type: 'smallint', length: 5, nullable: true)]
        private readonly ?int $dexterityRequirement = null,
        #[ORM\Column(name: 'intelligence_requirement', type: 'smallint', length: 5, nullable: true)]
        private readonly ?int $intelligenceRequirement = null,
        #[ORM\Column(name: 'strength_requirement', type: 'smallint', length: 5, nullable: true)]
        private readonly ?int $strengthRequirement = null,
        #[ORM\ManyToOne(targetEntity: EquipmentSet::class)]
        #[ORM\JoinColumn(name: 'set_id', referencedColumnName: 'id')]
        private readonly ?string $set = null,
        #[ORM\Column(type: 'string', length: 255, nullable: true)]
        private readonly ?string $act = null,
        #[ORM\Column(type: 'text', length: 255, nullable: true)]
        private readonly ?string $description = null,
        #[ORM\Column(name: 'bonus', type: 'json', nullable: true)]
        private readonly ?array $bonus = null,
        #[ORM\Column(name: 'summons', type: 'json', nullable: true)]
        private readonly ?array $summons = null
    ) {
    }

    public function getEquipmentType(): EquipmentType
    {
        return $this->equipmentType;
    }

    public function getItemLevel(): int
    {
        return $this->itemLevel;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getTag(): string
    {
        return $this->tag;
    }

    public function getProperties(): array
    {
        return $this->properties;
    }

    public function getLevelRequirement(): ?int
    {
        return $this->levelRequirement;
    }

    public function getClassification(): ?string
    {
        return $this->classification;
    }

    public function getDropsIn(): ?string
    {
        return $this->dropsIn;
    }

    public function getDexterityRequirement(): ?int
    {
        return $this->dexterityRequirement;
    }

    public function getIntelligenceRequirement(): ?int
    {
        return $this->intelligenceRequirement;
    }

    public function getStrengthRequirement(): ?int
    {
        return $this->strengthRequirement;
    }

    public function getSet(): ?string
    {
        return $this->set;
    }

    public function getAct(): ?string
    {
        return $this->act;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getBonus(): ?array
    {
        return $this->bonus;
    }

    public function getSummons(): ?array
    {
        return $this->summons;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->created_at;
    }

    #[ORM\PrePersist]
    public function setCreatedAtValue(): void
    {
        $this->created_at = new DateTimeImmutable();
    }
}
