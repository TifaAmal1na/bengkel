@extends('layouts.app')

@section('content')
    <h1>Daftar Aktivitas</h1>
    <a href="{{ route('aktivitas.create') }}" class="btn btn-primary">Tambah Aktivitas</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pekerjaan</th>
                <th>Deskripsi</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($aktivitas as $akt)
                <tr>
                    <td>{{ $akt->ID_AKTIVITAS }}</td>
                    <td>{{ $akt->pekerjaan->NAMA }}</td>
                    <td>{{ $akt->DESKRIPSI }}</td>
                    <td>{{ $akt->TANGGAL }}</td>
                    <td>{{ $akt->tanggal_selesai }}</td>
                    <td>{{ $akt->STATUS }}</td>
                    <td>
                        <a href="{{ route('aktivitas.edit', $akt->ID_AKTIVITAS) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('aktivitas.destroy', $akt->ID_AKTIVITAS) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus aktivitas ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection