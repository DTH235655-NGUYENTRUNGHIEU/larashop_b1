<?php

namespace App\Http\Controllers;

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
	
	public function postThem(Request $request)
	{
		$orm = new HangSanXuat();
		$orm->tenhang = $request->tenhang;
		$orm->tenhang_slug = Str::slug($request->tenhang, '-');
		$orm->save();
		
		return redirect()->route('hangsanxuat');
	}
	
	public function getSua($id)
	{
		$hangsanxuat = HangSanXuat::find($id);
		return view('hangsanxuat.sua', compact('hangsanxuat'));
	}
	
	public function postSua(Request $request, $id)
	{
		$orm = HangSanXuat::find($id);
		$orm->tenhang = $request->tenhang;
		$orm->tenhang_slug = Str::slug($request->tenhang, '-');
		$orm->save();
		
		return redirect()->route('hangsanxuat');
	}
	
	public function getXoa($id)
	{
		$orm = HangSanXuat::find($id);
		$orm->delete();
		
		return redirect()->route('hangsanxuat');
	}
}
