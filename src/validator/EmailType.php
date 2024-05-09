<?php

namespace Life96\PhpValidation\validator;

use Life96\PhpValidation\Validate;
use Life96\PhpValidation\validator\other\Email;

class EmailType extends Validate
{
    /**
     * email验证
     * @return $this
     */
    public function email(): self
    {
        $this->appendContainer(new Email());
        return $this;
    }
}