<?php

namespace Life96\PhpValidation\validator\str;

use Life96\PhpValidation\ValidateException;
use Life96\PhpValidation\Validator;

class Length extends Validator
{
    /**
     * @var int|null 最小字数
     */
    private ?int $min = 0;

    /**
     * @var int|null 最大字数
     */
    private ?int $max = 0;

    public string $name = 'length';

    public function __construct($min, $max = null)
    {
        $this->max = $max;
        $this->min = $min;
    }

    public function verify($data): bool
    {
        $len = mb_strlen($data, 'utf8');
        if ($this->max === null) {
            if ($len < $this->min) {
                throw new ValidateException('Below minimum', $this);
            }

            return true;
        }

        if ($this->min === null) {
            if ($len > $this->max) {
                throw new ValidateException('Greater than maximum', $this);
            }

            return true;
        }

        if ($len >= $this->min && $len <= $this->max) {
            return true;
        }

        throw new ValidateException('Out of range', $this);
    }
}