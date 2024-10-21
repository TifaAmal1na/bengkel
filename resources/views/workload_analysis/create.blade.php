@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-2 mb-2">
            <div class="card">
                <div class="card-header py-3">
                    <div class="m-0 font-weight-bold text-primary">Tambah Workload</div>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <form action="{{ route('workload_analysis.store') }}" method="POST" id="myForm">
                        @csrf

                        <div class="form-group">
                            <label for="standard" class="form-label">Standard:</label>
                            <input type="number" class="form-control" name="standard" id="standard" required>
                        </div>

                        <div class="form-group">
                            <label for="tanggal" class="form-label">Tanggal:</label>
                            <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_pekerjaan" class="form-label">Jumlah Pekerjaan:</label>
                            <input type="number" class="form-control" name="jumlah_pekerjaan" id="jumlah_pekerjaan" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('workload_analysis.index') }}" class="btn btn-warning">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
