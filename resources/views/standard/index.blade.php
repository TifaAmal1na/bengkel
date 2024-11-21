@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-2 mb-2">
            <div class="card">
                <div class="card-header py-3">
                    <div class="m-0 font-weight-bold text-primary">Standard</div>
                    <div class="float-right">
                        <a href="{{ route('standard.create') }}" class="btn btn-sm btn-primary shadow-sm">ADD</a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Standard</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $standard)
                                    <tr>
                                        <td>{{ $standard->ID_GRAFIK }}</td>
                                        <td>{{ $standard->STANDARD }}</td>
                                        <td>{{ \Carbon\Carbon::parse($standard->TANGGAL_MULAI)->format('d-m-Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($standard->TANGGAL_SELESAI)->format('d-m-Y') }}</td>
                                        <td>
                                            @if($standard->STATUS === 'Aktif')
                                                <span class="badge bg-success" style="width: 15px; height: 15px; border-radius: 50%; display: inline-block;"></span>
                                            @else
                                                <span class="badge bg-danger" style="width: 15px; height: 15px; border-radius: 50%; display: inline-block;"></span>
                                            @endif
                                            {{ $standard->STATUS }}
                                        </td>
                                        <td>
                                            <a href="{{ route('standard.edit', ['standard' => $standard->ID_GRAFIK]) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('standard.destroy', ['standard' => $standard->ID_GRAFIK]) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus standard ini?');">Delete</button>
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
