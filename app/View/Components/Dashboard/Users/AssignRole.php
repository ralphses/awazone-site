<?php

namespace App\View\Components\Dashboard\Users;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AssignRole extends Component
{
    public $user;
    public $roles;
    /**
     * Create a new component instance.
     */
    public function __construct($user, $roles)
    {
        $this->roles = $roles;
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.users.assign-role');
    }
}
