<?php

namespace Life96\PhpValidation\validator;

use Life96\PhpValidation\Validate;
use Life96\PhpValidation\validator\arr\MaxCount;

class ArrayType extends Validate
{

    /**
     * 限制最大数组项个数
     * @param $max int
     * @return $this
     */
    public function maxCount(int $max): self
    {
        $this->appendContainer(new MaxCount($max));
        return $this;
    }
}