<?php

namespace Life96\PhpValidation\validator\str;

use Life96\PhpValidation\ValidateException;
use Life96\PhpValidation\Validator;

class IsString extends Validator
{
    public string $name = 'string';

    public function verify($data): bool
    {
        if (!is_string($data)) {
            throw new ValidateException('Not a string', $this);
        }

        return true;
    }
}