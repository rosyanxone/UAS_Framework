<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="shortcut icon" href="/img/logo/shian-logo.png">
    <title>Weesia - Your Best Marketplace</title>

    <link href="{{ asset('style/main.css') }}" rel="stylesheet" />
    <link href="{{ asset('stylesheet/style.css') }}" rel="stylesheet" />
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> --}}
</head>

<body>
    <div class="page-dashboard">
        <div class="d-flex" id="wrapper" data-aos="fade-right">
            <!-- Sidebar -->
            <div class="border-right" id="sidebar-wrapper">
                <div class="sidebar-heading text-center">
                    <img src="/images/logo.svg" alt="" class="my-4" width="180px" />
                </div>
                <div class="list-group list-group-flush">
                    <a href="{{ route('penjual.home') }}" class="list-group-item list-group-item-action active">
                        Dashboard
                    </a>
                    <a href="{{ route('produk') }}" class="list-group-item list-group-item-action">
                        Produk
                    </a>
                    <a href="/penjual/user" class="list-group-item list-group-item-action">
                        Akun
                    </a>
                    <a href="/logout" class="list-group-item list-group-item-action">
                        Logout
                    </a>
                </div>
            </div>

            <!-- Page Content  -->
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top" data-aos="fade-down">
                    <div class="container-fluid">
                        <button class="btn btn-secondary d-md-none mr-auto mr2" id="menu-toggle">
                            &laquo; Menu
                        </button>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Dekstop Menu -->
                            <ul class="navbar-nav d-none d-lg-flex ml-auto">
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link" id="navbarDropdown" role="button"
                                        data-toggle="dropdown">
                                        Hi, {{ Auth::user()->name }}
                                        <img src="/img/profile/{{ Auth::user()->image }}" alt=""
                                            class="rounded-circle mr-2 profile-picture" />
                                    </a>
                                    <div class="dropdown-menu">
                                        <a href="/penjual" class="dropdown-item">Dashboard</a>
                                        <a href="/penjual/user" class="dropdown-item">Account</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="/logout" class="dropdown-item">Logout</a>
                                    </div>
                                </li>
                            </ul>

                            <ul class="navbar-nav d-block d-lg-none">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">{{ Auth::user()->name }}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link d-inline-block"> Cart </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <!-- Section Content-->
                <div class="section-content section-dashboard-home" data-aos="fade-up">
                    <div class="container-fluid">
                        <div class="dashboard-heading">
                            <h2 class="dashboard-title">Dashboard</h2>
                            <p class="dashboard-subtitle">Lihat apa aja yang hari ini terjual yuk</p>
                        </div>
                        <div class="dashboard-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <div class="dashboard-card-title">Jumlah Customer</div>
                                            <div class="dashboard-card-subtitle">{{ $customer }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <div class="dashboard-card-title">Total Pemasukan</div>
                                            <div class="dashboard-card-subtitle">Rp.{{ number_format($total_income) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <div class="dashboard-card-title">Jumlah Transaksi</div>
                                            <div class="dashboard-card-subtitle">{{ $jumlah_transaksi }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 mt-2">
                                    <h5 class="mb-3">Riwayat transaksi dari Produk yang terjual</h5>
                                    @if (count($transactions) > 0)
                                        @foreach ($transactions as $transaction)
                                            <div href="/dashboard-transactions-details.html"
                                                class="card card-list d-block">
                                                <div class="card-body">
                                                    <div class="row d-flex justify-content-between align-center">
                                                        <div class="col-md-2">
                                                            <img src="/img/products/{{ $transaction->produk->gambar }}"
                                                                alt="" style="width: 100%" />
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="row">
                                                                {{ $transaction->produk->nama }}
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <p class="fs-6">
                                                                        <b>{{ $transaction->jumlah_barang }}x</b>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">Rp.{{ $transaction->total_harga }}</div>
                                                        <div class="col-md-3">{{ $transaction->user->name }}</div>
                                                        <div class="col-md-2">
                                                            {{ $transaction->created_at->format('D, d M Y') }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            @if($transactions->hasPages())
                                <div class="">
                                    {{ $transactions->links() }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</body>
