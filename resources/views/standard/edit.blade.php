@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-2 mb-2">
            <div class="card">
                <div class="card-header py-3">
                    <div class="m-0 font-weight-bold text-primary">Edit Standard</div>
                </div>
                <div class="card-body">
                    {{-- Pesan Error General --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Form --}}
                    <form action="{{ route('standard.update', $standard->ID_GRAFIK) }}" method="POST" id="myForm">
                        @csrf
                        @method('PUT')

                        {{-- Standard --}}
                        <div class="form-group">
                            <label for="standard" class="form-label">Standard:</label>
                            <input type="number" class="form-control" name="standard" id="standard" value="{{ $standard->STANDARD }}" required>
                        </div>

                        {{-- Tanggal Mulai --}}
                        <div class="form-group">
                            <label for="tanggal_mulai" class="form-label">Tanggal Mulai:</label>
                            <input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai" value="{{ $standard->TANGGAL_MULAI }}" required>
                            @if ($errors->has('tanggal_mulai'))
                                <div class="alert alert-danger mt-2">
                                    <strong>{{ $errors->first('tanggal_mulai') }}</strong>
                                </div>
                            @endif
                        </div>

                        {{-- Tanggal Selesai --}}
                        <div class="form-group">
                            <label for="tanggal_selesai" class="form-label">Tanggal Selesai:</label>
                            <input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai" value="{{ old('tanggal_selesai', $standard->TANGGAL_SELESAI) }}" required>
                            @if ($errors->has('tanggal_selesai'))
                                <div class="alert alert-danger mt-2">
                                    <strong>{{ $errors->first('tanggal_selesai') }}</strong>
                                </div>
                            @endif
                        </div>

                        {{-- Status --}}
                        <div class="form-group">
                            <input type="hidden" name="status" value="{{ $standard->STATUS }}">
                        </div>
                        <div class="form-group">
                            <label for="status" class="form-label">Status:</label>
                            <p class="form-control">
                                {{ $standard->STATUS }}
                            </p>
                            <small class="text-muted">
                                Status akan diperbarui secara otomatis berdasarkan tanggal mulai terbaru.
                            </small>
                        </div>

                        {{-- Tombol --}}
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('standard.index') }}" class="btn btn-warning">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
