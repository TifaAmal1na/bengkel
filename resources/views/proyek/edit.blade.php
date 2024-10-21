@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-2 mb-2">
            <div class="card">
                <div class="card-header py-3">
                    <div class="m-0 font-weight-bold text-primary">Edit Data Proyek</div>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('proyek.update', $proyek->ID_PROYEK) }}" id="myForm">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="{{ $proyek->NAMA }}" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select name="status" class="form-control" id="status" required>
                                @foreach(App\Models\Proyek::getStatusOptions() as $status)
                                    <option value="{{ $status }}" {{ $proyek->STATUS == $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                                @endforeach
                            </select>
                        </div>                        

                        <div class="form-group">
                            <label for="jumlah_pekerja">Jumlah Pekerja:</label>
                            <input type="number" name="jumlah_pekerja" class="form-control" id="jumlah_pekerja" value="{{ $proyek->JUMLAH_PEKERJA }}" required>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_mulai">Tanggal Mulai:</label>
                            <input type="date" name="tanggal_mulai" class="form-control" id="tanggal_mulai" value="{{ $proyek->TANGGAL_MULAI }}" required>
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