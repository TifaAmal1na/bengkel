<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gauge Chart Example</title>
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <style>
        .gauge-container {
            text-align: center;
            margin-top: 20px;
        }
        .gauge-container h3 {
            font-size: 24px;
        }
        .gauge-container p {
            font-size: 18px;
        }
        #myChart {
            width: 100%;
            height: 500px; /* Tambahkan ukuran div untuk chart */
        }
    </style>
</head>
<body>

<div class="gauge-container">
    <h3>Gauge Status</h3>
    <p>Completion Percentage: {{ $completionPercentage }}%</p>
    <p>Average Standard: {{ $averageStandard }}</p>
    <p>Health Status: {{ $healthStatus }}</p>
    
    {{-- Debugging --}}
    <pre>{{ var_dump($totalJumlah, $completionPercentage, $averageStandard, $healthStatus) }}</pre>
    
    <div id="myChart"></div> <!-- Pastikan id disini sesuai dengan JavaScript -->
</div>

<script>
    window.onload = function () {
        var totalJumlah = @json($totalJumlah);  // Pastikan totalJumlah ada
        var averageStandard = @json($averageStandard);

        var myConfig = {
            type: "gauge",
            globals: {
                fontSize: 25
            },
            plotarea: {
                marginTop: 80
            },
            plot: {
                size: '100%',
                valueBox: {
                    placement: 'center',
                    text: '%v',
                    fontSize: 35,
                    rules: [{
                        rule: '%v >= 700',
                        text: '%v<br>EXCELLENT'
                    }, {
                        rule: '%v < 700 && %v > 640',
                        text: '%v<br>Good'
                    }, {
                        rule: '%v < 640 && %v > 580',
                        text: '%v<br>Fair'
                    }, {
                        rule: '%v < 580',
                        text: '%v<br>Bad'
                    }]
                }
            },
            scaleR: {
                aperture: 180,
                minValue: 0,
                maxValue: 1000,
                step: 50,
                labels: ['0', '', '', '', '', '', '580', '640', '700', '750', '', '1000'],
                ring: {
                    size: 50,
                    rules: [{
                        rule: '%v <= 580',
                        backgroundColor: '#E53935'
                    }, {
                        rule: '%v > 580 && %v < 640',
                        backgroundColor: '#EF5350'
                    }, {
                        rule: '%v >= 640 && %v < 700',
                        backgroundColor: '#FFA726'
                    }, {
                        rule: '%v >= 700',
                        backgroundColor: '#29B6F6'
                    }]
                }
            },
            series: [{
                values: [totalJumlah],  // Nilai totalJumlah dari controller
                backgroundColor: 'black',
                animation: {
                    effect: 2,
                    method: 1,
                    sequence: 4,
                    speed: 900
                }
            }]
        };

        zingchart.render({
            id: 'myChart',  // Ini harus sesuai dengan id di HTML
            data: myConfig,
            height: 500,
            width: '100%'
        });
    }
</script>

</body>
</html>
