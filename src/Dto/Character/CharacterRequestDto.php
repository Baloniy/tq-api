<?php

declare(strict_types=1);

namespace App\Dto\Character;

use Symfony\Component\Validator\Constraints as Assert;

readonly class CharacterRequestDto
{
    public function __construct(
        #[Assert\NotBlank]
        private string $name,
        #[Assert\NotBlank]
        private int $class_id
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getClassId(): int
    {
        return $this->class_id;
    }
}
