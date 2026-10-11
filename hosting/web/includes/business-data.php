<?php declare(strict_types=1);

// Jednotná identita firmy pro homepage i poskytovatele jednotlivých služeb.
return [
    '@type' => 'LocalBusiness',
    '@id' => 'https://trimistri.cz/#organization',
    'name' => 'Tři Mistři',
    'legalName' => 'Jakub Jaššo',
    'description' => 'Malířské práce, nátěry, dekorativní stěrky, tapetování, fasády a odstranění graffiti v Brně, Blansku, Olomouci, Zlíně a celé ČR.',
    'areaServed' => ['Brno', 'Blansko', 'Olomouc', 'Zlín', 'Jihomoravský kraj', 'Olomoucký kraj', 'Zlínský kraj'],
    'telephone' => '+420774927182',
    'email' => 'info@trimistri.cz',
    'url' => 'https://trimistri.cz/',
    'logo' => 'https://trimistri.cz/assets/img/logo-signature.png',
    'image' => 'https://trimistri.cz/assets/img/about.JPEG',
    'identifier' => ['@type' => 'PropertyValue', 'name' => 'IČO', 'value' => '23193620'],
    'address' => [
        '@type' => 'PostalAddress',
        'streetAddress' => 'Nová 315',
        'postalCode' => '679 02',
        'addressLocality' => 'Rájec-Jestřebí',
        'addressCountry' => 'CZ',
    ],
    'sameAs' => [
        'https://www.facebook.com/profile.php?id=61592930663609',
        'https://www.instagram.com/trimistrimalby/',
    ],
];
