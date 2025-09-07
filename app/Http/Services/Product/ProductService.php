<?php

namespace App\Http\Services\Product;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductService
{
    public function createProduct(array $dataProduct): Product
    {
        return DB::transaction(function () use ($dataProduct) {
            $product = Product::query()->create([
                'sku' => $dataProduct['sku'],
                'distri_price' => $dataProduct['distri_price'],
                'si_price' => $dataProduct['si_price'],
                'md_price' => $dataProduct['md_price'],
                'sdp_price' => $dataProduct['sdp_price'],
                'srp_price' => $dataProduct['srp_price'],
                'lkpp_price' => $dataProduct['lkpp_price']
            ]);

            return $product;
        });
    }
}
