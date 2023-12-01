@extends('layouts.admin')

@section('main-content')
<!-- <h1 class="h3 mb-4 text-gray-800">{{ __('Users') }}</h1> -->

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
        <h1 class="m-0 text-gray-800 text-primary">Users List</h1>
        @if ($permissionList['user']['create'])
        <a href="{{ route('user.create') }}" class="btn btn-primary">Add User</a>
        @endif
    </div>
    <div class="card-body">
        <table class="table table-bordered data-table" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Emal</th>
                    <th>Role</th>
                    <th>Joined </th>
                    @if ($permissionList['stores']['show'])
                    <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    $(function() {

        var table = $('.data-table').DataTable({
            processing: true,
            userId: true,
            type: "GET",
            ajax: "{{ route('user.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                }, {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'roles',
                    name: 'roles',
                    "render": function(data, type, row, meta) {
                        console.log(row)
                        return row.roles[0].name;
                    }

                },
                {
                    data: 'created_at',
                    name: 'created_at'
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

    function onRemoveRecord(userId) {
        if (confirm('Do you want to delete User?')) {
            $.ajax({
                url: '/user/' + userId,
                type: "DELETE",
                data: {
                    user: userId,
                    '_token': '{{ csrf_token() }}',
                },

                dataType: "json",
                success: function(response) {
                    if (response.status) {
                        $('.data-table').DataTable().ajax.reload();
                        alert('User Deleted successful! ');
                    } else if (response.message) {}
                }
            });
        }
    }
    // $('.data-table').DataTable().ajax.reload()
</script>
@endsection