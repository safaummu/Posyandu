<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BalitaController extends Controller
{
    public function index()
    {
        $data = DB::table('balitas')->get();
        return view('dashboard', compact('data'));
    }

    public function store(Request $request)
    {
        DB::table('balitas')->insert([
            'nama' => $request->nama,
            'tgl_lahir' => $request->tgl_lahir,
            'jk' => $request->jk,
            'orang_tua' => $request->orang_tua,
            'berat' => $request->berat
        ]);

        return redirect('/')->with('success', 'Data berhasil disimpan!');
    }

    public function update(Request $request)
    {
        DB::table('balitas')
            ->where('id', $request->id)
            ->update([
                'nama' => $request->nama,
                'tgl_lahir' => $request->tgl_lahir,
                'jk' => $request->jk,
                'orang_tua' => $request->orang_tua,
                'berat' => $request->berat
            ]);

        return redirect('/')->with('success', 'Data berhasil diupdate!');
    }

    public function delete($id)
    {
        DB::table('balitas')
            ->where('id', $id)
            ->delete();

        return redirect('/')->with('success', 'Data berhasil dihapus!');
    }

    public function grafik()
    {
        $laki = DB::table('balitas')->where('jk', 'Laki-laki')->count();
        $perempuan = DB::table('balitas')->where('jk', 'Perempuan')->count();

        return view('grafik', compact('laki', 'perempuan'));
    }

  
public function statistik()
{
    $data = DB::table('balitas')->get();

    $laki = DB::table('balitas')
        ->where('jk', 'Laki-laki')
        ->count();

    $perempuan = DB::table('balitas')
        ->where('jk', 'Perempuan')
        ->count();

    $total = DB::table('balitas')->count();

    $normal = DB::table('balitas')
        ->where('berat', '>=', 12)
        ->count();

    $pemantauan = DB::table('balitas')
        ->whereBetween('berat', [9.6, 11.9])
        ->count();

    $risiko = DB::table('balitas')
        ->where('berat', '<=', 9.5)
        ->count();

    return view('statistik', compact(
        'laki',
        'perempuan',
        'total',
        'normal',
        'pemantauan',
        'risiko'
    ));
}
public function laporan()
{
    $data = DB::table('balitas')->get();

    $total = DB::table('balitas')->count();

    $laki = DB::table('balitas')
        ->where('jk', 'Laki-laki')
        ->count();

    $perempuan = DB::table('balitas')
        ->where('jk', 'Perempuan')
        ->count();

    $normal = DB::table('balitas')
        ->where('berat', '>=', 12)
        ->count();

    $pemantauan = DB::table('balitas')
        ->whereBetween('berat', [9.6, 11.9])
        ->count();

    $risiko = DB::table('balitas')
        ->where('berat', '<=', 9.5)
        ->count();

    return view('laporan', compact(
        'data',
        'total',
        'laki',
        'perempuan',
        'normal',
        'pemantauan',
        'risiko'
    ));
}
}