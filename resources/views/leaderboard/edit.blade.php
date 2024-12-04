@extends('layout.template')

@section('konten')
<div class="container">
    <h3>Edit Penilaian</h3>
    <form action="{{ route('leaderboard.update', $penilaian->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="karyawan_uuid">Pilih Karyawan</label>
            <select name="karyawan_uuid" class="form-control" required>
                @foreach($karyawanList as $karyawan)
                    <option value="{{ $karyawan->uuid }}" {{ $penilaian->karyawan_uuid == $karyawan->uuid ? 'selected' : '' }}>{{ $karyawan->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="amanah">Amanah</label>
            <input type="number" name="amanah" class="form-control" min="0" max="100" value="{{ $penilaian->amanah }}" required>
        </div>
        <div class="form-group">
            <label for="kompeten">Kompeten</label>
            <input type="number" name="kompeten" class="form-control" min="0" max="100" value="{{ $penilaian->kompeten }}" required>
        </div>
        <div class="form-group">
            <label for="harmonis">Harmonis</label>
            <input type="number" name="harmonis" class="form-control" min="0" max="100" value="{{ $penilaian->harmonis }}" required>
        </div>
        <div class="form-group">
            <label for="loyal">Loyal</label>
            <input type="number" name="loyal" class="form-control" min="0" max="100" value="{{ $penilaian->loyal }}" required>
        </div>
        <div class="form-group">
            <label for="adaptif">Adaptif</label>
            <input type="number" name="adaptif" class="form-control" min="0" max="100" value="{{ $penilaian->adaptif }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>    
</div>
@endsection
