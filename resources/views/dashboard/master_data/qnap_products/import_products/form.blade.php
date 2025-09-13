@extends('dashboard.layouts.main')

@section('content_body')
    {{-- HEADER --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Import Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('qnap-products.index') }}">QNAP Products</a></li>
                        <li class="breadcrumb-item active">Import Product</li>
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
                            <form action="{{ route('import-product.post') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="file">Upload File Here</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file" name="file" accept=".xlsx, .xls, .csv">
                                            <label class="custom-file-label" for="file">Choose file</label>
                                        </div>
                                    </div>
                                    @error('file')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <small id="fileHelpBlock" class="form-text text-muted">
                                        Only files xlsx, xls, csv and a maximum size of 2MB can be uploaded.
                                    </small>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@push('js')
<script>
    $(document).ready(function() {
        document.querySelector('.custom-file-input').addEventListener('change', function (e) {
            let fileName = e.target.files[0].name;
            e.target.nextElementSibling.innerText = fileName;
        });
    });
</script>
@endpush
