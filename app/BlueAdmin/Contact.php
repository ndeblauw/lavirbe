<?php

namespace App\BlueAdmin;

use Ndeblauw\BlueAdmin\Models\BlueAdminModel;

class Contact extends BlueAdminModel
{
    public $CLASS = \App\Models\Contact::class;

    public $name_to_use = 'Contacts';

    public $title_field = 'subject';

    public $indexTableColumns = ['name', 'email', 'subject', 'created_at'];

    public $color = 'blue';
}
