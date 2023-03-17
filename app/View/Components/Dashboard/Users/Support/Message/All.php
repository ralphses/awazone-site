<?php

namespace App\View\Components\Dashboard\Users\Support\Message;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class All extends Component
{
    public $messages;
    public $pages;
    /**
     * Create a new component instance.
     */
    public function __construct($messages, $pages)
    {
        $this->pages = $pages;
        $this->messages = $messages;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.users.support.message.all');
    }


}
