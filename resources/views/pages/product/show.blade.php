@extends('layouts.side')

@section('content')
    <section class="deatil py-5 ms-5 px-5">
        <div class="container">
            <div class="d-flex  justify-content-between mb-5">
                <h2 class="mb-0">Datail Product {{ $item->name }}</h2>
                <a href="{{ route('karyawan.index') }}" class="btn btn-light">Go Back</a>
            </div>

            <table class="table  table-striped">
                <thead>
                    <tr>
                        <th class="col-md-2">Image</th>
                        <td>: <img src="{{ url('storage/' . $item->cover) }}" alt="image"
                                style="width: 50px; height: 50px; object-fit: cover"></td>
                    </tr>
                    <tr>
                        <th class="col-md-2">Kode Product</th>
                        <td>: {{ $item->kode_product }}</td>
                    </tr>
                    <tr>
                        <th class="col-md-2">Name</th>
                        <td>: {{ $item->name }}</td>
                    </tr>
                    <tr>
                        <th class="col-md-2">Category</th>
                        <td>: {{ $item->category->nama_kategori }}</td>
                    </tr>
                    <tr>
                        <th class="col-md-2">Stok</th>
                        <td>: {{ $item->stok }}</td>
                    </tr>
                    <tr>
                        <th class="col-md-2">Unit</th>
                        <td>: {{ $item->unit }}</td>
                    </tr>
                    <tr>
                        <th class="col-md-2">Supplier</th>
                        <td>: {{ $item->supplier->name }}</td>
                    </tr>
                    <tr>
                        <th class="col-md-2">Lokasi</th>
                        <td>: {{ $item->lokasi }}</td>
                    </tr>
                    <tr>
                        <th class="col-md-2 py-5 mb-5">Keterangan</th>
                        <td> {{ $item->ket }}</td>
                    </tr>
                </thead>
            </table>
        @endsection
