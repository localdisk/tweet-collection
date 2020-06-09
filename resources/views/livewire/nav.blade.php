<nav class="navbar is-dark is-fixed-top has-shadow " role="navigation" aria-label="main navigation">
  <div class="container">
    <div class="navbar-brand">
      <a class="navbar-item navbar-title" wire:click.prevent="home">
        Tweet Collection
      </a>

      {{-- burger --}}
      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    {{-- menu --}}
    <div class="navbar-menu">
      {{-- start --}}
      <div class="navbar-start">
        <a wire:click.prevent="home" class="navbar-item">Home</a>
        <a wire:click.prevent="tweets" class="navbar-item">Tweet</a>
      </div>
    </div>

  </div>
</nav>
