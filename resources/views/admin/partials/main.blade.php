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
  <!-- trix editor -->
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
  <style>
    body {
      font-family: Poppins;
    }

    trix-toolbar [data-trix-button-group="file-tools"] {
      display: none;
    }
  </style>
  <title>permanu aplication test</title>
</head>

<body>

  <div class="flex">
    <div class="relative w-[300px] min-h-[100vh] bg-sky-600 text-white">
      @include('admin.partials.sidebar')
    </div>
    <div class="flex-1">
      @yield('container')
    </div>
  </div>

  <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
</body>

</html>