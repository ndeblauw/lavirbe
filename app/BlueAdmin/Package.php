<?php

namespace App\BlueAdmin;

use Ndeblauw\BlueAdmin\Models\BlueAdminModel;

class Package extends BlueAdminModel
{
    public $CLASS = \App\Models\Package::class;

    public $name_to_use = 'Packages';

    public $title_field = 'title';

    public $indexTableColumns = ['title', 'slug', 'hidden'];

    public $color = 'emerald';
}
