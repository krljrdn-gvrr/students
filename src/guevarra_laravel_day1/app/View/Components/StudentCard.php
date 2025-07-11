<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StudentCard extends Component
{
    /**
     * Create a new component instance.
     */
    public $name;
    public $course;
    public $viewButtonColor;
    public $editButtonColor;

    public function __construct($name, $course, $viewButtonColor = 'success', $editButtonColor = 'warning')
    {
        $this->name = $name;
        $this->course = $course;
        $this->viewButtonColor = $viewButtonColor;
        $this->editButtonColor = $editButtonColor;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.student-card');
    }
}
