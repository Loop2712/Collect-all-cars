@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Create New Wishlist</div>
                    <div class="card-body">
                        <a href="{{ url('/wishlist') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/wishlist') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <input class="form-control" name="product_id" type="number" id="product_id" value="{{ isset($wishlist->product_id) ? $wishlist->product_id : ''}}" >

                            <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($wishlist->user_id) ? $wishlist->user_id : ''}}" >

                            <input class="form-control" name="price" type="number" id="price" value="{{ isset($wishlist->price) ? $wishlist->price : ''}}" >

                            <button type="submit" class="btn btn-sm btn-warning" >
                                <i class="fa fa-shopping-cart"></i> เพิ่มสินค้าลงตะกร้า
                            </button> 
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
