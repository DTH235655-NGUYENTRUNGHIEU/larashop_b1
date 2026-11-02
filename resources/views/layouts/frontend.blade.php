<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light" data-pwa="true">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title', 'Trang chủ') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Icons / Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('public/assets/img/app-icons/icon-32x32.png') }}" sizes="32x32" />
    <link rel="apple-touch-icon" href="{{ asset('public/assets/img/app-icons/icon-180x180.png') }}" />

    <!-- Theme switcher -->
    <script src="{{ asset('public/assets/js/theme-switcher.js') }}"></script>

    <!-- Font icons & CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/icons/cartzilla-icons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/swiper/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/simplebar/simplebar.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/choices.js/choices.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/flatpickr/flatpickr.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/css/theme.min.css') }}" id="theme-styles" />
    @yield('css')
</head>
<body>
    <!-- Search Box Offcanvas -->
    <div class="offcanvas offcanvas-top" id="searchBox" data-bs-backdrop="static" tabindex="-1">
        <div class="offcanvas-header border-bottom py-2">
            <form class="container d-flex align-items-center">
                <input type="search" class="form-control form-control-lg fs-lg border-0 rounded-0 py-3 ps-0" placeholder="Bạn muốn tìm gì?" data-autofocus="offcanvas" />
                <button type="reset" class="btn-close fs-lg" data-bs-dismiss="offcanvas"></button>
            </form>
        </div>
    </div>

    <!-- Header Navigation -->
    <header class="navbar navbar-expand-lg bg-body navbar-sticky sticky-top z-fixed px-0" data-sticky-element>
        <div class="container flex-nowrap">
            <button type="button" class="navbar-toggler me-4 me-lg-0" data-bs-toggle="offcanvas" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand py-1 py-md-2" href="{{ route('frontend.home') }}">
                <span class="d-none d-sm-flex flex-shrink-0 text-primary me-2">
                    <i class="ci-shopping-cart fs-2"></i>
                </span>
                {{ config('app.name', 'LaraShop') }}
            </a>

            <!-- Navbar Links -->
            <nav class="offcanvas offcanvas-start" id="navbarNav" tabindex="-1">
                <div class="offcanvas-header py-3">
                    <h5 class="offcanvas-title">{{ config('app.name', 'LaraShop') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body pt-3 pb-4 py-lg-0 mx-lg-auto">
                    <ul class="navbar-nav position-relative">
                        <li class="nav-item py-lg-2 me-lg-n2 me-xl-0">
                            <a class="nav-link" href="{{ route('frontend.home') }}"><i class="ci-home me-2"></i>Trang chủ</a>
                        </li>
                        <li class="nav-item dropdown py-lg-2 me-lg-n1 me-xl-0">
                            <a class="nav-link dropdown-toggle" href="{{ route('frontend.sanpham') }}" data-bs-toggle="dropdown"><i class="ci-gift me-2"></i>Sản phẩm</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('frontend.sanpham.phanloai', ['tenloai_slug' => 'dien-thoai']) }}">Điện thoại</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.sanpham.phanloai', ['tenloai_slug' => 'may-tinh-bang']) }}">Máy tính bảng</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.sanpham.phanloai', ['tenloai_slug' => 'may-tinh-xach-tay']) }}">Máy tính xách tay</a></li>
                            </ul>
                        </li>
                        <li class="nav-item py-lg-2 me-lg-n2 me-xl-0">
                            <a class="nav-link" href="{{ route('frontend.baiviet') }}"><i class="ci-globe me-2"></i>Tin tức</a>
                        </li>
                        <li class="nav-item py-lg-2 me-lg-n2 me-xl-0">
                            <a class="nav-link" href="{{ route('frontend.tuyendung') }}"><i class="ci-target me-2"></i>Tuyển dụng</a>
                        </li>
                        <li class="nav-item py-lg-2 me-lg-n2 me-xl-0">
                            <a class="nav-link" href="{{ route('frontend.lienhe') }}"><i class="ci-chat me-2"></i>Liên hệ</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Actions (Account & Cart) -->
            <div class="d-flex align-items-center gap-2">
                <button type="button" class="btn btn-icon btn-lg btn-outline-secondary border-0 rounded-circle" data-bs-toggle="offcanvas" data-bs-target="#searchBox">
                    <i class="ci-search"></i>
                </button>
                <a class="btn btn-icon btn-lg btn-outline-secondary border-0 rounded-circle" href="{{ route('user.home') }}">
                    <i class="ci-user"></i>
                </a>
                <a class="btn btn-icon btn-lg btn-outline-secondary border-0 rounded-circle position-relative" href="{{ route('frontend.giohang') }}">
                    <i class="ci-shopping-bag"></i>
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    @yield('content')

    <!-- Footer -->
    <footer class="footer pb-4 pt-5 border-top mt-5">
        <div class="container text-center">
            <p class="fs-xs mb-0">Bản quyền © {{ date('Y') }} bởi {{ config('app.name', 'Laravel') }}.</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('public/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/choices.js/choices.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/cleave.js/cleave.min.js') }}"></script>
    @yield('javascript')
    <script src="{{ asset('public/assets/js/theme.min.js') }}"></script>
</body>
</html>