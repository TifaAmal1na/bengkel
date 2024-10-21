@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-2 mb-2">
            <div class="card">
                <div class="card-header py-3">
                    <div class="m-0 font-weight-bold text-primary">Edit Data Tools</div>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('tools.update', $tool->ID_TOOLS) }}" id="myForm">
                        @csrf
                        @method('PUT') <!-- Menambahkan metode PUT untuk update -->

                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama', $tool->NAMA) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select name="status" class="form-control" required>
                                <option value="Aktif" {{ $tool->STATUS == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="Perlu Kalibrasi" {{ $tool->STATUS == 'Perlu Kalibrasi' ? 'selected' : '' }}>Perlu Kalibrasi</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="tanggal">Tanggal:</label>
                            <input type="date" name="tanggal" class="form-control" id="tanggal" value="{{ old('tanggal', $tool->TANGGAL) }}" required>
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