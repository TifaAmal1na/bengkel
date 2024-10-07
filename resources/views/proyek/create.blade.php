@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-2 mb-2">
            <div class="card">
                <div class="card-header py-3">
                    <div class="m-0 font-weight-bold text-primary">Input Data Proyek</div>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('proyek.store') }}" id="myForm">
                        @csrf

                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" name="nama" class="form-control" id="nama" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select name="status" class="form-control" id="status" required>
                                @foreach(App\Models\Proyek::getStatusOptions() as $status)
                                    <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                                @endforeach
                            </select>
                        </div>                        

                        <div class="form-group">
                            <label for="jumlah_pekerja">Jumlah Pekerja:</label>
                            <input type="number" name="jumlah_pekerja" class="form-control" id="jumlah_pekerja" required>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_mulai">Tanggal Mulai:</label>
                            <input type="date" name="tanggal_mulai" class="form-control" id="tanggal_mulai" required>
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
