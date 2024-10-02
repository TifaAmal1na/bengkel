@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-2 mb-2">
            <div class="card">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <div class="m-0 font-weight-bold text-primary">Workload Analysis</div>
                    <div>
                        <a href="{{ route('workload_analysis.create') }}" class="btn btn-primary">Tambah Workload</a>
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
                                    <th>Tanggal</th>
                                    <th>Jumlah Pekerjaan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $workload)
                                    <tr>
                                        <td>{{ $workload->id_grafik }}</td>
                                        <td>{{ $workload->standard }}</td>
                                        <td>{{ \Carbon\Carbon::parse($workload->tanggal)->format('d-m-Y') }}</td> <!-- Menggunakan Carbon untuk memformat tanggal -->
                                        <td>
                                            <a href="{{ route('workload_analysis.edit', $workload->id_grafik) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('workload_analysis.destroy', $workload->id_grafik) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus workload ini?');">Hapus</button>
                                            </form>
                                            <a href="{{ route('workload_analysis.show', $workload->id_grafik) }}" class="btn btn-info">Detail</a>
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