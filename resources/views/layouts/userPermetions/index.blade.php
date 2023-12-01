@extends('layouts.admin')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">{{ __('User') }}</h1>

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
        <h6 class="m-0 font-weight-bold text-primary">User List</h6>
        @if ($permissionList['user']['create'])
        <a href="{{ route('user.create') }}" class="btn btn-primary">Add User</a>
        @endif
    </div>
    <div class="card-body">
        <!-- <div class="table-responsive"> -->
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Role</th>
                    @if ($permissionList['user']['show'])
                    <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Role</th>
                    @if ($permissionList['user']['show'])
                    <th>Action</th>
                    @endif
                </tr>
            </tfoot>
            <tbody>
                @foreach ($userList as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->roles->first() ? $user->roles->first()->name : '' }}</td>
                    @if ($permissionList['user']['show'])
                    <td class="d-flex">
                        @if ($permissionList['user']['show'])
                        <a href="{{ route('user-permeations.show', ['id' => $user->id]) }}" class="bt btn btn-primary btn-sm">Details</a>
                        @endif
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- </div> -->
    </div>
</div>
@endsection