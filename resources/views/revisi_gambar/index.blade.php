@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-2 mb-2">
            <div class="card">
                <div class="card-header py-3">
                    <div class="m-0 font-weight-bold text-primary">Daftar Revisi Gambar</div>
                    <div class="float-right">
                        <a href="{{ route('revisi_gambar.create') }}" class="btn btn-sm btn-primary shadow-sm">ADD</a>
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
                                    <th>ID Revisi</th>
                                    <th>Pekerjaan</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($revisiGambar as $revisi)
                                    <tr>
                                        <td>{{ $revisi->ID_REVISI }}</td>
                                        <td>{{ $revisi->pekerjaan ? $revisi->pekerjaan->NAMA : 'No Pekerjaan' }}</td>

                                        <td>{{ $revisi->DESKRIPSI }}</td>
                                        <td>{{ $revisi->TANGGAL }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="btn btn-primary mr-1" href="{{ route('revisi_gambar.edit', $revisi->ID_REVISI) }}">Edit</a>
                                                <form action="{{ route('revisi_gambar.destroy', $revisi->ID_REVISI) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus revisi gambar ini?')">Delete</button>
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