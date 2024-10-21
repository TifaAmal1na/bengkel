@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-2 mb-2">
            <div class="card">
                <div class="card-header py-3">
                    <div class="m-0 font-weight-bold text-primary">Tambah Revisi Gambar</div>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <form action="{{ route('revisi_gambar.store') }}" method="POST" id="myForm">
                        @csrf

                        <div class="form-group">
                            <label for="ID_PEKERJAAN">Pekerjaan:</label>
                            <select name="ID_PEKERJAAN" id="ID_PEKERJAAN" class="form-control" required>
                                <option value="" disabled selected>Pilih Pekerjaan</option>
                                @foreach($pekerjaanList as $pekerjaan)
                                    <option value="{{ $pekerjaan->ID_PEKERJAAN }}">{{ $pekerjaan->NAMA }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="DESKRIPSI">Deskripsi:</label>
                            <textarea name="DESKRIPSI" id="DESKRIPSI" class="form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="TANGGAL">Tanggal:</label>
                            <input type="date" name="TANGGAL" id="TANGGAL" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button class="btn btn-warning" onclick="window.history.back()">Kembali</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
