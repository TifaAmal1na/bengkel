@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-2 mb-2">
            <div class="card">
                <div class="card-header py-3">
                    <div class="m-0 font-weight-bold text-primary">Daftar Aktivitas</div>
                    <div class="float-right">
                        <a href="{{ route('aktivitas.create') }}" class="btn btn-sm btn-primary shadow-sm">ADD</a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                    <td>{{ $akt->TANGGAL_SELESAI }}</td>
                                    <td>{{ $akt->STATUS }}</td>
                                    <td>
                                        <div class="d-flex">
                                        <a class="btn btn-primary mr-1" href="{{ route('aktivitas.edit', $akt->ID_AKTIVITAS) }}">Edit</a>
                                            <form action="{{ route('aktivitas.destroy', $akt->ID_AKTIVITAS) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus aktivitas ini?')">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection