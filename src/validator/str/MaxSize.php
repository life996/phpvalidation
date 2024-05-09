<?php

namespace Life96\PhpValidation\validator\str;

use Life96\PhpValidation\ValidateException;
use Life96\PhpValidation\Validator;

class MaxSize extends Validator
{
    /**
     * @var int 最大字节数
     */
    private int $maxSize = 0;

    public string $name = 'maxSize';

    public function __construct($max_size = [])
    {
        $this->maxSize = $max_size;
    }

    public function verify($data): bool
    {
        $size = strlen($data);
        if ($size > $this->maxSize) {
            throw new ValidateException('The number of bytes exceeded the maximum', $this);
        }

        return true;
    }
}