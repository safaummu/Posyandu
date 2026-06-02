<!DOCTYPE html>
<html>
<head>
    <title>Posyandu App</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body { background:#f4f6f9; }

        .navbar {
            background:#ff8fab;
        }

        .navbar a {
            color:white !important;
            font-weight:500;
        }

        .card {
            border-radius:12px;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg px-3">
    <a class="navbar-brand text-white" href="/">Posyandu</a>

    <div class="navbar-nav">
        <a class="nav-link text-white" href="/">Dashboard</a>
        <a class="nav-link text-white" href="/statistik">Statistik</a>
        <a class="nav-link text-white" href="/laporan">Laporan</a>
        <a class="nav-link text-white" href="/grafik">Grafik</a>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

</body>
</html>