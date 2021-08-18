<?php

session_start();

if (
    ! (isset($_SERVER['HTTP_X_REQUESTED_WITH'])
        && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest')
) {
    echo '不正なリクエストです';

    exit;
}

class CsrfValidator {
    const HASH_ALGO = 'sha256';

    public static function generate()
    {
        return hash(self::HASH_ALGO, session_id());
    }

    public static function validate($token)
    {
        return self::generate() === $token;
    }
}
