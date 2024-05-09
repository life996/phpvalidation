<?php

namespace Life96\PhpValidation\validator\num;

use Life96\PhpValidation\ValidateException;
use Life96\PhpValidation\Validator;

class IsInt extends Validator
{

    public string $name = 'isInt';

    public function verify($data): bool
    {
        if (!is_int($data)) {
            throw new ValidateException('Value not shaping', $this);
        }

        return true;
    }
}