<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Icon extends Component
{
    public function __construct(
        public string $name,
        public string $class = 'w-6 h-6',
    ) {}

    public function render()
    {
        return view('components.icon');
    }
}