<?php

namespace App\View\Components\Dashboard\Users\Support\Message;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TicketMessages extends Component
{
    public $pages;
    public $messages; 
    public $ticket; 
    /**
     * Create a new component instance.
     */
    public function __construct($pages, $messages, $ticket)
    {
        $this->messages = $messages;
        $this->ticket = $ticket;
        $this->pages = $pages;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.users.support.message.ticket-messages');
    }
}
