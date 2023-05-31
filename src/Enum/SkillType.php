<?php

declare(strict_types=1);

namespace App\Enum;

enum SkillType: string
{
    case Active = 'Active';
    case Passive = 'Passive';
    case Modifier = 'Modifier';
    case Sustained = 'Sustained';

    public function type(): string
    {
        return match ($this) {
            self::Active => 'Active',
            self::Passive => 'Passive',
            self::Modifier => 'Modifier',
            self::Sustained => 'Sustained',
        };
    }
}
