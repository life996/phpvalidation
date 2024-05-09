<?php

include_once '../vendor/autoload.php';

use Life96\PhpValidation\Validators;
use Life96\PhpValidation\ValidateException;

$case1 = ['0123', '123a', 'test', 111, '996', 'aaa'];

foreach ($case1 as $item) {
    try {
        if (Validators::regex('/^[0-9]+$/')->validate($item)) {
            printf("OK\n");
        }
    } catch (ValidateException $e) {
        printf("validator: %s, msg: %s\n", $e->getValidator()->name, $e->getMessage());
    }
}
