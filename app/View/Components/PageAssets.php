<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageAssets extends Component
{
    public ?string $css;
    public ?string $js;

    public function __construct(?string $css = null, ?string $js = null)
    {
        $this->css = $css;
        $this->js = $js;
    }

    public function render()
    {
        return view('components.page-assets');
    }
}
