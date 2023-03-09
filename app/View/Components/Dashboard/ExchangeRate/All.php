<?php

namespace App\View\Components\Dashboard\ExchangeRate;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class All extends Component
{
    public $rates;
    public $pages;
    /**
     * Create a new component instance.
     */
    public function __construct($pages, $rates)
    {
        $this->rates = $rates;
        $this->pages = $pages;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.exchange-rate.all');
    }
}
