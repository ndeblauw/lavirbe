<?php

namespace App\BlueAdmin;

use Ndeblauw\BlueAdmin\Models\BlueAdminModel;

class Tag extends BlueAdminModel
{
    public $CLASS = \App\Models\Tag::class;

    public $name_to_use = 'Tags';

    public $title_field = 'title';

    public $indexTableColumns = ['title', 'slug', 'hidden'];

    public $color = 'orange';
}
