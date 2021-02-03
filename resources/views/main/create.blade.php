@extends('layouts.main')

@section('content')
<div class="container">
        <div class="row">
            @include('layouts.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Create New Wishlist</div>
                    <div class="card-body">
                        <a href="{{ url('/ca') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />
<section class="car spad">
        <div class="container">

<form method="POST" action="{{ url('/car') }}">
    {{ method_field('POST') }}
    {{ csrf_field() }}

    @include ('car.form')
</div>
</section>
</div>
                </div>
            </div>
        </div>
    </div>
    
@endsection


