@extends('layouts.side')

@section('content')
    <section class="py-5 mt-5">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <h4 class="mb-0 text-dark">Data Pengambilan Barang</h4>
                <a href="{{ route('sell.create') }}" class="btn btn-primary" type="button">
                    Ambil Barang
                </a>
            </div>

            <div class="table-responsive mt-5">
                <table class="table table-striped">
                    <thead>
                        <tr class="table-dark text-white">
                            <th>No</th>
                            <th>Tanggal Pengambilan</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Diambil oleh</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sells as $key => $item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->tgl_sell }}</td>
                                <td>{{ $item->products->kode_product }}</td>
                                <td>{{ $item->products->name }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->users->name }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <a href="{{ route('sell.show', $item->id) }}"
                                            class="btn btn-info rounded-2 px-2 py-1 text-decoration-none btn-sm">Detail</a>
                                        <a href="{{ route('sell.edit', $item->id) }}"
                                            class="btn btn-primary rounded-2 px-2 py-1 text-decoration-none btn-sm">Edit</a>
                                        <form action="{{ route('sell.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger rounded-2 px-1 py-1 btn-sm " type="submit"
                                                onclick="return confirm('Temenan?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
