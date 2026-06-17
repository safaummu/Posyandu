@extends('layout.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">➕ Tambah Data Balita</h4>
        </div>
        <div class="card-body">
            
            <form action="/balita/store" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label class="form-label font-weight-bold">Nama Balita</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan nama balita" required>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label font-weight-bold">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label font-weight-bold">Umur (Bulan)</label>
                    <input type="number" name="umur" class="form-control" placeholder="Contoh: 6" required>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label font-weight-bold">Jenis Kelamin</label>
                    <select name="jk" class="form-control" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label font-weight-bold">Nama Orang Tua</label>
                    <input type="text" name="orang_tua" class="form-control" placeholder="Masukkan nama orang tua" required>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group mb-3">
                        <label class="form-label font-weight-bold">Berat Badan (kg)</label>
                        <input type="number" name="berat" step="0.1" class="form-control" placeholder="Contoh: 7.5" required>
                    </div>
                    <div class="col-md-6 form-group mb-3">
                        <label class="form-label font-weight-bold">Tinggi Badan (cm)</label>
                        <input type="number" name="tinggi" class="form-control" placeholder="Contoh: 65" required>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success px-4">💾 Simpan Data</button>
                    <a href="/balita" class="btn btn-secondary px-4">Kembali</a>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection