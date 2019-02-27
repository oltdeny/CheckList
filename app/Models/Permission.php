<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

    protected $fillable = [
        'name'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public static function equals(Permission $p1, Permission $p2)
    {
        return $p1->id === $p2->id;
    }
}
