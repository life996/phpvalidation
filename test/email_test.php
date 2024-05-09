<?php

include_once '../vendor/autoload.php';

use Life96\PhpValidation\Validators;
use Life96\PhpValidation\ValidateException;

$case1 = ['2312@qq.com', 'hello@163.com', 'asdf_@163.com', 'asdf_@@163.com'];

foreach ($case1 as $item) {
    try {
        if (Validators::email()->validate($item)) {
            printf("OK\n");
        }
    } catch (ValidateException $e) {
        printf("validator: %s, msg: %s\n", $e->getValidator()->name, $e->getMessage());
    }
}
