@extends('main')

@section('content')

<style>
.container {
    padding: 20px;
}

.header {
    background: linear-gradient(135deg, #4a90e2, #357abd);
    color: white;
    padding: 20px;
    border-radius: 12px;
    margin-bottom: 20px;
}

.card {
    background: #fff;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    margin-bottom: 15px;
}

.grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 15px;
}

.badge {
    display: inline-block;
    padding: 5px 10px;
    border-radius: 8px;
    font-size: 12px;
    color: white;
    background: #4a90e2;
}
</style>

<div class="container">

    <!-- HEADER -->
    <div class="header">
        <h2>🏥 Dashboard Posyandu Balita</h2>
        <p>Informasi kesehatan & jadwal kegiatan posyandu</p>
    </div>

    <!-- INFO RINGKAS -->
    <div class="grid">

        <div class="card">
            <h3>👶 Total Balita</h3>
            <h2>{{ $totalBalita ?? 0 }}</h2>
        </div>

        <div class="card">
            <h3>🔴 Stunting</h3>
            <h2>{{ $stunting ?? 0 }}</h2>
        </div>

        <div class="card">
            <h3>🟢 Normal</h3>
            <h2>{{ $normal ?? 0 }}</h2>
        </div>

    </div>

    <!-- PENGUMUMAN -->
    <div class="card">
        <h3>📢 Pengumuman Posyandu</h3>

        <p>
            📅 <b>Imunisasi rutin akan dilaksanakan:</b><br>
            <span class="badge">Sabtu, 22 Juni 2026</span>
        </p>

        <p>
            📍 Lokasi: <b>PUSKESMAS SUKARAMI PALEMBANG</b><br>
            🕘 Waktu: <b>08.00 - 11.00 WIB</b>
        </p>

        <hr>

        <p>
            ⚠️ Orang tua dihimbau membawa:
            <ul>
                <li>Buku KIA</li>
                <li>Kartu imunisasi</li>
                <li>Balita dalam keadaan sehat</li>
            </ul>
        </p>
    </div>

    <!-- EDUKASI -->
    <div class="card">
        <h3>📚 Edukasi Kesehatan</h3>

        <p>
            💡 Stunting dapat dicegah dengan:
        </p>

        <ul>
            <li>Pemberian ASI eksklusif</li>
            <li>Asupan gizi seimbang</li>
            <li>Imunisasi lengkap</li>
            <li>Rutin cek berat & tinggi badan</li>
        </ul>
    </div>

</div>

@endsection