<?php

return [
    'fontawesomekit_url' => 'https://kit.fontawesome.com/0bde3bbac3.js',

    'vite' => true,
    'livewire_v3' => false,
    'livewire_v4' => true,

    'ckeditor' => true,

    'flux' => false,
    'flux-version' => 'v2',
    'flux-layout' => false,

    'font' => [
        'include' => 'https://fonts.bunny.net/css?family=sofia-sans',
        'family' => 'Sofia Sans',
    ],

    'filepond_temporary_files_disk' => 'local',
    'filepond_temporary_files_path' => 'filepond',

    'menu' => [
        [
            'title' => 'Dashboard',
            'link' => 'admin/',
            'icon' => 'fa-home',
        ],
        [
            'title' => 'Customers',
            'link' => 'admin/customers',
            'icon' => 'fa-users',
            'color' => 'sky',
        ],
        [
            'title' => 'Packages',
            'link' => 'admin/packages',
            'icon' => 'fa-box',
            'color' => 'emerald',
        ],
        [
            'title' => 'Contacts',
            'link' => 'admin/contacts',
            'icon' => 'fa-envelope',
            'color' => 'blue',
        ],
        [
            'title' => 'Formations',
            'link' => 'admin/formations',
            'icon' => 'fa-graduation-cap',
            'color' => 'violet',
        ],
    ],

    'details_for' => 'Details for',
    'record_of_type' => 'Record of the type',
    'create_new' => 'Create New',
];

// TODO clean out things that don't belong in the configuration file
