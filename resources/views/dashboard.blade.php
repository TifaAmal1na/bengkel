@extends('layouts.app')

@section('content')

<div class="row">
    <!-- Gauge Section -->
    <div class="col-md-6">
        <div class="chart-container"
            style="border: 3px solid; border-radius: 10px; box-shadow: 0 4px 8px rgba(100, 143, 236, 0.2); padding: 0; height: 260px; width: 100%;">
            <div id="myChart" style="height: 100%; width: 100%; min-height: 150px;"></div>
        </div>
    </div>

    <!-- Project Active and All Work Section -->
    <div class="col-md-6">
        <div class="row">
            <!-- Project Active Card Example -->
            <div class="col-xl-6 col-md-6 mb-4 h-100">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Project Active</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $aktifProyek }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-tasks fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- All Work Card Example -->
            <div class="col-xl-6 col-md-6 mb-4 h-100">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">All Work</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pekerjaansemua }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tools Need Calibration Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Tools Need Calibration</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $kalibrarionTools }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-tools fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tools Active Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tools Active</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $aktifTools }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-tools fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


        <!-- Charts Section -->
        <div class="container">
            <div class="row mb-3">
                <!-- Workload Chart -->
                <div class="col-md-4">
                    <div class="chart-container"
                        style="border: 3px solid; border-radius: 10px; box-shadow: 0 4px 8px rgba(100, 143, 236, 0.2); padding: 0; margin-top: 20px;">
                        {!! $workloadChart->container() !!}
                    </div>
                </div>

                <!-- Proyek Chart -->
                <div class="col-md-4">
                    <div class="chart-container"
                        style="border: 3px solid; border-radius: 10px; box-shadow: 0 4px 8px rgba(100, 143, 236, 0.2); padding: 0; margin-top: 20px;">
                        {!! $proyekChart->container() !!}
                    </div>
                </div>

                <!-- Personel Chart -->
                <div class="col-md-4">
                    <div class="chart-container"
                        style="border: 3px solid; border-radius: 10px; box-shadow: 0 4px 8px rgba(100, 143, 236, 0.2); padding: 0; margin-top: 20px; height: 520px; width: 100%;">
                        {!! $personelChart->container() !!}
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="chart-container"
                        style="border: 3px solid; border-radius: 10px; box-shadow: 0 4px 8px rgba(100, 143, 236, 0.2); padding: 0; height: 500px; width: 100%;">
                        {!! $toolsChart->container() !!}
                    </div>
                </div>
                <div class="col-md-6 clearfix">
                    <div id="pekerjaan-chart"
                        style="border: 3px solid; border-radius: 10px; box-shadow: 0 4px 8px rgba(100, 143, 236, 0.2); padding: 0; height: 500px; width: 100%;">
                        {!! $pekerjaanChart->container() !!}
                    </div>
                </div>

                <div class="row mt-4"> <!-- Tambahkan margin-top yang lebih besar -->
                    <!-- Latest Notifications Column -->
                    <div class="col-md-6 mb-4">
                        <h5>Latest Notifications</h5>
                        <ul class="list-group">
                            @foreach ($notifications as $notification)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>{{ $notification->JUDUL }}</strong><br>
                                        <small>{{ $notification->DESKRIPSI }}</small><br>
                                        <small><i>{{ $notification->TANGGAL }}</i></small>
                                    </div>
                                    <span
                                        class="badge {{ $notification->PRIORITAS == 'High' ? 'badge-danger' : 'badge-primary' }} badge-pill">
                                        {{ $notification->PRIORITAS }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Latest Revisions Column -->
                    <div class="col-md-6 mb-4">
                        <h5>Latest Revisions</h5>
                        <ul class="list-group">
                            @foreach ($latestRevisions as $revision)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>{{ $revision->pekerjaan->NAMA ?? 'No Project' }}</strong><br>
                                        <small>{{ $revision->DESKRIPSI }}</small><br>
                                        <small><i>{{ $revision->TANGGAL }}</i></small>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="row mt-5"> <!-- Tambahkan margin-top lagi di sini -->
                    <!-- Latest Activities Column -->
                    <div class="col-md-12">
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
                                                    <h5 style="margin: 0;">{{ $activity->pekerjaan->NAMA }}</h5>
                                                    <p style="margin: 0;">{{ $activity->DESKRIPSI }}</p>
                                                    <span class="badge badge-primary badge-pill" style="font-size: 0.9rem;">
                                                        <small>Status: {{ $activity->STATUS }}</small>
                                                        {{ $activity->PRIORITAS }}
                                                    </span>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Include Gauge Script -->
                <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
                <script>
                    ZC.LICENSE = ["your-license-key"];
                    const myConfig = {
                        type: 'gauge',
                        globals: {
                            fontSize: 20
                        },
                        plot: {
                            size: '100%',
                            valueBox: {
                                placement: 'center',
                                text: '%v',
                                fontSize: 20,
                                rules: [{
                                        rule: '%v >= 70',
                                        text: '%v<br>Good'
                                    },
                                    {
                                        rule: '%v >= 40 && %v < 70',
                                        text: '%v<br>Moderate'
                                    },
                                    {
                                        rule: '%v < 40',
                                        text: '%v<br>Critical'
                                    }
                                ]
                            }
                        },
                        scaleR: {
                            aperture: 180,
                            minValue: 0,
                            maxValue: 100,
                            step: 10,
                            ring: {
                                size: 60,
                                rules: [{
                                        rule: '%v >= 70',
                                        backgroundColor: '#03C04A'
                                    },
                                    {
                                        rule: '%v >= 40 && %v < 70',
                                        backgroundColor: '#FFDD57'
                                    },
                                    {
                                        rule: '%v < 40',
                                        backgroundColor: '#FF4C4C'
                                    }
                                ]
                            }
                        },
                        series: [{
                            values: [{{ $gaugeData }}], // Replace with dynamic value
                            backgroundColor: 'black',
                        }]
                    };
                    zingchart.render({
                        id: 'myChart',
                        data: myConfig,
                        height: '100%',
                        width: '100%'
                    });
                </script>

                <!-- Include other chart scripts -->
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
        </div>
    @endsection
