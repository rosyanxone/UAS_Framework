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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
                    <a href="{{ route('produk') }}" class="list-group-item list-group-item-action">
                        Produk
                    </a>
                    <a href="/penjual/user" class="list-group-item list-group-item-action active">
                        Akun
                    </a>
                    <a href="/logout" class="list-group-item list-group-item-action">
                        Logout
                    </a>
                </div>
            </div>

            <!-- Page Content -->
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

                <div class="page-content page-cart">
                    <section class="store-cart">
                        <div class="container mt-5 pt-5">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h1 class="mb-4">Profil Saya</h1>
                                            <div class="row">
                                                <div class="col-12 col-md-4">
                                                    <img src="{{ asset('img/profile/' . $user->image) }}"
                                                        class="rounded-4 w-100 mb-3" alt=""
                                                        style="border-radius: 26px;" />
                                                </div>
                                                <div class="col-12 col-md-8">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6">
                                                            <div class="product-title">Nama Toko</div>
                                                            <div class="product-subtitle"><b>{{ $user->is_store }}</b></div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="product-title">Nama</div>
                                                            <div class="product-subtitle">{{ $user->name }}</div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="product-title">Email</div>
                                                            <div class="product-subtitle">
                                                                {{ $user->email }}
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="product-title">
                                                                Alamat
                                                            </div>
                                                            <div class="product-subtitle">
                                                                {{ $user->address }}
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="product-title">No Hp</div>
                                                            <div class="product-subtitle">
                                                                {{ $user->number }}
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="product-title">Total Pemasukkan</div>
                                                            <div class="product-subtitle">
                                                                Rp.{{ number_format($total_income) }}</div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="product-title">Total Produk</div>
                                                            <div class="product-subtitle">
                                                                {{ $total_produk }} barang
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-md-6">
                                                            <button data-toggle="modal" data-target="#modaleditpass"
                                                                class="btn btn-secondary btn mt-4">
                                                                Ubah Password
                                                            </button>
                                                        </div>

                                                        <div class="col-12 col-md-6">
                                                            <button data-toggle="modal" data-target="#modaledit"
                                                                class="btn btn-info btn mt-4">
                                                                Edit Akun
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal Ubah Password -->
                                            <div class="modal fade" id="modaleditpass" tabindex="-1" role="dialog"
                                            aria-labelledby="modaleditpassLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Akun</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <form action="{{ url('/user/action-pwd') }}" method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Password Sebelumnya</label>
                                                                    <input type="password" class="form-control" name="password_old">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Password Baru</label>
                                                                    <input type="password" class="form-control" name="password_new">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Konfirmasi Password Baru</label>
                                                                    <input type="password" class="form-control" name="password_confirm">
                                                                </div>
                                                            </div>
                                                            <input type="text" value="/penjual/user" name="role_route" hidden>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Tutup</button>
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir Modal Password  -->

                                            <!-- Modal Ubah -->
                                            <div class="modal fade" id="modaledit" tabindex="-1" role="dialog"
                                                aria-labelledby="modaleditLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Akun
                                                            </h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <form method="post" action="{{ url('/user/action-data') }}"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('put')
                                                            <div class="modal-body">

                                                                <div class="mb-3">
                                                                    <label class="form-label">Nama Toko</label>
                                                                    <input type="text" class="form-control" name="store" value="{{ $user->is_store }}">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Nama </label>
                                                                    <input type="text" class="form-control"
                                                                        name="name" value="{{ $user->name }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Email</label>
                                                                    <input type="text" class="form-control"
                                                                        name="email" value="{{ $user->email }}">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Alamat</label>
                                                                    <input type="text" class="form-control"
                                                                        name="address" value="{{ $user->address }}">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">No Hp</label>
                                                                    <input type="text" class="form-control"
                                                                        name="mobile" value="{{ $user->number }}">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Foto Profil</label>
                                                                    <input type="file" class="form-control"
                                                                        name="file" value="{{ $user->image }}">
                                                                    <p style="font-size: 10px;"><span
                                                                            style="color: red;">*</span> abaikan jika
                                                                        tidak ingin merubah data
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <input type="text" value="/penjual/user" name="role_route" hidden>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Tutup</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous">
    </script>

    <script>
        AOS.init();
    </script>
    <script src="/script/navbar-scroll.js"></script>
    <script>
        $(function() {
            $('#myModal').modal({
                show: true,
                backdrop: 'static'
            });
            //now on button click
            $('#myModal').modal('show');
        });
    </script>
</body>

</html>
