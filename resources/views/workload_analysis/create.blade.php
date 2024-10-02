@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Workload</h1>

    <form action="{{ route('workload_analysis.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="standard" class="form-label">Standard</label>
            <input type="number" class="form-control" name="standard" required>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" name="tanggal" required>
        </div>

        <div class="mb-3">
            <label for="jumlah_pekerjaan" class="form-label">Jumlah Pekerjaan</label>
            <input type="number" class="form-control" name="jumlah_pekerjaan" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('workload_analysis.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
