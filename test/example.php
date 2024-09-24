<?php

include_once '../vendor/autoload.php';

use Life96\PhpValidation\ValidateArgumentException;
use Life96\PhpValidation\Validators as vas;
use Life96\PhpValidation\ValidateTools as vat;
use Life96\PhpValidation\ValidateException;

$_GET = [
    'name' => '1232132312313214',
    'age' => 66,
    'desc' => 'hello world!!',
    'phone' => '18000000000',
    'email' => 'test@163.com',
    'position' => 'PM',
    'role' => [
        'doctor', 'programmer'
    ]
];

$rules = [
    'name' => vas::regex('/^\w{1,10}$/')->require(false)->error(new \Exception('name error', 999)),
    'age' => vas::number()->isInt()->between(12, 120)->error(new \Exception('age error', 999)),
    'desc' => vas::string()->length(0, 100)->error(new \Exception('desc error', 999)),
    'phone' => vas::phone()->error(new \Exception('phone error', 999)),
    'email' => vas::email()->error(new \Exception('email error', 999)),
    'role' => vas::array()->maxCount(100)->error(new \Exception('role error', 999)),
    'position' => vas::string()->inArray(['PM', 'employee'])->error(new \Exception('position error', 999)),
];

try {

    //根据rules key的顺序返回
    list($name, $age, $desc, $phone, $email, $role, $position) = vat::verifyParams($_GET, $rules);

    var_dump($name, $age, $desc, $phone, $email, $role, $position);

} catch (ValidateArgumentException $e) {
    printf("argument: %s, err: %s\n", $e->getArgument(), $e->getMessage());

    //查询参数错误在哪个环节
    printf("validator name: %s\n", $e->getValidateException()->getValidator()->name);

} catch (Exception $e) {
    //设置->error后会抛出对应的异常, 如果未设置error则验证失败时会抛出ValidateArgumentException
    printf("msg: %s\n", $e->getMessage());
}