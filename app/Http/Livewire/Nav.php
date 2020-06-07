<?php

namespace App\Http\Livewire;

use Illuminate\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

class Nav extends Component
{
    /**
     * go to home.
     *
     * @return RedirectResponse
     * @throws BindingResolutionException
     * @throws RouteNotFoundException
     */
    public function home()
    {
        return redirect()->route('home');
    }

    /**
     * go to tweets.
     *
     * @return RedirectResponse
     * @throws BindingResolutionException
     * @throws RouteNotFoundException
     */
    public function tweets()
    {
        return redirect()->route('tweets.index');
    }

    /**
     * render.
     *
     * @return View|Factory
     * @throws BindingResolutionException
     */
    public function render()
    {
        return view('livewire.nav');
    }
}
