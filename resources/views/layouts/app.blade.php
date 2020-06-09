<!DOCTYPE html>
<html class="has-navbar-fixed-top has-spaced-navbar-fixed-top">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Home - Tweet Collection')</title>

  <livewire:styles />
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  @stack('styles')

  <livewire:scripts />
  <script src="{{ mix('js/app.js') }}" defer></script>
  @stack('scripts')
</head>

<body>
  <livewire:nav />
  @yield('content')

  {{-- <x-head-tag title="Tweet Collection" /> --}}

  @include('partials.toaster')
</body>

</html>
