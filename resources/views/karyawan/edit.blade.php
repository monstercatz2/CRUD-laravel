@extends('layout.template')

@section('konten')
<form action="{{ url('karyawan/'.$data->uuid) }}" method="post">
    @csrf
    @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{ url('karyawan') }}' class="btn btn-secondary"><< KEMBALI</a>
        <div class="mb-3 row">
            <label for="nip" class="col-sm-2 col-form-label">NIP</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='nip' value="{{ $data->nip }}" id="nip" maxlength="10" disabled>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama' value="{{ $data->nama }}" id="nama" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="divisi" class="col-sm-2 col-form-label">Divisi</label>
            <div class="col-sm-10">
                <select class="form-control" name='divisi' id="divisi" required>
                    <option value="HR" {{ $data->divisi == 'HR' ? 'selected' : '' }}>HR</option>
                    <option value="Finance" {{ $data->divisi == 'Finance' ? 'selected' : '' }}>Finance</option>
                    <option value="Marcom" {{ $data->divisi == 'Marcom' ? 'selected' : '' }}>Marcom</option>
                    <option value="IT" {{ $data->divisi == 'IT' ? 'selected' : '' }}>IT</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="divisi" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">UPDATE</button></div>
        </div>
    </div>
</form>
@endsection
