<?php

namespace App\View\Components\Dashboard\Users;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Profile extends Component
{
    public User $user;
    public $currencies;
    public $currency;
    /**
     * Create a new component instance.
     */
    public function __construct(User $user, $currencies, $currency)
    {
        $this->user = $user;
        $this->currencies = $currencies;
        $this->currency = $currency;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.users.profile');
    }
}
