@extends('main')

@section('content')
<style>
    /* UTILITIES */
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }
    .page-title h2 {
        margin: 0;
        font-size: 24px;
        color: #2c3e50;
    }
    .page-title p {
        margin: 5px 0 0 0;
        font-size: 14px;
        color: #7f8c8d;
    }

    /* LAYOUT UTAMA */
    .setting-container {
        display: flex;
        gap: 25px;
    }

    /* NAVIGASI TAB (KIRI) */
    .setting-nav {
        width: 250px;
        background: #fff;
        padding: 15px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        height: fit-content;
    }
    .nav-tab {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 15px;
        color: #5a6a85;
        text-decoration: none;
        border-radius: 8px;
        margin-bottom: 5px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .nav-tab:hover {
        background: #f4f6f9;
        color: #2c3e50;
    }
    .nav-tab.active {
        background: #4a90e2;
        color: #fff;
    }

    /* KONTEN PANEL (KANAN) */
    .setting-content {
        flex: 1;
    }
    .setting-panel {
        display: none; /* Sembunyikan semua panel dulu */
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        animation: fadeIn 0.3s ease;
    }
    .setting-panel.active {
        display: block; /* Tampilkan panel yang aktif */
    }

    /* FORM STYLE */
    .panel-header {
        border-bottom: 1px solid #eef1f6;
        padding-bottom: 15px;
        margin-bottom: 25px;
    }
    .panel-header h3 {
        margin: 0;
        font-size: 18px;
        color: #2c3e50;
    }
    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }
    .form-group.full-width {
        grid-column: span 2;
    }
    .form-group label {
        display: block;
        font-weight: 600;
        margin-bottom: 8px;
        color: #475569;
        font-size: 14px;
    }
    .input-custom {
        width: 100%;
        padding: 11px 15px;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        box-sizing: border-box;
        font-size: 14px;
        background: #fff;
        transition: border 0.2s;
    }
    .input-custom:focus {
        border-color: #4a90e2;
        outline: none;
        box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
    }

    /* BUTTONS */
    .btn-save-premium {
        background: #27ae60;
        color: white;
        padding: 12px 25px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-weight: bold;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: background 0.2s;
    }
    .btn-save-premium:hover {
        background: #219653;
    }

    /* ANIMASI */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="page-header">
    <div class="page-title">
        <h2>⚙️ Pengaturan Pusat</h2>
        <p>Kelola konfigurasi sistem gizi, profil posyandu, dan integrasi aplikasi.</p>
    </div>
</div>

<div class="setting-container">
    
    <div class="setting-nav">
        <div class="nav-tab active" onclick="switchTab(event, 'tab-profil')">🏢 Profil Instansi</div>
        <div class="nav-tab" onclick="switchTab(event, 'tab-gizi')">📊 Standar Gizi (KMS)</div>
        <div class="nav-tab" onclick="switchTab(event, 'tab-jadwal')">📅 Jadwal & Kuota</div>
    </div>

    <div class="setting-content">
        <form action="#" method="POST" onsubmit="saveAlert(event)">
            @csrf

            <div id="tab-profil" class="setting-panel active">
                <div class="panel-header">
                    <h3>🏢 Profil Lengkap Posyandu</h3>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label>Nama Posyandu</label>
                        <input type="text" class="input-custom" value="Posyandu Mawar Jingga">
                    </div>
                    <div class="form-group">
                        <label>Nama Ketua Posyandu</label>
                        <input type="text" class="input-custom" value="Ibu Siti Aminah, S.Keb.">
                    </div>
                    <div class="form-group">
                        <label>Puskesmas Pembina (Induk)</label>
                        <input type="text" class="input-custom" value="Puskesmas Kecamatan Merdeka">
                    </div>
                    <div class="form-group">
                        <label>Nomor Register Posyandu</label>
                        <input type="text" class="input-custom" value="REG-2026-09882">
                    </div>
                    <div class="form-group full-width">
                        <label>Alamat Operasional Kompleks</label>
                        <input type="text" class="input-custom" value="Jl. Merdeka No. 12, RT 04/RW 02, Blok C">
                    </div>
                </div>
            </div>

            <div id="tab-gizi" class="setting-panel">
                <div class="panel-header">
                    <h3>📊 Ambang Batas Status Gizi Balita (KMS)</h3>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label>Batas Minimum Berat Stunting (kg)</label>
                        <input type="number" class="input-custom" value="7" step="0.1">
                    </div>
                    <div class="form-group">
                        <label>Batas Minimum Berat Kurang Gizi (kg)</label>
                        <input type="number" class="input-custom" value="10" step="0.1">
                    </div>
                    <div class="form-group">
                        <label>Target Kenaikan Berat per Bulan (Gram)</label>
                        <input type="number" class="input-custom" value="500">
                    </div>
                    <div class="form-group">
                        <label>Standar Formula Gizi Mengunduh</label>
                        <select class="input-custom">
                            <option selected>Standar WHO-2025/2026</option>
                            <option>Standar Kemenkes RI</option>
                        </select>
                    </div>
                </div>
            </div>

            <div id="tab-jadwal" class="setting-panel">
                <div class="panel-header">
                    <h3>📅 Jadwal Pelayanan & Kuota Antrean</h3>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label>Tanggal Pelayanan Bulan Ini</label>
                        <input type="date" class="input-custom" value="2026-06-25">
                    </div>
                    <div class="form-group">
                        <label>Jam Operasional</label>
                        <input type="text" class="input-custom" value="08:00 - 12:00 WIB">
                    </div>
                    <div class="form-group">
                        <label>Maksimum Kuota Balita per Hari</label>
                        <input type="number" class="input-custom" value="50">
                    </div>
                    <div class="form-group">
                        <label>Status Pendaftaran Online</label>
                        <select class="input-custom">
                            <option selected>🟢 Dibuka (Aktif)</option>
                            <option>🔴 Ditutup Sementara</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mt-4" style="margin-top: 20px;">
                <button type="submit" class="btn-save-premium">💾 Simpan Semua Perubahan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function switchTab(evt, tabId) {
        // 1. Sembunyikan semua panel pengaturan
        const panels = document.getElementsByClassName('setting-panel');
        for (let i = 0; i < panels.length; i++) {
            panels[i].classList.remove('active');
        }

        // 2. Hilangkan status active dari semua tombol tab
        const tabs = document.getElementsByClassName('nav-tab');
        for (let i = 0; i < tabs.length; i++) {
            tabs[i].classList.remove('active');
        }

        // 3. Tampilkan panel yang diklik dan tambahkan kelas active ke tab pengetuknya
        document.getElementById(tabId).classList.add('active');
        evt.currentTarget.classList.add('active');
    }

    function saveAlert(e) {
        e.preventDefault();
        alert('✨ Sempurna! Semua segmen konfigurasi berhasil diperbarui dan disimpan ke sistem.');
    }
</script>
@endsection