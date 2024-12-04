<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil data penilaian karyawan dengan sorting berdasarkan total_score
        $leaderboard = Penilaian::with('karyawan')
            ->orderByDesc('rata')
            ->get();

        $totalKaryawan = Karyawan::count();

        // Mengirimkan data ke view
        return view('dashboard.index', compact('leaderboard', 'totalKaryawan'));
    }
}
