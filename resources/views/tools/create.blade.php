@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-2 mb-2">
            <div class="card">
                <div class="card-header py-3">
                    <div class="m-0 font-weight-bold text-primary">Input Data Tools</div>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('tools.store') }}" id="myForm">
                        @csrf

                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" name="nama" class="form-control" id="nama" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select name="status" class="form-control" required>
                                <option value="aktif">Aktif</option>
                                <option value="Perlu Kalibrasi">Perlu Kalibrasi</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tanggal">Tanggal:</label>
                            <input type="date" name="tanggal" class="form-control" id="tanggal" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
