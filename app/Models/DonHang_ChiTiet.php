<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DonHang_ChiTiet extends Model
{
    protected $table = 'donhang_chitiet';

    // Quan hệ thuộc về Đơn hàng
    public function DonHang(): BelongsTo
    {
        return $this->belongsTo(DonHang::class, 'donhang_id', 'id');
    }

    // Quan hệ thuộc về Sản phẩm
    public function SanPham(): BelongsTo
    {
        return $this->belongsTo(SanPham::class, 'sanpham_id', 'id');
    }
}