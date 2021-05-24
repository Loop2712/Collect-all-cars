@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            <div id="row_general" class="row">
                                <div class="col-6">
                                    ลงทะเบียนใหม่ <br> Register
                                </div>
                                <div class="col-6">
                                    <a id="btn_rg_organization" class="float-right btn btn-outline-primary main-shadow main-radius" onclick="show_organization();">
                                       <i class="fas fa-building"></i> สำหรับองค์กร
                                    </a>
                                </div>
                            </div>
                            <div id="row_organization" class="row d-none">
                                <div class="col-12">
                                    ลงทะเบียนสำหรับองค์กร <br> Register for an organization
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
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
    });
    function show_organization(){
        document.querySelector('#row_general').classList.add('d-none');
        document.querySelector('#row_organization').classList.remove('d-none');
    }
</script>
@endsection
