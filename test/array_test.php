<?php

include_once '../vendor/autoload.php';

use Life96\PhpValidation\Validators;
use Life96\PhpValidation\ValidateException;

$case1 = ['123', 123, '', 0e123, 1e11, null, [1, 2, 3], []];
$case2 = [[''], [1, 2, 3, 4, 5], [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]];

foreach ($case1 as $item) {
    try {
        if (Validators::array()->validate($item)) {
            printf("OK\n");
        }
    } catch (ValidateException $e) {
        printf("validator: %s, msg: %s\n", $e->getValidator()->name, $e->getMessage());
    }
}

printf("\n--------------------------------\n");

foreach ($case2 as $item) {
    try {
        if (Validators::array()->maxCount(10)->validate($item)) {
            printf("OK\n");
        }
    } catch (ValidateException $e) {
        printf("validator: %s, msg: %s\n", $e->getValidator()->name, $e->getMessage());
    }
}
