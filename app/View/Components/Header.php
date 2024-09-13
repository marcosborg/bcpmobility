<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Menu;

class Header extends Component
{

    private $menus;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->menus = Menu::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header')->with('menus', $this->menus);
    }
}
