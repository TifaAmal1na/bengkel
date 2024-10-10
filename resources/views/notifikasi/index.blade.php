@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-2 mb-2">
            <div class="card">
                <div class="card-header py-3">
                    <div class="m-0 font-weight-bold text-primary">Data Notifikasi</div>
                    <div class="float-right">
                        <a href="{{ route('notifikasi.create') }}" class="btn btn-sm btn-primary shadow-sm">ADD</a>
                    </div>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID Notifikasi</th>
                                    <th>Nama Proyek</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal</th>
                                    <th>Prioritas</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notifikasi as $item)
                                <tr>
                                    <td>{{ $item->ID_NOTIFIKASI }}</td>
                                    <td>{{ $item->Proyek->NAMA }}</td>
                                    <td>{{ $item->JUDUL }}</td>
                                    <td>{{ $item->DESKRIPSI }}</td>
                                    <td>{{ $item->TANGGAL }}</td>
                                    <td>{{ $item->PRIORITAS }}</td>
                                    <td>
                                        <form action="{{ route('notifikasi.destroy', $item->ID_NOTIFIKASI) }}" method="POST">
                                        <a class="btn btn-primary" href="{{ route('notifikasi.edit', $item->ID_NOTIFIKASI) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus notifikasi ini?')">Delete</button>
                                        </form>
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