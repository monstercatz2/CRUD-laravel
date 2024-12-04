@extends('layout.template')

@section('konten')
<div class="container mt-4">
    <div class="row">
        <!-- Card Jumlah Karyawan -->
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Karyawan</h5>
                    <p class="card-text">{{ $totalKaryawan }} Karyawan</p>
                </div>
            </div>
        </div>

        <!-- Card Peringkat Karyawan -->
        <div class="col-md-8">
            <div class="card mb-3">
                {{-- <div class="card-header">Peringkat Karyawan</div> --}}
                <div class="card-body">
                    <h3>Klasemen Karyawan</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Ranking</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Divisi</th>
                                <th>Total Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leaderboard as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->karyawan->nip }}</td>
                                <td>{{ $item->karyawan->nama }}</td>
                                <td>{{ $item->karyawan->divisi }}</td>
                                <td>{{ $item->rata }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Nama</th>
                                <th>Divisi</th>
                                <th>Total Score</th>
                                <th>Note</th> <!-- Kolom baru untuk catatan -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($leaderboard as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->karyawan->nama }}</td>
                                <td>{{ $item->karyawan->divisi }}</td>
                                <td>{{ $item->total_score }}</td>
                                <td>
                                    @if($index === 0)
                                        <span class="badge" style="background-color: gold; color: white; padding: 5px 10px;">Change Agent</span>
                                    @elseif($index === 1)
                                        <span class="badge" style="background-color: silver; color: white; padding: 5px 10px;">2nd</span>
                                    @elseif($index === 2)
                                        <span class="badge" style="background-color: #cd7f32; color: white; padding: 5px 10px;">3rd</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
