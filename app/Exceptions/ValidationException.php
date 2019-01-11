<?php

namespace App\Exceptions;

use Exception;

class ValidationException extends Exception
{

    /**
     * ValidationException constructor.
     */
    public function __construct($validator)
    {
        dd($validator);
    }
}
