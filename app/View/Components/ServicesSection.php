<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Option;

class ServicesSection extends Component
{

    private $services;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->services = Option::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.services-section')->with('services', $this->services);
    }
}
