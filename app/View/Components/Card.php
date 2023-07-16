<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public function __construct(
        private readonly string $id,
        private readonly string $title,
        private readonly string $description,
    ) {
    }

    public function render(): View|Closure|string
    {
        return view('components.card', [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
        ]);
    }
}
