@extends('layouts.app')

@section('title')
    Weesia Homepage
@endsection

@section('content')
    <div class="page-content page-home">
        <section class="store-carousel">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12" data-aos="zoom-in">
                        <div id="storeCarousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li class="active" data-target="#storeCarousel" data-slide-to="0"></li>
                                <li data-target="#storeCarousel" data-slide-to="1"></li>
                                <li data-target="#storeCarousel" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="/images/banner.png" alt="Carousel Image" class="d-block w-100" />
                                </div>
                                <div class="carousel-item">
                                    <img src="/images/Banner1.jpg" alt="Carousel Image" class="d-block w-100" />
                                </div>
                                <div class="carousel-item">
                                    <img src="/images/banner2.png" alt="Carousel Image" class="d-block w-100" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="store-trend-categories">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h5>Kategori</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-md col-lg-2" data-aos="fade-up" data-aos-delay="200">
                        <a href="/kategori/elektronik" class="component-categories d-block">
                            <div class="categories-image">
                                <img src="/images/categories-elektronik.png" alt="" class="w-100" />
                            </div>
                            <p class="categories-text">Elektronik</p>
                        </a>
                    </div>
                    <div class="col-6 col-md col-lg-2" data-aos="fade-up" data-aos-delay="200">
                        <a href="/kategori/kesehatan" class="component-categories d-block">
                            <div class="categories-image">
                                <img src="/images/healthcare.png" alt="" class="w-100" />
                            </div>
                            <p class="categories-text">Kesehatan</p>
                        </a>
                    </div>
                    <div class="col-6 col-md col-lg-2" data-aos="fade-up" data-aos-delay="300">
                        <a href="/kategori/perabotan" class="component-categories d-block">
                            <div class="categories-image">
                                <img src="/images/furniture.png" alt="" class="w-100" />
                            </div>
                            <p class="categories-text">Perabotan</p>
                        </a>
                    </div>
                    <div class="col-6 col-md col-lg-2" data-aos="fade-up" data-aos-delay="400">
                        <a href="/kategori/pakaian" class="component-categories d-block">
                            <div class="categories-image">
                                <img src="/images/tshirt.png" alt="" class="w-100" />
                            </div>
                            <p class="categories-text">Pakaian</p>
                        </a>
                    </div>
                    <div class="col-6 col-md col-lg-2" data-aos="fade-up" data-aos-delay="500">
                        <a href="/kategori/kecantikan" class="component-categories d-block">
                            <div class="categories-image">
                                <img src="/images/cosmetics.png" alt="" class="w-100" />
                            </div>
                            <p class="categories-text">Kecantikan</p>
                        </a>
                    </div>
                    <div class="col-6 col-md col-lg-2" data-aos="fade-up" data-aos-delay="600">
                        <a href="/kategori/gaming" class="component-categories d-block">
                            <div class="categories-image">
                                <img src="/images/console.png" alt="" class="w-100" />
                            </div>
                            <p class="categories-text">Gaming</p>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="store-new-products">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h5>Produk Baru</h5>
                    </div>
                </div>
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="800">
                            <a href="/show/{{ $product->id }}" class="component-products d-block">
                                <div class="products-thumbnail">
                                    <div class="products-image"
                                        style="background-image: url('/img/products/{{ $product->gambar }}');">
                                    </div>
                                </div>
                                <div class="products-text">{{ $product->nama }}</div>
                                <div class="products-price">Rp.{{ number_format($product->harga) }}</div>
                            </a>
                        </div>
                    @endforeach
                </div>
                @if($products->hasPages())
                    <div class="">
                        {{ $products->links() }}
                    </div>
                @endif
            </div>
        </section>
    </div>
@endsection
