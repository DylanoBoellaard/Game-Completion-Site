<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardGameDetails extends Component
{
    public $title;
    public $description;
    public $status;
    public $playtime;
    public $userNotes;
    public $percentage;

    public function __construct($title, $description, $status, $playtime, $userNotes, $percentage)
    {
        $this->title = $title;
        $this->description = $description;
        $this->status = $status;
        $this->playtime = $playtime;
        $this->userNotes = $userNotes;
        $this->percentage = $percentage;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-game-details');
    }
}
