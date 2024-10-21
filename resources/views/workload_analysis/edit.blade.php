@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-2 mb-2">
            <div class="card">
                <div class="card-header py-3">
                    <div class="m-0 font-weight-bold text-primary">Edit Workload</div>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <form action="{{ route('workload_analysis.update', $workload->ID_GRAFIK) }}" method="POST" id="myForm">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="standard" class="form-label">Standard:</label>
                            <input type="number" class="form-control" name="standard" id="standard" value="{{ $workload->STANDARD }}" required>
                        </div>

                        <div class="form-group">
                            <label for="tanggal" class="form-label">Tanggal:</label>
                            <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{ $workload->TANGGAL }}" required>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_pekerjaan" class="form-label">Jumlah Pekerjaan:</label>
                            <input type="number" class="form-control" name="jumlah_pekerjaan" id="jumlah_pekerjaan" value="{{ $workload->JUMLAH_PEKERJAAN }}" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('workload_analysis.index') }}" class="btn btn-warning">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
