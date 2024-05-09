<?php

namespace Life96\PhpValidation;

class Validate
{
    /**
     * @var array 回调容器
     */
    protected array $container = [];

    public function __construct($init = [])
    {
        $this->container = $init;
    }

    protected function appendContainer($val): void
    {
        $this->container[] = $val;
    }

    public function validate($data): bool
    {
        foreach ($this->container as $v) {
            if (!$v->verify($data)) {
                return false;
            }
        }

        return true;
    }
}