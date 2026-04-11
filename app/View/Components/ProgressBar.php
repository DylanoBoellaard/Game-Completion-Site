<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProgressBar extends Component
{

    public $label;
    public $value;
    public $total;
    public $percentage;
    /**
     * Create a new component instance.
     */
    public function __construct($label = 'Progress', $value = null, $total = null, $percentage = 0)
    {
        $this->label = $label;
        $this->value = $value;
        $this->total = $total;
        $this->percentage = $percentage;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.progress-bar');
    }
}
