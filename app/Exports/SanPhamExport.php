<?php

namespace App\Exports;

use App\Models\SanPham;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class SanPhamExport implements FromCollection
{
    public function collection(): Collection
    {
        return SanPham::all();
    }
}
