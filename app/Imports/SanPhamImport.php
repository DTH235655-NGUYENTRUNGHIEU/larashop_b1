<?php

namespace App\Imports;

use App\Models\SanPham;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;

class SanPhamImport implements ToModel
{
    public function model(array $row): Model|null
    {
        return new SanPham([
            //
        ]);
    }
}
