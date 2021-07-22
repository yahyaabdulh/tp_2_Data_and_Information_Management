<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tugas Personal 2 || Yahya Abdul Hamid</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <h4>Tugas Personal 2</h4>
                <p class="author" style="font-size : 15px; text-align : center;">{{ Auth::user()->name }}
                    <span style="font-size : 10px;">({{ Auth::user()->email }})</span>
                </p>
            </div>
            <hr />
            <ul class="list-unstyled components">
                <li class="{{ request()->is('home') ? 'active' : ''}}">
                    <a href="{{ route('home') }}">Dashboard</a>
                </li>
                <li class="{{ request()->is('jabatan') ? 'active' : ''}}">
                    <a href="{{ route('jabatan.index') }}">Jabatan</a>
                </li>
                <li class="{{ request()->is('karyawan') ? 'active' : ''}}">
                    <a href="{{ route('karyawan.index') }}">Karyawan</a>
                </li>
            </ul>
            <hr />
            <ul class="list-unstyled CTAs">
                <li>
                    <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
                </li>
                <li>
                    <a href="https://yahyaabdulh.github.io" target=”_blank”>by <u style="font-size: 15px;">yahya abdul hamid</u> (2440090625)</a>
                </li>
            </ul>
        </nav>
        <div id="content">
            @yield('content')
        </div>
    </div>
</body>

</html>