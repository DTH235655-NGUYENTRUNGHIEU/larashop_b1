<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use App\Models\TinhTrang;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    public function getDanhSach()
    {
        $donhang = DonHang::with(['User', 'TinhTrang'])->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.donhang.danhsach', compact('donhang'));
    }

    public function getThem()
    {
        return view('admin.donhang.them');
    }

    public function postThem(Request $request)
    {
        // Xử lý thêm đơn hàng từ phía admin (nếu có form)
        return redirect()->route('admin.donhang');
    }

    public function getSua($id)
    {
        $donhang = DonHang::with(['DonHang_ChiTiet.SanPham'])->findOrFail($id);
        $tinhtrang = TinhTrang::all();
        return view('admin.donhang.sua', compact('donhang', 'tinhtrang'));
    }

    public function postSua(Request $request, $id)
    {
        $request->validate([
            'tinhtrang_id'        => ['required', 'integer'],
            'dienthoaigiaohang'   => ['required', 'string', 'max:20'],
            'diachigiaohang'      => ['required', 'string', 'max:255'],
        ]);

        $orm = DonHang::findOrFail($id);
        $orm->tinhtrang_id = $request->tinhtrang_id;
        $orm->dienthoaigiaohang = $request->dienthoaigiaohang;
        $orm->diachigiaohang = $request->diachigiaohang;
        $orm->save();

        return redirect()->route('admin.donhang');
    }

    public function getXoa($id)
    {
        $orm = DonHang::findOrFail($id);
        // Xóa các chi tiết đơn hàng tương ứng trước khi xóa đơn hàng chính
        $orm->DonHang_ChiTiet()->delete();
        $orm->delete();

        return redirect()->route('admin.donhang');
    }
}