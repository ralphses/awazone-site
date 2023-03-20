<?php

namespace App\Policies;

use App\Models\User;

class RolesPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function view(User $user) {
        return in_array('authority_view', explode("|", $user->roles->authorities), true);
    }

    public function create(User $user) {
        return in_array('authority_create', explode("|", $user->roles->authorities), true);
    }

    public function update(User $user) {
        return in_array('authority_update', explode("|", $user->roles->authorities), true);
    }
}
