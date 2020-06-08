<div wire:ignore>
  <input type="text" id="tagify" class="input" placeholder="タグ">
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify@3.10.2/dist/tagify.min.js" data-turbolinks-track="reload"></script>
@endpush

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify@3.10.2/dist/tagify.css" data-turbolinks-track="reload">
@endpush


<script>
  function tagChange(event) {
    @this.call('setTags', event.target.value)
  }

  document.addEventListener("livewire:load", function(event) {
    const tagField = document.getElementById("tagify")
    tagify = new Tagify(tagField)
    tagField.addEventListener("change", tagChange)
  });

</script>
