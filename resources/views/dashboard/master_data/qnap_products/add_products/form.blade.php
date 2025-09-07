@extends('dashboard.layouts.main')

@section('content_body')
    {{-- HEADER --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('qnap-products.index') }}">QNAP Products</a></li>
                        <li class="breadcrumb-item active">Add Product</li>
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
                            <form action="{{ route('add-product.post') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="sku" class="form-label">SKU/Product Code</label>
                                    <input type="text" class="form-control" id="sku" name="sku" value="{{ old('sku') }}">
                                    @error('sku')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="distri_price" class="form-label">Distri Price</label>
                                    <input type="text" class="form-control price-input" id="distri_price" name="distri_price" value="{{ old('distri_price') }}">
                                    @error('distri_price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="si_price" class="form-label">SI Price</label>
                                    <input type="text" class="form-control price-input" id="si_price" name="si_price" value="{{ old('si_price') }}">
                                    @error('si_price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="md_price" class="form-label">MD Price</label>
                                    <input type="text" class="form-control price-input" id="md_price" name="md_price" value="{{ old('md_price') }}">
                                    @error('md_price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="sdp_price" class="form-label">SDP Price</label>
                                    <input type="text" class="form-control price-input" id="sdp_price" name="sdp_price" value="{{ old('sdp_price') }}">
                                    @error('sdp_price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="srp_price" class="form-label">SRP Price</label>
                                    <input type="text" class="form-control price-input" id="srp_price" name="srp_price" value="{{ old('srp_price') }}">
                                    @error('srp_price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="lkpp_price" class="form-label">LKPP Price</label>
                                    <input type="text" class="form-control price-input" id="lkpp_price" name="lkpp_price" value="{{ old('lkpp_price') }}">
                                    @error('lkpp_price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
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
        document.querySelectorAll('.price-input').forEach(function (input) {
            input.addEventListener('input', function () {
                let raw = this.value.replace(/\D/g, ''); // hapus semua non-angka
                this.value = new Intl.NumberFormat('id-ID').format(raw);
            });
        });
    });
</script>
@endpush
