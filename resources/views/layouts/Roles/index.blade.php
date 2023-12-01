@extends('layouts.admin')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">{{ __('Roles') }}</h1>

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
        <h6 class="m-0 font-weight-bold text-primary">Role List</h6>
        @if ($permissionList['roles']['create'])
        <a href="{{ route('roles.create') }}" class="btn btn-primary">Add</a>
        @endif

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered data-table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Role</th>
                        <th>Key</th>
                        @if ($permissionList['roles']['show'])
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
            ajax: "{{ route('roles.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'key',
                    name: 'key'
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

    function onRemoveRecord(roleId) {
        if (confirm('Do you want to delete Role?')) {
            $.ajax({
                url: '/roles/' + roleId,
                type: "DELETE",
                data: {
                    role: roleId,
                    '_token': '{{ csrf_token() }}',
                },

                dataType: "json",
                success: function(response) {
                    if (response.status) {
                        $('.data-table').DataTable().ajax.reload();
                        alert('Role Deleted successful! ');
                    } else if (!response.status) {
                        alert(response.message);
                    }
                }
                
            });
        }
    }
    // $('.data-table').DataTable().ajax.reload()
</script>
@endsection