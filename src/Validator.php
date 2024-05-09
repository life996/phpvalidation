<?php

namespace Life96\PhpValidation;

abstract class Validator
{
    public string $name = "";

    /**
     *
     * @param $data
     * @return bool
     * @throws ValidateException
     */
    abstract public function verify($data): bool;
}