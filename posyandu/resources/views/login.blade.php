<!DOCTYPE html>
<html>
<head>
    <title>Login Posyandu</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f2f4f7;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .box{
            width:350px;
            background:white;
            padding:25px;
            border-radius:10px;
            box-shadow:0 5px 20px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body>

<div class="box">

    <h4 class="text-center mb-3">Login Posyandu</h4>

    <!-- INI FORM LOGIN (YANG KAMU TANYA) -->
    <form method="POST" action="/login">
        @csrf

        <input type="email" name="email" class="form-control mb-2" placeholder="Email">

        <input type="password" name="password" class="form-control mb-2" placeholder="Password">

        <button class="btn btn-primary w-100">Login</button>
    </form>

</div>

</body>
</html>