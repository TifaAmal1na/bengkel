@extends('layouts.app')

@section('content')
    <h1>Edit Aktivitas</h1>

    <form action="{{ route('aktivitas.update', $aktivitas->ID_AKTIVITAS) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="ID_PEKERJAAN">Pekerjaan</label>
            <select name="ID_PEKERJAAN" id="ID_PEKERJAAN" class="form-control">
                @foreach($pekerjaanList as $pekerjaan)
                    <option value="{{ $pekerjaan->ID_PEKERJAAN }}" {{ $pekerjaan->ID_PEKERJAAN == $aktivitas->ID_PEKERJAAN ? 'selected' : '' }}>
                        {{ $pekerjaan->NAMA }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="DESKRIPSI">Deskripsi</label>
            <textarea name="DESKRIPSI" id="DESKRIPSI" class="form-control" required>{{ $aktivitas->DESKRIPSI }}</textarea>
        </div>

        <div class="form-group">
            <label for="TANGGAL">Tanggal</label>
            <input type="date" name="TANGGAL" id="TANGGAL" class="form-control" value="{{ $aktivitas->TANGGAL }}" required>
        </div>

        <div class="form-group">
            <label for="STATUS">Status</label>
            <input type="text" name="STATUS" id="STATUS" class="form-control" value="{{ $aktivitas->STATUS }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection