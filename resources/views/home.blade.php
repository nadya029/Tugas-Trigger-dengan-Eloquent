<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>halaman beranda</title>
</head>

<body>
    <div>
        <center>
            <h2>Ini adalah halaman beranda</h3>
                <h4>List User</h4>
                @foreach ($users as $key => $value)
                {{ $value['id'] }}
                {{ $value['nama'] }}<br>
                @endforeach
                @php
                $today = Carbon\Carbon::now()->translatedFormat('d M Y');
                echo $today;
                @endphp



        </center>
    </div>
</body>

</html>