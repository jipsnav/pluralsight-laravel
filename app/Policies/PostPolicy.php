<?php

namespace App\Policies;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    // method to update user post
    public function update(User $user, Posts $post)
    {
        return $user->id === $post->user_id;
    }

    // method to delete user post
    public function delete(User $user, Posts $post)
    {
        return $user->id === $post->user_id;
    }
}
