<!DOCTYPE html>
<html class="has-navbar-fixed-top has-spaced-navbar-fixed-top">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hello Bulma!</title>
  <livewire:styles />
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  <script src="{{ mix('js/app.js') }}"></script>
  <livewire:scripts />
</head>

<body>
  <livewire:nav />
  @yield('content')
  @stack('scripts')
</body>

</html>
