<?php

namespace Life96\PhpValidation\validator\arr;

use Life96\PhpValidation\ValidateException;
use Life96\PhpValidation\Validator;

class IsArray extends Validator
{
    public string $name = 'array';

    public function verify($data): bool
    {
        if (!is_array($data)) {
            throw new ValidateException('Not a array', $this);
        }

        return true;
    }
}