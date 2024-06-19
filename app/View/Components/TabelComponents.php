<?php

namespace App\View\Components;

use Illuminate\View\View;
use Illuminate\View\Component;

class TabelComponents extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $type,
        public string $message,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render(): View
    {
        return view('components.tabel');
    }
}
