<?php

namespace App\Policies;

use App\Models\CheckList;
use App\User;
use App\Item;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPolicy
{
    use HandlesAuthorization;

    public function create(User $user, CheckList $checkList)
    {
        if ($user->id === $checkList->user_id) {
            return true;
        }
    }
}
