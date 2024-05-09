<?php

include_once '../vendor/autoload.php';

use Life96\PhpValidation\ValidateArgumentException;
use Life96\PhpValidation\Validators as vas;
use Life96\PhpValidation\ValidateTools as vat;
use Life96\PhpValidation\ValidateException;

$_GET = [
    'name' => 'life',
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
    'name' => vas::regex('/^\w{1,10}$/'),
    'age' => vas::number()->isInt()->between(12, 120),
    'desc' => vas::string()->length(0, 100),
    'phone' => vas::phone(),
    'email' => vas::email(),
    'role' => vas::array()->maxCount(100),
    'position' => vas::string()->inArray(['PM', 'employee']),
];

try {

    //根据rules key的顺序返回
    list($name, $age, $desc, $phone, $email, $role, $position) = vat::verifyParams($_GET, $rules);

    var_dump($name, $age, $desc, $phone, $email, $role, $position);

} catch (ValidateArgumentException $e) {
    printf("require: %s, err: %s", $e->getArgument(), $e->getMessage());
} catch (ValidateException $e) {
    printf("validator: %s, msg: %s\n", $e->getValidator()->name, $e->getMessage());
}