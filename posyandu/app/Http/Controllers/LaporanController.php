<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index()
    {
        $data = DB::table('balitas')->get();

        return view('laporan.index', compact('data'));
    }

    public function laporan()
    {
        $data = DB::table('balitas')->get();

        return view('laporan.index', compact('data'));
    }
}