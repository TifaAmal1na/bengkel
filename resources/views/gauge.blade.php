<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Gauge Chart Example</title>
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
</head>
<body>
    <div id='myChart'></div>

    <script>
        // Pass PHP variables to JavaScript
        var totalJumlah = @json($totalJumlah);
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
                    text: '%v', //default
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
                        rule: '%v <  580',
                        text: '%v<br>Bad'
                    }]
                }
            },
            tooltip: {
                borderRadius: 5
            },
            scaleR: {
                aperture: 180,
                minValue: 0, // Adjust as necessary
                maxValue: 1000, // Adjust as necessary
                step: 50,
                center: {
                    visible: false
                },
                tick: {
                    visible: false
                },
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
                values: [totalJumlah], // Use totalJumlah from the database
                backgroundColor: 'black',
                animation: {
                    effect: 2,
                    method: 1,
                    sequence: 4,
                    speed: 900
                },
            }]
        };

        zingchart.render({
            id: 'myChart',
            data: myConfig,
            height: 500,
            width: '100%'
        });
    </script>
</body>
</html>
