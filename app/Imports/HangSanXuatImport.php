<?php

namespace App\Imports;

use App\Models\HangSanXuat;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class HangSanXuatImport implements ToModel, WithHeadingRow
{
    public function model(array $row): ?Model
    {
        $tenhang = $row['tenhang'] ?? $row['ten_hang'] ?? null;
        if (!$tenhang) {
            return null;
        }

        return new HangSanXuat([
            'tenhang'      => $tenhang,
            'tenhang_slug' => Str::slug($tenhang, '-'),
            'hinhanh'      => $row['hinhanh'] ?? null,
        ]);
    }
}