<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{

    public string $title;
    // public array $metaData;

     public function __construct(string $title)
     {
        $this->title = $title;
        // $this->metaData = $metaData;
     }
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.guest');
    }
}
