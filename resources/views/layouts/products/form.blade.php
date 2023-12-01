@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Product Details') }}</h1>

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
                <h6 class="m-0 font-weight-bold text-primary">Product Details</h6>
            </div>


            <div class="card-body">
                @if($permissionList['products']['create'] || $permissionList['products']['update'])
                <form action="{{$product ?  route( 'products.update',['product'=>$product->id]) : route('products.store') }}" method="POST">
                    @if($product)
                    @method('PUT')
                    @else
                    @method('POST')
                    @endif
                    @csrf
                    @endif

                    <h6 class="heading-small text-muted mb-4">Product information</h6>

                    <div class="pl-lg-4">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="name">Product Name</label>
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Name" value="{{ isset($product->name) ? $product->name : @old('name')}}" />
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="detail">Detail</label>
                                    <textarea rows="4" class="form-control" name="detail" id="detail">{{ isset($product->detail) ? $product->detail : @old('detail')}}
                                    </textarea>
                                    @error('detail')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="price">Price</label>
                                    <input type="text" id="price" class="form-control" name="price" placeholder="Price" value="{{ isset($product->price) ? $product->price : @old('price')}}" />
                                    @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="quantity">Quantity</label>
                                    <input type="text" id="quantity" class="form-control" name="quantity" value="{{ isset($product->quantity) ? $product->quantity : @old('quantity')}}" />
                                    @error('quantity')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                        </div>
                    </div>

                    @if($permissionList['products']['create'] || $permissionList['products']['update'])
                    <!-- Button -->
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col text-right">
                                <a href="{{ route( 'products.index' ) }}" class="btn btn-danger">back</a>

                                <button type="submit" class="btn btn-primary">{{$product ? 'Update':'Save'}}</button>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($permissionList['products']['create'] || $permissionList['products']['update'])
                </form>
                @endif




            </div>

        </div>

    </div>

</div>

<script>
    $(document).ready(function() {
        if ({{$permissionList['products']['create'] == 0 && $permissionList['products']['update'] == 0}}) {
            $('input').attr('disabled', true);
            $('#detail').attr('disabled', true);
        }
    });
</script>

@endsection