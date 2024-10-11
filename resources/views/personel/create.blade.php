@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-2 mb-2">
            <div class="card">
                <div class="card-header py-3">
                    <div class="m-0 font-weight-bold text-primary">Tambah Personel Baru</div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('personel.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" name="NAMA" class="form-control" id="nama" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select name="STATUS" class="form-control" id="status" required>
                                <option value="" disabled selected>Pilih Status</option> 
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                        </div>
                        

                        <div class="form-group">
                            <label for="jumlah_pekerja">Jumlah Pekerja:</label>
                            <input type="number" name="JUMLAH_PEKERJA" class="form-control" id="jumlah_pekerja" required>
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
