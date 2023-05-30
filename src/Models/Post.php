<?php

namespace Web\Models;
use Web\Entityes\PostEntity;

class Post extends Model{
    protected $fileName = 'website.posts';
    protected $entityClass = PostEntity::class;
}