<?php

namespace App\View\Components\Dashboard\Currency;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class All extends Component
{
    public $pages;
    public $currencies;
    /**
     * Create a new component instance.
     */
    public function __construct($currencies, $pages)
    {
        $this->pages = $pages;
        $this->currencies = $currencies;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.currency.all');
    }
}
