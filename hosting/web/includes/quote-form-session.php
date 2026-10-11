<?php declare(strict_types=1);

require_once __DIR__ . '/cms-gallery.php';
cms_no_cache();

if (empty($_SESSION['quote_form_token'])) {
  $_SESSION['quote_form_token'] = bin2hex(random_bytes(32));
}

if (empty($_SESSION['quote_form_started'])) {
  $_SESSION['quote_form_started'] = time();
}

$formStatus = isset($_GET['form']) && is_string($_GET['form']) ? $_GET['form'] : '';
