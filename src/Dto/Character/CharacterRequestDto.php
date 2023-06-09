<?php

declare(strict_types=1);

namespace App\Dto\Character;

use Symfony\Component\Validator\Constraints as Assert;

readonly class CharacterRequestDto
{
    public function __construct(
        #[Assert\NotBlank]
        private string $name
    ) {
    }
}
