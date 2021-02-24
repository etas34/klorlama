<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;

class AdminApp extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    /**
     * The alert title.
     *
     * @var string
     */
    public $title;

    public function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.layouts.admin-app');
    }
}
