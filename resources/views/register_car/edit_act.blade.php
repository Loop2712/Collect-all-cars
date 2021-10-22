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

                            <div class="row">

                                <h5 style="padding-top: 7px;" class="text-info">บริษัทประกันภัย</h5>

                                <div class="col-12 col-md-6">
                                    <div class="form-group {{ $errors->has('name_insurance') ? 'has-error' : ''}}">
                                        <select name="name_insurance" id="name_insurance" class="form-control" onchange="search_phone_insurance();">

                                            @if(!empty($name_insurance_old))
                                                <option value="{{ $name_insurance_old }}" selected>{{ $name_insurance_old }}</option>
                                                @foreach($name_insurance as $item)
                                                    <option value="{{ $item->company }}" 
                                                    {{ request('company') == $item->company ? 'selected' : ''   }} >
                                                    {{ $item->company }} 
                                                    </option>
                                                @endforeach  
                                                <option value="insurance_another" >อื่นๆ</option>
                                            @else
                                                <option value="" selected>- เลือกบริษัทประกันภัย -</option>
                                                @foreach($name_insurance as $item)
                                                    <option value="{{ $item->company }}" 
                                                    {{ request('company') == $item->company ? 'selected' : ''   }} >
                                                    {{ $item->company }} 
                                                    </option>
                                                @endforeach 
                                                <option value="insurance_another" >อื่นๆ</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                @if(!empty($name_insurance_old))
                                    <input class="d-none" id="name_insurance_old" type="text" name="" value="{{ $name_insurance_old }}">
                                @endif

                                <div id="insurance_another" class="d-none col-12 col-md-6">
                                    <div class="form-group {{ $errors->has('name_insurance_another') ? 'has-error' : ''}}">
                                        <input class="form-control" name="name_insurance_another" type="text" id="name_insurance_another" value="" >
                                        {!! $errors->first('name_insurance', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group {{ $errors->has('phone_insurance') ? 'has-error' : ''}}">
                                        <input class="form-control" name="phone_insurance" type="text" id="phone_insurance" value="{{ isset($register_car->phone_insurance) ? $register_car->phone_insurance : '' }}" readonly placeholder="เบอร์บริษัทประกันภัย">
                                        {!! $errors->first('phone_insurance', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                            </div>


                            <div id="div_insurance" class="d-none form-group {{ $errors->has('insurance') ? 'has-error' : ''}}">
                                <h5 style="padding-top: 7px;" class="text-info">วันหมดอายุ ประกัน</h5>
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
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            // console.log("START");
            let name_insurance_old = document.querySelector('#name_insurance_old').value ;
            console.log(name_insurance_old);

            if (name_insurance_old) {
                document.querySelector('#div_insurance').classList.remove('d-none');
            }
        });


        function search_phone_insurance(){

        let name_insurance = document.querySelector("#name_insurance").value;
        document.querySelector('#div_insurance').classList.remove('d-none');

        if (name_insurance === "insurance_another") {

            document.querySelector('#insurance_another').classList.remove('d-none'),
            document.querySelector('#phone_insurance').setAttributeNode(document.createAttribute('required')),
            document.querySelector('#phone_insurance').value = "",
            document.querySelector('#phone_insurance').removeAttribute('readonly'),
            document.querySelector('#name_insurance_another').focus();

        } else { 

            document.querySelector('#insurance_another').classList.add('d-none'),
            document.querySelector('#phone_insurance').setAttributeNode(document.createAttribute('readonly')),
            document.querySelector('#phone_insurance').removeAttribute('required');
        

            fetch("{{ url('/') }}/api/phone_insurance/"+name_insurance+"/name_insurance")
                .then(response => response.json())
                .then(result => {
                    // console.log(result);
                    let phone_insurance = document.querySelector("#phone_insurance");
                        phone_insurance.value = result[0]['phone'] ;
                });
        }
    }
    </script>
@endsection
