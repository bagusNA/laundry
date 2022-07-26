<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laundry App</title>

  @vite('node_modules/bootstrap/dist/css/bootstrap.min.css')
  {{-- Inertia --}}
  @vite('resources/js/app.js')
  @inertiaHead
</head>
<body>
  @inertia
  @vite('node_modules/bootstrap/dist/js/bootstrap.min.js')
</body>
</html>