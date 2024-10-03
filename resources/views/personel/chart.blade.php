<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart Personel</title>
    {{-- @vite('resources/js/app.js') --}}
</head>

<body>
    <h1>Distribusi Jumlah Pekerja Berdasarkan Status Tim</h1>
    {!! $chart->container() !!}

    <script src="{{ $chart->cdn() }}"></script>
    {!! $chart->script() !!}
</body>

</html>
