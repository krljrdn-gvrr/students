<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Students Module - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      html, body {
        height: 100%;
      }
      body {
        display: flex;
        flex-direction: column;
      }
      main {
        flex: 1;
      }
    </style>
  </head>
  <body>

    @include('partials.header')

    <!-- Main -->
    <main class="container text-center my-5">
       @yield('content')
       @stack('name')
    </main>

    @include('partials.footer')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
