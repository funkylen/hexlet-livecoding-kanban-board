<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AddCard extends Component
{
    public function __construct(
        private readonly int $columnId,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.add-card', [
            'columnId' => $this->columnId,
        ]);
    }
}
