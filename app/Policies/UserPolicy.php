<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function lookAll(User $user)
    {
        foreach ($user->permissions as $permission) {
            if ($permission->name === 'lookAll') {
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

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function restore(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function forceDelete(User $user, User $model)
    {
        //
    }
}
