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
            <label for="TANGGAL">Tanggal Mulai</label>
            <input type="date" name="TANGGAL" id="TANGGAL" class="form-control" value="{{ $aktivitas->TANGGAL }}" required>
        </div>

        <div class="form-group">
            <label for="TANGGAL">Tanggal Selesai</label>
            <input type="date" name="TANGGAL_SELESAI" id="TANGGAL_SELESAI" class="form-control" value="{{ $aktivitas->TANGGAL_SELESAI }}" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="STATUS" class="form-control" id="status" required>
                <option value="" disabled>Pilih Status</option> 
                <option value="Aktif" {{ $aktivitas->STATUS == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                <!--
                <option value="Tidak Aktif" {{ $aktivitas->STATUS == 'Tidak Aktif' ? 'selected' : '' }}>Menunggu</option>
                <option value="Dalam Perbaikan" {{ $aktivitas->STATUS == 'Dalam Perbaikan' ? 'selected' : '' }}>Dalam Proses</option> -->
                <option value="Menunggu" {{ $aktivitas->STATUS == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                <option value="Dalam Proses" {{ $aktivitas->STATUS == 'Dalam Proses' ? 'selected' : '' }}>Dalam Proses</option>
                <option value="Selesai" {{ $aktivitas->STATUS == 'Selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>        

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection