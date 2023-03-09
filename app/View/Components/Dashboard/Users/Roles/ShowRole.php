<?php

namespace App\View\Components\Dashboard\Users\Roles;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowRole extends Component
{
    public $role;
    public $userauthorities;
    public $allauthorities;
    /**
     * Create a new component instance.
     */
    public function __construct($role, $userauthorities, $allauthorities)
    {
        $this->role = $role;
        $this->userauthorities = $userauthorities;
        $this->allauthorities = $allauthorities;

        // in_array()
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.users.roles.show-role');
    }
}
