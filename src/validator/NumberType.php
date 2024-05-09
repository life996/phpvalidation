<?php

namespace Life96\PhpValidation\validator;

use Life96\PhpValidation\Validate;
use Life96\PhpValidation\validator\num\Between;
use Life96\PhpValidation\validator\num\InArray;
use Life96\PhpValidation\validator\num\IsInt;

class NumberType extends Validate
{

    /**
     * 验证值是否在数组$scope中
     * @param $scope array<int>
     * @return $this
     */
    public function inArray(array $scope): self
    {
        $this->appendContainer(new InArray($scope));
        return $this;
    }

    /**
     * 值是否在$min和$max直接, 包括min和max的值
     * @param $min numeric
     * @param $max numeric
     * @return $this
     */
    public function between(float|int|string $min, float|int|string $max): self
    {
        $this->appendContainer(new Between($min, $max));
        return $this;
    }

    /**
     * 是否为整形
     * @return $this
     */
    public function isInt(): self
    {
        $this->appendContainer(new IsInt());
        return $this;
    }
}