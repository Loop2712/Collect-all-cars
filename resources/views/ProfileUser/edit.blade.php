@extends('layouts.main')

@section('content')
    <div class="container">
    <br><br>
        <div class="row">
        @include('layouts.sidebar')
            <div class="col-lg-9 col-md-9 order-lg-2 order-1">
                <div class="card">
                    <div class="card-header">แก้ไขข้อมูลส่วนตัว</div>
                    <div class="card-body">
                        <br>
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/profile/' . $data->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                           

                            @include ('ProfileUser.form', ['formMode' => 'edit'])

                        </form>

                        <a href="{{ url('/profile') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> กลับ</button></a>

                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
