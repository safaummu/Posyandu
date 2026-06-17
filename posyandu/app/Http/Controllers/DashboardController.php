<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBalita = DB::table('balitas')->count();

        $stunting = DB::table('balitas')
            ->where('berat', '<', 7)
            ->count();

        $normal = DB::table('balitas')
            ->where('berat', '>=', 7)
            ->count();

        return view('dashboard', compact('totalBalita','stunting','normal'));
    }
}