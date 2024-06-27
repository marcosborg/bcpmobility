<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Hero;

class HeroAnimated extends Component
{

    private $heros;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->heros = Hero::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.hero-animated')->with('heros', $this->heros);
    }
}
