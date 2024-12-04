@extends('layout.template')
<!-- START DATA -->
@section('konten')
<div class="my-3 p-3 bg-body rounded shadow-sm">

    <!-- FORM PENCARIAN -->
    <div class="pb-3">
        <form class="d-flex" action="{{ url('karyawan') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Ketik disini" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
    </div>
    
    <!-- TOMBOL TAMBAH DATA -->
    <div class="pb-3 d-flex justify-content-end">
        <a href='{{ url('karyawan/create') }}' class="btn btn-primary">+ Add</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-2">NIP</th>
                <th class="col-md-3">Nama</th>
                <th class="col-md-2">Divisi</th>
                <th class="col-md-2">Action</th>
            </tr>
        </thead>
    
        <tbody>
            <?php $i = $data->firstItem() ?>
            @foreach ($data as $item)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $item->nip }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->divisi }}</td>
                <td>

                    <form onsubmit="return confirm('APAKAH ANDA YAKIN AKAN MENGHAPUS DATA?')" class='d-inline' action="{{ route('karyawan.destroy', $item->uuid) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('karyawan.edit', $item->uuid) }}" class="btn btn-warning btn-sm">Edit</a>
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
            </tr>
            <?php $i++ ?>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
</div>
@endsection

    <!-- AKHIR DATA -->