<?php

namespace Life96\PhpValidation\validator\other;

use Life96\PhpValidation\ValidateException;
use Life96\PhpValidation\Validator;

class Regex extends Validator
{
    /**
     * @var string 正则
     */
    private string $regex;

    public string $name = 'regex';

    public function __construct($regex)
    {
        $this->regex = $regex;
    }

    public function verify($data): bool
    {
        if(!is_string($data)){
            throw new ValidateException('The data must be a string', $this);
        }

        if (preg_match($this->regex, $data) !== 1) {
            throw new ValidateException('Match failure', $this);
        }

        return true;
    }
}