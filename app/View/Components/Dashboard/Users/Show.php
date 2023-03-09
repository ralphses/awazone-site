<?php

namespace App\View\Components\Dashboard\Users;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Show extends Component
{
    public $user;
    public $currencies;
    /**
     * Create a new component instance.
     */
    public function __construct($user, $currencies)
    {
        $this->user = $user;
        $this->currencies = $currencies;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.users.show');
    }
}
