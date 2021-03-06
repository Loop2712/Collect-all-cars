@extends('layouts.viicheck')

@section('content')
<br><br><br><br><br><br><br>
    <div class="container">
        <div class="row">
        @include('layouts.sidebar')
            <div class="col-lg-9 col-md-9 order-lg-2 order-1">
                <div class="card">
                    <div class="card-header">แก้ไขข้อมูลส่วนตัว</div>
                    <div class="card-body">
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

                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <br>
@endsection
