@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Standard</h1>

    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $standard->ID_GRAFIK }}</td>
        </tr>
        <tr>
            <th>Standard</th>
            <td>{{ $standard->STANDARD == 5 ? 'Normal' : $standard->STANDARD }}</td>
        </tr>
        <tr>
            <th>Tanggal Mulai</th>
            <td>{{ \Carbon\Carbon::parse($standard->TANGGAL_MULAI)->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <th>Tanggal Selesai</th>
            <td>{{ \Carbon\Carbon::parse($standard->TANGGAL_SELESAI)->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>
                @if ($standard->STATUS == 'Aktif')
                    <span style="color: green; font-weight: bold;">Aktif</span>
                @else
                    {{ $standard->STATUS }}
                @endif
            </td>
        </tr>
    </table>

    <a href="{{ route('standard.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
