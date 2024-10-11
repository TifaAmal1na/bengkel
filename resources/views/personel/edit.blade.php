@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-2 mb-2">
            <div class="card">
                <div class="card-header py-3">
                    <div class="m-0 font-weight-bold text-primary">Edit Data Personel</div>
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

                    <form method="POST" action="{{ route('personel.update', $personel->ID_PERSONEL) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" name="NAMA" class="form-control" id="nama" value="{{ $personel->NAMA }}" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select name="STATUS" class="form-control" id="status" required>
                                <option value="" disabled>Pilih Status</option>
                                <option value="Aktif" {{ $personel->STATUS == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="Tidak Aktif" {{ $personel->STATUS == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                        </div>
                        

                        <div class="form-group">
                            <label for="jumlah_pekerja">Jumlah Pekerja:</label>
                            <input type="number" name="JUMLAH_PEKERJA" class="form-control" id="jumlah_pekerja" value="{{ $personel->JUMLAH_PEKERJA }}" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
