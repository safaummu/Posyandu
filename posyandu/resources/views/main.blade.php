<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Posyandu Pintar</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0;
            padding: 0;
            /* Ganti jadi warna Pink Susu / Soft Rose Pastel yang super lembut */
            background-color: #fff5f7; 
            display: flex;
            color: #4a5568;
        }

        .sidebar {
            width: 260px;
            background-color: #ebf8ff; /* Biru pastel super lembut */
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 25px;
            border-right: 1px solid #e2e8f0;
        }

        .sidebar h2 {
            text-align: center;
            font-size: 20px;
            font-weight: 700;
            color: #2b6cb0; /* Biru tua tenang */
            margin-bottom: 35px;
        }

        .sidebar a {
            padding: 14px 24px;
            text-decoration: none;
            font-size: 15px;
            font-weight: 500;
            color: #4a5568;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.2s ease;
            margin: 4px 12px;
            border-radius: 8px;
        }

        .sidebar a:hover {
            background-color: #fff5f5; /* Pink pastel super tipis */
            color: #e53e3e; /* Teks pink gelap */
        }

        .sidebar a.active {
            background-color: #bee3f8; /* Biru muda pastel */
            color: #2b6cb0;
            font-weight: 600;
        }

        .content {
            margin-left: 260px;
            padding: 40px;
            width: calc(100% - 260px);
            min-height: 100vh;
            box-sizing: border-box;
        }

        .top-navbar {
            background: #ffffff; /* Tetap putih bersih agar kontras */
            padding: 16px 24px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(229, 62, 114, 0.05); /* Shadow pink tipis */
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid #ffe3ec;
        }

        .card-box {
            background: #ffffff;
            padding: 30px;
            border-radius: 16px;
            border: 1px solid #ffe3ec;
            box-shadow: 0 4px 12px rgba(229, 62, 114, 0.03);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
            color: #2b6cb0;
        }

        .avatar {
            width: 35px;
            height: 35px;
            background: #fed7d7; /* Pink pastel */
            color: #9b2c2c;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 15px;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
        }

        th {
            background-color: #f7fafc;
            color: #4a5568;
            padding: 14px;
            font-weight: 600;
            text-align: left;
            font-size: 14px;
            border-bottom: 1px solid #e2e8f0;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #edf2f7;
            background-color: #ffffff;
            font-size: 14px;
            color: #4a5568;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover td {
            background-color: #f7fafc;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h2 style="font-size: 16px; padding: 0 10px; line-height: 1.4; margin-bottom: 15px;">
        🏥 PUSKESMAS SUKARAMI <br>
        <span style="font-size: 12px; font-weight: 500; color: #4a5568;">Palembang</span>
    </h2>

    <hr style="border: 0; height: 1px; background-color: #cbd5e0; margin: 0 20px 25px 20px;">

    <a href="/dashboard" class="{{ Request::is('dashboard') ? 'active' : '' }}">📊 Dashboard</a>
    <a href="/balita" class="{{ Request::is('balita*') ? 'active' : '' }}">🧸 Data Balita</a>
    <a href="/imunisasi" class="{{ Request::is('imunisasi*') ? 'active' : '' }}">💉 Daftar Imunisasi</a>
    <a href="/pengaturan" class="{{ Request::is('pengaturan') ? 'active' : '' }}">⚙️ Pengaturan</a>
    
    <a href="/logout" style="margin-top: 60px; color: #e53e3e; background: #fff5f5;" onclick="return confirm('Apakah Anda yakin ingin keluar?')">🚪 Keluar</a>
</div>

    <div class="content">
        
        <div class="top-navbar">
            <div style="font-weight: 600; color: #2b6cb0; font-size: 15px;">
                ✨ Sistem Informasi Posyandu & Imunisasi
            </div>
            <div class="user-profile">
                <div class="avatar">📍</div>
                <span style="font-size: 13px;">Puskesmas Sukarami</span>
            </div>
        </div>

        @yield('content')
        
    </div>

</body>
</html>