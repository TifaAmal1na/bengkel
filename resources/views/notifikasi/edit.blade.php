@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-2 mb-2">
            <div class="card">
                <div class="card-header py-3">
                    <div class="m-0 font-weight-bold text-primary">Edit Data Notifikasi</div>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('notifikasi.update', $notifikasi->ID_NOTIFIKASI) }}" id="myForm">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="id_proyek">Proyek:</label>
                            <select name="ID_PROYEK" class="form-control" id="id_proyek" required>
                                @foreach($proyekList as $proyek)
                                    <option value="{{ $proyek->ID_PROYEK }}" {{ $proyek->ID_PROYEK == $notifikasi->ID_PROYEK ? 'selected' : '' }}>
                                        {{ $proyek->NAMA }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="judul">Judul:</label>
                            <input type="text" name="JUDUL" class="form-control" id="judul" value="{{ $notifikasi->JUDUL }}" required>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi:</label>
                            <textarea name="DESKRIPSI" class="form-control" id="deskripsi" required>{{ $notifikasi->DESKRIPSI }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="tanggal">Tanggal:</label>
                            <input type="date" name="TANGGAL" class="form-control" id="tanggal" value="{{ $notifikasi->TANGGAL }}" required>
                        </div>

                        <div class="form-group">
                            <label for="prioritas">Prioritas:</label>
                            <select name="PRIORITAS" class="form-control" id="prioritas" required>
                                <option value="rendah" {{ $notifikasi->PRIORITAS == 'rendah' ? 'selected' : '' }}>Rendah</option>
                                <option value="sedang" {{ $notifikasi->PRIORITAS == 'sedang' ? 'selected' : '' }}>Sedang</option>
                                <option value="tinggi" {{ $notifikasi->PRIORITAS == 'tinggi' ? 'selected' : '' }}>Tinggi</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button class="btn btn-warning" onclick="window.history.back()">Kembali</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection