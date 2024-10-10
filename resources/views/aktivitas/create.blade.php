@extends('layouts.app')

@section('content')
    <h1>Tambah Aktivitas</h1>

    <form action="{{ route('aktivitas.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="ID_PEKERJAAN">Pekerjaan</label>
            <select name="ID_PEKERJAAN" id="ID_PEKERJAAN" class="form-control">
                @foreach($pekerjaanList as $pekerjaan)
                    <option value="{{ $pekerjaan->ID_PEKERJAAN }}">{{ $pekerjaan->NAMA }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="DESKRIPSI">Deskripsi</label>
            <textarea name="DESKRIPSI" id="DESKRIPSI" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="TANGGAL">Tanggal</label>
            <input type="date" name="TANGGAL" id="TANGGAL" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="STATUS">Status</label>
            <input type="text" name="STATUS" id="STATUS" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection