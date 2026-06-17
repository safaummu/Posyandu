<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Balita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark text-center">
                    <h4 class="mb-0">✏️ Edit Data Balita</h4>
                </div>
                <div class="card-body p-4">

                    <form method="POST" action="/balita/update/{{ $edit->id }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Balita</label>
                            <input type="text" name="nama" value="{{ $edit->nama }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" value="{{ $edit->tgl_lahir }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Umur (Bulan)</label>
                            <input type="number" name="umur" value="{{ $edit->umur }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Jenis Kelamin</label>
                            <select name="jk" class="form-control" required>
                                <option value="Laki-laki" {{ $edit->jk == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ $edit->jk == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Orang Tua</label>
                            <input type="text" name="orang_tua" value="{{ $edit->orang_tua }}" class="form-control" required>
                        </div>

                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label fw-bold">Berat (kg)</label>
                                <input type="number" name="berat" step="0.1" value="{{ $edit->berat }}" class="form-control" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label fw-bold">Tinggi (cm)</label>
                                <input type="number" name="tinggi" value="{{ $edit->tinggi }}" class="form-control" required>
                            </div>
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-warning fw-bold">Update Data</button>
                            <a href="/balita" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>