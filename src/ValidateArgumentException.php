<?php

namespace Life96\PhpValidation;

class ValidateArgumentException extends \Exception
{
    protected $message = "";
    protected $code = 0;

    protected string $argument = "";
    protected ValidateException|null $validateException = null;

    public function __construct(string $message = "", int $code = 0, string $argument = "", ValidateException $e = null)
    {
        $this->message = $message;
        $this->code = $code;
        $this->argument = $argument;
        $this->validateException = $e;
    }

    public function getArgument(): string
    {
        return $this->argument;
    }

    public function getValidateException(): ?ValidateException
    {
        return $this->validateException;
    }
}