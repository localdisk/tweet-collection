<?php

namespace App\Http\Livewire;

use Abraham\TwitterOAuth\TwitterOAuth;
use App\Models\Tweet;
use App\Rules\TwitterUrl;
use Illuminate\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\Redirector;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Throwable;

class UrlInput extends Component
{
    /** @var string */
    public string $url = '';

    /** @var string */
    public string $oembed = '';

    /** @var string */
    public string $tags = '';

    /** @var string */
    private const OEMBED_URL = 'https://publish.twitter.com/oembed?url=';

    /**
     * view tweet.
     *
     * @return void
     * @throws Throwable
     * @throws BindingResolutionException
     */
    public function viewTweet(): void
    {
        $this->validate(['url' => [
            'required', 'url', new TwitterUrl,
        ]]);

        $oembedUrl = self::OEMBED_URL . $this->url;

        try {
            $response = Http::get($oembedUrl);

            if ($response->failed()) {
                $this->addError('error', 'tweetを取得できませんでした');
                $this->oembed = '';
            } else {
                $json = $response->json();
                $this->oembed = $json['html'];
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * add like.
     *
     * @return Redirector
     * @throws BindingResolutionException
     * @throws RouteNotFoundException
     */
    public function addLike(): Redirector
    {
        // TODO キュー経由でDBへ
        $twitter = app(TwitterOAuth::class);
        $tweetId = $this->getTweetId($this->url);
        $result = $twitter->get('/statuses/show', ['id' => $tweetId]);

        Tweet::create([
            'user_id' => 1,
            'html' => $this->oembed,
            'text' => $result->text,
            'url' => $this->url,
        ]);

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
        return view('livewire.url-input', [
            'oembed' => $this->oembed,
        ]);
    }

    /**
     * get tweet id.
     *
     * @param string $url
     * @return string
     */
    private function getTweetId(string $url): string
    {
        preg_match('/https:\/\/twitter.com\/[a-zA-z0-9_-]+\/status\/([0-9]+)/', $url, $matches);

        return $matches[1];
    }
}
