<?php

namespace Life96\PhpValidation\validator;

use Life96\PhpValidation\Validate;
use Life96\PhpValidation\validator\other\Regex;

class RegexType extends Validate
{

    /**
     * 正则验证
     * @param $r string
     * @return $this
     */
    public function regex(string $r): self
    {
        $this->appendContainer(new Regex($r));
        return $this;
    }
}