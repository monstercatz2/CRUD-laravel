@extends('layout.template')

@section('konten')
<div class="container">
    <h3>Buat Penilaian</h3>
    <form action="{{ route('leaderboard.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="karyawan_uuid">Pilih Karyawan</label>
            <select name="karyawan_uuid" class="form-control" required>
                <option value="">-- Daftar Karyawan --</option>
                @foreach($karyawanList as $karyawan)
                    <option value="{{ $karyawan->uuid }}">{{ $karyawan->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="amanah">Amanah</label>
            <input type="number" name="amanah" class="form-control" min="0" max="100" maxlength="3" required>
        </div>
        <div class="form-group">
            <label for="kompeten">Kompeten</label>
            <input type="number" name="kompeten" class="form-control" min="0" max="100" required>
        </div>
        <div class="form-group">
            <label for="harmonis">Harmonis</label>
            <input type="number" name="harmonis" class="form-control" min="0" max="100" required>
        </div>
        <div class="form-group">
            <label for="loyal">Loyal</label>
            <input type="number" name="loyal" class="form-control" min="0" max="100" required>
        </div>
        <div class="form-group">
            <label for="adaptif">Adaptif</label>
            <input type="number" name="adaptif" class="form-control" min="0" max="100" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
