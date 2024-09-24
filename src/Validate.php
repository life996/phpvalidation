<?php

namespace Life96\PhpValidation;

class Validate
{
    /**
     * @var array 回调容器
     */
    protected array $container = [];

    protected bool $require = true;

    // 验证错误时的自定义返回
    protected \Exception|null $error = null;

    public function require($require = true): Validate
    {
        $this->require = $require;
        return $this;
    }

    public function error(\Exception $e): Validate
    {
        $this->error = $e;
        return $this;
    }

    public function getConfig(): array
    {
        return [
            'require' => $this->require,
            'error' => $this->error,
        ];
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