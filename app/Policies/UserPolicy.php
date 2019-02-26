<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function look(User $user)
    {
        foreach ($user->permissions as $permission) {
            if ($permission->name === 'look'
                || $permission->name === 'block'
                || $permission->name === 'edit') {
                return true;
            }
        }
    }

    public function edit(User $user)
    {
        foreach ($user->permissions as $permission) {
            if ($permission->name === 'edit') {
                return true;
            }
        }
    }

    public function block(User $user)
    {
        foreach ($user->permissions as $permission) {
            if ($permission->name === 'block') {
                return true;
            }
        }
    }
}
