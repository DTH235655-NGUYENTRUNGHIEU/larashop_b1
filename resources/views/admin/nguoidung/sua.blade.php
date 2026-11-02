@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Sửa người dùng</div>
    <div class="card-body">
        <form action="{{ route('admin.nguoidung.sua', ['id' => $nguoidung->id]) }}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="name">Họ và tên</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $nguoidung->name }}" required />
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="email">Địa chỉ Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $nguoidung->email }}" required />
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="role">Quyền hạn</label>
                <select class="form-select @error('role') is-invalid @enderror" id="role" name="role" required>
                    <option value="user" {{ $nguoidung->role == 'user' ? 'selected' : '' }}>Khách hàng (User)</option>
                    <option value="admin" {{ $nguoidung->role == 'admin' ? 'selected' : '' }}>Quản trị viên (Admin)</option>
                </select>
                @error('role')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="password">Mật khẩu mới (Bỏ trống nếu không đổi)</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" />
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="password_confirmation">Xác nhận mật khẩu mới</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" />
                </div>
            </div>

            <button type="submit" class="btn btn-primary"><i class="fa-light fa-save"></i> Cập nhật</button>
        </form>
    </div>
</div>
@endsection