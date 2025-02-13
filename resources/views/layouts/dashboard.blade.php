<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StriveForA+</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/publicapp.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('layouts.header') <!-- Include the header -->
    <div class="container-fluid">
            <div class="row">
            <!-- Navigation Menu -->
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('profile.edit', Auth::user()->id) }}">
                                My Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Teaching                                   
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Administrative
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Body -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <table class="table table-borderless">
    <tr>
        <td colspan="2">
            <h1 class="h2">Welcome to Tutor Dashboard</h1> 
        </td>
    </tr>
    <tr>
        <td>
            <p>Hello, {{ Auth::user()->name }}! You are logged in.
            <a href="{{ route('logout') }}" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form></p>
        </td>
    </tr>
</table>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Taught Subjects</h5>
                                <p class="card-text">2</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Active Class</h5>
                                <p class="card-text">4</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Completed Class</h5>
                                <p class="card-text">3</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Students</h5>
                                <p class="card-text">25</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Classes</h5>
                                <p class="card-text">10</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">Posting</h5>                              
                            <a class="nav-link active" href="{{ route('postings.user', Auth::user()->id) }}">
                                Details about postings
                            </a>                               
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    @include('layouts.footer') <!-- Include the footer -->
</body>
</html>
