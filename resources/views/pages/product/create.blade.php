@extends('layouts.side')

@section('content')
    <div class="container mt-5">
        <h4 class="mb-5">Create New Product</h4>
        <form action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data">
            @csrf


            <div class="mb-3">
                <label for="kode_product">Kode Product</label>
                <input type="text" name="kode_product" class="form-control" id="kode_product" required>
            </div>
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>
            <div class="mb-3">
                <label for="kategori_id">Category</label>
                <select name="kategori_id" id="kategori_id" class="form-control shadow-none" required>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_kategori }} </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="stok">Stok</label>
                <input type="number" name="stok" class="form-control" id="stok" required>
            </div>
            <div class="mb-3">
                <label for="unit">Unit</label>
                <input type="text" name="unit" class="form-control" id="unit" required>
            </div>
            <div class="mb-3">
                <label for="supplier_id">Supplier</label>
                <select name="supplier_id" id="supplier_id" class="form-control shadow-none" required>
                    @foreach ($suppliers as $item)
                        <option value="{{ $item->id }}">{{ $item->name }} </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="lokasi">Lokasi</label>
                <input type="text" name="lokasi" class="form-control" id="lokasi" required>
            </div>
            <div class="mb-3">
                <label for="ket">Keterangan Product</label>
                <textarea name="ket" id="ket" cols="30" rows="5" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="cover">Image</label>
                <input type="file" accept="image/*" name="cover" class="form-control" id="cover" required>
            </div>
            <div class="d-flex align-items-center gap-3">
                <button class="btn-simpan rounded-2 p-2 px-3" type="submit">Save New Data</button>
                <a href="{{ route('karyawan.index') }}" class="btn btn-light px-3">Back</a>
            </div>

        </form>

    </div>
@endsection
