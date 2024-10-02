@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Workload</h1>

    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $workload->id_grafik }}</td>
        </tr>
        <tr>
            <th>Standard</th>
            <td>{{ $workload->standard }}</td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td>{{ $workload->tanggal }}</td>
        </tr>
        <tr>
            <th>Jumlah Pekerjaan</th>
            <td>{{ $workload->jumlah_pekerjaan }}</td>
        </tr>
    </table>

    <a href="{{ route('workload_analysis.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection