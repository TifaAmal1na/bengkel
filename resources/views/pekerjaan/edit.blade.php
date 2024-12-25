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
                            <label for="NAMA">Nama Pekerjaan:</label>
                            <input type="text" name="NAMA" class="form-control" value="{{ old('NAMA', $pekerjaan->NAMA) }}" required>
                            @error('NAMA')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="TANGGAL_MULAI">Tanggal Mulai:</label>
                            <input type="date" name="TANGGAL_MULAI" class="form-control" value="{{ old('TANGGAL_MULAI', $pekerjaan->TANGGAL_MULAI) }}" required>
                            @error('TANGGAL_MULAI')
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
