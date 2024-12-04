<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Penilaian;

class LeaderboardController extends Controller
{
    public function index(Request $request)
    {
        $sortBy = $request->get('sortBy', 'rata'); // Sorting berdasarkan rata secara default
        $order = $request->get('order', 'desc'); // Urutan default adalah descending

        $leaderboard = Penilaian::with('karyawan')
            ->orderBy($sortBy, $order)
            ->get();

        $penilaian = Penilaian::with('karyawan')->get();

        $leaderboard = $penilaian->map(function ($item) {
            $item->rata = ($item->amanah + $item->kompeten + $item->harmonis + $item->loyal + $item->adaptif) / 5;
            return $item;
        })->sortByDesc('rata');

        return view('leaderboard.index', compact('leaderboard'));
    }

    public function create()
    {
        // Karyawan yang sudah dinilai tidak muncul dalam pilihan
        $karyawanSudahDinilai = Penilaian::pluck('karyawan_uuid')->toArray();
        $karyawanList = Karyawan::whereNotIn('uuid', $karyawanSudahDinilai)->get();

        return view('leaderboard.create', compact('karyawanList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_uuid' => 'required|exists:karyawan,uuid',
            'amanah' => 'required|integer|min:0|max:100',
            'kompeten' => 'required|integer|min:0|max:100',
            'harmonis' => 'required|integer|min:0|max:100',
            'loyal' => 'required|integer|min:0|max:100',
            'adaptif' => 'required|integer|min:0|max:100',
        ]);
    
        $data = $request->only(['karyawan_uuid', 'amanah', 'kompeten', 'harmonis', 'loyal', 'adaptif']);
        $data['rata'] = ($data['amanah'] + $data['kompeten'] + $data['harmonis'] + $data['loyal'] + $data['adaptif']) / 5;
    
        Penilaian::create($data);
    
        return redirect()->route('leaderboard.index')->with('success', 'Penilaian berhasil ditambahkan');
    }

    public function edit($id)
    {
        $penilaian = Penilaian::findOrFail($id);
        $karyawanList = Karyawan::all();

        return view('leaderboard.edit', compact('penilaian', 'karyawanList'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'karyawan_uuid' => 'required|exists:karyawan,uuid',
            'amanah' => 'required|integer|min:0|max:100',
            'kompeten' => 'required|integer|min:0|max:100',
            'harmonis' => 'required|integer|min:0|max:100',
            'loyal' => 'required|integer|min:0|max:100',
            'adaptif' => 'required|integer|min:0|max:100',
        ]);
    
        $data = $request->only(['karyawan_uuid', 'amanah', 'kompeten', 'harmonis', 'loyal', 'adaptif']);
        $data['rata'] = ($data['amanah'] + $data['kompeten'] + $data['harmonis'] + $data['loyal'] + $data['adaptif']) / 5;
    
        $penilaian = Penilaian::findOrFail($id);
        $penilaian->update($data);
    
        return redirect()->route('leaderboard.index')->with('success', 'Penilaian berhasil diperbarui');
    }

    public function destroy($id)
    {
        $penilaian = Penilaian::findOrFail($id);
        $penilaian->delete();

        return redirect()->route('leaderboard.index')->with('success', 'Penilaian berhasil dihapus');
    }
}
