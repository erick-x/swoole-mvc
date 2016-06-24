公共库里的文件命名与调用方式：

1、公共库里的PHP文件可以是类、函数。
2、公共库里的文件可以， .lib.php结尾，也可以是.php结尾，建 议用.lib.php

调用举例：
调用passport下的passport.lib.php
load_libary('public:passport/passport');

如果是调用passport.php
load_libary('public:passport/passport',false);


$a = new public_passport_类别
如 passport.lib.php下类为
class Passport{
}

$a = new public_passport_Passport();