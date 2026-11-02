<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Đăng nhập - {{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('public/assets/icons/cartzilla-icons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/css/theme.min.css') }}" />
</head>
<body class="d-flex align-items-center justify-content-center min-vh-100 bg-body-tertiary">
    <div class="card border-0 shadow-sm p-4 p-sm-5" style="max-width: 450px; width: 100%;">
        <h2 class="h3 mb-3 text-center">Đăng nhập</h2>
        <p class="text-center fs-sm text-body-secondary mb-4">Chưa có tài khoản? <a href="{{ route('user.dangky') }}">Đăng ký ngay</a></p>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email / Tên đăng nhập / Số điện thoại</label>
                <input type="text" class="form-control form-control-lg @error('email') is-invalid @enderror @error('username') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus />
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                @error('username')
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

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                    <label class="form-check-label fs-sm" for="remember">Ghi nhớ đăng nhập</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill">Đăng nhập</button>
        </form>
    </div>
</body>
</html>