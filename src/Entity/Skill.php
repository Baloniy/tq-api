<?php

declare(strict_types=1);

namespace App\Entity;

use App\Enum\SkillType;
use App\Repository\SkillRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'skills')]
#[ORM\Entity(repositoryClass: SkillRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Skill
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'datetime_immutable', length: 255, nullable: false)]
    private DateTimeImmutable $created_at;

    public function __construct(
        #[ORM\ManyToOne(targetEntity: Mastery::class, inversedBy: 'skills')]
        private readonly ?Mastery $mastery,
        #[ORM\Column(type: 'string', length: 255)]
        private readonly string $name,
        #[ORM\Column(name: 'tag', type: 'string', length: 255)]
        private readonly string $tag,
        #[ORM\Column(type: 'integer')]
        private readonly int $tier,
        #[ORM\Column(type: 'integer')]
        private readonly int $column,
        #[ORM\Column(name: 'maximum_level', type: 'integer')]
        private readonly int $maximumLevel,
        #[ORM\Column(type: 'string', enumType: SkillType::class)]
        private readonly SkillType $type = SkillType::Active,
        #[ORM\Column(type: 'string', nullable: true)]
        private readonly ?string $parent = null,
        #[ORM\Column(type: 'string', nullable: true)]
        private readonly ?string $icon = null,
        #[ORM\Column(name: 'cool_down', type: 'smallint', nullable: true)]
        private readonly ?int $coolDown = null,
        #[ORM\Column(type: 'text', nullable: true)]
        private readonly ?string $description = null,
        #[ORM\Column(type: 'json', nullable: true)]
        private readonly ?array $properties = null,
        #[ORM\Column(type: 'json', nullable: true)]
        private readonly ?array $summons = null,
    ) {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMastery(): ?Mastery
    {
        return $this->mastery;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getTag(): string
    {
        return $this->tag;
    }

    public function getTier(): int
    {
        return $this->tier;
    }

    public function getColumn(): int
    {
        return $this->column;
    }

    public function getMaximumLevel(): int
    {
        return $this->maximumLevel;
    }

    public function getType(): string
    {
        return $this->type->type();
    }

    public function getParent(): ?string
    {
        return $this->parent;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function getCoolDown(): ?int
    {
        return $this->coolDown;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getProperties(): ?array
    {
        return $this->properties;
    }

    public function getSummons(): ?array
    {
        return $this->summons;
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
