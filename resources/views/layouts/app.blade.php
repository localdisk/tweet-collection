<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hello Bulma!</title>
  <livewire:styles>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>
  <section class="section">
    <div class="container">
      <h1 class="title">
        Hello World
      </h1>
      <p class="subtitle">
        My first website with <strong>Bulma</strong>!
      </p>
    </div>
    @yield('content')
  </section>
  @livewireScripts
  <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
