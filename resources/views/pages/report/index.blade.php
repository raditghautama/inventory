@extends('layouts.side')

@section('content')
    <section class="py-5 mt-5">
        <div class="container">
            <form class="d-flex align-items-center justify-content-between" action="{{ route('report.filter') }}">
                <h4 class="mb-2 text-dark col-md-8">Data Pengambilan Barang</h4>
                <select class="form-select " id="bulan" name="bulan" required>
                    <option value="" selected>Pilih Bulan</option>
                    @foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $key => $bulan)
                        <option value="{{ ++$key }}">{{ $bulan }}</option>
                    @endforeach
                </select>
                <select class="form-select ms-2 me-2" id="tahun" name="tahun" required>
                    <option value="" selected>Pilih Tahun</option>
                    @php
                        $years = [];
                    @endphp
                    @foreach ($sells as $tanggal)
                        @php
                            $year = date('Y', strtotime($tanggal->tgl_sell));
                            if (!in_array($year, $years)) {
                                $years[] = $year;
                            }
                        @endphp
                    @endforeach
                    @foreach ($years as $item)
                        <option value="{{ $item }}">{{ $item }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <div class="table-responsive mt-5">
                <table class="table table-striped">
                    <thead>
                        <tr class="table-dark text-white">
                            <th>No</th>
                            <th>Tanggal Pengambilan</th>
                            <th>Product</th>
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
                                <td>
                                    <span class="text-primary fs-6">{{ $item->products->kode_product }}</span>
                                    <p class="fw-semibold ">{{ $item->products->name }}</p>
                                </td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->users->name }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
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
