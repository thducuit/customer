<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
	const IN_USE = 1;
	const NOT_USE = 0;

	const IS_AUTO = 1;
	const IS_AUTO_SERVICE = 2;

    //
    protected $table = 'post';
}
