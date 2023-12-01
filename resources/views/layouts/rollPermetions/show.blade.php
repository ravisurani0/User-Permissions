@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('User Permetions Details') }}</h1>

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
                    <h6 class="m-0 font-weight-bold text-primary">User Permeations Details</h6>
                </div>
                <div class="card-body">
                    <h6 class="heading-small text-muted mb-4">Permetions Details</h6>

                    @if ($permissionList['role-permeations']['create'] || $permissionList['role-permeations']['update'])
                        <form action="{{ route('role-permeations.update', $roleDetails->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                    @endif
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="name">Permetions Name</label>
                                    <input type="text" id="name" class="form-control" name="name"
                                        placeholder="Name" value="{{ $roleDetails->name }}" disabled />
                                    <input type="hidden" id="userid" name="userid" value="{{ $roleDetails->id }}" />
                                </div>
                            </div>
                        </div>
                        <table class="table">
                            @foreach ($permetionList as $permetion)
                                <tr>
                                    <th>{{ $permetion->name }}</th>
                                    <td>
                                        <lable class="form-control-label col-3">
                                            <input type="checkbox" name="permission[{{ $permetion->id }}][index]"
                                                {{ $roleDetails->checkRollHasPermission($roleDetails->id, $permetion->key, ['index']) ? 'checked' : '' }} />
                                            Index
                                        </lable>
                                    </td>
                                    <td>
                                        <lable class="form-control-label col-3">
                                            <input type="checkbox" name="permission[{{ $permetion->id }}][show]"
                                                {{ $roleDetails->checkRollHasPermission($roleDetails->id, $permetion->key, ['show']) ? 'checked' : '' }} />
                                            Show
                                        </lable>
                                    </td>
                                    <!-- <td>
                                        <lable class="form-control-label col-3">
                                            <input type="checkbox" name="permission[{{ $permetion->id }}][store]" {{ $roleDetails->checkRollHasPermission($roleDetails->id, $permetion->key, ['store']) ? 'checked' : '' }} /> Store
                                        </lable>
                                    </td> -->
                                    <td>
                                        <lable class="form-control-label col-3">
                                            <input type="checkbox" name="permission[{{ $permetion->id }}][create]"
                                                {{ $roleDetails->checkRollHasPermission($roleDetails->id, $permetion->key, ['create']) ? 'checked' : '' }} />
                                            Create
                                        </lable>
                                    </td>
                                    <!-- <td>
                                        <lable class="form-control-label col-3">
                                            <input type="checkbox" name="permission[{{ $permetion->id }}][update]" {{ $roleDetails->checkRollHasPermission($roleDetails->id, $permetion->key, ['update']) ? 'checked' : '' }} /> Update
                                        </lable>
                                    </td> -->
                                    <td>
                                        <lable class="form-control-label col-3">
                                            <input type="checkbox" name="permission[{{ $permetion->id }}][edit]"
                                                {{ $roleDetails->checkRollHasPermission($roleDetails->id, $permetion->key, ['edit']) ? 'checked' : '' }} />
                                            Edit
                                        </lable>
                                    </td>
                                    <td>
                                        <lable class="form-control-label col-3">
                                            <input type="checkbox" name="permission[{{ $permetion->id }}][destroy]"
                                                {{ $roleDetails->checkRollHasPermission($roleDetails->id, $permetion->key, ['destroy']) ? 'checked' : '' }} />
                                            Destroy
                                        </lable>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        @if ($permissionList['role-permeations']['create'] || $permissionList['role-permeations']['update'])
                            <!-- Button -->
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col text-right">
                                        <a href="{{ route('role-permeations.index') }}" class="btn btn-danger">back</a>
                                        <button class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    @if ($permissionList['role-permeations']['create'] || $permissionList['role-permeations']['update'])
                        </form>
                    @endif
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                if (
                    {{ $permissionList['role-permeations']['create'] == 0 && $permissionList['role-permeations']['update'] == 0 }}) {
                    $('input').attr('disabled', true);
                    $('#address').attr('disabled', true);
                }
            });
        </script>
    @endsection
