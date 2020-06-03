require("./bootstrap");

import Tagify from '@yaireo/tagify'

document.addEventListener("livewire:load", function(event) {
  window.livewire.hook('afterDomUpdate', () => {
    new Tagify(document.getElementById('tags'));
  });
});
