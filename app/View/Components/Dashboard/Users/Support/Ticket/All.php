<?php

namespace App\View\Components\Dashboard\Users\Support\Ticket;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class All extends Component
{
    public $tickets;
    public $pages;
    /**
     * Create a new component instance.
     */
    public function __construct($tickets, $pages)
    {
        $this->tickets = $tickets;
        $this->pages = $pages;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.users.support.ticket.all');
    }

    public function shortMessage($message) {
        return substr($message, 0, 100) . "...";
    }
}
