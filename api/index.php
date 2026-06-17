<?php

if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    $basePath = __DIR__ . '/..';
} else {
    $basePath = __DIR__ . '/../posyandu';
}

require $basePath . '/vendor/autoload.php';
$app = require_once $basePath . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
)->send();

$kernel->terminate($request, $response);