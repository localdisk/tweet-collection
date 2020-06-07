<div wire:ignore>
  <input type="text" id="tagify" class="input" placeholder="タグ">
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify@3.10.2/dist/tagify.min.js"></script>
@endpush

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify@3.10.2/dist/tagify.css">
@endpush


<script>
  function tagChange(event) {
    // const tags = document.getElementById('tags')
    @this.call('setTags', event.target.value)
  }

  document.addEventListener("livewire:load", function(event) {
    // const tags = document.getElementById('tags')
    const tagField = document.getElementById("tagify")
    tagify = new Tagify(tagField)
    tagField.addEventListener("change", tagChange)
  });

</script>
