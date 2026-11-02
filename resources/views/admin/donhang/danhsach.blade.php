@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Đơn hàng</div>
    <div class="card-body table-responsive">
        <table class="table table-bordered table-hover table-sm mb-3">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th>Khách hàng</th>
                    <th>Thông tin giao hàng</th>
                    <th>Tình trạng</th>
                    <th>Ngày đặt</th>
                    <th width="5%">Sửa</th>
                    <th width="5%">Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($donhang as $value)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value->User->name }}</td>
                        <td>
                            <strong>{{ $value->dienthoaigiaohang }}</strong><br />
                            {{ $value->diachigiaohang }}
                        </td>
                        <td>
                            <span class="badge bg-info">{{ $value->TinhTrang->tinhtrang }}</span>
                        </td>
                        <td>{{ $value->created_at->format('d/m/Y H:i:s') }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.donhang.sua', ['id' => $value->id]) }}"><i class="fa-light fa-edit"></i></a>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('admin.donhang.xoa', ['id' => $value->id]) }}" onclick="return confirm('Bạn có muốn xóa đơn hàng của {{ $value->User->name }} không?')">
                                <i class="fa-light fa-trash-alt text-danger"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $donhang->links() }}
    </div>
</div>
@endsection