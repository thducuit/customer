<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'category';

    const STOP = 0;
    const RUNNING = 1;

    const FOR_RENT = 0;
    const NOT_FOR_RENT = 1;
}
