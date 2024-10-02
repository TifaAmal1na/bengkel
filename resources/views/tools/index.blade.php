@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-2 mb-2">
            <div class="card">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h1 class="m-0 font-weight-bold text-primary">Daftar Tools</h1>
                    <div>
                        <a href="{{ route('tools.create') }}" class="btn btn-primary">Tambah Tool</a>
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
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($data->isEmpty())
                                    <tr>
                                        <td colspan="5" class="text-center">Data tidak tersedia.</td>
                                    </tr>
                                @else
                                    @foreach ($data as $tool)
                                        <tr>
                                            <td>{{ $tool->ID_TOOLS }}</td> <!-- Sesuaikan dengan nama kolom di database -->
                                            <td>{{ $tool->NAMA }}</td>
                                            <td>{{ $tool->STATUS }}</td>
                                            <td>{{ \Carbon\Carbon::parse($tool->TANGGAL)->format('d-m-Y') }}</td> <!-- Menggunakan Carbon untuk format tanggal -->
                                            <td>
                                                <a href="{{ route('tools.edit', $tool->ID_TOOLS) }}" class="btn btn-warning">Edit</a>
                                                <form action="{{ route('tools.destroy', $tool->ID_TOOLS) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus tool ini?');">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div> <!-- Tutup div card-body -->
            </div>
        </div>
    </div>
</div>
@endsection