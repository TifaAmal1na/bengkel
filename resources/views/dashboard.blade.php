@extends('layouts.app')

@section('content')
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                User</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Project Active</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $aktifProyek }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tasks fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Person Active</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $aktifPersonel }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Tools Need Calibration</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $kalibrarionTools }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tools fa-2x text-gray-300 "></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Tools Active</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $aktifTools }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tools fa-2x text-gray-300 "></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Workload Activity</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPekerjaanAktif }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tools fa-2x text-gray-300 "></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="chart-container"
                        style="border: 3px solid; border-radius: 10px; box-shadow: 0 4px 8px rgba(100, 143, 236, 0.2); padding: 0;">
                        {!! $workloadChart->container() !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="chart-container"
                        style="border: 3px solid; border-radius: 10px; box-shadow: 0 4px 8px rgba(100, 143, 236, 0.2); padding: 0;">
                        {!! $proyekChart->container() !!}
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="chart-container"
                        style="border: 3px solid; border-radius: 10px; box-shadow: 0 4px 8px rgba(100, 143, 236, 0.2); padding: 0; height: 400px; width: 100%;">
                        {!! $personelChart->container() !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="chart-container"
                        style="border: 3px solid; border-radius: 10px; box-shadow: 0 4px 8px rgba(100, 143, 236, 0.2); padding: 0; height: 400px; width: 100%;">
                        {!! $toolsChart->container() !!}
                    </div>
                </div>
                <div class="col-md-6 clearfix">
                    <div id="pekerjaan-chart"
                        style="border: 3px solid; border-radius: 10px; box-shadow: 0 4px 8px rgba(100, 143, 236, 0.2); padding: 0; height: 500px; width: 100%; margin-top: 20px;">
                        {!! $pekerjaanChart->container() !!}
                    </div>
                </div>                
            
            <div class="col-md-6 clearfix">
            <h5>Latest Notifications</h5>
            <ul class="list-group mb-4">
             @foreach ($notifications as $notification)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $notification->JUDUL }}</strong><br>
                    <small>{{ $notification->DESKRIPSI }}</small><br>
                    <small><i>{{ $notification->TANGGAL }}</i></small>
                </div>
                <span class="badge badge-primary badge-pill">{{ $notification->PRIORITAS }}</span>
            </li>
          @endforeach
        </ul>
       </div>

       <div class="col-md-6 clearfix">
    <h5>Latest Revisions</h5>
    <ul class="list-group mb-4">
        @foreach ($latestRevisions as $revision)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
                <strong>{{ $revision->pekerjaan->NAMA ??  'No Project' }}</strong><br>
                <small>{{ $revision->DESKRIPSI }}</small><br>
                <small><i>{{ $revision->TANGGAL }}</i></small>
            </div>
        </li>
        @endforeach
    </ul>
</div>

<div class="card">
    <div class="card-header">
        <h5>Latest Activities</h5>
    </div>
    <div class="card-body">
        @if ($latestActivities->isEmpty())
            <p>No activities found.</p>
        @else
            <ul class="list-group">
                @foreach ($latestActivities as $activity)
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="activity">
                            <h5 style="margin: 0;">{{ $activity->pekerjaan->NAMA }}</h5> <!-- Menampilkan nama pekerjaan -->
                            <p style="margin: 0;">{{ $activity->DESKRIPSI }}</p> <!-- Menampilkan deskripsi aktivitas -->
                                                    <span class="badge badge-primary badge-pill" style="font-size: 0.9rem;">
                            <small>Status: {{ $activity->STATUS }}</small> <!-- Menampilkan status aktivitas -->
                                                        {{ $activity->PRIORITAS }}
                        </span>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>

            <script src="{{ $proyekChart->cdn() }}"></script>
            {!! $proyekChart->script() !!}

            <script src="{{ $personelChart->cdn() }}"></script>
            {!! $personelChart->script() !!}

            <script src="{{ $toolsChart->cdn() }}"></script>
            {!! $toolsChart->script() !!}

            <script src="{{ $workloadChart->cdn() }}"></script>
            {!! $workloadChart->script() !!}

            <script src="{{ $pekerjaanChart->cdn() }}"></script>
            {!! $pekerjaanChart->script() !!}
        </div>
    @endsection
