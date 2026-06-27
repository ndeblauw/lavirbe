<?php

namespace App\BlueAdmin;

use Ndeblauw\BlueAdmin\Models\BlueAdminModel;

class Customer extends BlueAdminModel
{
    public $CLASS = \App\Models\Customer::class;

    public $name_to_use = 'Customers';

    public $title_field = 'name';

    public $indexTableColumns = ['name', 'website_url', 'hidden'];

    public $filepond = ['logo'];

    public $color = 'sky';
}
