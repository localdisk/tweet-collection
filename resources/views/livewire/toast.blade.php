<div id="toast" class="toast @if($show) show @endif">
  <div class="notification is-{{ $type }}">{{ $text }}</div>
</div>

<style>
  .toast {
    visibility: hidden;
    width: 100%;
    z-index: 1;
    position: fixed;
    pointer-events: none;
    display: flex;
    flex-direction: column;
    padding: 4rem 15px 15px 15px;
    top: 0;
    left: 0;
    right: 1rem;
    text-align: center;
    align-items: flex-end;
  }

  .toast .notification {
    width: auto;
    pointer-events: auto;
    display: inline-flex;
    white-space: pre-wrap;
    opacity: 1;
  }

  .toast.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
  }

  @-webkit-keyframes fadein {
    from {
      bottom: 0;
      opacity: 0;
    }

    to {
      bottom: 30px;
      opacity: 1;
    }
  }

  @keyframes fadein {
    from {
      bottom: 0;
      opacity: 0;
    }

    to {
      bottom: 30px;
      opacity: 1;
    }
  }

  @-webkit-keyframes fadeout {
    from {
      bottom: 30px;
      opacity: 1;
    }

    to {
      bottom: 0;
      opacity: 0;
    }
  }

  @keyframes fadeout {
    from {
      bottom: 30px;
      opacity: 1;
    }

    to {
      bottom: 0;
      opacity: 0;
    }
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function () {

    const toast = document.getElementById('toast')

    setTimeout( () => {
      toast.classList.remove('show')
    }, 3000)

    // window.livewire.on('toast', (type, text, show) => {

    //   @this.set('type', type)
    //   @this.set('text', text)
    //   @this.set('show', show)

    // })
})
</script>
