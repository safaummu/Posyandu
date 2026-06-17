<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BalitaController;
use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

Route::get('/', function () {
    if (session('user_id')) { return redirect('/dashboard'); }
    return redirect('/login');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

use Illuminate\Support\Facades\Artisan;

Route::get('/auto-migrate-posyandu', function () {
    try {
        Artisan::call('migrate --force');
        return "Selamat! Database Posyandu Berhasil Dimigrasi! Silakan buka halaman login sekarang.";
    } catch (\Exception $e) {
        return "Gagal migrasi: " . $e->getMessage();
    }
});

Route::post('/proses-login', function (Request $request) {
    $user = DB::table('users')->where('email', $request->email)->first();
    if ($user && Hash::check($request->password, $user->password)) {
        session(['user_id' => $user->id, 'user_nama' => $user->name]);
        return redirect('/dashboard');
    }
    return back()->with('error', 'Email atau Password salah!');
});

Route::get('/register', function () {
    return view('register');
});

Route::post('/proses-register', function (Request $request) {
    $cek = DB::table('users')->where('email', $request->email)->exists();
    if($cek) { return back()->with('error', 'Email sudah digunakan!'); }

    DB::table('users')->insert([
        'name'       => $request->name,
        'email'      => $request->email,
        'password'   => Hash::make($request->password),
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    return redirect('/login')->with('success', 'Akun berhasil dibuat! Silakan login.');
});

// 2. PROTEKSI HALAMAN (HARUS LOGIN DULU)
Route::middleware(['web'])->group(function () {
    
    Route::get('/dashboard', function() {
        if (!session('user_id')) { return redirect('/login'); }
        return app(DashboardController::class)->index();
    });

    Route::get('/pengaturan', function () {
        if (!session('user_id')) { return redirect('/login'); }
        return view('pengaturan');
    });

    Route::get('/balita', [BalitaController::class, 'index']);
    Route::get('/balita/create', [BalitaController::class, 'create']);
    Route::post('/balita/store', [BalitaController::class, 'store']);
    Route::get('/balita/delete/{id}', [BalitaController::class, 'delete']);
    Route::get('/laporan', [BalitaController::class, 'laporan']);

    Route::get('/imunisasi', function () {
        if (!session('user_id')) { return redirect('/login'); }
        $imunisasis = DB::table('imunisasis')->orderBy('id', 'desc')->get();
        return view('imunisasi', compact('imunisasis'));
    });

    Route::post('/imunisasi/store', function (Request $request) {
        $kolomDiDatabase = DB::getSchemaBuilder()->getColumnListing('imunisasis');
        $dataYangDisimpan = [];

        if (in_array('nama_balita', $kolomDiDatabase)) { 
            $dataYangDisimpan['nama_balita'] = $request->nama_balita; 
        }
        if (in_array('nama', $kolomDiDatabase)) { 
            $dataYangDisimpan['nama'] = $request->nama_balita; 
        }
        if (in_array('nama_orang_tua', $kolomDiDatabase)) { 
            $dataYangDisimpan['nama_orang_tua'] = $request->nama_orang_tua; 
        }
        if (in_array('orang_tua', $kolomDiDatabase)) { 
            $dataYangDisimpan['orang_tua'] = $request->nama_orang_tua; 
        }
        if (in_array('jenis_vaksin', $kolomDiDatabase)) { 
            $dataYangDisimpan['jenis_vaksin'] = $request->jenis_vaksin; 
        }
        if (in_array('tanggal_rencana', $kolomDiDatabase)) { 
            $dataYangDisimpan['tanggal_rencana'] = $request->tanggal_rencana; 
        }
        if (in_array('status', $kolomDiDatabase)) { 
            $dataYangDisimpan['status'] = '⏳ Menunggu'; 
        }
        
        $dataYangDisimpan['created_at'] = now();

        DB::table('imunisasis')->insert($dataYangDisimpan);

        return back()->with('success', '✨ Pendaftaran Imunisasi Berhasil Diajukan!');
    });
}); // <--- Kurung penutup middleware ditaruh di sini dengan benar


Route::get('/logout', function () {
    session()->forget(['user_id', 'user_nama']);
    return redirect('/login')->with('success', 'Berhasil keluar aplikasi');
});