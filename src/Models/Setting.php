<?php

namespace Web\Models;

use Web\Entityes\SettingEntity;

class Setting extends Model{
    protected $fileName = 'website.setting';
    protected $entityClass = SettingEntity::class;
}