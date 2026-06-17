@extends('main')

@section('content')
<style>
    .page-title { font-size: 22px; font-weight: bold; margin-bottom: 15px; color: #2c3e50; }
    .card-box { background: #fff; padding: 25px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.06); margin-bottom: 20px; }
    .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
    .full-width { grid-column: span 2; }
    .input-custom { width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 8px; box-sizing: border-box; background: #fff; }
    .input-readonly { background: #f1f5f9; color: #475569; font-weight: bold; cursor: not-allowed; }
    .btn-submit { background: #4a90e2; color: white; padding: 12px 20px; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; width: 100%; }
    .btn-submit:hover { background: #357abd; }
    .badge-status { padding: 5px 10px; border-radius: 20px; font-size: 12px; font-weight: bold; background: #fff9db; color: #f59f00; border: 1px solid #ffe066; }
    .alert-success { background: #d4edda; color: #155724; padding: 12px; border-radius: 8px; margin-bottom: 15px; font-weight: bold; }
    .hint-text { font-size: 12px; color: #27ae60; margin-top: 4px; font-weight: 600; }
</style>

<div class="page-title">💉 Pendaftaran Imunisasi Pintar (Otomatis)</div>

@if(session('success'))
    <div class="alert-success">{{ session('success') }}</div>
@endif

<div class="card-box">
    <h3 style="margin-top:0; color:#2c3e50;">📝 Form Pendaftaran Antrean</h3>
    <form action="/imunisasi/store" method="POST">
        @csrf
        <div class="form-grid">
            <div class="form-group">
                <label style="display:block; font-weight:bold; margin-bottom:5px;">Nama Lengkap Balita</label>
                <input type="text" name="nama_balita" class="input-custom" placeholder="Contoh: Farisi" required>
            </div>
            
            <div class="form-group">
                <label style="display:block; font-weight:bold; margin-bottom:5px;">Nama Orang Tua / Wali</label>
                <input type="text" name="nama_orang_tua" class="input-custom" placeholder="Contoh: Supardi" required>
            </div>

            <div class="form-group">
                <label style="display:block; font-weight:bold; margin-bottom:5px;">Umur Balita (Bulan)</label>
                <input type="number" id="umur_anak" class="input-custom" placeholder="Masukkan umur dalam angka bulan" min="0" max="60" required oninput="cekRekomendasiVaksin()">
                <div id="vaksin-hint" class="hint-text"></div>
            </div>

            <div class="form-group">
                <label style="display:block; font-weight:bold; margin-bottom:5px;">Jenis Vaksin Imunisasi (Otomatis)</label>
                <input type="text" id="jenis_vaksin_display" class="input-custom input-readonly" value="Ketik umur anak dulu..." readonly>
                <input type="hidden" name="jenis_vaksin" id="jenis_vaksin_hidden" required>
            </div>

            <div class="form-group full-width">
                <label style="display:block; font-weight:bold; margin-bottom:5px;">Rencana Tanggal Kedatangan</label>
                <input type="date" name="tanggal_rencana" class="input-custom" required>
            </div>

            <div class="form-group full-width" style="margin-top: 10px;">
                <button type="submit" class="btn-submit">🚀 Ajukan Pendaftaran Antrean</button>
            </div>
        </div>
    </form>
</div>

<div class="card-box">
    <h3 style="margin-top:0; color:#2c3e50;">📋 Daftar Antrean Imunisasi</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Balita</th>
                <th>Orang Tua</th>
                <th>Jenis Vaksin</th>
                <th>Tanggal Rencana</th>
                <th>Status Antrean</th>
            </tr>
        </thead>
       <tbody>
            @forelse($imunisasis as $index => $imun)
            <tr>
                <td>{{ $index + 1 }}</td>
                
                <td style="font-weight: bold;">
                    {{ $imun->nama_balita ?? $imun->nama ?? 'Tanpa Nama' }}
                </td>
                
                <td>
                    {{ $imun->nama_orang_tua ?? $imun->orang_tua ?? 'Tanpa Orang Tua' }}
                </td>
                
                <td>
                    <span style="color:#4a90e2; font-weight:600;">
                        {{ $imun->jenis_vaksin ?? $imun->vaksin ?? 'Vaksin Umum' }}
                    </span>
                </td>
                
                <td>
                    @php
                        $tgl = $imun->tanggal_rencana ?? $imun->tgl_rencana ?? null;
                    @endphp
                    {{ $tgl ? date('d M Y', strtotime($tgl)) : '-' }}
                </td>
                
                <td>
                    <span class="badge-status">
                        {{ $imun->status ?? '⏳ Menunggu' }}
                    </span>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center; color: #7f8c8d; padding: 20px;">Belum ada riwayat pendaftaran antrean imunisasi.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
function cekRekomendasiVaksin() {
    const umur = document.getElementById('umur_anak').value;
    const displayInput = document.getElementById('jenis_vaksin_display');
    const hiddenInput = document.getElementById('jenis_vaksin_hidden');
    const hintText = document.getElementById('vaksin-hint');

    if (umur === '') {
        displayInput.value = "Ketik umur anak dulu...";
        hiddenInput.value = "";
        hintText.innerText = "";
        return;
    }

    let rekomendasi = "";
    let catatan = "";

    // Logika rekomendasi berdasarkan umur bulan anak
    if (parseInt(umur) === 0) {
        rekomendasi = "Hepatitis B (HB-0)";
        catatan = "✨ Sangat disarankan untuk bayi baru lahir kurang dari 24 jam.";
    } else if (parseInt(umur) === 1) {
        rekomendasi = "BCG & Polio 1";
        catatan = "✨ Mencegah penularan penyakit Tuberkulosis (TBC) dan Polio.";
    } else if (parseInt(umur) === 2) {
        rekomendasi = "DPT-HB-Hib 1, Polio 2, PCV 1";
        catatan = "✨ Imunisasi kombinasi dosis pertama.";
    } else if (parseInt(umur) === 3) {
        rekomendasi = "DPT-HB-Hib 2, Polio 3, PCV 2";
        catatan = "✨ Imunisasi kombinasi kelanjutan dosis kedua.";
    } else if (parseInt(umur) === 4) {
        rekomendasi = "DPT-HB-Hib 3, Polio 4 (Dosis Akhir Dasar)";
        catatan = "✨ Lengkap untuk imunisasi dasar kombinasi.";
    } else if (parseInt(umur) >= 5 && parseInt(umur) <= 8) {
        rekomendasi = "PCV 3 (Vaksin Tambahan/Booster)";
        catatan = "✨ Rekomendasi tambahan pencegahan infeksi paru/pneumonia.";
    } else if (parseInt(umur) === 9) {
        rekomendasi = "Campak / MR (Measles Rubella)";
        catatan = "✨ Sangat krusial untuk pencegahan penyakit campak pada anak.";
    } else if (parseInt(umur) > 9) {
        rekomendasi = "Imunisasi Lanjutan / Booster";
        catatan = "✨ Konsultasikan dosis lanjutan atau vitamin dengan kader Posyandu.";
    } else {
        rekomendasi = "Umur belum valid";
        catatan = "";
    }

    // Set nilai ke input readonly dan hidden form
    displayInput.value = rekomendasi;
    hiddenInput.value = rekomendasi;
    hintText.innerText = catatan;
}
</script>
@endsection