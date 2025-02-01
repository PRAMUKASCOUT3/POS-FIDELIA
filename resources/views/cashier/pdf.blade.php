<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .container {
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .card-header {
            padding: 10px;
            border-radius: 5px;
            font-size: 18px;
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            max-width: 100px;
        }

        .header-text {
            margin-top: -100px;
            text-align: center;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: center;
            vertical-align: middle;
        }

        .table th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        .tfoot td {
            font-weight: bold;
            background-color: #f1f1f1;
        }

        .signature {
            margin-top: 30px;
            text-align: right;
        }

        .signature u {
            margin-top: 30px;
            display: block;
            font-weight: bold;
        }
    </style>
</head>

<body>
    @php
        $tanggal = \Carbon\Carbon::now();
        $bulanTahun = $tanggal->translatedFormat('F Y'); // Menampilkan bulan dan tahun dalam bahasa Indonesia
        $users = Auth::user();
    @endphp

    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-light">
                <div class="header-content">
                    <img src="C:\laragon\www\POS-FIDELIA\public\assets\img\JOJO.png" alt="Logo" class="logo">
                    <div class="header-text">
                        <h2 class="mb-0">Laporan Pengguna/Kasir</h2>
                        <p class="mb-0">Jambi, {{ $bulanTahun }}</p>
                        <p class="mb-0">Marene, Kel.Eka jaya Kec.Paal Merah</p>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Kasir</th>
                            <th>Kode Transaksi</th>
                            <th>Tanggal</th>
                            <th>Nama Produk</th>
                            <th>Jumlah Produk</th>
                            <th>Subtotal</th>
                            <th>Bayar</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $groupedCashier = $cashier->groupBy('code');
                        @endphp
                        @foreach ($groupedCashier as $code => $items)
                            <tr>
                                <td rowspan="{{ $items->count() }}">{{ $items->first()->user->name }}</td>
                                <td rowspan="{{ $items->count() }}">{{ $code }}</td>
                                <td rowspan="{{ $items->count() }}">{{ $items->first()->date }}</td>
                                <td>{{ $items->first()->product->name }}</td>
                                <td>{{ $items->first()->total_item }}</td>
                                <td rowspan="{{ $items->count() }}">Rp.
                                    {{ number_format($items->sum('subtotal'), 0, ',', '.') }}</td>
                                <td rowspan="{{ $items->count() }}">Rp.
                                    {{ number_format($items->first()->amount_paid, 0, ',', '.') }}</td>
                                <td rowspan="{{ $items->count() }}">
                                    <span class="badge bg-success">{{ ucfirst($items->first()->status) }}</span>
                                </td>
                            </tr>
                            @foreach ($items->slice(1) as $item)
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->total_item }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-end">Total Pendapatan</td>
                            <td>Rp. {{ number_format($total_pendapatan, 2, ',', '.') }}</td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-end">Pengeluaran</td>
                            <td>Rp. {{ number_format($total_pengeluaran, 2, ',', '.') }}</td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-end">Total Keseluruhan</td>
                            <td>Rp. {{ number_format($total_keseluruhan, 2, ',', '.') }}</td>
                            <td colspan="2"></td>
                        </tr>
                    </tfoot>
                </table>

                <div class="signature text-end mt-4">
                    <p>{{ $tanggal->format('Y-m-d') }}, Jambi</p>
                    <br><br><br>
                    <p><u>{{ $users->name }}</u></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
