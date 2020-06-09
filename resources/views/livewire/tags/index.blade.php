@section('title')
    List({{ $tag }}) - Tweets Collection
@endsection
<div class="container">

  <div class="columns is-centered">
    <div class="column is-half">

      <h3 class="is-size-4">お気に入りのTag({{ $tag }})</h3>

      @foreach ($days as $key => $values)

        <div class="divider">
          {{ $key }}
        </div>

        @foreach ($values as $tweet)

          <div class="columns">
            <div class="column">
              <div class="oembed">
                {!! $tweet->html !!}
              </div>
            </div>
            <div class="column">
              <div class="buttons">
                <button class="button is-danger" wire:click="destroy({{ $tweet->id }})">削除</button>
              </div>
            </div>
          </div>

          <div class="tags">
            @foreach ($tweet->tags as $tag)
            <a class="tag is-info is-link" wire:click="moveTags('{{ $tag->name }}')">
                #{{ $tag->name }}
              </a>
            @endforeach
          </div>

        @endforeach

      @endforeach

      {{ $tweets->links('partials.pagination-links') }}
    </div>
  </div>
</div>

<script data-turbolinks-eval="false">

  document.addEventListener("livewire:load", function(event) {
    window.livewire.hook('afterDomUpdate', () => {
      twttr.widgets.load();
    });
});
</script>
