@extends('layouts.master')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5>Detail Stok Produk: {{ $product->name }}</h5>
        </div>
        <div class="card-body">
            <table id="example" class="table table-bordered">
                <thead class="table-secondary">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tanggal Stok Masuk</th>
                        <th scope="col">Jumlah Stok Ditambahkan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($product->stocks as $index => $stock)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ \Carbon\Carbon::parse($stock->stock_date)->format('d-m-Y H:i:s') }}</td>
                            <td>{{ $stock->added_stock }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
