<?php

namespace Web\Models;

use Web\Entityes\MenuEntity;

class Menu extends Model {
    protected $fileName = 'website.menu';
    protected $entityClass = MenuEntity::class;
}