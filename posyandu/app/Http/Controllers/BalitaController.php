<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BalitaController extends Controller
{
    // 1. Fungsi untuk menampilkan data balita
    public function index()
    {
        $balitas = DB::table('balitas')->get();
        return view('balita.index', compact('balitas'));
    }

    // 2. Fungsi untuk menampilkan halaman form tambah data balita
    public function create()
    {
        return view('balita.create');
    }
}