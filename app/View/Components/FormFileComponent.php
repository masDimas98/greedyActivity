<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormFileComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public string $label;
    public string $name;
    public bool $required;
    public string $value;
    public string $type;

    public function __construct($label, $name, $required, $value, $type)
    {
        $this->label = $label;
        $this->name = $name;
        $this->required = $required;
        $this->value = $value;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-file-component');
    }
}
