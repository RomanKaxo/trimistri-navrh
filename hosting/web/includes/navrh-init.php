<?php declare(strict_types=1);
if (session_status() !== PHP_SESSION_ACTIVE) {
    $isHttps = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
    session_set_cookie_params(['lifetime' => 0, 'path' => '/', 'secure' => $isHttps, 'httponly' => true, 'samesite' => 'Lax']);
    session_start();
}
require_once __DIR__ . '/quote-form-session.php';
// Pages containing session-bound CSRF tokens must never be shared by caches.
header('Cache-Control: no-store, max-age=0');
header('CDN-Cache-Control: no-store');
require_once __DIR__ . '/navrh-cms.php';
