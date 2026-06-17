<!DOCTYPE html>
<html lang="id">
<head>
    <title>Login Posyandu</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f2f4f7; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-card { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 300px; }
        h2 { color: #2c3e50; margin-bottom: 20px; text-align: center; margin-top:0;}
        input { width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #d6dbe1; border-radius: 8px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #4a90e2; color: white; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; }
        button:hover { background: #357abd; }
        .alert { color: red; font-size: 13px; margin-bottom: 10px; text-align: center; }
        .alert-success { color: green; font-size: 13px; margin-bottom: 10px; text-align: center; }
        .link { display: block; text-align: center; margin-top: 15px; color: #4a90e2; text-decoration: none; font-size: 14px;}
    </style>
</head>
<body>

<div class="login-card">
    <h2>🏥 Login Posyandu</h2>
    
    @if(session('error'))
        <div class="alert">{{ session('error') }}</div>
    @endif
    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <form action="/proses-login" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Masukkan Email" required>
        <input type="password" name="password" placeholder="Masukkan Password" required>
        <button type="submit">Masuk 🚪</button>
    </form>

    <a href="/register" class="link">Belum punya akun? Daftar di sini</a>
</div>

</body>
</html>