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
                        <div class="form-group mb-3">
                            <label for="nama_pekerjaan" class="form-label">Nama Pekerjaan</label>
                            <input type="text" class="form-control" name="NAMA" id="nama_pekerjaan" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <input type="text" class="form-control" name="KATEGORI" id="kategori" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" name="TANGGAL" required>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('pekerjaan.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
