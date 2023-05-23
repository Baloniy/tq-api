<?php

declare(strict_types=1);

namespace App\Enum;

enum SkillType: string
{
    case Active = 'Active';
    case Passive = 'Passive';
    case Modifier = 'Modifier';
    case Sustained = 'Sustained';
}
