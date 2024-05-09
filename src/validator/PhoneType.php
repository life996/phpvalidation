<?php

namespace Life96\PhpValidation\validator;

use Life96\PhpValidation\Validate;
use Life96\PhpValidation\validator\other\Email;
use Life96\PhpValidation\validator\other\Phone;
use Life96\PhpValidation\validator\other\Regex;

class PhoneType extends Validate
{
    /**
     * 验证是否为手机号
     * @return $this
     */
    public function phone(): self
    {
        $this->appendContainer(new PhoneType());
        return $this;
    }
}