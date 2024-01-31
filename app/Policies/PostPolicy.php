<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class PostPolicy
{
    /**
     * Determine whether the user can view any models.
     */

    private $roleJson;

    // public function __construct(){
    //     $this->roleJson = 
    // }
    public function viewAny(User $user): bool
    {
        return false;
    }



    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        $roleJson = $user->group->permissions;
        if (!empty($roleJson)) {
            $RolesArr = json_decode($roleJson, true);
            $check = isRole($RolesArr, 'posts', 'add');
            return $check;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): bool
    {
        //Ai là người đăng posts thì mới được sửa
        return $user->id == $post->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): bool
    {
        return $user->id == $post->user_id;
    }
}