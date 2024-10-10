@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-2 mb-2">
            <div class="card">
                <div class="card-header py-3">
                    <div class="m-0 font-weight-bold text-primary">Daftar Pekerjaan</div>
                    <div class="float-right">
                        <a href="{{ route('pekerjaan.create') }}" class="btn btn-sm btn-primary shadow-sm">ADD</a>
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
                                    <th>ID</th>
                                    <th>Nama Pekerjaan</th>
                                    <th>Nama Proyek</th>
                                    <th>Status</th>
                                    <th>Kategori</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Jumlah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pekerjaan as $p)
                                    <tr>
                                        <td>{{ $p->ID_PEKERJAAN }}</td>
                                        <td>{{ $p->NAMA }}</td>
                                        <td>{{ $p->proyek->NAMA ?? 'Tidak Ada Proyek' }}</td>
                                        <td>{{ $p->STATUS }}</td>
                                        <td>{{ $p->KATEGORI }}</td>
                                        <td>{{ $p->TANGGAL }}</td>
                                        <td>{{ $p->TANGGAL_SELESAI }}</td>
                                        <td>{{ $p->JUMLAH }}</td>
                                        <td>
                                            <form action="{{ route('pekerjaan.destroy', $p->ID_PEKERJAAN) }}" method="POST">
                                                <a class="btn btn-primary" href="{{ route('pekerjaan.edit', $p->ID_PEKERJAAN) }}">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
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
