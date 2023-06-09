<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CharacterRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'characters')]
#[ORM\Entity(repositoryClass: CharacterRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Character
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(name: 'created_at', type: 'datetime_immutable')]
    private DateTimeImmutable $created_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __construct(
        #[ORM\ManyToOne(targetEntity: MasteryClass::class)]
        #[ORM\JoinColumn(name: 'class_id', referencedColumnName: 'id', nullable: false)]
        private readonly MasteryClass $masteryClass,
        #[ORM\Column(type: 'string', length: 255)]
        private readonly string $name,
        #[ORM\Column(name: 'health', type: 'smallint', length: 10)]
        private readonly int $health = 300,
        #[ORM\Column(name: 'mana', type: 'smallint', length: 10)]
        private readonly int $mana = 300,
        #[ORM\Column(name: 'dexterity', type: 'smallint', length: 5)]
        private readonly int $dexterity = 50,
        #[ORM\Column(name: 'intelligence', type: 'smallint', length: 5)]
        private readonly int $intelligence = 50,
        #[ORM\Column(name: 'strength', type: 'smallint', length: 5)]
        private readonly int $strength = 50,
        #[ORM\Column(name: 'defence', type: 'smallint', length: 5)]
        private readonly int $defence = 0,
        #[ORM\Column(name: 'average_damage', type: 'smallint', length: 5)]
        private readonly int $averageDamage = 0,
        #[ORM\Column(name: 'attack_speed', type: 'smallint', length: 5)]
        private readonly int $attackSpeed = 100,
        #[ORM\Column(name: 'damage_per_second', type: 'smallint', length: 5)]
        private readonly int $damagePerSecond = 0,
    ) {
    }

    public function getMasteryClass(): MasteryClass
    {
        return $this->masteryClass;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getHealth(): int
    {
        return $this->health;
    }

    public function getMana(): int
    {
        return $this->mana;
    }

    public function getDexterity(): int
    {
        return $this->dexterity;
    }

    public function getIntelligence(): int
    {
        return $this->intelligence;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function getDefence(): int
    {
        return $this->defence;
    }

    public function getAverageDamage(): int
    {
        return $this->averageDamage;
    }

    public function getAttackSpeed(): int
    {
        return $this->attackSpeed;
    }

    public function getDamagePerSecond(): int
    {
        return $this->damagePerSecond;
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
