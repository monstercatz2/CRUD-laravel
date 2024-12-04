@extends('layout.template')

@section('konten')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3>Leaderboard</h3>
    <div class="pb-3 d-flex justify-content-end">
        <a href='{{ url('leaderboard/create') }}' class="btn btn-primary">+ Add</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>NIP</th>
                <th>Nama</th>
                <th>Divisi</th>
                <th>Amanah</th>
                <th>Kompeten</th>
                <th>Harmonis</th>
                <th>Loyal</th>
                <th>Adaptif</th>
                <th>Total Score</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leaderboard as $item)
            <tr>
                <td>{{ $item->karyawan->nip }}</td>
                <td>{{ $item->karyawan->nama }}</td>
                <td>{{ $item->karyawan->divisi }}</td>
                <td>{{ $item->amanah }}</td>
                <td>{{ $item->kompeten }}</td>
                <td>{{ $item->harmonis }}</td>
                <td>{{ $item->loyal }}</td>
                <td>{{ $item->adaptif }}</td>
                <td>{{ $item->rata }}</td>
                <td>
                    <a href="{{ route('leaderboard.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('leaderboard.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus penilaian ini?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
