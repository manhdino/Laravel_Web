<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{

    public function create(User $user): bool
    {
        $roleJson = $user->group->permissions;
        if (!empty($roleJson)) {
            $RolesArr = json_decode($roleJson, true);
            $check = isRole($RolesArr, 'users', 'add');
            return $check;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        if ($user->user_id == 0) { //Tức là nó làm Main Admin
            return true;
        }
        return $user->id == $model->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        if ($user->user_id == 0) { //Tức là nó làm Main Admin
            return true;
        }
        return $user->id == $model->user_id;
    }
}