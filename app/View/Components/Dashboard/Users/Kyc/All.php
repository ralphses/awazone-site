<?php

namespace App\View\Components\Dashboard\Users\Kyc;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class All extends Component
{
    public $kycs;
    public $pages;
    public $types;
    /**
     * Create a new component instance.
     */
    public function __construct($kycs, $pages, $types)
    {
        $this->kycs = $kycs;
        $this->pages = $pages;
        $this->types = $types;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.users.kyc.all');
    }
}
