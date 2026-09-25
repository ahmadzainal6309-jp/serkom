{{-- Detail satu transaksi (tampilan struk: daftar item + total bayar) --}}
@extends('layouts.app')

@section('title', 'Detail Transaksi #' . $transaksi->id)

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <h4 class="mb-1">Struk Transaksi #{{ $transaksi->id }}</h4>
                        <span class="text-muted">{{ $transaksi->tanggal->format('d/m/Y H:i:s') }}</span>
                    </div>
                    <a href="{{ route('transaksi.index') }}" class="btn btn-outline-secondary btn-sm">&larr; Kembali</a>
                </div>

                <table class="table table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>Produk</th>
                            <th class="text-center">Harga Satuan</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-end">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        @foreach ($transaksi->detailTransaksis as $detail)
                            <tr>
                               
                                <td>{{ $detail->produk->nama_produk ?? '(produk terhapus)' }}</td>
                                <td class="text-center harga">Rp {{ number_format($detail->produk->harga ?? 0, 0, ',', '.') }}</td>
                                <td class="text-center">{{ $detail->jumlah }}</td>
                                <td class="text-end harga">Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="table-primary fw-bold">
                            <td colspan="3">TOTAL BAYAR</td>
                            <td class="text-end harga">Rp {{ number_format($transaksi->total_bayar, 0, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
