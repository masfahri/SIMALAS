<?php

namespace App\Exceptions;

use Exception;

class ModelIsExistsException extends Exception
{
    public function report($message)
    {
        return $message;
    }
}
