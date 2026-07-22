<?php

return [

    'organization' => [
        'name' => 'LAVIR VOF',
        'url' => env('APP_URL'),
        'logo' => '/img/apple-touch-icon-180.png',
        'same_as' => [
            'https://www.instagram.com/lavir_vzw_coaching/',
        ],
    ],

    'defaults' => [
        'description' => "LAVIR vzw coaching voorziet ondersteuning voor vzw's op vlak van financieel beleid, HR, administratie en beleid.",
        'og_image' => '/img/mstile-270.png',
        'twitter_handle' => null,
    ],

    'reading_speed_wpm' => 200,

    'pages' => [
        'welcome' => [
            'title' => 'LAVIR',
            'description' => "LAVIR vzw coaching voorziet ondersteuning voor vzw's op vlak van financieel beleid, HR, administratie en beleid.",
        ],
        'offers' => [
            'title' => 'Aanbod',
            'description' => "LAVIR biedt ondersteuning voor vzw's op vlak van financiën, governance, administratie, personeelszaken, impactmeting en digitalisering.",
        ],
        'formations' => [
            'title' => 'Vormingen',
            'description' => "Vormingen van LAVIR vzw coaching, gericht op medewerkers en bestuurders van vzw's. Bekijk hieronder het aanbod.",
        ],
        'articles' => [
            'title' => 'Kennisbank',
            'description' => "Artikels en kennisbank van LAVIR vzw coaching rond bestuur, fundraising, HR en meer voor vzw's.",
        ],
        'about' => [
            'title' => 'Over ons',
            'description' => 'Leer meer over LAVIR vzw coaching: wie we zijn, wat we doen en hoe we vzw\'s ondersteunen.',
        ],
        'contact' => [
            'title' => 'Contact',
            'description' => 'Neem contact op met LAVIR vzw coaching voor een vraag over ons aanbod of een telefonisch gesprek.',
        ],
        'faqs' => [
            'title' => 'Veelgestelde vragen',
            'description' => "Veelgestelde vragen aan LAVIR vzw coaching over ondersteuning van vzw's.",
        ],
    ],

];
