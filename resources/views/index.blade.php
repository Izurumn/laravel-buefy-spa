@php
$config = [
    'appName' => 'Nexus',
    'locale' => $locale = app()->getLocale(),

];
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="bg-black-themed">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="/images/favicon.png">
  <title>Nexus</title>
  <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ mix('dist/css/app.css') }}">
</head>
<body>
  <div id="app"></div>
  <script>
    window.config = @json($config);
  </script>
  <script src="{{ mix('dist/js/app.js') }}"></script>
</body>
</html>
