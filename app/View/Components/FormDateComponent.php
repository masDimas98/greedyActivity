<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormDateComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public string $label;
    public string $name;
    public string $placeholder;
    public bool $required;
    public string $value;

    public function __construct($label, $name, $placeholder, $required, $value)
    {
        $this->label = $label;
        $this->name = $name;
        $this->placeholder = $placeholder;
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
        return view('components.form-date-component');
    }
}
