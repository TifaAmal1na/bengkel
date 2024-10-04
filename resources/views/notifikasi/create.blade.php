@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-2 mb-2">
            <div class="card">
                <div class="card-header py-3">
                    <div class="m-0 font-weight-bold text-primary">Buat Notifikasi Baru</div>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('notifikasi.store') }}" id="myForm">
                        @csrf

                        <div class="form-group">
                            <label for="id_proyek">Proyek:</label>
                            <select name="ID_PROYEK" class="form-control" id="id_proyek" required>
                                <option value="" disabled selected>Pilih Proyek</option>
                                @foreach($proyekList as $proyek)
                                    <option value="{{ $proyek->ID_PROYEK }}">{{ $proyek->NAMA }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="judul">Judul:</label>
                            <input type="text" name="JUDUL" class="form-control" id="judul" required>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi:</label>
                            <textarea name="DESKRIPSI" class="form-control" id="deskripsi" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="tanggal">Tanggal:</label>
                            <input type="date" name="TANGGAL" class="form-control" id="tanggal" required>
                        </div>

                        <div class="form-group">
                            <label for="prioritas">Prioritas:</label>
                            <select name="PRIORITAS" class="form-control" id="prioritas" required>
                                <option value="rendah">Rendah</option>
                                <option value="sedang">Sedang</option>
                                <option value="tinggi">Tinggi</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection