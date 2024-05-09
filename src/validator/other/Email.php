<?php

namespace Life96\PhpValidation\validator\other;

use Life96\PhpValidation\ValidateException;
use Life96\PhpValidation\Validator;

class Email extends Validator
{
    public string $name = 'email';

    public function verify($data): bool
    {
        if(!is_string($data)){
            throw new ValidateException('The email must be a string', $this);
        }

        if (preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $data) !== 1) {
            throw new ValidateException('Email matching failed', $this);
        }

        return true;
    }
}