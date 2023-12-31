<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Column extends Component
{
    public function __construct(
        private readonly string $title,
        private readonly string $id,
    ) {
    }

    public function render(): View|Closure|string
    {
        return view('components.column', [
            'title' => $this->title,
            'id' => $this->id,
        ]);
    }
}
