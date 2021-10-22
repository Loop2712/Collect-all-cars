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
                        <div id="map">
                            <img style="width: 100%;height: 100%;object-fit: contain; " src="{{ asset('/img/more/sorry.png') }}" class="card-img-top center" style="padding: 10px;">
                        </div>
                        <div id="text_open_location" style="margin-top:10px;" class="">
                            <span class="text-danger">กรุณาเปิดตำแหน่งที่ตั้ง</span>
                            <span class="text-danger float-right notranslate" onclick="window.location.href = window.location.href;"><i class="fas fa-sync-alt"></i> refresh</span>
                        </div>

                        <div id="div_content_call" class="d-none">
                            @foreach($register_car as $item)
                            <!-- แบบใหม่ -->
                                <div class="card shadow" style="margin-top:25px;padding: 10px;">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-3">
                                                    <img style="margin-top:7px;width: 100%;margin-left: 7px;" src="{{ url('/img/logo_brand/logo-') }}{{ strtolower($item->brand) }}.png">
                                                </div>
                                                <div class="col-6 notranslate" style="margin-top:8px;overflow ;">
                                                    <p class="d-none" id="car_id_{{ $loop->iteration }}">{{ $item->id }}</p>
                                                    <h6><b>{{ $item->registration_number }}</b></h6>
                                                    <span>{{ $item->province }}</span>
                                                </div>
                                                <div class="col-3">
                                                    @if(!empty($item->name_insurance))
                                                        <button style="margin-top:7px;overflow ;" onclick="call_insurance('{{ $item->name_insurance }}', '{{ $loop->iteration }}');" class="btn btn-primary main-shadow main-radius collapse multi-collapse_{{ $loop->iteration }} show">
                                                            <i class="fas fa-phone-alt"></i> 
                                                        </button>
                                                        <a class="d-none" id="btn_call_insurance_{{ $loop->iteration }}" href="tel:{{ $item->phone_insurance }}" ></a>
                                                    @endif
                                                    <button style="margin-top:7px;overflow ;" onclick="call_other_ins('{{ $loop->iteration }}');" id="btn_other_ins_{{ $loop->iteration }}" class="btn btn-primary main-shadow main-radius d-none collapse multi-collapse_{{ $loop->iteration }}">
                                                        <i class="fas fa-phone-alt"></i>
                                                    </button>
                                                    <a id="btn_call_other_ins_{{ $loop->iteration }}"></a>

                                                    <button style="margin-top:7px;overflow ;" onclick="call_select_insurance('{{ $loop->iteration }}');" id="btn2_call_select_insurance_{{ $loop->iteration }}" class="btn btn-primary main-shadow main-radius d-none">
                                                        <i class="fas fa-phone-alt"></i> 
                                                    </button>
                                                    <a id="btn_call_select_insurance_{{ $loop->iteration }}"></a>
                                                </div>
                                            </div>
                                            <hr>
                                            @if(!empty($item->name_insurance))
                                                <div class="row collapse multi-collapse_{{ $loop->iteration }} show" id="multiCollapseExample1">
                                                    <div class="col-3">
                                                        <img style="margin-left: 7px;margin-top:-5px;overflow" src="{{ url('/img/logo_insuraance/') }}/{{ $item->name_insurance }}.png">
                                                    </div>
                                                    <div class="col-6">
                                                        <p style="width: 100%;overflow: hidden;white-space: nowrap;text-overflow:ellipsis;" id="name_insurance_{{ $item->id }}" class="text-success">
                                                            {{ $item->name_insurance }}
                                                        </p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p data-toggle="collapse" data-target=".multi-collapse_{{ $loop->iteration }}" aria-expanded="false" class="text-secondary " style="font-size:14px;padding-top: 1px;">
                                                            อื่นๆ <i class="fas fa-chevron-circle-down"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="collapse multi-collapse_{{ $loop->iteration }}" id="multiCollapseExample2">
                                                    <p data-toggle="collapse" data-target=".multi-collapse_{{ $loop->iteration }}" aria-expanded="false" class="text-secondary float-right" style="font-size:14px;padding-top: 8px;">
                                                        <i class="fas fa-chevron-circle-up"></i>
                                                    </p>

                                                    <div class="row" style="margin-top: 10px;">
                                                        <div class="col-12">
                                                            <select id="tag_select_ins_{{ $loop->iteration }}" class="form-control" onchange="select_ins('{{ $loop->iteration }}');">
                                                                <option value="" selected>- เลือกบริษัทประกันภัย -</option>
                                                                @foreach($select_ins as $item_2)
                                                                    <option value="{{ $item_2->company }}" 
                                                                    {{ request('company') == $item_2->company ? 'selected' : ''   }} >
                                                                    {{ $item_2->company }} 
                                                                    </option>
                                                                @endforeach  
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                            <div class="col-12" style="margin-top: 13px;">
                                                <select name="select_insurance" id="select_insurance_{{ $loop->iteration }}" class="form-control" onchange="select_insurance('{{ $loop->iteration }}');">
                                                    <option value="" selected>- เลือกบริษัทประกันภัย -</option>
                                                    @foreach($name_insurance as $item)
                                                        <option value="{{ $item->company }}" 
                                                        {{ request('company') == $item->company ? 'selected' : ''   }} >
                                                        {{ $item->company }} 
                                                        </option>
                                                    @endforeach  
                                                </select>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input class="d-none" type="text" id="latlng" name="latlng" readonly>
    <input class="d-none form-control" name="lat" type="text" id="lat" value="" >
    <input class="d-none form-control" name="lng" type="text" id="lng" value="" >
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th" ></script>
    <style type="text/css">
        #map {
          height: calc(33vh);
        }
        
    </style>

    <script>

        document.addEventListener('DOMContentLoaded', (event) => {
            // console.log("START");
            
            // const queryString = window.location.search;

            // const urlParams = new URLSearchParams(queryString);

            // const latlng_url = urlParams.get('latlng')
            //     // console.log(latlng_url);
            //     initMap(latlng_url);
            getLocation();
        });

        function getLocation() {
          if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
            navigator.geolocation.getCurrentPosition(initMap);
            // navigator.geolocation.getCurrentPosition(geocodeLatLng);
          } else { 
            x.innerHTML = "Geolocation is not supported by this browser.";
          }
        }

        function showPosition(position) {
            let lat_text = document.querySelector("#lat");
            let lng_text = document.querySelector("#lng");
            let latlng = document.querySelector("#latlng");

            lat_text.value = position.coords.latitude ;
            lng_text.value = position.coords.longitude ;
            latlng.value = position.coords.latitude+","+position.coords.longitude ;

            let lat = parseFloat(lat_text.value) ;
            let lng = parseFloat(lng_text.value) ;

            // console.log(lat);
            // console.log(lng);

        }

        function initMap(position) {

            // latlng_url_sp = latlng_url.split(",");

            // let lat = parseFloat(latlng_url_sp[0]) ;
            // let lng = parseFloat(latlng_url_sp[1]) ;

            let lat_text = document.querySelector("#lat");
            let lng_text = document.querySelector("#lng");
            let latlng = document.querySelector("#latlng");

            lat_text.value = position.coords.latitude ;
            lng_text.value = position.coords.longitude ;
            latlng.value = position.coords.latitude+","+position.coords.longitude ;
            let lat = parseFloat(lat_text.value) ;
            let lng = parseFloat(lng_text.value) ;

            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: { lat: lat, lng: lng },
                mapTypeId: "terrain",
            });
            // 40.7504479,-73.9936564,19

            // ตำแหน่ง USER
            const user = { lat: lat, lng: lng };
            const marker_user = new google.maps.Marker({ map, position: user });

            const geocoder = new google.maps.Geocoder();
            const infowindow = new google.maps.InfoWindow();

            // let location_user = document.querySelector("#location_user");
            // location_user.innerHTML = '<a class="btn-block shadow-box text-white btn btn-primary" id="submit"><i class="fas fa-search-location"></i> ตำแหน่งของฉัน</a>';

            // document.getElementById("submit").addEventListener("click", () => {
            //     geocodeLatLng(geocoder, map, infowindow);
            // });

            marker_user.addListener("click", () => {
                geocodeLatLng(geocoder, map, infowindow);
            });

            document.querySelector('#text_open_location').classList.add('d-none');
            document.querySelector('#div_content_call').classList.remove('d-none');

        }

        function geocodeLatLng(geocoder, map, infowindow) {

            const input = document.getElementById("latlng").value;
            const latlngStr = input.split(",", 2);
            const latlng = {
                lat: parseFloat(latlngStr[0]),
                lng: parseFloat(latlngStr[1]),
            };
            geocoder
                .geocode({ location: latlng })
                .then((response) => {
                    if (response.results[0]) {
                        map.setZoom(15);
                        const marker = new google.maps.Marker({
                          position: latlng,
                          map: map,
                        });
                        infowindow.setContent(response.results[0].formatted_address);
                        infowindow.open(map, marker);

                        // let location_user = document.querySelector("#location_user");
                        //     location_user.innerHTML = response.results[0].formatted_address;
                    } else {
                        window.alert("No results found");
                    }
                })
                .catch((e) => window.alert("Geocoder failed due to: " + e));
        }
            
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
                    // return response.text();
                }).then(function(text){
                    console.log(text);
                }).catch(function(error){
                    // console.error(error);
                });

            document.querySelector("#btn_call_other_ins_"+loop).click();

        }

    </script>
@endsection
