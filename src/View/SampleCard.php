<?php

namespace Dattrink\Adminlte3\View;

use Illuminate\View\Component;

class SampleCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('adminlte3::components.sample-card');
    }
}
