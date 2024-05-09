<?php

namespace Life96\PhpValidation\validator\other;

use Life96\PhpValidation\ValidateException;
use Life96\PhpValidation\Validator;

class Phone extends Validator
{
    public string $name = 'phone';

    public function verify($data): bool
    {
        if(!is_string($data)){
            throw new ValidateException('The phone number must be a string', $this);
        }

        if (preg_match('/^(13|14|15|16|17|18|19)\d{9}$/', $data) !== 1) {
            throw new ValidateException('Failed to match the mobile phone number', $this);
        }

        return true;
    }
}