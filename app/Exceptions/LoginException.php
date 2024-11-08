<?php

namespace App\Exceptions;

use Exception;

class LoginException extends Exception
{
    public function render($request)
    {
        abort($this->getCode(), $this->getMessage());
    }
}
