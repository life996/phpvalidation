<?php

namespace Life96\PhpValidation;

use Life96\PhpValidation\validator\arr\IsArray;
use Life96\PhpValidation\validator\ArrayType;
use Life96\PhpValidation\validator\EmailType;
use Life96\PhpValidation\validator\num\IsNumber;
use Life96\PhpValidation\validator\NumberType;
use Life96\PhpValidation\validator\PhoneType;
use Life96\PhpValidation\validator\other\Email;
use Life96\PhpValidation\validator\other\Phone;
use Life96\PhpValidation\validator\other\Regex;
use Life96\PhpValidation\validator\RegexType;
use Life96\PhpValidation\validator\str\IsString;
use Life96\PhpValidation\validator\StringType;

class Validators
{
    /**
     * @return StringType
     */
    static public function string(): StringType
    {
        return new StringType([new IsString()]);
    }

    /**
     * @return NumberType
     */
    static public function number(): NumberType
    {
        return new NumberType([new IsNumber()]);
    }

    /**
     * @return ArrayType
     */
    static public function array(): ArrayType
    {
        return new ArrayType([new IsArray()]);
    }

    /**
     * @return PhoneType
     */
    static public function phone(): PhoneType
    {
        return new PhoneType([new Phone()]);
    }

    /**
     * @return RegexType
     */
    static public function regex($r): RegexType
    {
        return new RegexType([new Regex($r)]);
    }

    /**
     * @return EmailType
     */
    static public function email(): EmailType
    {
        return new EmailType([new Email()]);
    }
}