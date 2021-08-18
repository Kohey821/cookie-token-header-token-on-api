<?php

require_once dirname(__FILE__).'/common.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo 'POSTしか受け付けません';

    exit;
}

if (! isset($_SERVER['HTTP_X_XSRF_TOKEN'])) {
    echo 'トークンがありません';

    exit;
}

if (CsrfValidator::validate($_SERVER['HTTP_X_XSRF_TOKEN'])) {
    echo '送信できました';
}
