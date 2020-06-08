<?php

namespace App\Http\Livewire;

use Abraham\TwitterOAuth\TwitterOAuth;
use App\Models\Tag;
use App\Models\Tweet;
use App\Rules\TwitterUrl;
use Illuminate\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Throwable;

class UrlInput extends Component
{
    /** @var string */
    public string $url = '';

    /** @var string */
    public string $oembed = '';

    /** @var array */
    public array $tags = [];

    /** @var array */
    protected $listeners = ['setTags'];

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

            if ($response->successful()) {
                $json = $response->json();
                $this->oembed = $json['html'];
            } else {
                $this->addError('error', 'tweetを取得できませんでした');
                $this->oembed = '';
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * set tags.
     *
     * @param array $tags
     * @return void
     */
    public function setTags(array $tags): void
    {
        $this->tags = $tags;
    }

    /**
     * add like.
     *
     * @return RedirectResponse
     * @throws BindingResolutionException
     * @throws Throwable
     * @throws RouteNotFoundException
     */
    public function addLike()
    {
        // TODO キュー経由でDBへ
        $twitter = app(TwitterOAuth::class);
        $tweetId = $this->getTweetId($this->url);
        $result = $twitter->get('/statuses/show', ['id' => $tweetId]);

        DB::transaction(function () use ($result) {
            $tweet = Tweet::create([
                'user_id' => 1,
                'html' => $this->oembed,
                'text' => $result->text,
                'url' => $this->url,
            ]);

            foreach ($this->tags as $tag) {
                $tweet->tags()->attach(Tag::firstOrCreate([
                    'name' => $tag,
                    'slug' => $tag,
                ]));
            }

            session()->put('toast', [
                'type' => 'info',
                'text' => 'ツイートをお気に入りに追加しました',
                'show' => true,
            ]);
        });

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
