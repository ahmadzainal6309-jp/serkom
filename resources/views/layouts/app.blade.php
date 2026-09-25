{{-- Layout utama aplikasi KasirKu. Halaman lain memakai @extends('layouts.app') --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') &middot; {{ config('app.name', 'KasirKu') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons untuk logo dan ikon --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f4f7fb;
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: .5px;
        }

        .navbar.bg-primary {
            background-color: #991010 !important;
        }

        .navbar-dark .navbar-nav .nav-link {
            color: rgba(255, 255, 255, .85);
        }

        .navbar-dark .navbar-nav .nav-link:hover,
        .navbar-dark .navbar-nav .nav-link.active {
            color: #ffffff;
        }

        .navbar-brand i {
            color: #ffffff;
        }

        .card {
            border: 0;
            box-shadow: 0 2px 10px rgba(15, 39, 71, .08);
        }

        .table th {
            white-space: nowrap;
        }

        .harga {
            font-variant-numeric: tabular-nums;
        }

        .btn-primary {
            background-color: #0f2747;
            border-color: #0f2747;
        }

        .btn-primary:hover,
        .btn-primary:focus {
            background-color: #081b33;
            border-color: #081b33;
        }

        .btn-outline-primary {
            color: #0f2747;
            border-color: #0f2747;
        }

        .btn-outline-primary:hover,
        .btn-outline-primary:focus {
            background-color: #0f2747;
            border-color: #0f2747;
            color: #fff;
        }

        .text-primary {
            color: #0f2747 !important;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #0f2747;
            box-shadow: 0 0 0 .2rem rgba(15, 39, 71, .15);
        }
    </style>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">

       
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
            <i class="bi bi-shop fs-4"></i>
            <span>Art Shop</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home', 'produk.*') ? 'active' : '' }}"
                       href="{{ route('produk.index') }}">
                        Daftar Produk
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('transaksi.create') ? 'active' : '' }}"
                       href="{{ route('transaksi.create') }}">
                        Transaksi Baru
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('transaksi.index', 'transaksi.show') ? 'active' : '' }}"
                       href="{{ route('transaksi.index') }}">
                        Riwayat Transaksi
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<main class="container pb-5">

    {{-- Pesan sukses --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    {{-- Pesan error/gagal --}}
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    @yield('content')

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')

</body>
</html>
