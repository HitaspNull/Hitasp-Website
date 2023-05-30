<?php

namespace Web\Models;

use Web\Entityes\AboutUsEntity;

class AboutUs extends Model{
    protected $fileName = 'website.aboutus';
    protected $entityClass = AboutUsEntity::class;
}