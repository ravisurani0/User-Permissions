@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('User Details') }}</h1>

@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif



<div class="row">
    <!-- <div class="col-lg-4 order-lg-2">

        <div class="card shadow mb-4">
            <div class="card-profile-image mt-4">
                <figure class="rounded-circle avatar avatar font-weight-bold" style="font-size: 60px; height: 180px; width: 180px;" data-initial="{{ Auth::user()->name[0] }}"></figure>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h5 class="font-weight-bold">{{ Auth::user()->fullName }}</h5>
                            <p>Administrator</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="card-profile-stats">
                            <span class="heading">22</span>
                            <span class="description">Friends</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-profile-stats">
                            <span class="heading">10</span>
                            <span class="description">Photos</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-profile-stats">
                            <span class="heading">89</span>
                            <span class="description">Comments</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> -->

    <div class="col-lg-8 order-lg-1">

        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">User Details</h6>
            </div>

            <div class="card-body">
                @if($permissionList['user']['create'] || $permissionList['user']['update'])
                <form action="{{$user ?  route( 'user.update',['user'=>$user->id]) : route('user.store') }}" method="POST">
                    @if($user)
                    @method('PUT')
                    @else
                    @method('POST')
                    @endif
                    @csrf
                    @endif

                    <h6 class="heading-small text-muted mb-4">User information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="name">Name<span class="small text-danger">*</span></label>
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Name" value="{{ isset($user->name) ? $user->name : @old('name')}}">
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label class="form-control-label" for="last_name">Last name</label>
                                    <input type="text" id="last_name" class="form-control" name="last_name" placeholder="Last name" value="{{ isset($user->last_name) ? $user->last_name : @old('last_name')}}">
                                    @error('last_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="email">Email address<span class="small text-danger">*</span></label>
                                    <input type="email" id="email" class="form-control" name="email" placeholder="example@example.com" value="{{ isset($user->email) ? $user->email : @old('email')}}">
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="email">Role<span class="small text-danger">*</span></label>
                                    <select class="form-control" aria-label="Default select example" id="role" name="role">
                                        @foreach($roles as $role)
                                        <option value="{{$role->id}}" {{(count( $user?->roles) && $user->roles[0]->id == $role->id) ? 'selected' :''}}>{{$role->name}}</option>
                                        @endforeach

                                    </select>
                                    @error('role')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="password">Password<span class="small text-danger">*</span></label>
                                    <input type="text" id="password" class="form-control" name="password" value="{{ isset($user->password) ? $user->password : @old('password')}}">
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> -->
                        </div>
                        @if($permissionList['user']['create'] || $permissionList['user']['update'])
                        <!-- Button -->
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col text-right">
                                    <a href="{{ route( 'user.index' ) }}" class="btn btn-danger">back</a>
                                    <button type="submit" class="btn btn-primary">{{$user ? 'Update':'Save'}}</button>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($permissionList['user']['create'] || $permissionList['user']['update'])
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="col-lg-8 order-lg-1">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">User Details</h6>
        </div>
        <div class="card-body">
            <h6 class="heading-small text-muted mb-4">Permetions Details</h6>
            @if(isset( $permissionList) &&$permissionList['user-permeations']['create'] || $permissionList['user-permeations']['update'])
            <form action="{{ route('user-permeations.update',   $user->id  ) }}" method="POST">
                @csrf
                @method('PUT')
                @endif
                <div class="pl-lg-4">

                    <table class="table">
                        @foreach($permetionList as $permetion)
                        <tr>
                            <th>{{ $permetion->name}}</th>
                            <td>
                                <lable class="form-control-label col-3">
                                    <input type="checkbox" name="permission[{{$permetion->id}}][index]" {{$user->checkUserHasPermission($user->id,$permetion->key,'index') ? 'checked' :''}} /> Index
                                </lable>
                            </td>
                            <td>
                                <lable class="form-control-label col-3">
                                    <input type="checkbox" name="permission[{{$permetion->id}}][show]" {{$user->checkUserHasPermission($user->id,$permetion->key,'show') ? 'checked' :''}} /> Show
                                </lable>
                            </td>
                            <!-- <td>
                    <lable class="form-control-label col-3">
                        <input type="checkbox" name="permission[{{$permetion->id}}][store]" {{$user->checkUserHasPermission($user->id,$permetion->key,'store') ? 'checked' :''}} /> Store
                    </lable>
                </td> -->
                            <td>
                                <lable class="form-control-label col-3">
                                    <input type="checkbox" name="permission[{{$permetion->id}}][create]" {{$user->checkUserHasPermission($user->id,$permetion->key,'create') ? 'checked' :''}} /> Create
                                </lable>
                            </td>
                            <!-- <td>
                    <lable class="form-control-label col-3">
                        <input type="checkbox" name="permission[{{$permetion->id}}][update]" {{$user->checkUserHasPermission($user->id,$permetion->key,'update') ? 'checked' :''}} /> Update
                    </lable>
                </td> -->
                            <td>
                                <lable class="form-control-label col-3">
                                    <input type="checkbox" name="permission[{{$permetion->id}}][edit]" {{$user->checkUserHasPermission($user->id,$permetion->key,'edit') ? 'checked' :''}} /> Edit
                                </lable>
                            </td>
                            <td>
                                <lable class="form-control-label col-3">
                                    <input type="checkbox" name="permission[{{$permetion->id}}][destroy]" {{$user->checkUserHasPermission($user->id,$permetion->key,'destroy') ? 'checked' :''}} /> Destroy
                                </lable>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    @if($permissionList['user-permeations']['create'] || $permissionList['user-permeations']['update'])
                    <!-- Button -->
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col text-right">
                                <a href="{{ route( 'role-permeations.index' ) }}" class="btn btn-danger">back</a>
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                @if($permissionList['user-permeations']['create'] || $permissionList['user-permeations']['update'])
            </form>
            @endif
        </div>
    </div>
</div>


</div>

<script>
    $(document).ready(function() {
        if ({{$permissionList['user']['create'] == 0 && $permissionList['user']['update'] == 0}}) {
            $('input').attr('disabled', true);
            $('#address').attr('disabled', true);
        }
    });
</script>
@endsection