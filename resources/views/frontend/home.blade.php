@extends('layouts.frontend')
@section('title', 'Trang chủ')

@section('content')
<main class="content-wrapper">
    <!-- Hero Slider -->
    <section class="container pt-3 mb-4">
        <div class="position-relative bg-body-tertiary rounded-5 overflow-hidden p-4 p-md-5">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="text-body">Ưu đãi nổi bật</p>
                    <h2 class="display-5 mb-4">Powerful iPad Pro M2</h2>
                    <a class="btn btn-primary rounded-pill px-4" href="{{ route('frontend.sanpham') }}">Mua ngay</a>
                </div>
                <div class="col-md-6 text-center">
                    <img src="{{ asset('public/assets/img/slider/02.png') }}" class="img-fluid" alt="iPad Pro" />
                </div>
            </div>
        </div>
    </section>

    <!-- Product Grid Demo -->
    <section class="container pt-2 mt-2 mb-3">
        <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-4">
            <h2 class="h3 mb-0">Điện thoại nổi bật</h2>
            <a class="nav-link" href="{{ route('frontend.sanpham') }}">Xem tất cả <i class="ci-chevron-right ms-1"></i></a>
        </div>
        <div class="row row-cols-2 row-cols-md-4 g-4">
            <div class="col">
                <div class="card h-100 border-0 shadow-sm text-center p-3">
                    <img src="{{ asset('public/assets/img/shop/02.png') }}" class="card-img-top mx-auto" style="max-width:180px" alt="Product" />
                    <div class="card-body px-0 pb-0">
                        <h6 class="card-title mb-2">Apple iPhone 14 128GB</h6>
                        <div class="h6 text-primary mb-0">18.490.000 ₫</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection