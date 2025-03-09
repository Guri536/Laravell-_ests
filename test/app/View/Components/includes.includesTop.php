<?php

namespace App\View\Components;

use Closure;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class includes.includesTop extends Component
{

    public function boot(){
        Blade::component('incT', Alert::class);
    }
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.includes.includes-top');
    }
}
