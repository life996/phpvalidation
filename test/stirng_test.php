<?php

include_once '../vendor/autoload.php';

use Life96\PhpValidation\Validators;
use Life96\PhpValidation\ValidateException;

$case1 = ['123', 123, '', 0e123, 1e11, null];
$case2 = ['123456', '1234567', '一二三四五六', '一二三四五六七', 'Hello, world', '你好, 世界'];
$case3 = ["apple", "banana", "orange", "mango", "grape", "pear", "cherry", "strawberry", "kiwi", "pineapple"];
$case4 = ["你好世界"];
$case5 = ["5L2g5aW9LCDkuJbnlYwhIQ==", "5L2g5aW9LC11DkuJbn%##lYwhIQ=="];



foreach ($case1 as $item) {
    try {
        if (Validators::string()->validate($item)) {
            printf("OK\n");
        }
    } catch (ValidateException $e) {
        printf("validator: %s, msg: %s\n", $e->getValidator()->name, $e->getMessage());
    }
}

printf("\n--------------------------------\n");

foreach ($case2 as $item) {
    try {
        if (Validators::string()->length(1, 6)->validate($item)) {
            printf("OK\n");
        }
    } catch (ValidateException $e) {
        printf("validator: %s, msg: %s\n", $e->getValidator()->name, $e->getMessage());
    }
}

printf("\n--------------------------------\n");

foreach ($case3 as $item) {
    try {
        if (Validators::string()->length(null, 5)->inArray(['apple', 'kiwi'])->validate($item)) {
            printf("OK\n");
        }
    } catch (ValidateException $e) {
        printf("validator: %s, msg: %s\n", $e->getValidator()->name, $e->getMessage());
    }
}

printf("\n--------------------------------\n");

foreach ($case4 as $item) {
    try {
        if (Validators::string()->maxSize(12)->validate($item)) {
            printf("OK\n");
        }
    } catch (ValidateException $e) {
        printf("validator: %s, msg: %s\n", $e->getValidator()->name, $e->getMessage());
    }
}


printf("\n--------------------------------\n");

foreach ($case5 as $item) {
    try {
        if (Validators::string()->base64()->validate($item)) {
            printf("OK\n");
        }
    } catch (ValidateException $e) {
        printf("validator: %s, msg: %s\n", $e->getValidator()->name, $e->getMessage());
    }
}
