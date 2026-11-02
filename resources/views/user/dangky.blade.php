<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Đăng ký tài khoản - {{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('public/assets/icons/cartzilla-icons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/css/theme.min.css') }}" />
</head>
<body class="d-flex align-items-center justify-content-center min-vh-100 bg-body-tertiary">
    <div class="card border-0 shadow-sm p-4 p-sm-5" style="max-width: 480px; width: 100%;">
        <h2 class="h3 mb-3 text-center">Tạo tài khoản</h2>
        <p class="text-center fs-sm text-body-secondary mb-4">Đã có tài khoản? <a href="{{ route('user.dangnhap') }}">Đăng nhập</a></p>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Họ và tên</label>
                <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required />
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Địa chỉ Email</label>
                <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required />
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" name="password" required />
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password-confirm" class="form-label">Xác nhận mật khẩu</label>
                <input type="password" class="form-control form-control-lg" id="password-confirm" name="password_confirmation" required />
            </div>

            <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill">Tạo tài khoản</button>
        </form>
    </div>
</body>
</html>