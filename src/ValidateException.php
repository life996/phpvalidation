<?php

namespace Life96\PhpValidation;

class ValidateException extends \Exception
{
    protected $message = "";
    protected $code = 0;

    /**
     * @var null|Validator
     */
    protected ?Validator $validator = null;


    /**
     * @var mixed|null
     */
    protected $data = null;

    public function getData(): mixed
    {
        return $this->data;
    }

    public function __construct($message = "", $validator = null, $data = null)
    {
        $this->message = $message;
        $this->validator = $validator;
        $this->data = $data;
    }

    public function getValidator(): ?Validator
    {
        return $this->validator;
    }
}