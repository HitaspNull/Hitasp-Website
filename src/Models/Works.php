<?php

namespace Web\Models;

use Web\Entityes\WorksEntity;

class Works extends Model{
    protected $fileName = 'website.works';
    protected $entityClass = WorksEntity::class;
}