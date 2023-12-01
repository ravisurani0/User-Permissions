@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Role Details') }}</h1>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-8 order-lg-1">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Role Details</h6>
                </div>
                <div class="card-body">
                    @if ($permissionList['roles']['create'] || $permissionList['roles']['update'])
                        <form action="{{ $role ? route('roles.update', ['role' => $role->id]) : route('roles.store') }}"
                            method="POST">
                            @if ($role)
                                @method('PUT')
                            @else
                                @method('POST')
                            @endif
                            @csrf
                    @endif
                    <h6 class="heading-small text-muted mb-4">Role information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="name">Role</label>
                                    <input type="text" id="name" class="form-control" name="name"
                                        placeholder="Name" value="{{ isset($role->name) ? $role->name : @old('name') }}" />

                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Button -->
                    @if ($permissionList['roles']['create'] || $permissionList['roles']['update'])
                        <div class="pl-lg-4">
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col text-right">
                                        <a href="{{ route('roles.index') }}" class="btn btn-danger">back</a>

                                        <button type="submit"
                                            class="btn btn-primary">{{ $role ? 'Update' : 'Save' }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($permissionList['roles']['create'] || $permissionList['roles']['update'])
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            if ({{ $permissionList['roles']['create'] == 0 && $permissionList['roles']['update'] == 0 }}) {
                $('input').attr('disabled', true);
            }
        });
    </script>
@endsection
