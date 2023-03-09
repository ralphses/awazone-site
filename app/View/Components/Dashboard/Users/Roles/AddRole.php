<?php

namespace App\View\Components\Dashboard\Users\Roles;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AddRole extends Component
{
    public $abilities;
    /**
     * Create a new component instance.
     */
    public function __construct($abilities)
    {
        $this->abilities = $abilities;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.users.roles.add-role');
    }
}
