@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Employee Details') }}</h1>

@if ($errors->any())
<div class="alert alert-danger border-left-danger" role="alert">
    <ul class="pl-4 my-2">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
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
                <h6 class="m-0 font-weight-bold text-primary">Employee Details</h6>
            </div>

            <div class="card-body">
                @if($permissionList['user-permeations']['create'] || $permissionList['user-permeations']['update'])
                <form action="{{$employee ?  route( 'employee.update',['employee'=>$employee->id]) : route('employee.store') }}" method="POST">
                    @if($employee)
                    @method('PUT')
                    @else
                    @method('POST')
                    @endif
                    @csrf
                    @endif
                    <h6 class="heading-small text-muted mb-4">Employee information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="name">Name</label>
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Name" value="{{ isset( $employee->name) ? $employee->name : @old('name') }}" />
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="office">Office</label>
                                    <input type="text" id="office" class="form-control" name="office" value="{{ isset( $employee->office) ? $employee->office : @old('office') }}" />
                                    @error('office')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="position">Position</label>
                                    <input type="text" id="position" class="form-control" name="position" placeholder="Last name" value="{{ isset( $employee->position) ? $employee->position : @old('position') }}" />
                                    @error('position')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="startdate">Started Date</label>
                                    <input type="date" id="startdate" class="form-control" name="startdate" value="{{ isset( $employee->startdate) ? $employee->startdate : @old('startdate') }}" />
                                    @error('startdate')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="age">Age</label>
                                    <input type="number" id="age" class="form-control" name="age" value="{{ isset( $employee->age) ? $employee->age : @old('age') }}" />
                                    @error('age')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="salary">salary</label>
                                    <input type="number" id="salary" class="form-control" name="salary" value="{{ isset( $employee->salary) ? $employee->salary : @old('salary') }}" />
                                    @error('name')s
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Button -->
                    @if($permissionList['user-permeations']['create'] || $permissionList['user-permeations']['update'])
                    <div class="pl-lg-4">
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col text-right">
                                    <a href="{{ route( 'employee.index' ) }}" class="btn btn-danger">back</a>

                                    <button type="submit" class="btn btn-primary">{{$employee ? 'Update':'Save'}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                @if($permissionList['user-permeations']['create'] || $permissionList['user-permeations']['update'])
                </form>
                @endif

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        if ({{$permissionList['user-permeations']['create'] == 0 && $permissionList['user-permeations']['update'] == 0}}) {
            $('input').attr('disabled', true);
        }
    });
</script>
@endsection