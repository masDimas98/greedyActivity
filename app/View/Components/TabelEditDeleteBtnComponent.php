<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TabelEditDeleteBtnComponent extends Component
{

    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $edit;
    public $dell;

    public function __construct($url, $id)
    {
        $this->edit = route($url . '.edit', $id);
        $this->dell = route($url . '.destroy', $id);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tabel-edit-delete-btn-component');
    }
}
