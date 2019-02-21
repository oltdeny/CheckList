<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckList extends Model
{

	public function user() 
	{
		return $this->hasOne('App\Models\User');
	}
}
