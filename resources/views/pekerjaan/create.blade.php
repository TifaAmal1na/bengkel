@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-2 mb-2">
            <div class="card">
                <div class="card-header py-3">
                    <div class="m-0 font-weight-bold text-primary">Tambah Pekerjaan</div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('pekerjaan.store') }}">
                        @csrf
                        
                        <div class="form-group">
                            <label for="ID_PROYEK">Proyek:</label>
                            <select name="ID_PROYEK" class="form-control" required>
                                <option value="" disabled selected>Pilih Proyek</option>
                                @foreach($proyekList as $proyek)
                                    <option value="{{ $proyek->ID_PROYEK }}">{{ $proyek->NAMA }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="ID_GRAFIK">Standard:</label>
                            <select name="ID_GRAFIK" class="form-control" required>
                                <option value="" disabled selected>Pilih Standard</option>
                                @foreach($grafikList as $standard)
                                    <option value="{{ $standard->ID_GRAFIK }}">{{ $standard->STANDARD }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="NAMA">Nama Pekerjaan:</label>
                            <input type="text" name="NAMA" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="STATUS">Status:</label>
                            <select name="STATUS" class="form-control" required>
                                <option value="" disabled selected>Pilih Status</option>
                                <option value="selesai">Selesai</option>
                                <option value="dalam proses">Dalam Proses</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="KATEGORI">Kategori:</label>
                            <input type="text" name="KATEGORI" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="TANGGAL_MULAI">Tanggal Mulai:</label>
                            <input type="date" name="tanggal_mulai" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="TANGGAL_SELESAI">Tanggal Selesai:</label>
                            <input type="date" name="tanggal_selesai" class="form-control" required>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            {{-- <button class="btn btn-warning" onclick="window.history.back()">Kembali</button> --}}
                            <a href="{{ route('pekerjaan.index') }}" class="btn btn-warning">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
