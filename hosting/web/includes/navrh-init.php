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
// Send the first view while optional CMS galleries are fetched.
header('X-Accel-Buffering: no');
// Compress in PHP so ob_flush sends a gzip sync point before waiting for CMS.
// The hosting proxy otherwise holds its compressed response until PHP finishes.
if (PHP_SAPI !== 'cli' && function_exists('ob_gzhandler') &&
    in_array(strtolower((string) ini_get('zlib.output_compression')), ['', '0', 'off'], true)) {
    $buffer = ob_get_status();
    if ($buffer && $buffer['name'] === 'default output handler' &&
        $buffer['buffer_used'] === 0 && ($buffer['flags'] & PHP_OUTPUT_HANDLER_REMOVABLE)) {
        ob_end_clean();
    }
    // Never replace a custom output handler or compress twice.
    if (ob_get_level() === 0) ob_start('ob_gzhandler');
}
require_once __DIR__ . '/navrh-cms.php';

function navrh_flush_first_view(): void {
    if (PHP_SAPI === 'cli') return;
    $buffer = ob_get_status();
    if ($buffer && ($buffer['flags'] & PHP_OUTPUT_HANDLER_FLUSHABLE)) ob_flush();
    flush();
}
