<?php

namespace App\Http\Controllers;

use App\Models\HangSanXuat;
use App\Imports\HangSanXuatImport;
use App\Exports\HangSanXuatExport;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class HangSanXuatController extends Controller
{
    public function getDanhSach()
    {
        $hangsanxuat = HangSanXuat::all();
        return view('admin.hangsanxuat.danhsach', compact('hangsanxuat'));
    }

    public function getThem()
    {
        return view('admin.hangsanxuat.them');
    }

    public function postThem(Request $request)
    {
        $request->validate([
            'tenhang' => ['required', 'string', 'max:255', 'unique:hangsanxuat'],
            'hinhanh' => ['nullable', 'image', 'max:2048'],
        ]);

        $orm = new HangSanXuat();
        $orm->tenhang = $request->tenhang;
        $orm->tenhang_slug = Str::slug($request->tenhang, '-');

        if ($request->hasFile('hinhanh')) {
            $extension = $request->file('hinhanh')->extension();
            $filename = Str::slug($request->tenhang, '-') . '.' . $extension;
            $orm->hinhanh = Storage::disk('public')->putFileAs('hang-san-xuat', $request->file('hinhanh'), $filename);
        }

        $orm->save();

        return redirect()->route('admin.hangsanxuat');
    }

    public function getSua($id)
    {
        $hangsanxuat = HangSanXuat::findOrFail($id);
        return view('admin.hangsanxuat.sua', compact('hangsanxuat'));
    }

    public function postSua(Request $request, $id)
    {
        $request->validate([
            'tenhang' => ['required', 'string', 'max:255', 'unique:hangsanxuat,tenhang,' . $id],
            'hinhanh' => ['nullable', 'image', 'max:2048'],
        ]);

        $orm = HangSanXuat::findOrFail($id);
        $orm->tenhang = $request->tenhang;
        $orm->tenhang_slug = Str::slug($request->tenhang, '-');

        if ($request->hasFile('hinhanh')) {
            if (!empty($orm->hinhanh) && Storage::disk('public')->exists($orm->hinhanh)) {
                Storage::disk('public')->delete($orm->hinhanh);
            }

            $extension = $request->file('hinhanh')->extension();
            $filename = Str::slug($request->tenhang, '-') . '.' . $extension;
            $orm->hinhanh = Storage::disk('public')->putFileAs('hang-san-xuat', $request->file('hinhanh'), $filename);
        }

        $orm->save();

        return redirect()->route('admin.hangsanxuat');
    }

    public function getXoa($id)
    {
        $orm = HangSanXuat::findOrFail($id);

        if (!empty($orm->hinhanh) && Storage::disk('public')->exists($orm->hinhanh)) {
            Storage::disk('public')->delete($orm->hinhanh);
        }

        $orm->delete();

        return redirect()->route('admin.hangsanxuat');
    }

    public function postNhap(Request $request)
    {
        $request->validate([
            'file_excel' => ['required', 'file', 'mimes:xlsx,xls'],
        ]);

        Excel::import(new HangSanXuatImport, $request->file('file_excel'));

        return redirect()->route('admin.hangsanxuat');
    }

    public function getXuat()
    {
        return Excel::download(new HangSanXuatExport, 'danh-sach-hang-san-xuat.xlsx');
    }
}