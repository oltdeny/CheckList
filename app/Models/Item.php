<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    
    protected $fillable = [
        'name', 'status'
    ];

    public function lists() 
    {
    	return $this->belongsToMany('App\Models\CheckList');
    }
}
