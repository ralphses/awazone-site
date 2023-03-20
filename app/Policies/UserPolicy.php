<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function isAdmin(User $user) {
        return in_array('user_admin', explode("|", $user->roles->authorities), true);
    }

    public function isUser(User $user) {
        return in_array('user', explode("|", $user->roles->authorities), true);
    }
}
