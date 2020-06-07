<div class="container">

  <div class="columns is-centered">
    <div class="column is-half">

      <h3 class="is-size-4">お気に入りの Tweet</h3>

      @foreach ($days as $key=>$value)

        <div class="divider">
          {{ $key }}
        </div>

        @foreach ($value as $tweet)
          <div class="oembed">
            {!! $tweet->html !!}
          </div>
        @endforeach

        <div class="tags">
          @foreach ($tweet->tags as $tag)
            <a class="tag is-info is-link">
              {{ $tag->name }}
            </a>
          @endforeach
      </div>
      @endforeach
    </div>
  </div>

</div>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

<script>
  document.addEventListener("livewire:load", function(event) {
    window.livewire.hook('afterDomUpdate', () => {
      twttr.widgets.load();
    });
  });
</script>
