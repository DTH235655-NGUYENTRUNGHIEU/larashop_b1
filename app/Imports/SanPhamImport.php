<?php

namespace App\Imports;

use App\Models\SanPham;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SanPhamImport implements ToModel, WithHeadingRow
{
    public function model(array $row): ?Model
    {
        dd($row);
        return new SanPham([
            'loaisanpham_id'  => $row['ma_loai'],
            'hangsanxuat_id'  => $row['ma_hang_san_xuat'],
            'tensanpham'      => $row['ten_san_pham'],
            'tensanpham_slug' => $row['ten_san_pham_khong_dau'],
            'soluong'         => $row['so_luong'],
            'dongia'          => $row['don_gia'],
            'hinhanh'         => $row['hinh_anh'],
        ]);
    }
}