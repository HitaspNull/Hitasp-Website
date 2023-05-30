<?php

namespace Web\Models;

use Web\Entityes\ContactEntity;

class Contact extends Model{
    protected $fileName = 'website.contact';
    protected $entityClass = ContactEntity::class;
}