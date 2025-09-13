<?php

namespace App\Http\Services\ImportProduct;

use App\Imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportProductService
{
    public function import($file): void
    {
        Excel::import(new ProductImport, $file);
    }
}
