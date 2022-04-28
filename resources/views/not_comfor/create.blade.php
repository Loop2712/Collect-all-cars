@extends('layouts.app')

@section('content')
    <div class="container-fluid" style="margin-top: -50px;">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">ฉันไม่สะดวก</div>
                    <div class="card-body">
                        <!-- <a href="{{ url('/not_comfor') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br /> -->

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/not_comfor') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('not_comfor.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
