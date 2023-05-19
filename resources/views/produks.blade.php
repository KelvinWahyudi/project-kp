<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lawang Agung Sukses - Tambah Produk</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    </head>
    <body>
    @extends('navbar.navbar')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    
@if (session()->has('info'))
    <div class="alert alert-success">
        {{ session()->get('info') }}
    </div>
@endif
<div class="position-relative">
    <div class="position-absolute top-0 end-0 mt-5 py-2">
        <a class="btn btn-dark position-relative" type="submit" href="{{ url('/cart') }}">
            <i class="bi-cart-fill me-1"></i>
            Cart 
            <span class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-danger p-2"></span>
            <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
        </a>
    </div>
</div>

<!-- Header-->
{{-- <header class="py-5">
    <div>
        <img class="card-img-top" src="img/BannerPop-RecoveredV2.jpg" height="260" />
    </div>
</header> --}}

<!-- Section-->
<section class="py-5 mt-5">
    <div class="container px-3 px-lg-3 mt-5 py-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach($produk as $item)
            <div class="col mb-3">
                <div class="card" style="width: 18rem;">
                    <!-- Product image-->
                    <img class="card-img-top" src="{{asset('storage/'. $item->foto)}}"src="{{asset('storage/'. $item->foto)}}" width="180" height="180"/>
                    <!-- Product details-->
                    <div class="card-body">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{ $item->nama }}</h5>
                            <!-- Product price-->
                            <p class="card-text">
                                Rp. {{ $item->harga }}
                            </p>
                            <!-- Product stok-->
                            Stok : {{ $item->stok }}
                        </div>
                    </div>
                    <!-- Product actions-->
                    {{-- <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <a class="btn btn-outline-dark mt-auto btn-sm" href="{{ route('add.to.cart', $item->product_id) }}">
                                <i class="fa-solid fa-cart-shopping"></i> Pesan
                            </a>
                        </div>
                    </div> --}}
                </div>
            </div>
            @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Core theme JS-->
<script src="js/scripts.js"></script>
@include('footer.footer')