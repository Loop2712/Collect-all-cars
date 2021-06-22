@extends('layouts.viicheck')

@section('content')
<br><br><br><br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">แก้ไขวันหมดอายุ พรบ. / ประกัน </div>
                    <div class="card-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        
                        <form method="POST" action="{{ url('/register_car/' . $register_car->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            <h5 style="padding-top: 7px;" class="text-info">วันหมดอายุ พรบ.</h5>

                            <div class="form-group {{ $errors->has('act') ? 'has-error' : ''}}">
                                <input class="form-control" name="act" type="date" id="act" value="{{ isset($register_car->act) ? $register_car->act : '' }}" >
                                {!! $errors->first('act', '<p class="help-block">:message</p>') !!}
                            </div>

                            <h5 style="padding-top: 7px;" class="text-info">วันหมดอายุ ประกัน</h5>

                            <div class="form-group {{ $errors->has('insurance') ? 'has-error' : ''}}">
                                <input class="form-control" name="insurance" type="date" id="insurance" value="{{ isset($register_car->insurance) ? $register_car->insurance : '' }}" >
                                {!! $errors->first('insurance', '<p class="help-block">:message</p>') !!}
                            </div>

                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="บันทึก">
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
