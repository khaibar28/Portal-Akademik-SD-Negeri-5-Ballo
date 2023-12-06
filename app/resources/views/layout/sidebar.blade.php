<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if(Route::is('home'))
    <title>Home</title>
    @endif
    @if(Route::is('rekap') || Route::is('srekap') || Route::is('editrekap') || Route::is('submitrekap') || Route::is('rekap.store'))
    <title>Rekap Nilai</title>
    @endif
    @if(Route::is('setting') || Route::is('akun') || Route::is('kelas'))
    <title>Setting</title>
    @endif
    @if(Route::is('stugas') || Route::is('tugas') || Route::is('addTugas') || Route::is('submittugas') || Route::is('edittugas'))
    <title>Info Tugas</title>
    @endif
    @if(Route::is('nilai') || Route::is('submitnilai'))
    <title>Nilai Akhir</title>
    @endif
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
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
          @if(Route::is('home'))
            <li class="list-group-item">Homepage</li>
            |
            <li class="list-group-item" style="color: #3182FB">Dashboard</li>
          @endif
          @if(Route::is('rekap') || Route::is('srekap') || Route::is('editrekap') || Route::is('submitrekap') || Route::is('rekap.store'))
            <li class="list-group-item">Rekap Nilai</li>
            |
            <li class="list-group-item" style="color: #3182FB">Value Recap</li>
          @endif
          @if(Route::is('setting'))
            <li class="list-group-item">Pengaturan</li>
            |
            <li class="list-group-item" style="color: #3182FB">Setting</li>
          @endif
          @if(Route::is('akun'))
            <li class="list-group-item">Tambahkan Akun</li>
            |
            <li class="list-group-item" style="color: #3182FB">Add Account</li>
          @endif
          @if(Route::is('kelas'))
            <li class="list-group-item">Tambahkan Data</li>
            |
            <li class="list-group-item" style="color: #3182FB">Add Data</li>
          @endif
          @if(Route::is('stugas') || Route::is('tugas') || Route::is('submittugas'))
            <li class="list-group-item">Info Tugas</li>
            |
            <li class="list-group-item" style="color: #3182FB">Task Info</li>
          @endif
          @if(Route::is('addTugas'))
            <li class="list-group-item">Tambah Tugas</li>
            |
            <li class="list-group-item" style="color: #3182FB">Add Task</li>
          @endif
          @if(Route::is('edittugas'))
            <li class="list-group-item">Edit Data</li>
            |
            <li class="list-group-item" style="color: #3182FB">Task Info</li>
          @endif
          @if(Route::is('nilai') || Route::is('submitnilai'))
            <li class="list-group-item">Nilai Akhir</li>
            |
            <li class="list-group-item" style="color: #3182FB">Final Score</li>
          @endif
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
          <a href="{{ route('home') }}" class="btn">
            <img src="{{ asset('img/sidebar/home.svg') }}" alt=""><p>Homepage</p></a>
        </li>
        <li class="list-group-item">
          @canany(['admin', 'teacher'])
          <a href="{{ route('rekap') }}" class="btn">
            <img src="{{ asset('img/sidebar/hat.svg') }}" alt=""><p>Rekap Nilai </p></a>
          @endcan
          @can('student')
          <a href="{{ route('srekap') }}" class="btn">
            <img src="{{ asset('img/sidebar/hat.svg') }}" alt=""><p>Rekap Nilai </p></a>
          @endcan
        </li>
        <li li class="list-group-item">
          @canany(['admin', 'teacher'])
          <a href="{{ route('tugas') }}" class="btn">
            <img src="{{ asset('img/sidebar/info.svg') }}" alt=""><p>Info Tugas</p></a>
          </a>
          @endcan  
          @can('student')
          <a href="{{ route('stugas') }}" class="btn">
            <img src="{{ asset('img/sidebar/info.svg') }}" alt=""><p>Info Tugas</p></a>
          </a>
          @endcan
        </li>
        <li class="list-group-item">
          @canany(['admin', 'teacher'])
          <a href="{{ route('nilai') }}" class="btn">
            <img src="{{ asset('img/sidebar/book.svg') }}" alt=""><p>Nilai Akhir</p></a>
          @endcan
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
                    <img src="{{ asset('img/user.svg') }}" alt="" style="border-radius: 50%; width: 40px; height: 40px"><span class="ms-3">{{ auth()->user()->name }}</span>
                    @can('admin')
                    <a href="{{ route('setting') }}"><img src="{{ asset('img/sidebar/setting.svg') }}" alt=""></a>
                    @endcan
                </li>
      </div>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>    
</body>
</html>