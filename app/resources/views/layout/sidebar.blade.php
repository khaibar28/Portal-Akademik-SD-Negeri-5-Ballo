<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    @yield('css')
</head>
<body>
    <nav class="navbar fixed-top ">
    <div class="nav">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="title">
            <li class="list-group-item">Homepage</li>
            |
            <li class="list-group-item" style="color: #3182FB">Dashboard</li>
        </div>
    </div>
</nav>

@yield('content')

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <img src="{{ asset('img/sidebar/edu.svg') }}" alt="" style="color: white">
      <h2 style="color: white;" class="p-2">Edu</h2>
      <img src="{{ asset('img/sidebar/plus.svg') }}" alt="">
    </div>
        <div class="offcanvas-body">
            <div>
          <div class="border"></div>
        <li class="list-group-item">
          <a href="" class="btn">
            <img src="{{ asset('img/sidebar/home.svg') }}" alt=""><p>Homepage</p></a>
        </li>
        <li class="list-group-item">
          <a href="" class="btn">
            <img src="{{ asset('img/sidebar/hat.svg') }}" alt=""><p>Rekap Nilai </p></a>
        </li>
        <li li class="list-group-item">
          <a href="" class="btn">
            <img src="{{ asset('img/sidebar/info.svg') }}" alt=""><p>Info Tugas</p></a>
          </a>
        </li>
        <li class="list-group-item">
          <a href="" class="btn">
            <img src="{{ asset('img/sidebar/book.svg') }}" alt=""><p>Nilai Akhir</p></a>
        </li>
    </div>
    <div class="footer">
        <li class="list-group-item">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                    <button type="submit" class="btn">
                        <img src="{{ asset('img/sidebar/logout.svg') }}" alt=""><p>Logout</p></a>
                    </button>
            </form>
                </li>
                <div class="border"></div>
                <li class="list-group-item">
                    <img src="{{ asset('img/img.jpeg') }}" alt="" style="border-radius: 50%; width: 40px; height: 40px"><span class="ms-3">User</span>
                </li>
      </div>
    </div>
</body>
</html>