<?php

namespace App\View\Components\Dashboard\Aibopay\AibopayAccount;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class All extends Component
{
    public $accounts;
    public $pages;
    /**
     * Create a new component instance.
     */
    public function __construct($accounts, $pages)
    {
        $this->pages = $pages;
        $this->accounts = $accounts;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.aibopay.aibopay-account.all');
    }
}
