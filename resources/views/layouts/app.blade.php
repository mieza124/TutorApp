<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('StriveForA+', 'StriveForA+')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/publicapp.css') }}">
    <!-- Add your CSS and other assets here -->
</head>
<body>
    @include('layouts.header') <!-- Include the header -->
    
    <div class="container">
        @yield('content') <!-- Content will be injected here -->
    </div>
    
    @include('layouts.footer') <!-- Include the footer -->
    
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Add your scripts here -->
</body>
</html>