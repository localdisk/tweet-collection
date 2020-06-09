<div class="container">
  <div class="field">

    <label for="url" class="label">Tweet URL</label>
    <p class="control">
      <input wire:model.debounce.500ms="url" wire:keydown.enter="viewTweet" type="text" name="url" id="url" class="input">
    </p>

    @error('url')
    <p class="help is-danger">{{ $message }}</p>
    @enderror

    @error('error')
    <p class="help is-danger">{{ $message }}</p>
    @enderror

    {{-- oembed --}}
    <div class="columns is-centered oembed" style="@if(empty($oembed)) display:none @endif">
      <div class="column is-half">

        {{-- add button --}}
        <div class="field has-addons">
          <div class="control is-expanded">
            <livewire:tag />
          </div>
          <div class="control">
            <button wire:click="addLike" class="button is-primary">お気に入りに追加</button>
          </div>
        </div>

        {!! $oembed !!}

      </div>
    </div>

  </div>
</div>

{{-- <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> --}}

<script>
  document.addEventListener("livewire:load", function(event) {
    window.livewire.hook('afterDomUpdate', () => {
      twttr.widgets.load();
    });
  });

</script>
