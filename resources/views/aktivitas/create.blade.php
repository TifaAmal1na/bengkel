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
            <label for="TANGGAL">Tanggal Mulai</label>
            <input type="date" name="TANGGAL" id="TANGGAL" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="TANGGAL">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select name="STATUS" class="form-control" id="status" required>
                <option value="" disabled selected>Pilih Status</option> 
                <option value="Aktif">Aktif</option>
                <!-- <option value="Tidak Aktif">Menunggu</option> -->
                <option value="Menunggu">Menunggu</option>
                <!-- <option value="Dalam Perbaikan">Dalam Proses</option> -->
                <option value="Dalam Proses">Dalam Proses</option>
                <!-- <option value="Dalam Perbaikan">Selesai</option> -->
                <option value="Selesai">Selesai</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection