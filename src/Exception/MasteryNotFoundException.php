<?php

declare(strict_types=1);

namespace App\Exception;

use RuntimeException;

class MasteryNotFoundException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('Mastery not found');
    }
}
