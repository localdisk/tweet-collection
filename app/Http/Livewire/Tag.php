<?php

namespace App\Http\Livewire;

use Illuminate\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Container\BindingResolutionException;
use Livewire\Component;

class Tag extends Component
{
    /** @var string */
    public $tags = '';

    /**
     * set tags.
     *
     * @param string $tags
     * @return void
     */
    public function setTags(string $tags): void
    {
        $tagArray = collect(json_decode($tags))->pluck('value');
        $this->emitUp('setTags', $tagArray);
    }

    /**
     * render.
     *
     * @return View|Factory
     * @throws BindingResolutionException
     */
    public function render()
    {
        return view('livewire.tag');
    }
}
