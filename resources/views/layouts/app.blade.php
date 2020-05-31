<!DOCTYPE html>
<html class="has-navbar-fixed-top has-spaced-navbar-fixed-top">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hello Bulma!</title>
  <livewire:styles>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>
  <livewire:nav>
    @yield('content')
    @livewireScripts
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
