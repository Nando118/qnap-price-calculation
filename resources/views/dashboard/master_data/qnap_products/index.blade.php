@extends('dashboard.layouts.main')

@section('content_body')
    {{-- HEADER --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>QNAP Products</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">QNAP Products</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>


    {{-- MAIN CONTENT --}}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row my-3">
                                    <div class="col-12">
                                        <div class="btn-group" role="group">
                                            <a class="btn btn-primary" href="{{ route('add-product.index') }}" role="button"><i class="fas fa-fw fa-plus"></i>Add Product</a>
                                            <a class="btn btn-success" href="{{ route('import-product.index') }}" role="button"><i class="fas fa-fw fa-file-excel"></i>Import Products</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
