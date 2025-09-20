<?php

namespace App\Http\Services\Product;

use App\Models\Product;
use Yajra\DataTables\Facades\DataTables;

class ProductDataTableService
{
    public function getDataTable($request)
    {
        $query = Product::query()->select(['sku', 'distri_price', 'si_price', 'md_price', 'sdp_price', 'srp_price', 'lkpp_price', 'created_at']);

        return DataTables::of($query)
            ->addColumn('action', function ($row){
                return '
                    <a href="#" class="btn btn-sm btn-warning">Edit</a>
                    <a href="#" class="btn btn-sm btn-info">Detail</a>
                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                ';
            })
            ->filter(function ($query) use ($request) {
                if ($search = $request->input('search.value')) {
                    $query->where('sku', 'like', "%{$search}%");
                }
            })
            ->make(true);
    }
}
