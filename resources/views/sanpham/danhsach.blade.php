@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Sản phẩm</div>
    <div class="card-body table-responsive">
        <p><a href="{{ route('sanpham.them') }}" class="btn btn-info"><i class="fa-light fa-plus"></i> Thêm mới</a></p>
        <table class="table table-bordered table-hover table-sm mb-0">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th width="10%">Hình ảnh</th>
                    <th width="15%">Loại sản phẩm</th>
                    <th width="10%">HSX</th>
                    <th width="35%">Tên sản phẩm</th>
                    <th width="5%">SL</th>
                    <th width="10%">Đơn giá</th>
                    <th width="5%">Sửa</th>
                    <th width="5%">Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sanpham as $value)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $value->hinhanh }}</td>
                    <td>{{ $value->LoaiSanPham->tenloai }}</td>
                    <td>{{ $value->HangSanXuat->tenhang }}</td>
                    <td>{{ $value->tensanpham }}</td>
                    <td class="text-end">{{ $value->soluong }}</td>
                    <td class="text-end">{{ number_format($value->dongia) }}</td>
                    <td class="text-center">
                        <a href="{{ route('sanpham.sua', ['id' => $value->id]) }}"><i class="fa-light fa-edit"></i></a>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('sanpham.xoa', ['id' => $value->id]) }}" onclick="return confirm('Bạn có muốn xóa sản phẩm {{ $value->tensanpham }} không?')">
                            <i class="fa-light fa-trash-alt text-danger"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection