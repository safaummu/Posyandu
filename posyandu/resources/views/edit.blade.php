<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h3>Edit Data Balita</h3>

    <form method="POST" action="/update/{{ $edit->id }}">
        @csrf

        <input name="nama" value="{{ $edit->nama }}" class="form-control mb-2">

        <input type="date" name="tgl_lahir" value="{{ $edit->tgl_lahir }}" class="form-control mb-2">

        <select name="jk" class="form-control mb-2">
            <option {{ $edit->jk == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option {{ $edit->jk == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>

        <input name="orang_tua" value="{{ $edit->orang_tua }}" class="form-control mb-2">

        <button class="btn btn-success">Update</button>
    </form>

</div>

</body>
</html>