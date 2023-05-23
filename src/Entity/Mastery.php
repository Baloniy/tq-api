<?php

declare(strict_types=1);

namespace App\Entity;

use DateTimeImmutable;
use App\Repository\MasteryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'mastery')]
#[ORM\Entity(repositoryClass: MasteryRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Mastery
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'mastery', targetEntity: MasteryProgression::class)]
    private Collection $progressions;

    #[ORM\OneToMany(mappedBy: 'mastery', targetEntity: Skill::class)]
    private Collection $skills;

    #[ORM\Column(name: 'created_at', type: 'datetime_immutable')]
    private DateTimeImmutable $created_at;

    public function __construct(
        #[ORM\Column(type: 'string', length: 255)]
        private readonly string $name,
        #[ORM\Column(type: 'string', length: 100)]
        private readonly string $slug,
        #[ORM\Column(type: 'string', length: 255)]
        private readonly string $tag,
        #[ORM\Column(type: 'string', length: 255)]
        private readonly string $image,
        #[ORM\Column(type: 'text', nullable: true)]
        private ?string $description = null
    ) {
        $this->progressions = new ArrayCollection();
        $this->skills = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getTag(): string
    {
        return $this->tag;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getProgressions(): Collection
    {
        return $this->progressions;
    }

    public function getSkills(): Collection
    {
        return $this->skills;
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
