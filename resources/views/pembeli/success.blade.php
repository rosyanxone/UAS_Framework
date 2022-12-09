<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <link rel="shortcut icon" href="/img/logo/shian-logo.png">
        <title>Weesia - Your Best Marketplace</title>
        

        <link
            href="https://unpkg.com/aos@2.3.1/dist/aos.css"
            rel="stylesheet"
        />
        <link href="style/main.css" rel="stylesheet" />
    </head>

    <body>
        <div class="page-content page-success">
            <div class="section-success" data-aos="zoom-in">
                <div class="container">
                    <div
                        class="row align-items-center row-login justify-content-center"
                    >
                        <div class="col-lg-6 text-center">
                            <img
                                src="/images/success.svg"
                                alt=""
                                class="mb-4"
                            />
                            <h2>Transaction Processed!</h2>
                            <p>
                                Silahkan tunggu konfirmasi email dari kami dan
                                kami akan menginformasikan resi secepat mungkin!
                            </p>
                            <div>
                                <a
                                    href="{{ route('user.transaksi') }}"
                                    class="btn btn-success w-50 mt-4"
                                    >Riwayat Pesanan</a
                                >
                                <a
                                    href="{{ route('pembeli.home') }}"
                                    class="btn btn-signup w-50 mt-2"
                                    >Kembali Berbelanja</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <p class="pt-4 pb-2">
                            2022 Copyright Weesia. All Rights Reserved
                        </p>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Bootstrap core JavaScript -->
        <script
            src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"
        ></script>
        <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
        <script src="/script/navbar-scroll.js"></script>
    </body>
</html>
