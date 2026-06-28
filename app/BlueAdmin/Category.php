<?php

namespace App\BlueAdmin;

use Ndeblauw\BlueAdmin\Models\BlueAdminModel;

class Category extends BlueAdminModel
{
    public $CLASS = \App\Models\Category::class;

    public $name_to_use = 'Categories';

    public $title_field = 'name';

    public $indexTableColumns = ['name'];

    public $color = 'rose';
}
