<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if (strlen($katakunci)) {
            $data = Karyawan::where('nip', 'like', "%$katakunci%")
                ->orWhere('nama', 'like', "%$katakunci%")
                ->orWhere('divisi', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = Karyawan::orderBy('nip', 'desc')->paginate(5);
        }
        return view('karyawan.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nip', $request->nip);
        Session::flash('nama', $request->nama);
        Session::flash('divisi', $request->divisi);
        $request->validate([
            'nip' => 'required|numeric|digits:10|unique:karyawan,nip',
            'nama' => 'required|string|max:255',
            'divisi' => 'required|in:HR,Finance,Marcom,IT',
        ], [
            'nip.required' => 'NIP WAJIB DIISI',
            'nip.numeric' => 'NIP WAJIB DALAM ANGKA',
            'nip.digits' => 'NIP HARUS 10 DIGIT',
            'nip.unique' => 'NIP SUDAH ADA DIDALAM DATABASE',
            'nama.required' => 'NAMA WAJIB DIISI',
            'divisi.required' => 'DIVISI WAJIB DIISI',
        ]);

        $data = [
            'nip' => $request->nip,
            'nama' => $request->nama,
            'divisi' => $request->divisi,
            'uuid' => Str::uuid(),
        ];

        Karyawan::create($data);
        return redirect()->route('karyawan.index')->with('success', 'BERHASIL MENAMBAHKAN DATA');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $uuid)
    {
        $data = Karyawan::where('uuid', $uuid)->firstOrFail();
        return view('karyawan.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $uuid)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'divisi' => 'required|in:HR,Finance,Marcom,IT',
        ], [
            'nama.required' => 'NAMA WAJIB DIISI',
            'divisi.required' => 'DIVISI WAJIB DIISI',
        ]);

        $data = [
            'nama' => $request->nama,
            'divisi' => $request->divisi,
        ];

        Karyawan::where('uuid', $uuid)->update($data);
        return redirect()->route('karyawan.index')->with('success', 'BERHASIL MELAKUKAN PERUBAHAN DATA');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        $karyawan = Karyawan::where('uuid', $uuid)->firstOrFail();
        $karyawan->delete();

        return redirect()->route('karyawan.index')->with('success', 'BERHASIL MENGHAPUS DATA');
    }
}
