<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'category';

    const NOT_USE = 0;
    const IN_USE = 1;
}
