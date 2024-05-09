<?php

namespace Life96\PhpValidation;

class ValidateArgumentException extends \Exception
{
    protected $message = "";
    protected $code = 0;

    protected string $argument = "";

    public function __construct($message = "", $argument = "")
    {
        $this->message = $message;
        $this->argument = $argument;
    }

    public function getArgument(): string
    {
        return $this->argument;
    }
}