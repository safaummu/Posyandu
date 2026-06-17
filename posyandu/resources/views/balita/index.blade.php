@extends('main')

@section('content')

<style>
.page-title {
    font-size: 22px;
    font-weight: bold;
    margin-bottom: 15px;
}

.card-box {
    background: #fff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    margin-bottom: 20px;
}

.input {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 8px;
}

.btn {
    padding: 10px 15px;
    background: #4a90e2;
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
}

.btn:hover {
    background: #357abd;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table th {
    background: #f2f2f2;
    padding: 10px;
}

table td {
    padding: 10px;
    border-bottom: 1px solid #eee;
}
</style>

<div class="page-title">Data Balita</div>

<div class="card-box">
<form action="/balita/store" method="POST">
    @csrf

    <label class="fw-bold mb-1">Nama Balita</label>
    <input class="input" type="text" name="nama" placeholder="Masukkan nama" required>

    <label class="fw-bold mb-1">Tanggal Lahir</label>
    <input class="input" type="date" name="tgl_lahir" required>

    <label class="fw-bold mb-1">Umur (bulan)</label>
    <input class="input" type="number" name="umur" placeholder="Masukkan umur" required>

    <label class="fw-bold mb-1">Jenis Kelamin</label>
    <select class="input" name="jk" required>
        <option value="">-- Pilih Jenis Kelamin --</option>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
    </select>

    <label class="fw-bold mb-1">Nama Orang Tua</label>
    <input class="input" type="text" name="orang_tua" placeholder="Masukkan nama orang tua" required>

    <label class="fw-bold mb-1">Berat Badan (kg)</label>
    <input class="input" type="number" name="berat" placeholder="Masukkan berat" step="0.1" required>

    <label class="fw-bold mb-1">Tinggi Badan (cm)</label>
    <input class="input" type="number" name="tinggi" placeholder="Masukkan tinggi" required>

    <button class="btn" type="submit">💾 Simpan Data</button>
</form>
</div>

<div class="card-box">
<table>
    <tr>
        <th>Nama</th>
        <th>Tanggal Lahir</th>
        <th>Orang Tua</th>
        <th>Umur</th>
        <th>Berat</th>
        <th>Tinggi</th>
        <th>JK</th>
        <th>Kategori</th>
    </tr>

    @foreach($balitas as $b)
    <tr>
        <td>{{ $b->nama }}</td>
        <td>{{ $b->tgl_lahir ?? '-' }}</td>
        <td>{{ $b->orang_tua ?? '-' }}</td>
        <td>{{ $b->umur }} bulan</td>
        <td>{{ $b->berat }} kg</td>
        <td>{{ $b->tinggi }} cm</td>
        <td>{{ $b->jk }}</td>

        <td>
            @if($b->berat < 7)
                🔴 Stunting
            @elseif($b->berat < 10)
                🟡 Kurang Gizi
            @else
                🟢 Normal
            @endif
        </td>
    </tr>
    @endforeach

</table>
</div>

@endsection