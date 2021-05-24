@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            <div class="row">
                                <div class="col-6">
                                    ลงทะเบียนใหม่ <br> Register
                                </div>
                                <div class="col-6">
                                    <a href="" class="float-right btn btn-outline-primary main-shadow main-radius" >
                                       <i class="fas fa-building"></i> สำหรับองค์กร
                                    </a>
                                </div>
                            </div>
                        </h4>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/register_car') }}" title="Back"><button class="d-none btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/register_car') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('register_car.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
