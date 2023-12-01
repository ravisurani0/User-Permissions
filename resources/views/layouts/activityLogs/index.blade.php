@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Activity Log ') }}</h1>

<div class="">

    <div class="card shadow mb-4">

        <div class="card-header d-flex justify-content-between py-3">
            <h6 class="m-0 font-weight-bold text-primary">Activity Log list</h6>
        </div>

        <div class="card-body">
            <div class="">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Action</th>
                            <th>Model</th>
                            <th>Changes</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>User</th>
                            <th>Action</th>
                            <th>Model</th>
                            <th>Changes</th>
                        </tr>
                    </tfoot>

                    <tbody>
                        @foreach ($activityLogs as $activityLog)
                        <tr>
                            <td>{{ $activityLog->user->name }}</td>
                            <td>{{ $activityLog->action }}</td>
                            <td>{{ $activityLog->model_type }} (ID: {{ $activityLog->model_id }})</td>
                            <td>
                                @foreach( json_decode( $activityLog->changes) as $key => $chage)
                                @if($key != 'updated_at' && $key != 'created_at' )
                                {{$key}} = {{$chage}},
                                @endif
                                @endforeach
                            </td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>


@endsection