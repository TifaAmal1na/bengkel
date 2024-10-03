@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-2 mb-2">
            <div class="card">
                <div class="card-header py-3">
                    <div class="m-0 font-weight-bold text-primary">Data Personel</div>
                    <div class="float-right">
                        <a href="{{ route('personel.create') }}" class="btn btn-sm btn-primary shadow-sm">ADD</a>
                    </div>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID Personel</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Jumlah Pekerja</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($personel as $p)
                                <tr>
                                    <td>{{ $p->ID_PERSONEL }}</td>
                                    <td>{{ $p->NAMA }}</td>
                                    <td>{{ $p->STATUS }}</td>
                                    <td>{{ $p->JUMLAH_PEKERJA }}</td>
                                    <td>
                                        <form action="{{ route('personel.destroy', $p->ID_PERSONEL) }}" method="POST">
                                            <a class="btn btn-primary" href="{{ route('personel.edit', $p->ID_PERSONEL) }}">Edit</a>
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
