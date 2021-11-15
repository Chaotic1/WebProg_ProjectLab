<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Store</title>
    <link rel="stylesheet" href={{ asset('css/bootstrap.min.css') }}>
</head>
    <{{-- Navbar --}}
    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
        <div class="container-fluid">
            <a href="#" class="navbar-brand align-center">Book Store</a>
            <div class="justify-content-end align-center">
                <ul class="navbar-nav ">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarManageLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Manage
                        </a>
                        <ul class="cropdown-menu" aria-labelledby="navbarManageLink">
                            <li><a href="#" class="dropdown-item">Book</a></li>
                            <li><a href="#" class="dropdown-item">Book</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <span class="text-white">Login</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>