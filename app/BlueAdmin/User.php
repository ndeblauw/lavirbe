<?php

namespace App\BlueAdmin;

use Ndeblauw\BlueAdmin\Models\BlueAdminModel;

class User extends BlueAdminModel
{
    public $CLASS = \App\Models\User::class;

    public $name_to_use = 'Users';

    public $title_field = 'name';

    public $indexTableColumns = ['name', 'email', 'is_admin'];

    public $color = 'slate';
}
