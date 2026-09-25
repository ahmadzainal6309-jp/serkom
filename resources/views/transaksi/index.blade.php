{{-- Fitur 3: Halaman/tabel riwayat transaksi + rangkuman total penjualan --}}
@extends('layouts.app')

@section('title', 'Riwayat Transaksi')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h4 class="mb-1">Riwayat Transaksi</h4>
            <small class="text-muted">Catatan seluruh penjualan yang pernah dilakukan</small>
        </div>
        <a href="{{ route('transaksi.create') }}" class="btn btn-primary">+ Transaksi Baru</a>
    </div>

   
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card p-3 text-center">
                <small class="text-muted text-uppercase">Total Penjualan</small>
                
                <strong class="fs-4 text-primary harga">Rp {{ number_format($totalPenjualan, 0, ',', '.') }}</strong>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 text-center">
                <small class="text-muted text-uppercase">Jumlah Transaksi</small>
                <strong class="fs-4">{{ $jumlahTransaksi }} nota</strong>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 text-center">
                <small class="text-muted text-uppercase">Total Unit Terjual</small>
                <strong class="fs-4">{{ $totalUnitTerjual }} item</strong>
            </div>
        </div>
    </div>

    <div class="card p-3">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Tanggal</th>
                        <th class="text-center">Jumlah Item</th>
                        <th class="text-end">Total Bayar (Rp)</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transaksis as $transaksi)
                        <tr>
                            <td>#{{ $transaksi->id }}</td>
                             {{-- <td>#{{ $loop->iteration }}</td> --}}
                           
                            <td>{{ $transaksi->tanggal->format('d/m/Y H:i') }}</td>
                           
                            <td class="text-center">{{ $transaksi->detailTransaksis->count() }} item</td>
                            <td class="text-end harga"><strong>Rp {{ number_format($transaksi->total_bayar, 0, ',', '.') }}</strong></td>
                            <td class="text-center">
                                <a href="{{ route('transaksi.show', $transaksi) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">Belum ada transaksi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">{{ $transaksis->links('pagination::bootstrap-5') }}</div>
    </div>
@endsection
