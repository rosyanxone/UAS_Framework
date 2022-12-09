<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="shortcut icon" href="/img/logo/shian-logo.png">
    <title>Weesia Dashboard Penjual</title>

    <link href="{{ asset('style/main.css') }}" rel="stylesheet" />
    <link href="{{ asset('stylesheet/style.css') }}" rel="stylesheet" />
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
                                        <a href="/" class="dropdown-item">Logout</a>
                                    </div>
                                </li>
                            </ul>

                            <ul class="navbar-nav d-block d-lg-none">
                                <li class="nav-item">
                                    <a href="#" class="nav-link"> Hi, {{ Auth::user()->name }}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link d-inline-block">
                                        Cart </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <!-- Section Content-->
                <div class="section-content section-dashboard-home" data-aos="fade-up">
                    <div class="container-fluid">
                        <div class="dashboard-heading">
                            <h2 class="dashboard-title">Tambah Produk Baru</h2>
                            <p class="dashboard-subtitle">Buat Produkmu sendiri yuk</p>
                        </div>
                        <div class="dashboard-content">
                            <div class="row">
                                <div class="col-12 card-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="{{ route('update', $product->id) }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                @if (session('success'))
                                                    <div class="alert alert-success">
                                                        <b>Yeah!</b>
                                                        {{ session('success') }}
                                                    </div>
                                                @endif
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="nama" class="form-label">Nama
                                                                Produk</label>
                                                            <input type="text"
                                                                class="form-control @error('nama') is-invalid @enderror"
                                                                id="nama" name="nama" placeholder="Nama Produk"
                                                                value="{{ $product->nama }}" required />
                                                            @error('nama')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="harga" class="form-label">Harga</label>
                                                            <input type="number"
                                                                class="form-control @error('harga') is-invalid @enderror"
                                                                id="harga" name="harga" placeholder="Harga"
                                                                value="{{ $product->harga }}" required />
                                                            @error('harga')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Kategori</label>
                                                            <select name="kategori" class="form-control" required>
                                                                <option disabled selected>
                                                                    Select
                                                                    Category</option>
                                                                <option value="{{ $product->kategori }}" selected>
                                                                    {{ ucfirst($product->kategori) }}
                                                                </option>
                                                                <option value="elektronik">
                                                                    Elektronik</option>
                                                                <option value="kesehatan">
                                                                    Kesehatan</option>
                                                                <option value="perabotan">
                                                                    Perabotan</option>
                                                                <option value="pakaian">
                                                                    Pakaian</option>
                                                                <option value="kecantikan">
                                                                    Kecantikan</option>
                                                                <option value="gaming">
                                                                    Gaming</option>
                                                                <option value="lainnya">
                                                                    Lainnya</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="deskripsi"
                                                                class="form-label">Deskripsi</label>
                                                            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                                                                placeholder="Deskripsi" required>{{ $product->deskripsi }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="stok" class="form-label">Stok</label>
                                                            <input type="number"
                                                                class="form-control @error('stok') is-invalid @enderror"
                                                                id="stok" name="stok" placeholder="Stok"
                                                                value="{{ $product->stok }}" required />
                                                            @error('stok')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="file" class="form-label">Gambar</label>
                                                            <input type="file"
                                                                class="form-control @error('file') is-invalid @enderror"
                                                                id="file" name="file" placeholder="gambar"
                                                                accept=".jpg,.jpeg,.png" />
                                                            <div class="row pt-2 d-flex justify-content-start">
                                                                <div class="col-5">
                                                                    <p class="text-muted text-right">
                                                                        silahkan input
                                                                        gambar produk
                                                                        gambar default :
                                                                    </p>
                                                                </div>
                                                                <div class="col-4">
                                                                    <img style="border-radius: 10px; height: 60px;"
                                                                        src="/img/products/{{ $product->gambar }}"
                                                                        class="main-image mb-3" alt="" />
                                                                </div>
                                                            </div>
                                                            @error('gambar')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                            <input name="penjual_id"
                                                                value="{{ $product->penjual_id }}" hidden>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col text-right">
                                                        <button type="submit"
                                                            class="btn btn-success px-5 mb-3 btn-block">
                                                            Update Product
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="row">
                                                <div class="col text-right">
                                                    <form action="{{ route('delete', $product->id) }}" method="post"
                                                        onsubmit="return confirm('Apakah anda yakin ingin menghapus Produk ini?')">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"
                                                            class="btn btn-danger mb-3 px-5 w-100"><i
                                                                class="fa-solid fa-trash"></i>
                                                            Delete Product
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col text-right">
                                                    <a class=" btn btn-warning text-white"
                                                        href="{{ route('produk') }}">
                                                        <i class="fa-sharp fa-solid fa-arrow-left"></i>
                                                        Back
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace("editor");
    </script>
</body>

</html>
