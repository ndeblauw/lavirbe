<?php

namespace App\BlueAdmin;

use Ndeblauw\BlueAdmin\Models\BlueAdminModel;

class Article extends BlueAdminModel
{
    public $CLASS = \App\Models\Article::class;

    public $name_to_use = 'Articles';

    public $title_field = 'title';

    public $indexTableColumns = ['title', 'category_id', 'published_at'];

    public $filepond = ['image'];

    public $belongsToMany = ['tags'];

    public $color = 'sky';
}
