<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use Illuminate\View\View;
use Illuminate\Contracts\View\Factory;
use InvalidArgumentException;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Tweets extends Component
{
    use WithPagination;

    /** @var array */
    public $message = [];

    /**
     * mount.
     *
     * @return void
     * @throws BindingResolutionException
     */
    public function mount()
    {
        $this->message = [];
        if (session()->has('toast')) {
            $this->message = session()->pull('toast');
        }
    }

    public function destroy(int $id)
    {
        DB::transaction(function () use ($id) {
            $tweet = Tweet::find($id);
            $tweet->tags()->detach();
            $tweet->delete();

            $this->emit('toast', 'is-success', 'tweetを削除しました');
        });
    }

    /**
     * render.
     *
     * @return View|Factory
     * @throws InvalidArgumentException
     * @throws BindingResolutionException
     */
    public function render()
    {
        $tweets = Tweet::where('user_id', 1)->with('tags')->latest()->paginate();
        $days = $tweets->groupBy(fn ($tweet) => $tweet->created_at->format('Y-m-d'));

        return view('livewire.tweets.index', ['days' => $days, 'tweets' => $tweets]);
    }
}
