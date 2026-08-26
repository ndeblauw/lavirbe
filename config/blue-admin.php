<?php

return [
    'fontawesomekit_url' => 'https://kit.fontawesome.com/0bde3bbac3.js',

    'vite' => true,
    'livewire_v3' => false,
    'livewire_v4' => true,

    'ckeditor' => false,

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
            'header' => 'Content Management',
        ],
        [
            'title' => 'Articles',
            'link' => 'admin/articles',
            'icon' => 'fa-newspaper',
            'color' => 'sky',
        ],

        [
            'title' => 'Packages',
            'link' => 'admin/packages',
            'icon' => 'fa-box',
            'color' => 'emerald',
        ],
        [
            'title' => 'Formations',
            'link' => 'admin/formations',
            'icon' => 'fa-graduation-cap',
            'color' => 'violet',
        ],
        [
            'title' => 'Customers',
            'link' => 'admin/customers',
            'icon' => 'fa-users',
            'color' => 'sky',
        ],

        [
            'header' => 'Metadata',
        ],
        [
            'title' => 'Categories',
            'link' => 'admin/categories',
            'icon' => 'fa-folder',
            'color' => 'rose',
        ],
        [
            'title' => 'Tags',
            'link' => 'admin/tags',
            'icon' => 'fa-tags',
            'color' => 'orange',
        ],
        [
            'header' => 'Info & Site',
        ],
        [
            'title' => 'Contacts',
            'link' => 'admin/contacts',
            'icon' => 'fa-envelope',
            'color' => 'blue',
        ],
        [
            'title' => 'Users',
            'link' => 'admin/users',
            'icon' => 'fa-user',
            'color' => 'slate',
        ],
    ],

    'details_for' => 'Details for',
    'record_of_type' => 'Record of the type',
    'create_new' => 'Create New',
];
