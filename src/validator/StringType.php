<?php

namespace Life96\PhpValidation\validator;

use Life96\PhpValidation\Validate;
use Life96\PhpValidation\validator\str\Base64;
use Life96\PhpValidation\validator\str\InArray;
use Life96\PhpValidation\validator\str\Length;
use Life96\PhpValidation\validator\str\MaxSize;

class StringType extends Validate
{

    /**
     * 使用宽字节(utf8)进行, 长度验证
     * @param $min ?int
     * @param $max ?int
     * @return $this
     */
    public function length(?int $min, int $max = null): self
    {
        $this->appendContainer(new Length($min, $max));
        return $this;
    }

    /**
     * 限制字符串字节数
     * @param $size int
     * @return $this
     */
    public function maxSize(int $size): self
    {
        $this->appendContainer(new MaxSize($size));
        return $this;
    }

    /**
     * 值是否在$scope数组中
     * @param $scope array<string>
     * @return $this
     */
    public function inArray(array $scope): self
    {
        $this->appendContainer(new InArray($scope));
        return $this;
    }

    /**
     * 验证是否为合法的base64
     * @return $this
     */
    public function base64(): self
    {
        $this->appendContainer(new Base64());
        return $this;
    }
}