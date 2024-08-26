<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- tailwind engine -->
  @vite(['resources/js/app.js', 'resources/css/app.css'])

  <!-- bootstrap icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <title>permanu aplication test</title>
</head>

<body class="relative overflow-x-hidden">
  @include('partials.jumbotron')
  @include('partials.navbar')
  <div class="mb-8">
    @yield('container')
  </div>
  @include('partials.footer')

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</body>

</html>