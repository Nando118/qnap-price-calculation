<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Services\Product\ProductService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QNAPProductController extends Controller
{

    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(): View
    {
        return view('dashboard.master_data.qnap_products.index', [
            'title' => 'QNAP Products - ' . config('app.name')
        ]);
    }

    public function add_product(): View
    {
        return view('dashboard.master_data.qnap_products.add_products.form', [
            'title' => 'Add Product - ' . config('app.name')
        ]);
    }

    public function store_product(StoreProductRequest $storeProductRequest): RedirectResponse
    {
        $product = $this->productService->createProduct($storeProductRequest->validated());

        return redirect()->route('qnap-products.index');
    }

}
