<?php
declare(strict_types=1);

return [
  [
    'id' => 'interiery',
    'name' => 'Interiéry a dekorativní povrchy',
    'icon' => 'bi-house-heart',
    'summary' => 'Od čisté výmalby až po výraznou proměnu stěn a podlah.',
    'services' => [
      ['name' => 'Malování bytů a interiérů', 'slug' => 'natery-interieru', 'icon' => 'bi-paint-bucket', 'summary' => 'Malby stěn a stropů, příprava podkladu a čisté dokončení.'],
      ['name' => 'Dekorativní stěrky', 'slug' => 'dekoracni-sterky', 'icon' => 'bi-layers', 'summary' => 'Marmorino, betonové efekty, limewash a další dekorativní techniky.'],
      ['name' => 'Mikrocement a stěrky přes obklady', 'slug' => 'mikrocement', 'icon' => 'bi-grid-3x3-gap', 'summary' => 'Bezesparé povrchy a překrytí vhodných pevných obkladů.'],
      ['name' => 'Speciální interiérové nátěry', 'slug' => 'specialni-natery', 'icon' => 'bi-shield-check', 'summary' => 'Protiplísňové, antibakteriální a termoizolační systémy.'],
      ['name' => 'Sanace po zatékání', 'slug' => 'sanace-po-zatekani', 'icon' => 'bi-moisture', 'summary' => 'Izolace skvrn, opravy podkladu a obnovení malby.'],
      ['name' => 'Tapetování', 'slug' => 'tapetovani', 'icon' => 'bi-columns-gap', 'summary' => 'Klasické, vliesové, vinylové tapety a fototapety.'],
    ],
  ],
  [
    'id' => 'fasady',
    'name' => 'Fasády a čištění povrchů',
    'icon' => 'bi-building',
    'summary' => 'Čištění, opravy a ochrana domu podle stavu konkrétního povrchu.',
    'services' => [
      ['name' => 'Čištění fasád a povrchů', 'slug' => 'cisteni-fasad', 'icon' => 'bi-water', 'summary' => 'Fasády, marmolit, beton, obklady a další vhodné venkovní plochy.'],
      ['name' => 'Nátěry a renovace fasád', 'slug' => 'natery-fasad', 'icon' => 'bi-house-gear', 'summary' => 'Příprava, opravy a ochranné fasádní nátěry.'],
      ['name' => 'Odstranění graffiti', 'slug' => 'odstraneni-grafiti', 'icon' => 'bi-eraser', 'summary' => 'Čištění, odstranění nebo překrytí graffiti podle povrchu.'],
    ],
  ],
  [
    'id' => 'strechy',
    'name' => 'Střechy a venkovní prvky',
    'icon' => 'bi-house-up',
    'summary' => 'Nátěry střech, okapů, svodů, oken a dalších venkovních prvků.',
    'services' => [
      ['name' => 'Nátěry střech, okapů a svodů', 'slug' => 'natery-strech', 'icon' => 'bi-house-up', 'summary' => 'Příprava a ochranné nátěry krytin, okapů a svodů.'],
      ['name' => 'Nátěry oken, podbití, dřeva a kovů', 'slug' => 'natery-drevo-kovu', 'icon' => 'bi-door-open', 'summary' => 'Okna, dveře, podbití, pergoly, ploty, okapy a svody.'],
    ],
  ],
  [
    'id' => 'specialni',
    'name' => 'Speciální a průmyslové práce',
    'icon' => 'bi-tools',
    'summary' => 'Řešení pro konstrukce, provozy i značení na různých površích.',
    'services' => [
      ['name' => 'Epoxidové podlahy', 'slug' => 'epoxidove-podlahy', 'icon' => 'bi-grid-3x3', 'summary' => 'Realizace podlah podle podkladu a požadavků vašeho provozu.'],
      ['name' => 'Průmyslové a antikorozní nátěry', 'slug' => 'prumyslove-natery', 'icon' => 'bi-building-gear', 'summary' => 'Ocelové konstrukce, haly a namáhané kovové prvky.'],
      ['name' => 'Písmomalířství', 'slug' => 'pismomalirstvi', 'icon' => 'bi-fonts', 'summary' => 'Ruční nápisy, loga a obnova značení na různých površích.'],
    ],
  ],
];
