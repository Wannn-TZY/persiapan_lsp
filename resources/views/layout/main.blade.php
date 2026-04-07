<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LSP-ERAPOT</title>
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
</head>
<body>
    <div class = "header">
        <img class = "badge" src="{{ asset('assets/img/smkn1cibinong.png') }}" alt="">
        <img class ="banner" src="{{ asset('assets/img/smkhebat.jpg') }}" alt="">
    </div>
    <div class="sidebar">
    @if (session('role') == 'Walas')
        <a href="/nilai-rapot/create">Input Nilai</a>
        <a href="/nilai-rapot/index">Rekap Nilai</a>
    @endif

    @if (session('role') == 'Siswa')
        <a href="/nilai-rapot/show/{{ session('id') }}">Lihat Nilai Saya</a>
    @endif

    <a href="/logout">Logout</a>
</div>

    <div class = "container">
        @yield('name')
        <div class = "greet">
            <h3 class = "">halo {{ session('nama') }}</h3>
        </div>
    </div>
    <div style="text-align: center;">
        @yield('content')
    </div>
</body>
</html>
