<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use Livewire\Component;

class Tweets extends Component
{
    public function render()
    {
        $tweets = Tweet::where('user_id', 1)->with('tags')->latest()->get();
        $days = $tweets->groupBy(fn ($tweet) => $tweet->created_at->format('Y-m-d'));

        return view('livewire.tweets.index', ['days' => $days]);
    }
}
