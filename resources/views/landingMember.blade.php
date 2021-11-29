<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Store</title>
    <link rel="stylesheet" href= {{ asset('css/bootstrap.min.css') }}>
</head>
<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
        <div class="container-fluid">
            <a href="#" class="navbar-brand align-center">Book Store</a>
            <div class="justify-content-end align-center">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <span class="text-white">View Cart</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <span class="text-white">View Transaction History</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle px-3" href="#" id="navbarAccLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="text-white">Hello, Member</span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarAccLink">
                            <li><a href="#" class="dropdown-item">Change<br>Password</a></li>
                            <li><a href="#" class="dropdown-item">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- content --}}
    <div class="container-md">
        @yield('content')

    </div>

    {{-- footer --}}
    <nav class="navbar navbar-dark bg-primary fixed-bottom">
        <div class="container-fluid text-white">
            <p>
                @php
                    echo "Current Date and Time: " . date('l') . ", " . date('m-d-Y');
                @endphp
            </p>
        </div>
    </nav>

    
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>