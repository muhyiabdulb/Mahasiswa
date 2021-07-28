<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hasil</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
</head>
<body>
    <div class="card-body">
        <table class="table table-bordered table-striped" id="table">
            <thead>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Nilai Akhir</th>
                <th>Grade</th>
            </thead>
            @foreach ($hasil as $item)
            <tbody>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item['nim'] }}</td>
                <td>{{ $item['nama'] }}</td>
                <td>{{ $item['nilaiAkhir'] }}</td>
                <td>
                    @if($item['nilaiAkhir'] >= 85)
                        {{ 'A' }}
                    @elseif($item['nilaiAkhir'] >= 76)
                        {{ 'B' }}
                    @elseif($item['nilaiAkhir'] >= 61)
                        {{ 'C' }}
                    @elseif($item['nilaiAkhir'] >= 46)
                        {{ 'D' }}
                    @else 
                    {{ 'E' }}
                    @endif
                </td>
            </tbody>
            @endforeach
        </table>
        {{ '==========================================' }}
        <p>Jumlah Mahasiswa : {{ $jumlahSiswa }} </p>
        <p>Jumlah Mahasiswa yg Lulus : {{ $lulus }}</p>
        <p>Jumlah Mahasiswa yg Tidak Lulus : {{ $tidakLulus }}</p>
        <a href="{{ route("test") }}" class="btn btn-success">Kembali</a>
    </div>
</body>
</html>