<?php

namespace Life96\PhpValidation;

class Validate
{
    /**
     * @var array 回调容器
     */
    protected array $container = [];

    protected bool $require = true;

    public function require($require = true): Validate
    {
        $this->require = $require;
        return $this;
    }

    public function getRequire($require = true): bool
    {
        return $this->require;
    }

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