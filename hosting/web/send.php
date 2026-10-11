<?php

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| NASTAVENÍ E-MAILU
|--------------------------------------------------------------------------
|
| TO_EMAIL:
| Adresa, na kterou budou chodit poptávky.
|
| FROM_EMAIL:
| Existující schránka na doméně webu.
| Nedávej sem e-mail návštěvníka.
|
*/

//const TO_EMAIL = 'suny10@gmail.com';
const TO_EMAIL = 'info@trimistri.cz, jakub@jasso.cz';
const FROM_EMAIL = 'info@trimistri.cz';
const FROM_NAME = 'Tři Mistři – webový formulář';

const MAX_FILE_COUNT = 5;
const MAX_FILE_SIZE = 4 * 1024 * 1024;       // 4 MB na soubor
const MAX_TOTAL_FILE_SIZE = 12 * 1024 * 1024; // 12 MB celkem

$isHttps = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';

session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'secure' => $isHttps,
    'httponly' => true,
    'samesite' => 'Lax',
]);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

/*
|--------------------------------------------------------------------------
| STRÁNKA PRO NÁVRAT PO ODESLÁNÍ
|--------------------------------------------------------------------------
|
| Formulář je vložen na více podstránkách, proto si posílá název stránky,
| na kterou se má po zpracování vrátit. Hodnota jde přes whitelist, aby ji
| nešlo zneužít pro přesměrování mimo web.
|
*/

const ALLOWED_RETURN_PAGES = [
    'epoxidove-podlahy.php',
    'index.php',
    'sluzby.php',
    'natery-interieru.php',
    'dekoracni-sterky.php',
    'natery-drevo-kovu.php',
    'prumyslove-natery.php',
    'tapetovani.php',
    'natery-fasad.php',
    'odstraneni-grafiti.php',
    'pismomalirstvi.php',
    'mikrocement.php',
    'specialni-natery.php',
    'sanace-po-zatekani.php',
    'cisteni-fasad.php',
    'natery-strech.php',
];

$rawReturnTo = isset($_POST['return_to']) && is_string($_POST['return_to']) ? $_POST['return_to'] : '';
$returnTo = in_array($rawReturnTo, ALLOWED_RETURN_PAGES, true) ? $rawReturnTo : 'index.php';
// Čisté URL fungují na produkci i při lokálním běhu webu v podadresáři.
$webBase = rtrim(dirname((string) ($_SERVER['SCRIPT_NAME'] ?? '/send.php')), '/');
$returnToClean = $webBase . '/' . ($returnTo === 'index.php' ? '' : substr($returnTo, 0, -4));

function redirectToForm(string $status): void
{
    global $returnToClean;

    header(
        'Location: ' . $returnToClean . '?form=' . rawurlencode($status) . '#poptavka',
        true,
        303
    );

    exit;
}

/**
 * Bezpečně vrátí textovou hodnotu z POST.
 */
function postValue(string $key): string
{
    $value = $_POST[$key] ?? '';

    return is_string($value) ? $value : '';
}

/**
 * Vyčistí jednořádkový text.
 */
function cleanLine(string $value, int $maxLength): string
{
    $value = trim($value);
    $value = str_replace("\0", '', $value);
    $value = strip_tags($value);

    // Zabrání vložení vlastních e-mailových hlaviček.
    $value = str_replace(["\r", "\n"], ' ', $value);

    // Odstraní neviditelné řídicí znaky.
    $value = preg_replace(
        '/[\x00-\x1F\x7F]/u',
        '',
        $value
    ) ?? '';

    // Více mezer převede na jednu.
    $value = preg_replace('/\s+/u', ' ', $value) ?? '';

    return mb_substr(
        trim($value),
        0,
        $maxLength,
        'UTF-8'
    );
}

/**
 * Vyčistí víceřádkový text.
 */
function cleanMultiline(string $value, int $maxLength): string
{
    $value = trim($value);
    $value = str_replace("\0", '', $value);
    $value = strip_tags($value);

    // Sjednocení konců řádků.
    $value = str_replace(["\r\n", "\r"], "\n", $value);

    // Odstranění nebezpečných řídicích znaků.
    $value = preg_replace(
        '/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/u',
        '',
        $value
    ) ?? '';

    // Omezení nadbytečných prázdných řádků.
    $value = preg_replace(
        "/\n{4,}/",
        "\n\n\n",
        $value
    ) ?? '';

    return mb_substr(
        trim($value),
        0,
        $maxLength,
        'UTF-8'
    );
}

/**
 * Převede strukturu $_FILES na běžné pole souborů.
 */
function normalizeFiles(array $files): array
{
    if (
        !isset(
            $files['name'],
            $files['tmp_name'],
            $files['error'],
            $files['size']
        )
    ) {
        return [];
    }

    if (!is_array($files['name'])) {
        return [$files];
    }

    $normalized = [];

    foreach (array_keys($files['name']) as $index) {
        $normalized[] = [
            'name' => $files['name'][$index] ?? '',
            'tmp_name' => $files['tmp_name'][$index] ?? '',
            'error' => $files['error'][$index] ?? UPLOAD_ERR_NO_FILE,
            'size' => $files['size'][$index] ?? 0,
        ];
    }

    return $normalized;
}

/*
|--------------------------------------------------------------------------
| POVOLENÍ POUZE POST POŽADAVKU
|--------------------------------------------------------------------------
*/

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    redirectToForm('error');
}

/*
|--------------------------------------------------------------------------
| ZÁKLADNÍ KONTROLA VELIKOSTI POŽADAVKU
|--------------------------------------------------------------------------
*/

$contentLength = (int) ($_SERVER['CONTENT_LENGTH'] ?? 0);

if ($contentLength > 16 * 1024 * 1024) {
    redirectToForm('too-large');
}

/*
|--------------------------------------------------------------------------
| CSRF OCHRANA
|--------------------------------------------------------------------------
*/

$sessionToken = $_SESSION['quote_form_token'] ?? '';
$submittedToken = postValue('quote_form_token');

if (
    !is_string($sessionToken) ||
    $sessionToken === '' ||
    $submittedToken === '' ||
    !hash_equals($sessionToken, $submittedToken)
) {
    redirectToForm('invalid');
}

/*
|--------------------------------------------------------------------------
| HONEYPOT PROTI ROBOTŮM
|--------------------------------------------------------------------------
*/

if (trim(postValue('hp_field_x92')) !== '') {
    // Robotovi zobrazíme zdánlivý úspěch.
    redirectToForm('sent');
}

/*
|--------------------------------------------------------------------------
| KONTROLA DOBY VYPLNĚNÍ
|--------------------------------------------------------------------------
*/

$currentTime = time();
$formStarted = (int) ($_SESSION['quote_form_started'] ?? 0);

if (
    $formStarted === 0 ||
    $currentTime - $formStarted < 2
) {
    redirectToForm('invalid');
}

/*
|--------------------------------------------------------------------------
| OMEZENÍ OPAKOVANÉHO ODESÍLÁNÍ
|--------------------------------------------------------------------------
*/

$lastSubmission = (int) ($_SESSION['quote_last_submission'] ?? 0);

if (
    $lastSubmission > 0 &&
    $currentTime - $lastSubmission < 30
) {
    redirectToForm('too-fast');
}

/*
|--------------------------------------------------------------------------
| NAČTENÍ A VYČIŠTĚNÍ POLÍ
|--------------------------------------------------------------------------
*/

$name = cleanLine(postValue('name'), 100);
$phone = cleanLine(postValue('phone'), 30);
$city = cleanLine(postValue('city'), 120);
$email = trim(postValue('email'));
$service = cleanLine(postValue('service'), 100);
$message = cleanMultiline(postValue('message'), 5000);

/*
|--------------------------------------------------------------------------
| VALIDACE POLÍ
|--------------------------------------------------------------------------
*/

if (mb_strlen($name, 'UTF-8') < 2) {
    redirectToForm('invalid');
}

if (
    preg_match('/^[0-9+\s()\/.\-]{6,30}$/u', $phone) !== 1
) {
    redirectToForm('invalid');
}

if (mb_strlen($city, 'UTF-8') < 2) {
    redirectToForm('invalid');
}

/*
 * E-mail je ve formuláři nepovinný.
 * Pokud je vyplněný, musí být platný.
 */
if (
    $email !== '' &&
    (
        strlen($email) > 254 ||
        strpos($email, "\r") !== false ||
        strpos($email, "\n") !== false ||
        filter_var($email, FILTER_VALIDATE_EMAIL) === false
    )
) {
    redirectToForm('invalid');
}

$allowedServices = [
    'Epoxidové podlahy',
    'Malby interiéru',
    'Dekorativní stěrky',
    'Nátěry dřeva a kovů',
    'Tapetování',
    'Nátěry fasád',
    'Čištění fasády',
    'Odstranění graffiti',
    'Písmomalířství',
    'Ocelové konstrukce',
    'Mikrocement a stěrky přes obklady',
    'Speciální interiérové nátěry',
    'Sanace po zatékání',
    'Nátěry střech',
];

if (!in_array($service, $allowedServices, true)) {
    redirectToForm('invalid');
}

/*
|--------------------------------------------------------------------------
| KONTROLA PŘÍLOH
|--------------------------------------------------------------------------
*/

$attachments = [];
$uploadedFiles = normalizeFiles($_FILES['photos'] ?? []);

if (count($uploadedFiles) > MAX_FILE_COUNT) {
    redirectToForm('too-many-files');
}

$allowedMimeTypes = [
    'image/jpeg' => 'jpg',
    'image/png' => 'png',
    'image/webp' => 'webp',
];

$finfo = finfo_open(FILEINFO_MIME_TYPE);

if ($finfo === false) {
    error_log('Tři Mistři formulář: nelze spustit Fileinfo.');
    redirectToForm('error');
}

$totalFileSize = 0;
$fileNumber = 1;

foreach ($uploadedFiles as $uploadedFile) {
    $uploadError = (int) $uploadedFile['error'];

    if ($uploadError === UPLOAD_ERR_NO_FILE) {
        continue;
    }

    if ($uploadError !== UPLOAD_ERR_OK) {
        redirectToForm('error');
    }

    $temporaryPath = (string) $uploadedFile['tmp_name'];
    $fileSize = (int) $uploadedFile['size'];

    if (
        $temporaryPath === '' ||
        !is_uploaded_file($temporaryPath)
    ) {
        redirectToForm('error');
    }

    if ($fileSize <= 0 || $fileSize > MAX_FILE_SIZE) {
        redirectToForm('too-large');
    }

    $totalFileSize += $fileSize;

    if ($totalFileSize > MAX_TOTAL_FILE_SIZE) {
        redirectToForm('too-large');
    }

    /*
     * Kontrola skutečného obsahu souboru,
     * nikoliv pouze jeho názvu nebo přípony.
     */
    $mimeType = finfo_file($finfo, $temporaryPath);

    if (
        !is_string($mimeType) ||
        !isset($allowedMimeTypes[$mimeType])
    ) {
        redirectToForm('invalid-file');
    }

    $imageInfo = @getimagesize($temporaryPath);

    if ($imageInfo === false) {
        redirectToForm('invalid-file');
    }

    /*
     * Ochrana před extrémně rozměrnými obrázky.
     */
    $imageWidth = (int) ($imageInfo[0] ?? 0);
    $imageHeight = (int) ($imageInfo[1] ?? 0);

    if (
        $imageWidth <= 0 ||
        $imageHeight <= 0 ||
        $imageWidth * $imageHeight > 40_000_000
    ) {
        redirectToForm('invalid-file');
    }

    $extension = $allowedMimeTypes[$mimeType];

    $attachments[] = [
        'path' => $temporaryPath,
        'mime' => $mimeType,
        'name' => sprintf(
            'fotografie-%d.%s',
            $fileNumber,
            $extension
        ),
    ];

    $fileNumber++;
}

/*
|--------------------------------------------------------------------------
| OBSAH E-MAILU
|--------------------------------------------------------------------------
*/

$emailBody = implode("\n", [
    'Nová poptávka z webu Tři Mistři',
    '================================',
    '',
    'Jméno a příjmení: ' . $name,
    'Telefon: ' . $phone,
    'Město / obec realizace: ' . $city,
    'E-mail: ' . ($email !== '' ? $email : 'Neuveden'),
    'Typ služby: ' . $service,
    '',
    'Popis zakázky:',
    '--------------------------------',
    $message !== '' ? $message : 'Bez dalšího popisu',
    '',
    '--------------------------------',
    'Odesláno: ' . date('d. m. Y H:i'),
]);

/*
|--------------------------------------------------------------------------
| HLAVIČKY E-MAILU
|--------------------------------------------------------------------------
*/

$subjectText = 'Nová poptávka – ' . $service . ' – ' . $name;

$encodedSubject = '=?UTF-8?B?' .
    base64_encode($subjectText) .
    '?=';

$encodedFromName = '=?UTF-8?B?' .
    base64_encode(FROM_NAME) .
    '?=';

$headers = [
    'From: ' . $encodedFromName . ' <' . FROM_EMAIL . '>',
    'MIME-Version: 1.0',
    'X-Mailer: PHP/' . PHP_VERSION,
];

if ($email !== '') {
    $headers[] = 'Reply-To: ' . $email;
}

/*
|--------------------------------------------------------------------------
| E-MAIL BEZ PŘÍLOH
|--------------------------------------------------------------------------
*/

if ($attachments === []) {
    $headers[] = 'Content-Type: text/plain; charset=UTF-8';
    $headers[] = 'Content-Transfer-Encoding: 8bit';

    $sent = mail(
        TO_EMAIL,
        $encodedSubject,
        $emailBody,
        implode("\r\n", $headers)
    );
}

/*
|--------------------------------------------------------------------------
| E-MAIL S PŘÍLOHAMI
|--------------------------------------------------------------------------
*/

else {
    $boundary = 'mixed-' . bin2hex(random_bytes(16));

    $headers[] =
        'Content-Type: multipart/mixed; boundary="' .
        $boundary .
        '"';

    $body = '';

    $body .= '--' . $boundary . "\r\n";
    $body .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $body .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
    $body .= $emailBody . "\r\n";

    foreach ($attachments as $attachment) {
        $fileContent = file_get_contents($attachment['path']);

        if ($fileContent === false) {
            error_log(
                'Tři Mistři formulář: nelze načíst přílohu.'
            );

            redirectToForm('error');
        }

        $body .= '--' . $boundary . "\r\n";

        $body .=
            'Content-Type: ' .
            $attachment['mime'] .
            '; name="' .
            $attachment['name'] .
            "\"\r\n";

        $body .= "Content-Transfer-Encoding: base64\r\n";

        $body .=
            'Content-Disposition: attachment; filename="' .
            $attachment['name'] .
            "\"\r\n\r\n";

        $body .= chunk_split(
            base64_encode($fileContent)
        );

        $body .= "\r\n";
    }

    $body .= '--' . $boundary . "--\r\n";

    $sent = mail(
        TO_EMAIL,
        $encodedSubject,
        $body,
        implode("\r\n", $headers)
    );
}

/*
|--------------------------------------------------------------------------
| VÝSLEDEK
|--------------------------------------------------------------------------
*/

if (!$sent) {
    error_log(
        'Tři Mistři formulář: funkce mail() vrátila false.'
    );

    redirectToForm('error');
}

$_SESSION['quote_last_submission'] = time();
$_SESSION['quote_form_token'] = bin2hex(random_bytes(32));
$_SESSION['quote_form_started'] = time();
$_SESSION['quote_conversion_pending'] = true;
$_SESSION['quote_conversion_email'] = $email;
$_SESSION['quote_conversion_phone'] = $phone;

header('Location: ' . $webBase . '/dekujeme', true, 303);
exit;
