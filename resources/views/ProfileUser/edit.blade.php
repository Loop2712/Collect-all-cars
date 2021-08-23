@extends('layouts.viicheck')

@section('content')
<br><br><br><br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-12">
                <div class="card">
                    <h3 class="card-header">แก้ไขข้อมูลส่วนตัว</h3>
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
