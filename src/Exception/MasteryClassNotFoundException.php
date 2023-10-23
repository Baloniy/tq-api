<?php

declare(strict_types=1);

namespace App\Exception;

use RuntimeException;

class MasteryClassNotFoundException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('Mastery class not found');
    }
}
