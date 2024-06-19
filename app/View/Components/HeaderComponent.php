<?php

namespace App\View\Components;

use Illuminate\View\Component;

class HeaderComponent extends Component
{

    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $breadscrumb;
    public $url;
    public $add_btn;
    public $title;

    public function __construct(array $breadscrumb, $url, $addbtn, $title)
    {
        $this->breadscrumb = $breadscrumb;
        $this->url = $url;
        $this->add_btn = $addbtn;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header-component');
    }
}
