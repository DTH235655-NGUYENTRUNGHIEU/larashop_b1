<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\HangSanXuat;
use App\Imports\SanPhamImport;
use App\Exports\SanPhamExport;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class SanPhamController extends Controller
{
    public function getDanhSach()
    {
        $sanpham = SanPham::with(['LoaiSanPham', 'HangSanXuat'])->paginate(15);
        return view('admin.sanpham.danhsach', compact('sanpham'));
    }

    public function getThem()
    {
        $loaisanpham = LoaiSanPham::all();
        $hangsanxuat = HangSanXuat::all();
        return view('admin.sanpham.them', compact('loaisanpham', 'hangsanxuat'));
    }

    public function postThem(Request $request)
    {
        $request->validate([
            'loaisanpham_id' => ['required', 'integer'],
            'hangsanxuat_id' => ['required', 'integer'],
            'tensanpham'     => ['required', 'string', 'max:255', 'unique:sanpham'],
            'soluong'        => ['required', 'numeric', 'min:0'],
            'dongia'         => ['required', 'numeric', 'min:0'],
            'hinhanh'        => ['nullable', 'image', 'max:2048'],
        ]);

        $orm = new SanPham();
        $orm->loaisanpham_id = $request->loaisanpham_id;
        $orm->hangsanxuat_id = $request->hangsanxuat_id;
        $orm->tensanpham = $request->tensanpham;
        $orm->tensanpham_slug = Str::slug($request->tensanpham, '-');
        $orm->soluong = $request->soluong;
        $orm->dongia = $request->dongia;
        $orm->motasanpham = $request->motasanpham;

        if ($request->hasFile('hinhanh')) {
            $extension = $request->file('hinhanh')->extension();
            $filename = Str::slug($request->tensanpham, '-') . '.' . $extension;
            $orm->hinhanh = Storage::disk('public')->putFileAs('san-pham', $request->file('hinhanh'), $filename);
        }

        $orm->save();

        return redirect()->route('admin.sanpham');
    }

    public function getSua($id)
    {
        $sanpham = SanPham::findOrFail($id);
        $loaisanpham = LoaiSanPham::all();
        $hangsanxuat = HangSanXuat::all();
        return view('admin.sanpham.sua', compact('sanpham', 'loaisanpham', 'hangsanxuat'));
    }

    public function postSua(Request $request, $id)
    {
        $request->validate([
            'loaisanpham_id' => ['required', 'integer'],
            'hangsanxuat_id' => ['required', 'integer'],
            'tensanpham'     => ['required', 'string', 'max:255', 'unique:sanpham,tensanpham,' . $id],
            'soluong'        => ['required', 'numeric', 'min:0'],
            'dongia'         => ['required', 'numeric', 'min:0'],
            'hinhanh'        => ['nullable', 'image', 'max:2048'],
        ]);

        $orm = SanPham::findOrFail($id);
        $orm->loaisanpham_id = $request->loaisanpham_id;
        $orm->hangsanxuat_id = $request->hangsanxuat_id;
        $orm->tensanpham = $request->tensanpham;
        $orm->tensanpham_slug = Str::slug($request->tensanpham, '-');
        $orm->soluong = $request->soluong;
        $orm->dongia = $request->dongia;
        $orm->motasanpham = $request->motasanpham;

        if ($request->hasFile('hinhanh')) {
            if (!empty($orm->hinhanh) && Storage::disk('public')->exists($orm->hinhanh)) {
                Storage::disk('public')->delete($orm->hinhanh);
            }

            $extension = $request->file('hinhanh')->extension();
            $filename = Str::slug($request->tensanpham, '-') . '.' . $extension;
            $orm->hinhanh = Storage::disk('public')->putFileAs('san-pham', $request->file('hinhanh'), $filename);
        }

        $orm->save();

        return redirect()->route('admin.sanpham');
    }

    public function getXoa($id)
    {
        $orm = SanPham::findOrFail($id);

        if (!empty($orm->hinhanh) && Storage::disk('public')->exists($orm->hinhanh)) {
            Storage::disk('public')->delete($orm->hinhanh);
        }

        $orm->delete();

        return redirect()->route('admin.sanpham');
    }

    public function postNhap(Request $request)
    {
        $request->validate([
            'file_excel' => ['required', 'file', 'mimes:xlsx,xls'],
        ]);

        Excel::import(new SanPhamImport, $request->file('file_excel'));

        return redirect()->route('admin.sanpham');
    }

    public function getXuat()
    {
        return Excel::download(new SanPhamExport, 'danh-sach-san-pham.xlsx');
    }
}