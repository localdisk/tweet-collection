<script src="https://unpkg.com/bulma-toast" data-turbolinks-eval="false"></script>
<script>
  window.livewire.on('toast', (type, message) => {
    bulmaToast.toast({
      message: message,
      type: type,
      dismissible: true,
      pauseOnHover: true
    })
})
</script>
