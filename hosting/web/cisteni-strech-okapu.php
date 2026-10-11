<?php
declare(strict_types=1);
// Záloha přesměrování bez pravidel .htaccess.
$query = (string) ($_SERVER['QUERY_STRING'] ?? '');
header('Location: natery-strech' . ($query !== '' ? '?' . $query : ''), true, 301);
exit;
