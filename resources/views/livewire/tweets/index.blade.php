<div class="container">

  <div class="columns is-centered">
    <div class="column is-half">

      <h3 class="is-size-4">お気に入りの Tweet</h3>

      @foreach ($days as $key => $values)

        <div class="divider">
          {{ $key }}
        </div>

        @foreach ($values as $tweet)
          <div class="oembed">
            {!! $tweet->html !!}
          </div>
          <div class="tags">

            @foreach ($tweet->tags as $tag)
              <a class="tag is-info is-link">
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

    @if($message)
    window.livewire.emit('toast', '{{ $message['type'] }}', '{{ $message['message'] }}')
    @endif

});
</script>
