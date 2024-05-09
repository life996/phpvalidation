<?php

namespace Life96\PhpValidation\validator\num;

use Life96\PhpValidation\ValidateException;
use Life96\PhpValidation\Validator;

class Between extends Validator
{
    /**
     * @var int 最小值
     */
    private int $min = 0;

    /**
     * @var int 最大值
     */
    private int $max = 0;

    public string $name = 'between';

    public function __construct($min, $max)
    {
        $this->max = $max;
        $this->min = $min;
    }

    public function verify($data): bool
    {
        if ($data < $this->min || $data > $this->max) {
            throw new ValidateException('Out of range', $this);
        }

        return true;
    }
}