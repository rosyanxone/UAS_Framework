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
    <link href="{{ asset('style/main.css') }}" rel="stylesheet" />
    <link href="{{ asset('stylesheet/style.css') }}" rel="stylesheet" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
        <div class="container">
            <a href="{{ route(Auth::user() == 'penjual' ? 'penjual.home' : 'pembeli.home') }}" class="navbar-brand">
                <img src="{{ asset('images/logo.svg') }}" alt="logo" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ">
                        <a href="{{ route(Auth::user() == 'penjual' ? 'penjual.home' : 'pembeli.home') }}"
                            class="nav-link">Home</a>
                    </li>

                    @if (Auth::user())
                        @if (Auth::user()->role == 'pembeli')
                            <li class="nav-item">
                                <a href="{{ route('user.transaksi') }}" class="nav-link" aria-current="page">Profil</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('pembeli.keranjang') }}" class="nav-link"
                                    aria-current="page">Keranjang
                                    &nbsp;&nbsp;
                                    <img src="/images/icon-cart-filled.svg" alt="" />
                                    <div class="card-badge">{{ $total_produk }}</div>
                                </a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">Sign Up</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        @php $stat = Auth::user() ? 'logout' : 'login' @endphp
                        <a class="btn btn-primary" href="{{ "/$stat" }}" class="nav-link " aria-current="page">
                            {{ ucfirst($stat) }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="page-content page-cart">
        <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a
                                        href="{{ route(Auth::user() == 'penjual' ? 'penjual.home' : 'pembeli.home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Cart</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <section class="store-cart">
            <div class="container">

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('del-success'))
                    <div class="alert alert-danger">
                        {{ session('del-success') }}
                    </div>
                @endif

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-12 table-responsive">
                        <table class="table table-borderless table-cart">
                            <thead>
                                <tr>
                                    <td>Gambar</td>
                                    <td>Nama Produk &amp; Penjual</td>
                                    <td>Jumlah Barang</td>
                                    <td>Harga</td>
                                    <td>Menu</td>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1 @endphp
                                @foreach ($keranjangs as $keranjang)
                                    <tr>
                                        <td style="width: 20%">
                                            <img src="/img/products/{{ $keranjang->produk->gambar }}" alt=""
                                                class="cart-image " />
                                        </td>
                                        <td td style="width: 25%">
                                            <div class="product-title">{{ $keranjang->produk->nama }}</div>
                                            <div class="product-subtitle">{{ $keranjang->produk->user->is_store }}</div>
                                        </td>
                                        <td td style="width: 20%">
                                            <div class="product-title">{{ $keranjang->jumlah_barang }}x</div>
                                        </td>
                                        <td td style="width: 20%">
                                            <div class="product-title">Rp {{ number_format($keranjang->total_harga) }}
                                            </div>
                                            <div class="product-subtitle">IDR</div>
                                        </td>
                                        <td style="width: 20%">
                                            <a href="/keranjang/delete/{{ $keranjang->id }}"
                                                class="btn btn-remove-cart"> remove </a>
                                        </td>
                                    </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="150">
                    <div class="col-12">
                        <hr />
                    </div>
                    <div class="col-12">
                        <h2 class="mb-4">Rincian pengiriman</h2>
                    </div>
                </div>
                <form action="/keranjang/checkout" method="post">
                    @csrf
                    <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Province">Provinsi</label>
                                <select name="Province" id="Province" class="form-control" required>
                                    <option value="Kalimantan Timur">Kalimantan Timur</option>
                                    <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                                    <option value=">Kalimantan Tengah">Kalimantan Tengah</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="city">Kota</label>
                                <select name="city" id="city" class="form-control" required>
                                    <option value="Samarinda">Samarinda</option>
                                    <option value="Balikpapan">Balikpapan</option>
                                    <option value="Bontang">Bontang</option>
                                    <option value="Sangata">Sangata</option>
                                    <option value="Banjarmasin">Banjarmasin</option>
                                    <option value="Balangan">Balangan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="addressOne">Alamat</label>
                                <input type="text" class="form-control" id="addressOne" name="addressOne"
                                    placeholder="Alamat rumah tujuan" value="{{ $alamat_user }}" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mobile">Nomor Hp</label>
                                <input type="number" class="form-control" id="mobile" name="mobile"
                                    placeholder="Nomor Hp yang dapat dihubungi" value="{{ $nohp_user }}"
                                    required />
                            </div>
                        </div>
                    </div>
                    <div class="row" data-aos="fade-up" data-aos-delay="150">
                        <div class="col-12">
                            <hr />
                        </div>
                        <div class="col-12">
                            <h2 class="mb-1">Informasi Pembayaran</h2>
                        </div>
                    </div>
                    <div class="row" data-aos="fade-up" data-aos-delay="200">
                        <div class="col-4 col-md-3">
                            <div class="product-title">{{ $total_produk }}</div>
                            <div class="product-subtitle">Total Produk</div>
                            <input type="text" value="{{ $total_produk }}" name="counts" hidden>
                        </div>
                        <div class="col-4 col-md-3">
                            <div class="product-title">Rp {{ number_format($biaya_admin) }}</div>
                            <div class="product-subtitle">Pajak Admin</div>
                        </div>
                        <div class="col-4 col-md-3">
                            <div class="product-title text-success">Rp {{ number_format($total_harga) }}</div>
                            <div class="product-subtitle">Total Harga</div>
                        </div>
                        <div class="col-8 col-md-3">
                            <button type="submit" class="btn btn-success mt-4 px-4 btn-block">
                                Checkout Now
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="pt-4 pb-2">2022 Copyright Weesia. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="/script/navbar-scroll.js"></script>
</body>

</html>
