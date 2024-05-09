<?php

namespace Life96\PhpValidation\validator\num;

use Life96\PhpValidation\ValidateException;
use Life96\PhpValidation\Validator;

class IsNumber extends Validator
{
    public string $name = 'number';

    public function verify($data): bool
    {
        if (!is_numeric($data)) {
            throw new ValidateException('Not a number', $this);
        }

        return true;
    }
}