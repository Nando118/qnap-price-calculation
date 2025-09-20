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
                                <table id="products-table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>SKU</th>
                                            <th>Distri Price</th>
                                            <th>SI Price</th>
                                            <th>MD Price</th>
                                            <th>SDP Price</th>
                                            <th>SRP Price</th>
                                            <th>LKPP Price</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
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
        $('#products-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("qnap-products.data") }}',
                columns: [
                    {
                        data: null,
                        name: 'no',
                        orderable: false,
                        searchable: false,
                        render: function (data, type, row, meta) {
                            // Menampilkan nomor index (incremented by 1) pada setiap baris
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    { data: 'sku', name: 'sku' },
                    {
                        data: 'distri_price',
                        name: 'distri_price',
                        render: $.fn.dataTable.render.number('.', ',', 0, '')
                    },
                    {
                        data: 'si_price',
                        name: 'si_price',
                        render: $.fn.dataTable.render.number('.', ',', 0, '')
                    },
                    {
                        data: 'md_price',
                        name: 'md_price',
                        render: $.fn.dataTable.render.number('.', ',', 0, '')
                    },
                    {
                        data: 'sdp_price',
                        name: 'sdp_price',
                        render: $.fn.dataTable.render.number('.', ',', 0, '')
                    },
                    {
                        data: 'srp_price',
                        name: 'srp_price',
                        render: $.fn.dataTable.render.number('.', ',', 0, '')
                     },
                    {
                        data: 'lkpp_price',
                        name: 'lkpp_price',
                        render: $.fn.dataTable.render.number('.', ',', 0, '')
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        render: function (data, type, row) {
                            // Format tanggal menjadi DD-MM-YYYY
                            return moment(data).format('DD-MM-YYYY');
                        }
                    },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ],
                order: [8, 'desc'],
        });
    });
</script>
@endpush
