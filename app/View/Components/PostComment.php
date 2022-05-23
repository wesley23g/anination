<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostComment extends Component
{
    public function render(): View
    {
        return view('components.post-comment');
    }
}
