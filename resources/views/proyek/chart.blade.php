<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart Proyek</title>
    {{-- @vite('resources/js/app.js') Pastikan untuk mengimpor Laravel Mix jika diperlukan --}}
</head>

<body>
    <h1>Chart Proyek</h1>
    {!! $chart->container() !!}

    <script src="{{ $chart->cdn() }}"></script>
    {!! $chart->script() !!}
</body>

</html>
