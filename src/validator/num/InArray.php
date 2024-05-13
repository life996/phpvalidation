<?php

namespace Life96\PhpValidation\validator\num;

use Life96\PhpValidation\ValidateException;
use Life96\PhpValidation\Validator;

class InArray extends Validator
{
    /**
     * @var array 值的可选范围
     */
    private array $scope = [];
    public string $name = 'Array';

    public function __construct($scope = [])
    {
        $this->scope = $scope;
    }

    public function verify($data): bool
    {
        if (!in_array($data, $this->scope)) {
            throw new ValidateException('Values are not in the optional range', $this);
        }

        return true;
    }
}