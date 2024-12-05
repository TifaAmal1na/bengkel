@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Card for Form -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header py-3">
                    <div class="m-0 font-weight-bold text-primary">Edit Standard</div>
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

                    <form action="{{ route('standard.update', $standard->ID_GRAFIK) }}" method="POST" id="myForm">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="standard" class="form-label">Standard:</label>
                            <input type="number" class="form-control" name="standard" id="standard" value="{{ $standard->STANDARD }}" required>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_mulai" class="form-label">Tanggal Mulai:</label>
                            <input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai" value="{{ $standard->TANGGAL_MULAI }}" required>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_selesai" class="form-label">Tanggal Selesai:</label>
                            <input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai" value="{{ old('tanggal_selesai', $standard->TANGGAL_SELESAI) }}" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('standard.index') }}" class="btn btn-warning">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-4">
            @if (isset($latestActiveStandard) && $latestActiveStandard)
            <div class="alert alert-info">
                <strong>Standard Aktif Terbaru</strong>
                <ul>
                    <li><strong>ID Standard:</strong> {{ $latestActiveStandard->ID_GRAFIK }}</li>
                    <li><strong>Standard:</strong> {{ $latestActiveStandard->STANDARD }}</li>
                    <li><strong>Tanggal Mulai:</strong> {{ \Carbon\Carbon::parse($latestActiveStandard->TANGGAL_MULAI)->format('d-m-Y') }}</li>
                    <li><strong>Tanggal Selesai:</strong> {{ \Carbon\Carbon::parse($latestActiveStandard->TANGGAL_SELESAI)->format('d-m-Y') }}</li>
                </ul>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
