<?php

namespace App\Http\Livewire;

use Illuminate\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Container\BindingResolutionException;
use Livewire\Component;

class Toast extends Component
{
    /** @var string */
    public string $text = '';

    /** @var string */
    public string $type = '';

    /** @var bool */
    public bool $show = false;

    /**
     * render.
     *
     * @return View|Factory
     * @throws BindingResolutionException
     */
    public function render()
    {
        return view('livewire.toast');
    }
}
