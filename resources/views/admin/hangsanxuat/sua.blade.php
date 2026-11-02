@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Sửa hãng sản xuất</div>
    <div class="card-body">
        <form action="{{ route('admin.hangsanxuat.sua', ['id' => $hangsanxuat->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="tenhang">Tên hãng sản xuất</label>
                <input type="text" class="form-control @error('tenhang') is-invalid @enderror" id="tenhang" name="tenhang" value="{{ $hangsanxuat->tenhang }}" required />
                @error('tenhang')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="hinhanh">Hình ảnh</label>
                @if(!empty($hangsanxuat->hinhanh))
                    <div class="mb-2">
                        <img src="{{ asset('storage/app/public/' . $hangsanxuat->hinhanh) }}" width="100" class="img-thumbnail" />
                    </div>
                @endif
                <input type="file" class="form-control @error('hinhanh') is-invalid @enderror" id="hinhanh" name="hinhanh" />
                @error('hinhanh')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa-light fa-save"></i> Cập nhật</button>
        </form>
    </div>
</div>
@endsection