<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="shortcut icon" href="/img/logo/shian-logo.png">
    <title>Weesia - Your Best Marketplace</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="style/main.css" rel="stylesheet" />
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
                    <a href="{{ route('penjual.home') }}" class="list-group-item list-group-item-action">
                        Dashboard
                    </a>
                    <a href="{{ route('produk') }}" class="list-group-item list-group-item-action active">
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
                            <h2 class="dashboard-title">Produk Saya</h2>
                            <p class="dashboard-subtitle">manajemen produkmu dan dapatkan uang sebanyaknya</p>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success">
                                <b>Yeah!</b> {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                <b>Gagal!</b> {{ session('error') }}
                            </div>
                        @endif
                        <div class="dashboard-content">
                            <div class="row">
                                <div class="col-12">
                                    <a href="/produk/create" class="btn btn-success">Tambah Produk</a>
                                </div>
                            </div>
                            <div class="row mt-4">
                                @if (count($products) > 0)
                                    @foreach ($products as $product)
                                        @php $stock = $product->stok == 0 ? '<span class="text-danger">Habis</span>' : $product->stok; @endphp
                                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                            <a href="/update/{{ $product->id }}"
                                                class="card card-dashboard-product d-block">
                                                <div class="card-body">
                                                    <img src="/img/products/{{ $product->gambar }}" alt=""
                                                        style="width: 258px;" class="w-100 mb-2" />
                                                    <div class="product-tittle">{{ $product->nama }}</div>
                                                    <div class="product-category">{{ ucfirst($product->kategori) }}
                                                    </div>
                                                    <div class="product-stock">Stok: {!! $stock !!}</div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
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

</html>
