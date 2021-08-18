<?php

require_once dirname(__FILE__).'/common.php';

$seconds = 10;

setcookie(
    'XSRF-TOKEN',
    CsrfValidator::generate(),
    [
        'expires' => time() + $seconds,
        'path' => '/',
        'domain' => '',
        'secure' => false,
        'httponly' => false,
        // 'samesite' => 'None',
    ]
);

echo "{$seconds}秒間限定tokenを発行します";
