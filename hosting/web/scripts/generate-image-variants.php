<?php
declare(strict_types=1);

/**
 * CLI nástroj: z jednoho zdrojového JPEG/PNG vygeneruje resized WebP
 * (a volitelně AVIF) varianty přes PHP GD. Originál se nikdy nemění.
 *
 * Použití:
 *   php generate-image-variants.php <zdroj.jpg> <cilova_slozka> <sirky_oddelene_carkou> [--avif] [--quality=82]
 *
 * Příklad:
 *   php generate-image-variants.php assets/img/hero/homepage-hero-original.jpg assets/img/hero 640,960,1280,1920 --avif
 */

if (PHP_SAPI !== 'cli') {
  http_response_code(404);
  exit;
}

function fail(string $msg): never {
  fwrite(STDERR, $msg . "\n");
  exit(1);
}

$args = $argv;
array_shift($args);
$positional = [];
$avif = false;
$quality = 82;

foreach ($args as $arg) {
  if ($arg === '--avif') { $avif = true; continue; }
  if (str_starts_with($arg, '--quality=')) { $quality = (int) substr($arg, 10); continue; }
  $positional[] = $arg;
}

if (count($positional) < 3) {
  fail('Použití: php generate-image-variants.php <zdroj> <cilova_slozka> <sirky_csv> [--avif] [--quality=82]');
}

[$srcPath, $outDir, $widthsCsv] = $positional;

if (!is_file($srcPath)) fail("Zdrojový soubor neexistuje: $srcPath");
if (!is_dir($outDir) && !mkdir($outDir, 0755, true)) fail("Nepodařilo se vytvořit složku: $outDir");

$widths = array_map('intval', explode(',', $widthsCsv));
$info = getimagesize($srcPath);
if ($info === false) fail("Nelze přečíst rozměry: $srcPath");
[$srcW, $srcH, $type] = $info;

$src = match ($type) {
  IMAGETYPE_JPEG => imagecreatefromjpeg($srcPath),
  IMAGETYPE_PNG => imagecreatefrompng($srcPath),
  IMAGETYPE_WEBP => imagecreatefromwebp($srcPath),
  default => fail("Nepodporovaný typ obrázku: $srcPath"),
};
if ($src === false) fail("Nelze načíst obrázek: $srcPath");

$base = pathinfo($srcPath, PATHINFO_FILENAME);

foreach ($widths as $w) {
  if ($w >= $srcW) $w = $srcW;
  $h = (int) round($srcH * ($w / $srcW));

  $resized = imagecreatetruecolor($w, $h);
  imagealphablending($resized, false);
  imagesavealpha($resized, true);
  imagecopyresampled($resized, $src, 0, 0, 0, 0, $w, $h, $srcW, $srcH);

  $webpPath = "$outDir/{$base}-{$w}w.webp";
  imagewebp($resized, $webpPath, $quality);
  echo "OK  $webpPath (" . round(filesize($webpPath) / 1024) . " KB)\n";

  if ($avif && function_exists('imageavif')) {
    $avifPath = "$outDir/{$base}-{$w}w.avif";
    imageavif($resized, $avifPath, $quality);
    echo "OK  $avifPath (" . round(filesize($avifPath) / 1024) . " KB)\n";
  }

  imagedestroy($resized);

  if ($w === $srcW) break;
}

imagedestroy($src);
