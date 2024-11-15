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
                            <select name="ID_GRAFIK" class="form-control">
                                @foreach($workloadList as $standard)
                                    <option value="{{ $standard->ID_GRAFIK }}" 
                                        {{ $pekerjaan->ID_GRAFIK == $standard->ID_GRAFIK ? 'selected' : '' }}>
                                        {{ $standard->STANDARD }}
                                    </option>
                                @endforeach
                            </select>
                            @error('ID_PROYEK')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="ID_GRAFIK">Standard:</label>
                            <select name="ID_GRAFIK" class="form-control" required>
                                <option value="" disabled selected>Pilih Standard</option>
                                @foreach($workloadList as $standard)
                                    <option value="{{ $standard->ID_GRAFIK }}" {{ old('ID_GRAFIK', $pekerjaan->ID_GRAFIK) == $standard->ID_GRAFIK ? 'selected' : '' }}>
                                        {{ $standard->STANDARD }}
                                    </option>
                                @endforeach
                            </select>
                            @error('ID_GRAFIK')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="NAMA">Nama Pekerjaan:</label>
                            <input type="text" name="NAMA" class="form-control" value="{{ old('NAMA', $pekerjaan->NAMA) }}" required>
                            @error('NAMA')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="STATUS">Status:</label>
                            <select name="STATUS" class="form-control" required>
                                <option value="dalam proses" {{ old('STATUS', $pekerjaan->STATUS) == 'dalam proses' ? 'selected' : '' }}>Dalam Proses</option>
                                <option value="selesai" {{ old('STATUS', $pekerjaan->STATUS) == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                            @error('STATUS')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="KATEGORI">Kategori:</label>
                            <input type="text" name="KATEGORI" class="form-control" value="{{ old('KATEGORI', $pekerjaan->KATEGORI) }}" required>
                            @error('KATEGORI')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="TANGGAL_MULAI">Tanggal Mulai:</label>
                            <input type="date" name="tanggal_mulai" class="form-control" value="{{ old('tanggal_mulai', $pekerjaan->TANGGAL_MULAI) }}" required>
                            @error('tanggal_mulai')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="TANGGAL_SELESAI">Tanggal Selesai:</label>
                            <input type="date" name="tanggal_selesai" class="form-control" value="{{ old('tanggal_selesai', $pekerjaan->TANGGAL_SELESAI) }}" required>
                            @error('tanggal_selesai')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('pekerjaan.index') }}" class="btn btn-warning">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection