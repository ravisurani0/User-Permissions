@extends('layouts.admin')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">{{ __('Role Permeations') }}</h1>

@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Role Permeations list</h6>
    </div>
    <div class="card-body">
        <div class="">
            <table class="table table-bordered data-table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
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
            ajax: "{{ route('user-permeations.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                }, {
                    data: 'roles',
                    name: 'roles',
                    "render": function(data, type, row, meta) {
                        return row.roles[0] ?row.roles[0]?.name:'';
                    }
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

    function onRemoveRecord(rolePermeationsId) {
        if (confirm('Do you want to delete Role Ppermeation?')) {
            $.ajax({
                url: '/user-permeations/' + rolePermeationsId,
                type: "DELETE",
                data: {
                    id: rolePermeationsId,
                    '_token': '{{ csrf_token() }}',
                },

                dataType: "json",
                success: function(response) {
                    if (response.status) {
                        $('.data-table').DataTable().ajax.reload();
                        alert('Employee Deleted successful! ');
                    } else if (response.message) {}
                }
            });
        }
    }
    // $('.data-table').DataTable().ajax.reload()
</script>
@endsection