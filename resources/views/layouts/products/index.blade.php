@extends('layouts.admin')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">{{ __('Product') }}</h1>

@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="card shadow mb-4">

    <div class="card-header d-flex justify-content-between py-3">
        <h6 class="m-0 font-weight-bold text-primary">Product list</h6>

        @if ($permissionList['products']['create'])
        <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
        @endif
    </div>
    <div class="card-body">
        <div class="">
            <table class="table table-bordered data-table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        @if ($permissionList['products']['show'] || $permissionList['products']['destroy'])
                        <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            type: "GET",
            ajax: "{{ route('products.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'quantity',
                    name: 'quantity'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    className: "d-flex w-100",
                    // render: function(data, type, row, meta) {
                    //     return `<div class=''>${data}</div>`;
                    // }

                },
            ]
        });
    });

    function onRemoveRecord(productId) {
        if (confirm('Do you want to delete Product?')) {
            $.ajax({
                url: '/products/' + productId,
                type: "DELETE",
                data: {
                    product: productId,
                    '_token': '{{ csrf_token() }}',
                },

                dataType: "json",
                success: function(response) {
                    if (response.status) {
                        $('.data-table').DataTable().ajax.reload();
                        alert('Product Deleted successful! ');
                    } else if (response.message) {}
                }
            });
        }
    }
    // $('.data-table').DataTable().ajax.reload()
</script>
@endsection