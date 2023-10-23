<?php

declare(strict_types=1);

namespace App\Exception;

use RuntimeException;
class CharacterAlreadyExistException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('Character already exist');
    }
}
