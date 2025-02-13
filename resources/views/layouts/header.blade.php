<!-- resources/views/layouts/header.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Strive For A+</title>
    <style>
        header {
            color: #ffffff; /* White font color */
            padding: 20px;
            text-align: center; color:#2c3e50;
            background-image: url('/storage/images/header-background.jpg');
            background-size: cover;
            background-position: center;
            height: 200px;
        }
    </style>
</head>
<body>
    <header>
    </header>
    <h1>
    <nav>
    @if (!request()->routeIs('dashboard'))
    <div class="postings-container">
    <p>Empowering Excellence in Education @StriveForA+.com</p>
        <a class="nav-link" href="{{ url('/') }}">| Home |</a>
        <a class="nav-link" href="{{ route('login') }}">| Login |</a>
        <a class="nav-link" href="{{ route('register') }}">| Register |</a>        
    </div>
    @endif
    </nav>
    </h1>
</body>
</html>


