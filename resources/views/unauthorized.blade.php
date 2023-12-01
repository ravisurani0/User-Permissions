@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<div class="container-fluid">

    <!-- 403 Error Text -->
    <div class="text-center">
        <div class="error mx-auto" data-text="403">403</div>
        <h1 class="lead text-gray-800 ">Unauthorized Access</h1>
        <p class="text-gray-500 mb-0">It looks like you does not have permission for this page.</p>
        <a href="index.html">&larr; Back to Dashboard</a>
    </div>

</div>

@endsection