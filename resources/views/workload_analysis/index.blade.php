@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-2 mb-2">
            <div class="card">
                <div class="card-header py-3">
                    <div class="m-0 font-weight-bold text-primary">Workload Analysis</div>
                    <div class="float-right">
                        <a href="{{ route('workload_analysis.create') }}" class="btn btn-sm btn-primary shadow-sm">ADD</a>
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
                                        <td>{{ $workload->ID_GRAFIK }}</td>
                                        <td>{{ $workload->STANDARD }}</td>
                                        <td>{{ \Carbon\Carbon::parse($workload->TANGGAL)->format('d-m-Y') }}</td> <!-- Menggunakan Carbon untuk memformat tanggal -->
                                        <td>{{ $workload->JUMLAH_PEKERJAAN }}</td>
                                        <td>
                                        <a href="{{ route('workload_analysis.edit', ['workload_analysis' => $workload->ID_GRAFIK]) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('workload_analysis.destroy', ['workload_analysis' => $workload->ID_GRAFIK]) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus workload ini?');">Delete</button>
                                        </form>
                                        <a href="{{ route('workload_analysis.show', ['workload_analysis' => $workload->ID_GRAFIK]) }}" class="btn btn-warning">Detail</a>
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