<?php

namespace Life96\PhpValidation\validator\str;

use Life96\PhpValidation\ValidateException;
use Life96\PhpValidation\Validator;

class Base64 extends Validator
{

    public string $name = 'base64';
    static string $reg = '/^[A-Za-z0-9+\/]+={0,2}$/';


    public function verify($data): bool
    {
        if (preg_match(self::$reg, $data) !== 1) {
            throw new ValidateException('Not a base64', $this);
        }

        return true;
    }
}