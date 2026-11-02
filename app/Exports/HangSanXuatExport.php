<?php

namespace App\Exports;

use App\Models\HangSanXuat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class HangSanXuatExport implements FromCollection, WithHeadings
{
    public function collection(): Collection
    {
        return HangSanXuat::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'tenhang',
            'tenhang_slug',
            'hinhanh',
            'created_at',
            'updated_at',
        ];
    }
}