<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Brand;

class Clients extends Component
{

    private $clients;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->clients = Brand::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.clients')->with('clients', $this->clients);
    }
}
