<?php

declare(strict_types=1);

header('Content-Type: text/plain; charset=UTF-8');

$requiredExtensions = [
    'bcmath',
    'ctype',
    'curl',
    'dom',
    'fileinfo',
    'gd',
    'gmp',
    'iconv',
    'imagick',
    'intl',
    'json',
    'mbstring',
    'mysqli',
    'openssl',
    'pdo',
    'pdo_mysql',
    'soap',
    'tokenizer',
    'xml',
    'zip',
];

$recommendedExtensions = [
    'saxon',
];

$requiredFunctions = [
    'exec',
    'fpassthru',
    'proc_open',
];

$phpVersionOk = version_compare(PHP_VERSION, '8.2.0', '>=');
$disabledFunctions = array_filter(array_map('trim', explode(',', (string) ini_get('disable_functions'))));

echo "Invoice Ninja cPanel preflight\n";
echo "================================\n\n";
echo 'PHP version: ' . PHP_VERSION . ($phpVersionOk ? ' [OK]' : ' [FAIL: requires 8.2+]') . "\n";
echo 'SAPI: ' . PHP_SAPI . "\n";
echo 'Loaded php.ini: ' . (php_ini_loaded_file() ?: 'not reported') . "\n";
echo 'open_basedir: ' . (ini_get('open_basedir') ?: 'not set') . "\n";
echo 'memory_limit: ' . ini_get('memory_limit') . "\n";
echo 'max_execution_time: ' . ini_get('max_execution_time') . "\n\n";

echo "Required extensions\n";
echo "-------------------\n";
foreach ($requiredExtensions as $extension) {
    echo sprintf("%-14s %s\n", $extension, extension_loaded($extension) ? 'OK' : 'MISSING');
}

echo "\nRecommended extensions\n";
echo "----------------------\n";
foreach ($recommendedExtensions as $extension) {
    echo sprintf("%-14s %s\n", $extension, extension_loaded($extension) ? 'OK' : 'MISSING');
}

echo "\nRequired functions\n";
echo "------------------\n";
foreach ($requiredFunctions as $function) {
    $isAvailable = function_exists($function) && !in_array($function, $disabledFunctions, true);
    echo sprintf("%-14s %s\n", $function, $isAvailable ? 'OK' : 'DISABLED_OR_MISSING');
}

echo "\nWritable path checks\n";
echo "--------------------\n";
foreach (['storage', 'bootstrap/cache', 'public/logo'] as $path) {
    $exists = is_dir(__DIR__ . '/' . $path);
    $writable = $exists && is_writable(__DIR__ . '/' . $path);
    echo sprintf("%-18s %s\n", $path, $writable ? 'OK' : ($exists ? 'NOT_WRITABLE' : 'MISSING'));
}

echo "\nVerdict\n";
echo "-------\n";

$missingRequiredExtensions = array_filter(
    $requiredExtensions,
    static fn (string $extension): bool => !extension_loaded($extension)
);
$missingRequiredFunctions = array_filter(
    $requiredFunctions,
    static fn (string $function): bool => !function_exists($function) || in_array($function, $disabledFunctions, true)
);

if ($phpVersionOk && $missingRequiredExtensions === [] && $missingRequiredFunctions === []) {
    echo "PASS: server is ready for Invoice Ninja base install.\n";
} else {
    echo "FAIL: fix the missing PHP requirements before deploying Invoice Ninja.\n";
}

echo "\nDelete this file after the preflight check.\n";
