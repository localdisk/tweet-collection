<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Illuminate\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Tags extends Component
{
    /** @var Tag */
    private $tag;

    /**
     * mount.
     *
     * @param Tag $tag
     * @return void
     */
    public function mount(Tag $tag): void
    {
        $this->tag = $tag;
    }

    public function refresh(int $id)
    {
        $this->tag = Tag::find($id);
        $this->render();
    }

    /**
     * render.
     * @return View|Factory
     * @throws BindingResolutionException
     */
    public function render()
    {
        /** @var Collection */
        $tweets = $this->tag->tweets()->paginate();
        $days = $tweets->groupBy(fn ($tweet) => $tweet->created_at->format('Y-m-d'));

        return view('livewire.tags.index', [
            'tweets' => $tweets,
            'days' => $days,
            'tag' => $this->tag->name,
        ]);
    }
}
