### phpvalidation
快速验证参数是否合法的库

### 安装

需要php8.1及以上版本

```shell
composer require life996/phpvalidation
```

### 快速使用

#### 直接验证一个数组
```php
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
```

### 其他类型
#### 国内手机号验证
```php
try {
    
    $data = '18510000000';
    Validators::phone()->validate($data);

} catch (ValidateException $e) {
    printf("validator: %s, msg: %s\n", $e->getValidator()->name, $e->getMessage());
}
```

#### 邮箱验证
```php
try {
    
    $data = 'test@163.com';
    Validators::email()->validate($data);

} catch (ValidateException $e) {
    printf("validator: %s, msg: %s\n", $e->getValidator()->name, $e->getMessage());
}
```


#### 正则验证
```php
try {
    
    $data = '123123';
    Validators::regex('/^[0-9]+$/')->validate($data);

} catch (ValidateException $e) {
    printf("validator: %s, msg: %s\n", $e->getValidator()->name, $e->getMessage());
}
```

### 字符类型

#### base64是否合法
```php
try {
    
    $data = '5L2g5aW9LCDkuJbnlYwhIQ==';
    Validators::string()->base64()->validate($data)

} catch (ValidateException $e) {
    printf("validator: %s, msg: %s\n", $e->getValidator()->name, $e->getMessage());
}
```

#### 宽字符长度(utf8)验证
```php
try {
    
    $data = '你好, 世界';
    Validators::string()->length(1, 6)->validate($data)

} catch (ValidateException $e) {
    printf("validator: %s, msg: %s\n", $e->getValidator()->name, $e->getMessage());
}
```

### 数值类型

#### 数值验证
```php
try {
    
    $data = '12';
    Validators::number()->between(1, 100)->validate($data);

} catch (ValidateException $e) {
    printf("validator: %s, msg: %s\n", $e->getValidator()->name, $e->getMessage());
}
```

#### 整数验证
```php
try {
    
    $data = 12;
    Validators::number()->isInt()->between(1, 100)->validate($data);

} catch (ValidateException $e) {
    printf("validator: %s, msg: %s\n", $e->getValidator()->name, $e->getMessage());
}
```