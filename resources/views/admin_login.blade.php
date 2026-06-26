<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - SAMSAT DIY</title>
    <link rel="stylesheet" href="{{ asset('css/admin_login.css') }}">
</head>
<body>
    <div class="login-container">
        <a href="/" class="back-link">Kembali</a>

        <div class="login-box">
            <div class="logo-section">
                <div class="logo">
                    <div>SA<br>MSAT</div>
                </div>
                <h1>SAMSAT DIY</h1>
                <p>Platform Pajak Kendaraan Digital</p>
            </div>

            <!-- Login Tabs -->
            <div class="login-tabs">
                <button class="login-tab active" onclick="switchLogin('admin')">Admin Login</button>
            </div>

            <!-- Admin Login Form (Active) -->
            <div id="admin-login" class="login-content active">
                @if ($errors->any())
                    <div class="alert alert-error">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form action="{{ route('admin.login.process') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="admin-username">Username <span class="admin-badge">ADMIN</span></label>
                        <input type="text" id="admin-username" name="username" placeholder="Masukkan username admin" value="{{ old('username') }}" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="admin-password">Password</label>
                        <input type="password" id="admin-password" name="password" placeholder="Masukkan password admin" required>
                    </div>
                    <button type="submit" class="btn-login">Masuk sebagai Admin</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function switchLogin(type) {
            const userLogin = document.getElementById('user-login');
            const adminLogin = document.getElementById('admin-login');
            const tabs = document.querySelectorAll('.login-tab');

            if (type === 'user') {
                userLogin.classList.add('active');
                adminLogin.classList.remove('active');
                tabs[0].classList.add('active');
                tabs[1].classList.remove('active');
            } else {
                adminLogin.classList.add('active');
                userLogin.classList.remove('active');
                tabs[1].classList.add('active');
                tabs[0].classList.remove('active');
            }
        }
    </script>
</body>
</html>