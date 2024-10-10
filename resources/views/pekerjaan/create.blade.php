@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-2 mb-2">
            <div class="card">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">Tambah Pekerjaan</h4>
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
                            <label for="ID_GRAFIK">Workload:</label>
                            <select name="ID_GRAFIK" class="form-control" required>
                                <option value="" disabled selected>Pilih Workload</option>
                                @foreach($grafikList as $workload)
                                    <option value="{{ $workload->ID_GRAFIK }}">{{ $workload->STANDARD }}</option>
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
                                <option value="aktif">Aktif</option>
                                <option value="menunggu">Menunggu</option>
                                <option value="selesai">Selesai</option>
                                <option value="dalam proses">Dalam Proses</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="KATEGORI">Kategori:</label>
                            <input type="text" name="KATEGORI" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="TANGGAL">Tanggal:</label>
                            <input type="date" name="TANGGAL" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="TANGGAL_SELESAI">Tanggal Selesai:</label>
                            <input type="date" name="TANGGAL_SELESAI" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="JUMLAH">Jumlah:</label>
                            <input type="number" name="JUMLAH" class="form-control" required>
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
