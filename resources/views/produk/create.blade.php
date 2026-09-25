
@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">
            <div class="card p-4">
                <h4 class="mb-3">Tambah Produk</h4>

                <form action="{{ route('produk.store') }}" method="POST" novalidate>
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" name="nama_produks" class="form-control @error('nama_produk') is-invalid @enderror"
                               value="{{ old('nama_produk') }}" placeholder="Contoh: Indomie Goreng" required>
                        @error('nama_produk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Harga (Rp)</label>
                        <input type="number" name="harga" min="0" class="form-control @error('harga') is-invalid @enderror"
                               value="{{ old('harga') }}" placeholder="Contoh: 3500" required>
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Stok</label>
                        <input type="number" name="stok" min="0" class="form-control @error('stok') is-invalid @enderror"
                               value="{{ old('stok') }}" placeholder="Contoh: 100" required>
                        @error('stok')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('produk.index') }}" class="btn btn-outline-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
