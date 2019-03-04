<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $fillable = [
        'name',
        'status',
        'check_list_id'
    ];

    public function checkList()
    {
        return $this->belongsTo('App\Models\CheckList');
    }
}
