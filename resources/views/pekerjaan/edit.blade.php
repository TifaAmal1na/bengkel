@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-2 mb-2">
            <div class="card">
                <div class="card-header py-3">
                    <div class="m-0 font-weight-bold text-primary">Edit Pekerjaan</div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('pekerjaan.update', $pekerjaan->ID_PEKERJAAN) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="ID_PROYEK">Proyek:</label>
                            <select name="ID_PROYEK" class="form-control" required>
                                <option value="" disabled selected>Pilih Proyek</option>
                                @foreach($proyekList as $proyek)
                                    <option value="{{ $proyek->ID_PROYEK }}" {{ $proyek->ID_PROYEK == $pekerjaan->ID_PROYEK ? 'selected' : '' }}>
                                        {{ $proyek->NAMA }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ID_GRAFIK">Workload:</label>
                            <select name="ID_GRAFIK" class="form-control" required>
                                <option value="" disabled selected>Pilih Workload</option>
                                @foreach($workloadList as $workload)
                                    <option value="{{ $workload->ID_GRAFIK }}" {{ $workload->ID_GRAFIK == $pekerjaan->ID_GRAFIK ? 'selected' : '' }}>
                                        {{ $workload->STANDARD }} <!-- Pastikan kolom yang ditampilkan sesuai -->
                                    </option>
                                @endforeach
                            </select>
                        </div>                        

                        <div class="form-group">
                            <label for="NAMA">Nama Pekerjaan:</label>
                            <input type="text" name="NAMA" class="form-control" value="{{ $pekerjaan->NAMA }}" required>
                        </div>

                        <div class="form-group">
                            <label for="STATUS">Status:</label>
                            <select name="STATUS" class="form-control" required>
                                <option value="aktif" {{ $pekerjaan->STATUS == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="menunggu" {{ $pekerjaan->STATUS == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                                <option value="selesai" {{ $pekerjaan->STATUS == 'Dalam Proses' ? 'selected' : '' }}>Dalam Proses</option>
                                <option value="selesai" {{ $pekerjaan->STATUS == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="KATEGORI">Kategori:</label>
                            <input type="text" name="KATEGORI" class="form-control" value="{{ $pekerjaan->KATEGORI }}" required>
                        </div>

                        <div class="form-group">
                            <label for="TANGGAL">Tanggal:</label>
                            <input type="date" name="TANGGAL" class="form-control" value="{{ $pekerjaan->TANGGAL }}" required>
                        </div>

                        <div class="form-group">
                            <label for="TANGGAL_SELESAI">Tanggal Selesai:</label>
                            <input type="date" name="TANGGAL_SELESAI" class="form-control" value="{{ $pekerjaan->TANGGAL_SELESAI }}" required>
                        </div>

                        <div class="form-group">
                            <label for="JUMLAH">Jumlah:</label>
                            <input type="number" name="JUMLAH" class="form-control" value="{{ $pekerjaan->JUMLAH }}" required min="0">
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
