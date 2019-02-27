<?php

namespace App\Policies;

use App\Models\CheckList;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CheckListPolicy
{
    use HandlesAuthorization;

    public function view(User $user, CheckList $checkList)
    {
        if($user->id === $checkList->user_id) {
            return true;
        }
    }

    public function look(User $user)
    {
        foreach ($user->permissions as $permission) {
            if ($permission->name === 'look') {
                return true;
            }
        }
    }

    public function create(User $user)
    {
        return true;
    }

    public function delete(User $user, CheckList $checkList)
    {
        if($user->id === $checkList->user_id) {
            return true;
        }
    }
}
