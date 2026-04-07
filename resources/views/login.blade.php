<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="{{ asset('assets/js/script.js') }}" defer></script>

</head>
<body>
    <div class = "container">
        <div class = "logo">
            <img src="{{ asset('assets/img/smkn1cibinong.png') }}" alt = "logo">
        </div>
        <div class = "form-container">
            <div class = "tab">
                <button class = "tablinks active" onclick = "openTab(event, 'Student')">Login Siswa</button>
                <button class = "tablinks" onclick = "openTab(event, 'Teacher')">Login Walas</button>
            </div>

            <div id = "Student" class = "tabcontent" style = "display: block;">
                <h2>Login Siswa</h2>
                @if(session('loginError'))
                    <h3 style="color:red">{{ session('loginError') }}</h3>
                @endif
                <form action = "/login-siswa" method = "POST">
                    @csrf
                    <label>NIS</label>
                    <input type = "text" name = "txt_nis" placeholder = "masukan nis" required>

                    <label>PASSWORD</label>
                    <input type = "password" name = "txt_password" placeholder = "masukan password" required>

                    <button type = "submit">LOGIN</button>
                </form>
            </div>
            <div id = "Teacher" class = "tabcontent" style = "display:none;">
                <h2>Login Guru</h2>
                @if(session('loginError'))
                    <h3 style="color:red">{{ session('loginError') }}</h3>
                @endif
                <form action = "/login-walas" method = "POST">
                    @csrf
                    <label>NIG</label>
                    <input type = "text" name = "txt_nig" placeholder = "masukan nig" required>

                    <label>PASSWORD</label>
                    <input type = "password" name = "txt_password" placeholder = "masukan password" required>

                    <button type = "submit">LOGIN</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
