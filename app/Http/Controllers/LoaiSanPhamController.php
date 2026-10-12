<?php

namespace App\Http\Controllers;

use App\Models\LoaiSanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LoaiSanPhamController extends Controller
{
    public function getDanhSach()
    {
        $loaisanpham = LoaiSanPham::all();
        return view('loaisanpham.danhsach', compact('loaisanpham'));
    }

    public function getThem()
    {
        return view('loaisanpham.them');
    }

    public function postThem(Request $request)
    {
        // Kiểm tra dữ liệu (Validation)
        $request->validate([
            'tenloai' => ['required', 'string', 'max:255', 'unique:loaisanpham'],
        ]);

        $orm = new LoaiSanPham();
        $orm->tenloai = $request->tenloai;
        $orm->tenloai_slug = Str::slug($request->tenloai, '-');
        $orm->save();

        // Chuyển hướng về trang danh sách
        return redirect()->route('loaisanpham');
    }

    public function getSua($id)
    {
        $loaisanpham = LoaiSanPham::find($id);
        return view('loaisanpham.sua', compact('loaisanpham'));
    }

    public function postSua(Request $request, $id)
    {
        // Kiểm tra dữ liệu: bỏ qua kiểm tra trùng tên đối với chính bản ghi đang sửa ($id)
        $request->validate([
            'tenloai' => ['required', 'string', 'max:255', 'unique:loaisanpham,tenloai,' . $id],
        ]);

        $orm = LoaiSanPham::find($id);
        $orm->tenloai = $request->tenloai;
        $orm->tenloai_slug = Str::slug($request->tenloai, '-');
        $orm->save();

        // Chuyển hướng về trang danh sách
        return redirect()->route('loaisanpham');
    }

    public function getXoa($id)
    {
        $orm = LoaiSanPham::find($id);
        $orm->delete();

        return redirect()->route('loaisanpham');
    }
}