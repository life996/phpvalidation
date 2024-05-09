<?php

include_once '../vendor/autoload.php';

use Life96\PhpValidation\Validators;
use Life96\PhpValidation\ValidateException;

$case1 = ['123', 123, '', 0e123, 1e11, null, [1, 2, 3], [], '18510000000', '185100000001111', '00012313211'];

foreach ($case1 as $item) {
    try {
        if (Validators::phone()->validate($item)) {
            printf("OK\n");
        }
    } catch (ValidateException $e) {
        printf("validator: %s, msg: %s\n", $e->getValidator()->name, $e->getMessage());
    }
}
