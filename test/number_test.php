<?php

include_once '../vendor/autoload.php';

use Life96\PhpValidation\Validators;
use Life96\PhpValidation\ValidateException;

$case1 = ['123', 123, '', 0e123, 1e11, null, 0.00, 0, '0.00', 1.55, '-1', -2];
$case2 = ['2', 1, 10, 100, 1000, 123, 1e6, 1.1, 1.333, 0.123, -11];

foreach ($case1 as $item) {
    try {
        if (Validators::number()->validate($item)) {
            printf("OK\n");
        }
    } catch (ValidateException $e) {
        printf("validator: %s, msg: %s\n", $e->getValidator()->name, $e->getMessage());
    }
}

printf("\n--------------------------------\n");

foreach ($case2 as $item) {
    try {
        if (Validators::number()->between(1, 10)->validate($item)) {
            printf("OK\n");
        }
    } catch (ValidateException $e) {
        printf("validator: %s, msg: %s\n", $e->getValidator()->name, $e->getMessage());
    }
}

printf("\n--------------------------------\n");

foreach ($case1 as $item) {
    try {
        if (Validators::number()->isInt()->validate($item)) {
            printf("OK\n");
        }
    } catch (ValidateException $e) {
        printf("validator: %s, msg: %s\n", $e->getValidator()->name, $e->getMessage());
    }
}