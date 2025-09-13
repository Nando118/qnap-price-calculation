<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;

class ProductImport implements OnEachRow, WithHeadingRow
{

    public function onRow(Row $row)
    {
        $data = $row->toArray();

        DB::transaction(function () use ($data) {
            if (!Product::where('sku', $data['sku'])->exists()) {
                Product::query()->create([
                    'sku'          => $data['sku'],
                    'distri_price' => $data['distri_price'],
                    'si_price'     => $data['si_price'],
                    'md_price'     => $data['md_price'],
                    'sdp_price'    => $data['sdp_price'],
                    'srp_price'    => $data['srp_price'],
                    'lkpp_price'   => $data['lkpp_price'],
                ]);
            }
        });
    }
}
