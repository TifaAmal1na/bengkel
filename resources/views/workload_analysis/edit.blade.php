@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Workload</h1>

    <form action="{{ route('workload_analysis.update', $workload->id_grafik) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="standard" class="form-label">Standard</label>
            <input type="number" class="form-control" name="standard" value="{{ $workload->standard }}" required>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" name="tanggal" value="{{ $workload->tanggal }}" required>
        </div>

        <div class="mb-3">
            <label for="jumlah_pekerjaan" class="form-label">Jumlah Pekerjaan</label>
            <input type="number" class="form-control" name="jumlah_pekerjaan" value="{{ $workload->jumlah_pekerjaan }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('workload_analysis.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection