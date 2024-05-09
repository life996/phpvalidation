<?php

namespace Life96\PhpValidation\validator\arr;

use Life96\PhpValidation\ValidateException;
use Life96\PhpValidation\Validator;

class MaxCount extends Validator
{
    /**
     * @var int 最大数组项
     */
    private int $maxCount = 0;

    public string $name = 'maxCount';

    public function __construct($max_count = [])
    {
        $this->maxCount = $max_count;
    }

    public function verify($data): bool
    {
        if (count($data) > $this->maxCount) {
            throw new ValidateException('This array exceeds the maximum length', $this);
        }

        return true;
    }
}