<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\HangSanXuat;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Imports\SanPhamImport;
use App\Exports\SanPhamExport;
use Maatwebsite\Excel\Facades\Excel;

class SanPhamController extends Controller
{
    public function getDanhSach()
    {
        $sanpham = SanPham::all();
        return view('sanpham.danhsach', compact('sanpham'));
    }

    public function getThem()
    {
        $loaisanpham = LoaiSanPham::all();
        $hangsanxuat = HangSanXuat::all();
        return view('sanpham.them', compact('loaisanpham', 'hangsanxuat'));
    }

    public function postThem(Request $request)
    {
        // Kiểm tra dữ liệu
        $request->validate([
            'loaisanpham_id' => ['required'],
            'hangsanxuat_id' => ['required'],
            'tensanpham'     => ['required', 'string', 'max:255', 'unique:sanpham'],
            'soluong'        => ['required', 'numeric'],
            'dongia'         => ['required', 'numeric'],
            'hinhanh'        => ['nullable', 'string', 'max:255'],
        ]);

        $orm = new SanPham();
        $orm->loaisanpham_id = $request->loaisanpham_id;
        $orm->hangsanxuat_id = $request->hangsanxuat_id;
        $orm->tensanpham = $request->tensanpham;
        $orm->tensanpham_slug = Str::slug($request->tensanpham, '-');
        $orm->soluong = $request->soluong;
        $orm->dongia = $request->dongia;
        $orm->hinhanh = $request->hinhanh;
        $orm->motasanpham = $request->motasanpham;
        $orm->save();

        return redirect()->route('sanpham');
    }

    public function getSua($id)
    {
        $sanpham = SanPham::find($id);
        $loaisanpham = LoaiSanPham::all();
        $hangsanxuat = HangSanXuat::all();
        return view('sanpham.sua', compact('sanpham', 'loaisanpham', 'hangsanxuat'));
    }

    public function postSua(Request $request, $id)
    {
        // Kiểm tra dữ liệu
        $request->validate([
            'loaisanpham_id' => ['required'],
            'hangsanxuat_id' => ['required'],
            'tensanpham'     => ['required', 'string', 'max:255', 'unique:sanpham,tensanpham,' . $id],
            'soluong'        => ['required', 'numeric'],
            'dongia'         => ['required', 'numeric'],
            'hinhanh'        => ['nullable', 'string', 'max:255'],
        ]);

        $orm = SanPham::find($id);
        $orm->loaisanpham_id = $request->loaisanpham_id;
        $orm->hangsanxuat_id = $request->hangsanxuat_id;
        $orm->tensanpham = $request->tensanpham;
        $orm->tensanpham_slug = Str::slug($request->tensanpham, '-');
        $orm->soluong = $request->soluong;
        $orm->dongia = $request->dongia;
        $orm->hinhanh = $request->hinhanh;
        $orm->motasanpham = $request->motasanpham;
        $orm->save();

        return redirect()->route('sanpham');
    }

    public function getXoa($id)
    {
        $orm = SanPham::find($id);
        $orm->delete();

        return redirect()->route('sanpham');
    }

    // Nhập từ Excel
    public function postNhap(Request $request)
    {
        $request->validate([
            'file_excel' => ['required', 'file', 'mimes:xlsx,xls', 'max:2048'],
        ]);

        Excel::import(new SanPhamImport(), $request->file('file_excel'));

        return redirect()->route('sanpham');
    }

    // Xuất ra Excel
    public function getXuat()
    {
        $filename = 'san-pham.xlsx';
        return Excel::download(new SanPhamExport(), $filename);
    }
}