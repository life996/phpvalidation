<?php

namespace Life96\PhpValidation\validator\num;

use Life96\PhpValidation\ValidateException;
use Life96\PhpValidation\Validator;

class IsInt extends Validator
{

    public string $name = 'isInt';

    public function verify($data): bool
    {
        if (is_int($data)) {
            return true;
        }

        if(!is_string($data)){
            throw new ValidateException('Value not int', $this);
        }

        if (preg_match('/^\d+$/', $data) !== 1) {
            throw new ValidateException('Value not int', $this);
        }

        return true;
    }
}