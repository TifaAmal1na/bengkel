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
                                    <th>Status</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pekerjaan as $p)
                                    <tr>
                                        <td>{{ $p->ID_PEKERJAAN }}</td>
                                        <td>{{ $p->NAMA }}</td>
                                        <td>
                                            <span class="badge {{ $p->STATUS === 'Selesai' ? 'bg-success' : 'bg-warning text-dark' }}">
                                                {{ $p->STATUS }}
                                            </span>
                                        </td>
                                        <td>{{ $p->TANGGAL }}</td>
                                        <td>{{ $p->TANGGAL_SELESAI ?? '-' }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <button class="btn btn-success mr-1" onclick="showFinishModal({{ $p->ID_PEKERJAAN }})" {{ $p->STATUS === 'Selesai' ? 'disabled' : '' }}>Finish</button>
                                                <a class="btn btn-primary mr-1" href="{{ route('pekerjaan.edit', $p->ID_PEKERJAAN) }}">Edit</a>
                                                <form action="{{ route('pekerjaan.destroy', $p->ID_PEKERJAAN) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
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

<!-- Finish Modal -->
<div class="modal fade" id="finishModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="finishForm" method="POST" action="">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Set Tanggal Selesai</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="tanggal_selesai">Tanggal Selesai:</label>
                    <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    // Function to show the Finish modal
    function showFinishModal(id) {
        const form = document.getElementById('finishForm');
        form.action = `/pekerjaan/${id}/finish`;
        new bootstrap.Modal(document.getElementById('finishModal')).show();
    }
</script>
@endsection
