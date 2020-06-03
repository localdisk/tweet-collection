<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use Livewire\Component;

class Tweets extends Component
{
    public function render()
    {
        $tweets = Tweet::where('user_id', 1)->get();

        return view('livewire.tweets.index', ['tweets' => $tweets]);
    }
}
