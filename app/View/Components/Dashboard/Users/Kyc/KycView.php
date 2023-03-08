<?php

namespace App\View\Components\Dashboard\Users\Kyc;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class KycView extends Component
{
    public $kyc;
    /**
     * Create a new component instance.
     */
    public function __construct($kyc)
    {
        $this->kyc = $kyc;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.users.kyc.kyc-view');
    }
}
