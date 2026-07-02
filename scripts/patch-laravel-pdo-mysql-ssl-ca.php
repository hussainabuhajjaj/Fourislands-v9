<?php

$path = __DIR__.'/../vendor/laravel/framework/config/database.php';

if (! is_file($path)) {
    exit(0);
}

$contents = file_get_contents($path);

if ($contents === false || str_contains($contents, 'Pdo\\\\Mysql::ATTR_SSL_CA')) {
    exit(0);
}

$contents = str_replace(
    "use Illuminate\\Support\\Str;\n\nreturn [",
    "use Illuminate\\Support\\Str;\n\n\$mysqlSslCa = defined('Pdo\\\\Mysql::ATTR_SSL_CA')\n    ? constant('Pdo\\\\Mysql::ATTR_SSL_CA')\n    : PDO::MYSQL_ATTR_SSL_CA;\n\nreturn [",
    $contents
);

$contents = str_replace(
    'PDO::MYSQL_ATTR_SSL_CA => env(\'MYSQL_ATTR_SSL_CA\'),',
    '$mysqlSslCa => env(\'MYSQL_ATTR_SSL_CA\'),',
    $contents
);

file_put_contents($path, $contents);
