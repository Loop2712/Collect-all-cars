@extends('layouts.admin')

@section('content')
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-4">
            <div class="row">
                <div class="col-12">
                    <br><br>
                    <input class="d-none" type="text" id="va_zoom" name="" value="6">
                    <input class="d-none" type="text" id="center_lat" name="" value="13.7248936">
                    <input class="d-none" type="text" id="center_lng" name="" value="100.4930264">
                    <input class="d-none" type="text" id="search_area" name="" value="{{ url()->full() }}">
                    <div class="card">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="row">
                <div class="col-12">
                    <a href="{{ url('/sos_detail_chart') }}" style="float: right;" type="button" class="btn btn-primary text-white">ดูกราฟ <i class="fas fa-chart-line"></i></a>
                </div>
                <br>
                <br>
                <div class="col-md-12">
                    <div class="card">
                        <h3 class="card-header">ขอความช่วยเหลือ / <span style="font-size: 18px;"> SOS </span>
                            <span style="font-size: 18px; float: right; margin-top:6px;">จำนวนทั้งหมด {{ count($view_map) }}</span>
                        </h3>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <select class="form-control"  onchange="location = this.options[this.selectedIndex].value;" >
                                        @if(!empty($type_sos))
                                            <option value="">ประเภทขอความช่วยเหลือ</option>   
                                            @foreach($type_sos as $item)
                                                <option value="{{ url('/sos') }}?search_type={{ $item->content }}">
                                                    {{ $item->content }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="" selected></option> 
                                        @endif
                                    </select>
                                    <!-- <a style="margin-top: 7px;" href="{{ url('/sos') }}?search=police" class="btn btn-outline-dark ">
                                         ตำรวจ
                                    </a>
                                    <a style="margin-top: 7px;" href="{{ url('/sos') }}?search=JS100" class="btn btn-outline-success ">
                                         JS100
                                    </a>
                                    <a style="margin-top: 7px;" href="{{ url('/sos') }}?search=life_saving" class="btn btn-outline-warning ">
                                        แพทย์
                                    </a>
                                    <a style="margin-top: 7px;" href="{{ url('/sos') }}?search=pok_tek_tung" class="btn btn-outline-info ">
                                        <i class="fas fa-users"></i> ป่อเต็กตึ๊ง
                                    </a>
                                    <a style="margin-top: 7px;" href="{{ url('/sos') }}?search=highway" class="btn btn-outline-danger ">
                                         ทางหลวง
                                    </a>
                                    <a style="margin-top: 7px;" href="{{ url('/sos') }}?search=lawyers" class="btn btn-outline-secondary ">
                                         ทนายอาสา
                                    </a>
                                    <a style="margin-top: 5px;" href="{{ url('/sos') }}" class="btn btn-outline-info ">
                                        <i class="fas fa-users"></i> ทั้งหมด
                                    </a> -->
                                </div>
                                <div class="col-4">
                                    <select class="form-control" >
                                        @if(!empty($area))
                                            <option value="">เลือกประเทศ</option>   
                                            @foreach($area as $item)
                                                <option value="{{ url('/sos') }}?search_area={{ $item->area }}">
                                                        {{ $item->area }}
                                                </option>   

                                            @endforeach
                                        @else
                                            <option value="" selected></option> 
                                        @endif
                                    </select>
                                </div>
                                <div class="col-4">
                                    <select class="form-control" onchange="location = this.options[this.selectedIndex].value;" >
                                        @if(!empty($area))
                                            <option value="">เลือกพื้นที่รับผิดชอบ</option>   
                                            @foreach($area as $item)
                                                <option value="{{ url('/sos') }}?search_area={{ $item->area }}">
                                                        {{ $item->area }}
                                                </option>   

                                            @endforeach
                                        @else
                                            <option value="" selected></option> 
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <!-- <form method="GET" action="{{ url('/sos') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                    <span class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </form> -->
                            
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row alert alert-secondary text-center">
                                        <!-- <div class="col-1">
                                            <center><b>Id</b></center>
                                        </div> -->
                                        <div class="col-1">
                                                <br>
                                                
                                        </div>
                                        <div class="col-2">
                                                <b>เวลา</b><br>
                                                Time
                                        </div>
                                        <div class="col-2">
                                                <b>ประเภท</b><br>
                                                Type
                                        </div>
                                        <div class="col-2">
                                                <b>ตำแหน่ง</b><br>
                                                Location
                                        </div>
                                        <div class="col-2">
                                                <b>พื้นที่รับผิดชอบ</b><br>
                                                Area
                                        </div>
                                        <div class="col-3">
                                                <b>ชื่อ / เบอร์</b><br>
                                                Name / Phone
                                        </div>
                                    </div>
                                    @foreach($view_map as $item)
                                        <div class="row text-center">
                                        <div class="col-1 ">
                                                <h6>
                                                    {{ $loop->iteration }}
                                                </h6>
                                            </div>
                                            <div class="col-2 ">
                                                <h6>
                                                    {{ $item->created_at }}
                                                </h6>
                                            </div>
                                            <div class="col-2">
                                                @if($item->content == 'help_area')
                                                    <h6>ขอความช่วยเหลือ</h6>
                                                @else
                                                    <h6>{{ $item->content }}</h6>
                                                @endif
                                            </div>
                                            <div class="col-2">
                                                <h6 class="text-info">
                                                    @if(!empty($item->lat))
                                                        <a href="https://www.google.co.th/maps/search/{{$item->lat}},{{$item->lng}}/{{ $text_at }}{{$item->lat}},{{$item->lng}},16z" target="bank">
                                                            <i class="fas fa-search-location"></i> ดูแผนที่
                                                        </a>
                                                    @endif
                                                </h6>
                                            </div>
                                            <div class="col-2">
                                                <h6>
                                                    {{ $item->area }}
                                                </h6>
                                            </div>
                                            <div class="col-3">
                                                <h5 class="text-success">
                                                    <span style="font-size: 15px;">
                                                        <a target="break" href="{{ url('/').'/profile/'.$item->id }}">
                                                        <i class="far fa-eye text-primary"></i>
                                                        </a>
                                                    </span>&nbsp;{{ $item->name }}
                                                </h5>
                                                {{ $item->phone }}
                                            </div>
                                            
                                            
                                        </div>
                                        <br>
                                    @endforeach
                                     <div class="pagination-wrapper"> {!! $view_map->appends(['search' => Request::get('search')])->render() !!} </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus"></script>
<style type="text/css">
    #map {
      height: calc(80vh);
    }
    
</style>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        initMap();

        let search_area = document.getElementById("search_area").value;
        let split_1 = search_area.split("?")[1];
        let split_2 = split_1.split("=")[0];
            // console.log(split_1.split("=")[1]);
            if (split_2 === "search_area") {
                change_area();
            }
        // let select_area_help = document.getElementById("select_area_help");
        //     select_area_help.innerHTML = split_1.split("=")[1];
            // console.log(select_area_help.innerHTML);

    });

    function initMap() {
        let text_zoom = document.getElementById("va_zoom").value;
        let num_zoom = parseFloat(text_zoom);

        let text_center_lat = document.getElementById("center_lat").value;
        let num_center_lat = parseFloat(text_center_lat);

        let text_center_lng = document.getElementById("center_lng").value;
        let num_center_lng = parseFloat(text_center_lng);

        map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: num_center_lat, lng: num_center_lng },
            zoom: num_zoom,
        });
        // 13.7248936,100.4930264 lat lng ประเทศไทย

        //วาดพื้นที่รับผิดชอบ
        draw_area(map);

        //ปักหมุด
        @foreach($view_map as $item)
        @if(!empty($item->lat))
            var marker = new google.maps.Marker({
                position: {lat: {{ $item->lat }} , lng: {{ $item->lng }} }, 
                map: map,
            }); 
        @endif    
        @endforeach

    }

    function change_area() {

        let search_area = document.getElementById("search_area").value;
        let text_area = search_area.split("=")[1];
            // console.log(text_area);

        let text_zoom = document.getElementById("va_zoom");
        let text_center_lat = document.getElementById("center_lat");
        let text_center_lng = document.getElementById("center_lng");

        switch(text_area) {
            case "ViiCHECK":
                text_zoom.value = "6" ;
                text_center_lat.value = "13.7248936" ;
                text_center_lng.value = "100.4930264" ;
                break;
            case "VRU":
                text_zoom.value = "15.4" ;
                text_center_lat.value = "14.1337902" ;
                text_center_lng.value = "100.6124206" ;
                break;
            case "TU":
                text_zoom.value = "14.5" ;
                text_center_lat.value = "14.0731804" ;
                text_center_lng.value = "100.6064698" ;
                break;
            case "KMUTNB":
                text_zoom.value = "16.5" ;
                text_center_lat.value = "13.8211903" ;
                text_center_lng.value = "100.5138453" ;
                break;
        }
        initMap();
    }

    function draw_area(map) {
        // พื้นที่ทดสอบ
        const area_test = [
            { lat: 14.1150621, lng: 100.6013697 },
            { lat: 14.1150621, lng: 100.6074465 },
            { lat: 14.1127626, lng: 100.6074465 },
            { lat: 14.1127626, lng: 100.6013697 },
          ];

          // Construct the polygon.
          const draw_area_test = new google.maps.Polygon({
            paths: area_test,
            strokeColor: "#008450",
            strokeOpacity: 0.8,
            strokeWeight: 1,
            fillColor: "#008450",
            fillOpacity: 0.25,
          });
          draw_area_test.setMap(map);
        // // END พื้นที่ ทดสอบ

        // // พื้นที่ VRU 
        const area_vru = [
            { lat: 14.1357294, lng: 100.6054468 },
            { lat: 14.1357294, lng: 100.6179993 },
            { lat: 14.1319187, lng: 100.6179993 },
            { lat: 14.1319187, lng: 100.6054468 },
            
          ];
          // Construct the polygon.
          const draw_area_vru = new google.maps.Polygon({
            paths: area_vru,
            strokeColor: "#008450",
            strokeOpacity: 0.8,
            strokeWeight: 1,
            fillColor: "#008450",
            fillOpacity: 0.25,
          });
          draw_area_vru.setMap(map);
        // // END พื้นที่ VRU 

        // พื้นที่ TU
        const tu_a = { lat: 14.077896, lng: 100.593465 };
        const tu_b = { lat: 14.080425, lng: 100.600798 };
        const tu_c = { lat: 14.076168, lng: 100.600594 };
        const tu_d = { lat: 14.076193, lng: 100.617410 };
        const tu_e = { lat: 14.066614, lng: 100.616926 };
        const tu_f = { lat: 14.066762, lng: 100.605290 };
        const tu_g = { lat: 14.065550, lng: 100.605443 };
        const tu_h = { lat: 14.066020, lng: 100.597200 };
        const tu_i = { lat: 14.075945, lng: 100.596154 };
        const tu_j = { lat: 14.076391, lng: 100.594189 };

        const area_tu = [tu_a,tu_b,tu_c,tu_d,tu_e,tu_f,tu_g,tu_h,tu_i,tu_j,];

          // Construct the polygon.
        const draw_area_tu = new google.maps.Polygon({
            paths: area_tu,
            strokeColor: "#008450",
            strokeOpacity: 0.8,
            strokeWeight: 1,
            fillColor: "#008450",
            fillOpacity: 0.25,
          });
          draw_area_tu.setMap(map);
        // // END พื้นที่ TU

        // พื้นที่ บ้านลัค
        const luck_a = { lat: 14.187077, lng: 101.162882 };
        const luck_b = { lat: 14.187651, lng: 101.162502 };
        const luck_c = { lat: 14.188048, lng: 101.163155 };
        const luck_d = { lat: 14.188600, lng: 101.163246 };
        const luck_e = { lat: 14.188644, lng: 101.164103 };
        const luck_f = { lat: 14.187386, lng: 101.164194 };
        const luck_h = { lat: 14.187077, lng: 101.164133 };

        const area_luck = [luck_a,luck_b,luck_c,luck_d,luck_e,luck_f,luck_h,];

        // Construct the polygon.
        const draw_area_luck = new google.maps.Polygon({
            paths: area_luck,
            strokeColor: "#008450",
            strokeOpacity: 0.8,
            strokeWeight: 1,
            fillColor: "#008450",
            fillOpacity: 0.25,
          });
          draw_area_luck.setMap(map);
        // END พื้นที่ บ้านลัค

        // พื้นที่ พระจอมเกล้าพระนครเหนือ
        const kmutnb_a = { lat: 13.819200, lng: 100.512753 };
        const kmutnb_b = { lat: 13.818744, lng: 100.514181 };
        const kmutnb_c = { lat: 13.819357, lng: 100.514901 };
        const kmutnb_d = { lat: 13.819157, lng: 100.515523 };
        const kmutnb_e = { lat: 13.819333, lng: 100.515561 };
        const kmutnb_f = { lat: 13.819222, lng: 100.516228 };
        const kmutnb_g = { lat: 13.821000, lng: 100.517113 };
        const kmutnb_i = { lat: 13.822192, lng: 100.514845 };
        const kmutnb_j = { lat: 13.824593, lng: 100.512288 };
        const kmutnb_k = { lat: 13.824234, lng: 100.511526 };
        const kmutnb_l = { lat: 13.823348, lng: 100.512004 };
        const kmutnb_m = { lat: 13.822952, lng: 100.511392 };
        const kmutnb_n = { lat: 13.821650, lng: 100.512422 };
        const kmutnb_o = { lat: 13.820254, lng: 100.514284 };

        const area_kmutnb = [kmutnb_a,kmutnb_b,kmutnb_c,kmutnb_d,kmutnb_e,
            kmutnb_f,kmutnb_g,kmutnb_i,kmutnb_j,kmutnb_k,kmutnb_l,kmutnb_m,kmutnb_n,kmutnb_o,];

        // Construct the polygon.
        const draw_area_kmutnb = new google.maps.Polygon({
            paths: area_kmutnb,
            strokeColor: "#008450",
            strokeOpacity: 0.8,
            strokeWeight: 1,
            fillColor: "#008450",
            fillOpacity: 0.25,
          });
          draw_area_kmutnb.setMap(map);
        // END พื้นที่ พระจอมเกล้าพระนครเหนือ

        // พื้นที่ หมู่บ้านซิเมนต์ไทย
        const thai_cement_a = { lat: 13.833294, lng: 100.539767 };
        const thai_cement_b = { lat: 13.830202, lng: 100.541761 };
        const thai_cement_c = { lat: 13.830106, lng: 100.549475 };
        const thai_cement_d = { lat: 13.833513, lng: 100.551297 };
        const thai_cement_e = { lat: 13.831744, lng: 100.546931 };
        const thai_cement_f = { lat: 13.834021, lng: 100.545848 };
        const thai_cement_g = { lat: 13.833294, lng: 100.544432 };
        const thai_cement_h = { lat: 13.832725, lng: 100.544441 };
        const thai_cement_i = { lat: 13.832541, lng: 100.543981 };
        const thai_cement_j = { lat: 13.834477, lng: 100.542781 };
        const thai_cement_k = { lat: 13.836728, lng: 100.540570 };

        const area_thai_cement = [thai_cement_a,thai_cement_b,thai_cement_c,thai_cement_d,thai_cement_e,thai_cement_f,thai_cement_g,
            thai_cement_h,thai_cement_i,thai_cement_j,thai_cement_k,];

        // Construct the polygon.
        const draw_area_thai_cement = new google.maps.Polygon({
            paths: area_thai_cement,
            strokeColor: "#008450",
            strokeOpacity: 0.8,
            strokeWeight: 1,
            fillColor: "#008450",
            fillOpacity: 0.25,
          });
          draw_area_thai_cement.setMap(map);
        // END พื้นที่ หมู่บ้านซิเมนต์ไทย
    }

</script>

@endsection
