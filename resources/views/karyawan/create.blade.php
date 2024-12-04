@extends('layout.template')
<!-- START FORM -->
@section('konten')

<div class="card">
    <div class="card-header">
        <h5 class="card-title">Tambah Karyawan</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('karyawan.store') }}" method="POST">
            @csrf
            <div class="mb-3 row">
                <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                <div class="col">
                    <input type="text" class="form-control" name="nip" value="{{ old('nip') }}" id="nip" maxlength="10">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col">
                    <input type="text" class="form-control" name="nama" value="{{ old('nama') }}" id="nama">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="divisi" class="col-sm-2 col-form-label">Divisi</label>
                <div class="col-sm-10">
                    <select class="form-select" name="divisi" id="divisi">
                        <option value="HR" {{ old('divisi') == 'HR' ? 'selected' : '' }}>HR</option>
                        <option value="Finance" {{ old('divisi') == 'Finance' ? 'selected' : '' }}>Finance</option>
                        <option value="Marcom" {{ old('divisi') == 'Marcom' ? 'selected' : '' }}>Marcom</option>
                        <option value="IT" {{ old('divisi') == 'IT' ? 'selected' : '' }}>IT</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>    
    </div>
</div>

@endsection
<!-- AKHIR FORM -->
