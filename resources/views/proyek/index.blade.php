@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-2 mb-2">
            <div class="card">
                <div class="card-header py-3">
                    <div class="m-0 font-weight-bold text-primary">Data Proyek</div>
                    <div class="float-right">
                        <a href="{{ route('proyek.create') }}" class="btn btn-sm btn-primary shadow-sm">ADD</a>
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
                                    <th>ID Proyek</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Jumlah Pekerja</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $proyek)
                                <tr>
                                    <td>{{ $proyek->ID_PROYEK }}</td>
                                    <td>{{ $proyek->NAMA }}</td>
                                    <td>{{ $proyek->STATUS }}</td>
                                    <td>{{ $proyek->JUMLAH_PEKERJA }}</td>
                                    <td>{{ $proyek->TANGGAL_MULAI }}</td>
                                    <td>
                                        <form action="{{ route('proyek.destroy', $proyek->ID_PROYEK) }}" method="POST">
                                            <a class="btn btn-primary" href="{{ route('proyek.edit', $proyek->ID_PROYEK) }}">Edit</a>
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
