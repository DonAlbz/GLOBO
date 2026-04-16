<?php

use Firebase\JWT\JWT;

$key = '41096458-d416-4d8c-8651-2dd5911a0cff';

$payload = [
    'email' => 'r4Eo9@example.com',
    'iat'   => time(),           // issued at
    'exp'   => time() + 3600,    // scadenza
];

$token = JWT::encode($payload, $key, 'HS256');

setcookie('jwt', $token, [
    'expires'  => time() + 3600,
    'path'     => '/',
    'secure'   => true,
    'httponly' => true,
    'samesite' => 'Lax',
]);
