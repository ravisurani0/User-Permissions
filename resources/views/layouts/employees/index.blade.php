@extends('layouts.admin')

@section('main-content')
    <h1 class="h3 mb-4 text-gray-800">{{ __('Employee') }}</h1>

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
            <h6 class="m-0 font-weight-bold text-primary">Employee list</h6>
            @if ($permissionList['employee']['create'])
                <a href="{{ route('employee.create') }}" class="btn btn-primary">Add Employee</a>
            @endif
        </div>
        <div class="card-body">
            <div class="table">
                <table class="table table-bordered data-table" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            @if ($permissionList['employee']['show'])
                                <th>Action</th>
                            @endif
                        </tr>
                    </thead>

                    <tbody>
                        {{-- @foreach ($employeeList as $employee)
                            <tr>
                                <td>{{ $employee->id }}</td>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->position }}</td>
                                <td>{{ $employee->office }}</td>
                                <td>{{ $employee->age }}</td>
                                <td>{{ $employee->startdate }}</td>
                                <td class="d-flex">
                                    @if ($permissionList['employee']['show'])
                                        <a href="{{ route('employee.show', ['employee' => $employee->id]) }}"
                                            class="bt btn btn-primary btn-sm">Details</a>
                                    @endif
                                    @if ($permissionList['employee']['destroy'])
                                        <form action="{{ route('employee.destroy', ['employee' => $employee->id]) }}"
                                            method="POST" onsubmit="return confirm('Do you want to delete Record?');">
                                            @method('DELETE')
                                            @csrf
                                            <button class="bt btn btn-danger btn-sm ml-3">Remove</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach --}}
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
                ajax: "{{ route('employee.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'position',
                        name: 'position'
                    },
                    {
                        data: 'office',
                        name: 'office'
                    },
                    {
                        data: 'age',
                        name: 'age',
                    },
                    {
                        data: 'startdate',
                        name: 'startdate',
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

        function onRemoveRecord(employeeId) {
            if (confirm('Do you want to delete employee?')) {
                $.ajax({
                    url: '/employee/' + employeeId,
                    type: "DELETE",
                    data: {
                        employee: employeeId,
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
