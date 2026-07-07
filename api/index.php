<?php

// Mengarahkan Vercel untuk membaca bootstrap Laravel
require __DIR__ . '/../usr/local/lib/php.ini'; // Opsional, tergantung runtime
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);