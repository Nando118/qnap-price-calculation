<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImportProduct\ImportProductRequest;
use App\Http\Services\ImportProduct\ImportProductService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ImportQNAPProductController extends Controller
{
    private ImportProductService $importProductService;

    public function __construct(ImportProductService $importProductService)
    {
        $this->importProductService = $importProductService;
    }

    public function import_product(): View
    {
        return view('dashboard.master_data.qnap_products.import_products.form', [
            'title' => 'Import Product - ' . config('app.name')
        ]);
    }

    public function import(ImportProductRequest $importProductRequest): RedirectResponse
    {
        $this->importProductService->import($importProductRequest->file('file'));

        return redirect()->route('qnap-products.index');
    }
}
