<?php

namespace App\View\Components\Dashboard\Aibopay\Transactions\AddMoney;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Transfer extends Component
{
    public $account;
    /**
     * Create a new component instance.
     */
    public function __construct($account)
    {
        $this->account = $account;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.aibopay.transactions.add-money.transfer');
    }
}
