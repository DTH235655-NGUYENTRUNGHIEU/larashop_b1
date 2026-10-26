<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Table('hangsanxuat')]
class HangSanXuat extends Model
{
	protected $fillable = [
    'tenhang',
    'tenhang_slug',
    'hinhanh',
];
    public function SanPham(): HasMany
	{
		return $this->hasMany(SanPham::class, 'hangsanxuat_id', 'id');
	}
}