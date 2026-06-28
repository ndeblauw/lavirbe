<?php

namespace App\BlueAdmin;

use Ndeblauw\BlueAdmin\Models\BlueAdminModel;

class Formation extends BlueAdminModel
{
    public $CLASS = \App\Models\Formation::class;

    public $name_to_use = 'Formations';

    public $title_field = 'title';

    public $indexTableColumns = ['title', 'slug', 'hidden'];

    public $filepond = ['banner'];

    public $color = 'violet';
}
