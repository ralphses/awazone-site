<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AibopayLayout extends Component
{

    public string $title;

    public function __construct($title)
    {
        $this->title = $title;
    }
    
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.aibopay');
    }
}
