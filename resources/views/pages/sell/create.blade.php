@extends('layouts.side')

@section('content')
    <div class="container">
        <h4 class="mb-5">Create New Transaction</h4>
        <form action="{{ route('sell.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3 ">
                <label for="tgl_sell">Tanggal</label>
                <input type="date" name="tgl_sell" class="form-control" id="tgl_sell" value="{{ old('tgl_sell') }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="product_id">Product</label>
                <select name="product_id" id="product_id" class="form-control" required>
                    <option>- Product -</option>
                    @foreach ($products as $item)
                        <option value="{{ $item->id }}">{{ $item->name }} ({{ $item->stok }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 ">
                <label for="qty">Quantity</label>
                <input type="number" name="qty" class="form-control" id="qty" required>
            </div>

            @if (session('error'))
                <div class="alert alert-danger mb-3">
                    {{ session('error') }}
                </div>
            @endif

            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-primary px-3" type="submit">Save New Data</button>
                <a href="{{ route('sell.index') }}" class="btn btn-light px-3">Back</a>
            </div>
        </form>

    </div>
@endsection
