<div class="container">

  <div class="columns is-centered">
    <div class="column is-half">
      @foreach ($tweets as $tweet)
      <div class="oembed">
        {!! $tweet->html !!}
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
