@extends('layouts.frontend')
@section('title', 'Hồ sơ cá nhân')

@section('content')
<main class="content-wrapper container py-5">
    <div class="row">
        <!-- Sidebar -->
        <aside class="col-lg-3 mb-4 mb-lg-0">
            <div class="card border-0 shadow-sm p-4">
                <div class="d-flex align-items-center mb-4">
                    <div class="h5 d-flex justify-content-center align-items-center text-primary bg-primary-subtle rounded-circle mb-0" style="width: 3rem; height: 3rem">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <div class="ps-3">
                        <h6 class="mb-0">{{ $user->name }}</h6>
                        <span class="fs-xs text-body-secondary">{{ $user->email }}</span>
                    </div>
                </div>
                <nav class="list-group list-group-borderless">
                    <a class="list-group-item list-group-item-action active" href="{{ route('user.home') }}">
                        <i class="ci-user me-2"></i> Hồ sơ cá nhân
                    </a>
                    <a class="list-group-item list-group-item-action" href="{{ route('user.donhang') }}">
                        <i class="ci-shopping-bag me-2"></i> Đơn hàng
                    </a>
                    <a class="list-group-item list-group-item-action text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="ci-log-out me-2"></i> Đăng xuất
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="col-lg-9">
            <div class="card border-0 shadow-sm p-4 p-md-5">
                <h1 class="h3 mb-4">Hồ sơ cá nhân</h1>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session('warning'))
                    <div class="alert alert-danger">{{ session('warning') }}</div>
                @endif

                <!-- Thông tin cơ bản -->
                <h5 class="border-bottom pb-2 mb-3">Thông tin cơ bản</h5>
                <form action="{{ route('user.hoso') }}" method="POST" class="mb-5">
                    @csrf
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label class="form-label" for="name">Họ và tên</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}" required />
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="email">Địa chỉ Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email }}" required />
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary rounded-pill">Cập nhật hồ sơ</button>
                        </div>
                    </div>
                </form>

                <!-- Đổi mật khẩu -->
                <h5 class="border-bottom pb-2 mb-3">Đổi mật khẩu</h5>
                <form action="{{ route('user.doimatkhau') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label class="form-label" for="old_password">Mật khẩu hiện tại</label>
                            <input type="password" class="form-control @error('old_password') is-invalid @enderror" id="old_password" name="old_password" required />
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="new_password">Mật khẩu mới</label>
                            <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" name="new_password" required />
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-secondary rounded-pill">Đổi mật khẩu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection