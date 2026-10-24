<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\HangSanXuat;
use Illuminate\Support\Str;

class HangSanXuatController extends Controller
{
    public function getDanhSach()
	{
		$hangsanxuat = HangSanXuat::all();
		return view('hangsanxuat.danhsach', compact('hangsanxuat'));
	}
	
	public function getThem()
	{
		return view('hangsanxuat.them');
	}
	
	
	public function getSua($id)
	{
		$hangsanxuat = HangSanXuat::find($id);
		return view('hangsanxuat.sua', compact('hangsanxuat'));
	}
	public function postThem(Request $request)
	{
		$request->validate([
			'tenhang' => ['required', 'string', 'max:255', 'unique:hangsanxuat'],
			'hinhanh' => ['nullable', 'image', 'max:1024']
		]);

		$path = null;
		if ($request->hasFile('hinhanh')) {
			$file = $request->file('hinhanh');
			$extension = $file->extension();
			$filename = Str::slug($request->tenhang, '-') . '.' . $extension;
			$path = $file->storeAs('hang-san-xuat', $filename);
		}

		$orm = new HangSanXuat();
		$orm->tenhang = $request->tenhang;
		$orm->tenhang_slug = Str::slug($request->tenhang, '-');
		$orm->hinhanh = $path ?? null;
		$orm->save();

		return redirect()->route('hangsanxuat');
	}

	public function postSua(Request $request, $id)
	{
		$request->validate([
			'tenhang' => ['required', 'string', 'max:255', 'unique:hangsanxuat,tenhang,' . $id],
			'hinhanh' => ['nullable', 'image', 'max:1024']
		]);

		$orm = HangSanXuat::find($id);
		$path = null;

		if ($request->hasFile('hinhanh')) {
			if ($orm->hinhanh) Storage::delete($orm->hinhanh);

			$file = $request->file('hinhanh');
			$extension = $file->extension();
			$filename = Str::slug($request->tenhang, '-') . '.' . $extension;
			$path = $file->storeAs('hang-san-xuat', $filename);
		}

		$orm->tenhang = $request->tenhang;
		$orm->tenhang_slug = Str::slug($request->tenhang, '-');
		$orm->hinhanh = $path ?? $orm->hinhanh ?? null;
		$orm->save();

		return redirect()->route('hangsanxuat');
	}

	public function getXoa($id)
	{
		$orm = HangSanXuat::find($id);
		$hinhanh = $orm->hinhanh;
		$orm->delete();

		if ($hinhanh) Storage::delete($hinhanh);

		return redirect()->route('hangsanxuat');
	}
}
