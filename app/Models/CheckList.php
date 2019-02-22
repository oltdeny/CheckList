<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckList extends Model
{	

	protected $fillable = [
        'name', 'user_id'
    ];	

	public function user() 
	{
		return $this->belongsTo('App\User');
	}

	public function items() 
	{
		return $this->hasMany('App\Models\Item');
	}
}
