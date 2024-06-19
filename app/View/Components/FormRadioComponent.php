<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormRadioComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public string $label;
    public string $name;
    public array $item;
    public string $required;
    public string $value;

    public function __construct($label, $name, $item, $required, $value)
    {
        $this->label = $label;
        $this->name = $name;
        $this->item = $item;
        $this->required = $required;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-radio-component');
    }
}
