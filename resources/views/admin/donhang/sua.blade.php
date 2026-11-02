@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Cập nhật đơn hàng #{{ $donhang->id }}</div>
    <div class="card-body">
        <form action="{{ route('admin.donhang.sua', ['id' => $donhang->id]) }}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Khách hàng</label>
                <input type="text" class="form-control" value="{{ $donhang->User->name }}" disabled />
            </div>

            <div class="mb-3">
                <label class="form-label" for="dienthoaigiaohang">Điện thoại giao hàng</label>
                <input type="text" class="form-control @error('dienthoaigiaohang') is-invalid @enderror" id="dienthoaigiaohang" name="dienthoaigiaohang" value="{{ $donhang->dienthoaigiaohang }}" required />
                @error('dienthoaigiaohang')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="diachigiaohang">Địa chỉ giao hàng</label>
                <input type="text" class="form-control @error('diachigiaohang') is-invalid @enderror" id="diachigiaohang" name="diachigiaohang" value="{{ $donhang->diachigiaohang }}" required />
                @error('diachigiaohang')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label" for="tinhtrang_id">Tình trạng đơn hàng</label>
                <select class="form-select @error('tinhtrang_id') is-invalid @enderror" id="tinhtrang_id" name="tinhtrang_id" required>
                    @foreach($tinhtrang as $value)
                        <option value="{{ $value->id }}" {{ $donhang->tinhtrang_id == $value->id ? 'selected' : '' }}>{{ $value->tinhtrang }}</option>
                    @endforeach
                </select>
                @error('tinhtrang_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <h5 class="border-bottom pb-2 mb-3">Chi tiết sản phẩm đã đặt</h5>
            <table class="table table-bordered table-sm mb-4">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th>Tên sản phẩm</th>
                        <th width="15%" class="text-end">Số lượng</th>
                        <th width="20%" class="text-end">Đơn giá</th>
                        <th width="20%" class="text-end">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @php $tongtien = 0; @endphp
                    @foreach($donhang->DonHang_ChiTiet as $detail)
                        @php $thanhtien = $detail->soluongban * $detail->dongiaban; $tongtien += $thanhtien; @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $detail->SanPham->tensanpham ?? 'Sản phẩm đã bị xóa' }}</td>
                            <td class="text-end">{{ number_format($detail->soluongban) }}</td>
                            <td class="text-end">{{ number_format($detail->dongiaban) }} đ</td>
                            <td class="text-end">{{ number_format($thanhtien) }} đ</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" class="text-end fw-bold">Tổng thanh toán:</td>
                        <td class="text-end fw-bold text-danger">{{ number_format($tongtien) }} đ</td>
                    </tr>
                </tbody>
            </table>

            <button type="submit" class="btn btn-primary"><i class="fa-light fa-save"></i> Cập nhật đơn hàng</button>
        </form>
    </div>
</div>
@endsection