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

    public function mount()
    {
        if (session()->has('toast')) {
            $this->text = session()->get('toast.text');
            $this->type = session()->get('toast.type');
            $this->show = (bool) session()->get('toast.show');

            session()->forget('toast');
        }
    }

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
