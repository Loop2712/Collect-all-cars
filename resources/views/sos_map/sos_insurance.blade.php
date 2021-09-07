@extends('layouts.viicheck')

@section('content')
<br><br><br><br><br>
    <div class="container d-block d-md-none">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <input type="hidden" id="latlng" name="latlng" value="{{ $latlng }}" readonly>
                        <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}" readonly>
                        <input type="hidden" id="name" name="name" value="{{ Auth::user()->name }}" readonly>
                        <input type="hidden" id="user_phone" name="user_phone" value="{{ Auth::user()->phone }}" readonly>

                        @foreach($register_car as $item)
                            <div class="col-12 card shadow">
                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">
                                            <div class="col-4">
                                                <center>
                                                    <img style="margin-top:18px;width: 85%;" src="{{ url('/img/logo_brand/logo-') }}{{ strtolower($item->brand) }}.png">
                                                </center>
                                            </div>
                                            <div class="col-8 text-center">
                                                <div style="margin-top:23px;">
                                                    <p class="d-none" id="car_id_{{ $loop->iteration }}">{{ $item->id }}</p>
                                                    <h5><b>{{ $item->registration_number }}</b></h5>
                                                    <span>{{ $item->province }}</span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <hr class="center">
                                            </div>
                                        </div>

                                        <div class="row">
                                            @if(!empty($item->name_insurance))
                                                <div class="collapse multi-collapse_{{ $loop->iteration }} show" id="multiCollapseExample1">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <img style="width: 30%;" src="{{ url('/img/logo_insuraance/') }}/{{ $item->name_insurance }}.png">
                                                            <br>
                                                            <h4 style="font-size:18px; padding-top: 8px;" id="name_insurance_{{ $item->id }}" class="text-success">
                                                                <b>{{ $item->name_insurance }}</b>
                                                            </h4>
                                                        </div>
                                                        <div class="col-4">
                                                            <button style="margin-top:25px;" onclick="call_insurance('{{ $item->name_insurance }}', '{{ $loop->iteration }}');" class="btn btn-sm btn-primary main-shadow main-radius">
                                                                <i class="fas fa-phone-alt"></i> ติดต่อ
                                                            </button>
                                                            <a id="btn_call_insurance_{{ $loop->iteration }}" href="tel:{{ $item->phone_insurance }}" ></a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <span data-toggle="collapse" data-target=".multi-collapse_{{ $loop->iteration }}" aria-expanded="false" class="text-secondary" style="font-size:14px;padding-top: 15px;">
                                                      บริษัทประกันอื่นๆ <i class="fas fa-angle-down"></i>
                                                </span>
                                                <div class="collapse multi-collapse_{{ $loop->iteration }}" id="multiCollapseExample2">
                                                    <div class="row" style="margin-top: 10px;">
                                                        <div class="col-8">
                                                            <select id="tag_select_ins_{{ $loop->iteration }}" class="form-control" onchange="select_ins('{{ $loop->iteration }}');">
                                                                <option value="" selected>- เลือกบริษัทประกัน -</option>
                                                                @foreach($select_ins as $item_2)
                                                                    <option value="{{ $item_2->company }}" 
                                                                    {{ request('company') == $item_2->company ? 'selected' : ''   }} >
                                                                    {{ $item_2->company }} 
                                                                    </option>
                                                                @endforeach  
                                                            </select>
                                                        </div>
                                                        <div class="col-4">
                                                            <button onclick="call_other_ins('{{ $loop->iteration }}');" id="btn_other_ins_{{ $loop->iteration }}" class="btn btn-sm btn-primary main-shadow main-radius d-none">
                                                            <i class="fas fa-phone-alt"></i> ติดต่อ
                                                        </button>
                                                        <a id="btn_call_other_ins_{{ $loop->iteration }}"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="row">
                                                    <div class="col-8">
                                                        <select name="select_insurance" id="select_insurance_{{ $loop->iteration }}" class="form-control" onchange="select_insurance('{{ $loop->iteration }}');">
                                                            <option value="" selected>- เลือกบริษัทประกัน -</option>
                                                            @foreach($name_insurance as $item)
                                                                <option value="{{ $item->company }}" 
                                                                {{ request('company') == $item->company ? 'selected' : ''   }} >
                                                                {{ $item->company }} 
                                                                </option>
                                                            @endforeach  
                                                        </select>
                                                    </div>
                                                    <div class="col-4">
                                                        <button onclick="call_select_insurance('{{ $loop->iteration }}');" id="btn2_call_select_insurance_{{ $loop->iteration }}" class="btn btn-sm btn-primary main-shadow main-radius d-none">
                                                            <i class="fas fa-phone-alt"></i> ติดต่อ
                                                        </button>
                                                        <a id="btn_call_select_insurance_{{ $loop->iteration }}"></a>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div> 
                                <br>
                            </div>
                            <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
            
        function call_insurance(name_insurance,loop){

            let name = document.querySelector("#name").value ; 
            let user_id = document.querySelector("#user_id").value ; 
            let user_phone = document.querySelector("#user_phone").value ; 
            let car_id = document.querySelector("#car_id_"+loop).innerText ; 

            let latlng = document.querySelector("#latlng").value ; 
            let lat = latlng.split(",")[0];
            let lng = latlng.split(",")[1];

            let data_sos_insurance = {
                "name" : name,
                "user_id" : user_id,
                "phone" : user_phone,
                "lat" : lat,
                "lng" : lng,
                "insurance" : name_insurance,
                "car_id" : car_id,
            };

            fetch("{{ url('/') }}/api/save_sos_insurance", {
                    method: 'post',
                    body: JSON.stringify(data_sos_insurance),
                    headers: {
                        'Content-Type': 'application/json'
                    }
                }).then(function (response){
                    return response.text();
                }).then(function(text){
                    // console.log(text);
                }).catch(function(error){
                    // console.error(error);
                });

            document.querySelector("#btn_call_insurance_"+loop).click();

        }

        function select_insurance(loop){

            let select_insurance = document.querySelector("#select_insurance_"+loop).value;
            let btn_call_select_insurance = document.querySelector("#btn_call_select_insurance_"+loop);
            let btn2_call_select_insurance = document.querySelector("#btn2_call_select_insurance_"+loop);

            fetch("{{ url('/') }}/api/save_sos_insurance/"+select_insurance+"/select_insurance")
                .then(response => response.json())
                .then(result => {
                    // console.log(result);
                    // console.log(result[0]['phone']);

                    if (result[0]['phone']) {

                        let href = document.createAttribute("href");
                            href.value = "tel:"+result[0]['phone'];
                            btn_call_select_insurance.setAttributeNode(href); 

                            btn2_call_select_insurance.classList.remove('d-none');
                    }

                });

        }

        function select_ins(loop){

            let tag_select_ins = document.querySelector("#tag_select_ins_"+loop).value;
            let btn_other_ins = document.querySelector("#btn_other_ins_"+loop);
            let btn_call_other_ins = document.querySelector("#btn_call_other_ins_"+loop);

            fetch("{{ url('/') }}/api/save_sos_insurance/"+tag_select_ins+"/select_insurance")
                .then(response => response.json())
                .then(result => {
                    // console.log(result);
                    // console.log(result[0]['phone']);

                    if (result[0]['phone']) {

                        let href = document.createAttribute("href");
                            href.value = "tel:"+result[0]['phone'];
                            btn_call_other_ins.setAttributeNode(href); 

                            btn_other_ins.classList.remove('d-none');
                    }

                });

        }

        function call_select_insurance(loop){

            let name = document.querySelector("#name").value ; 
            let user_id = document.querySelector("#user_id").value ; 
            let user_phone = document.querySelector("#user_phone").value ;
            let car_id = document.querySelector("#car_id_"+loop).innerText ; 

            let latlng = document.querySelector("#latlng").value ; 
            let lat = latlng.split(",")[0];
            let lng = latlng.split(",")[1];

            let select_insurance = document.querySelector("#select_insurance_"+loop).value;

            let data_sos_insurance = {
                "name" : name,
                "user_id" : user_id,
                "phone" : user_phone,
                "lat" : lat,
                "lng" : lng,
                "insurance" : select_insurance,
                "car_id" : car_id,
            };

            fetch("{{ url('/') }}/api/save_sos_insurance", {
                method: 'post',
                body: JSON.stringify(data_sos_insurance),
                headers: {
                    'Content-Type': 'application/json'
                }
                }).then(function (response){
                    return response.text();
                }).then(function(text){
                    // console.log(text);
                }).catch(function(error){
                    // console.error(error);
                });

            document.querySelector("#btn_call_select_insurance_"+loop).click();

        }

        function call_other_ins(loop){

            let name = document.querySelector("#name").value ; 
            let user_id = document.querySelector("#user_id").value ; 
            let user_phone = document.querySelector("#user_phone").value ;
            let car_id = document.querySelector("#car_id_"+loop).innerText ; 

            let latlng = document.querySelector("#latlng").value ; 
            let lat = latlng.split(",")[0];
            let lng = latlng.split(",")[1];

            let tag_select_ins = document.querySelector("#tag_select_ins_"+loop).value;

            let data_sos_insurance = {
                "name" : name,
                "user_id" : user_id,
                "phone" : user_phone,
                "lat" : lat,
                "lng" : lng,
                "insurance" : tag_select_ins,
                "car_id" : car_id,
            };

            fetch("{{ url('/') }}/api/save_sos_insurance", {
                method: 'post',
                body: JSON.stringify(data_sos_insurance),
                headers: {
                    'Content-Type': 'application/json'
                }
                }).then(function (response){
                    return response.text();
                }).then(function(text){
                    // console.log(text);
                }).catch(function(error){
                    // console.error(error);
                });

            document.querySelector("#btn_call_other_ins_"+loop).click();

        }

    </script>
@endsection
