@extends('layouts.viicheck_for_officer')

@section('content')
<style>
	#map_show_officer_all {
      height: calc(100%);
    }

    .card{
    	background-color: white;
    	width: 20%;
    	height: calc(85%);
    	padding: 20px;
    	border-radius: 15px;
    	box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.15), 0 4px 10px 0 rgba(0, 0, 0, 0.15);
    }
</style>
<!-- <link href="{{ asset('partner_new/css/bootstrap.min.css') }}" rel="stylesheet"> -->

<div class="card" style="position:absolute;z-index: 99999;top: 10%;left: 1%;">
	<div class="card-body">
		<div>
			<h4 class="card-title">ข้อมูลหน่วยปฏิบัติการ</h4>
		</div>
		<p class="card-text" style="line-height: 25px;">
			จำนวนหน่วยปฏิบัติการทั้งหมด : <b>{{ count($data_officer_all) }}</b> <br>
			พร้อมช่วยเหลือ : <b>{{ count($data_officer_ready) }}</b> <br>
			กำลังช่วยเหลือ : <b>{{ count($data_officer_helping) }}</b> <br>
			ไม่อยู่ : <b>{{ count($data_officer_Not_ready) }}</b> <br>
		</p>
	</div>
	<hr style="margin-top: -5px;margin-bottom: -5px;">
	<div class="card-body">
		<div>
			<h4 class="card-title">ประเภทยานพาหนะ</h4>
		</div>
		<p style="position:relative;padding-top: 10px;">
			<img src="{{ url('/img/icon/car_img.png') }}" width="35" style="position: absolute;top:0px;"> 
			<span style="margin-left:50px;">รถยนต์ : <b>{{ $arr_vehicle['vehicle_car'] }}</b></span>
			<br>
		</p>
		<p style="position:relative;padding-top: 10px;">
			<img src="{{ url('/img/icon/helicopter.png') }}" width="35" style="position: absolute;top:0px;"> 
			<span style="margin-left:50px;">อากาศยาน : <b>{{ $arr_vehicle['vehicle_aircraft'] }}</b></span>
			<br>
		</p>
		<p style="position:relative;padding-top: 10px;">
			<img src="{{ url('/img/icon/ship1.png') }}" width="35" style="position: absolute;top:0px;"> 
			<span style="margin-left:50px;">เรือ ป.1 : <b>{{ $arr_vehicle['vehicle_boat_1'] }}</b></span>
			<br>
		</p>
		<p style="position:relative;padding-top: 10px;">
			<img src="{{ url('/img/icon/ship2.png') }}" width="35" style="position: absolute;top:0px;"> 
			<span style="margin-left:50px;">เรือ ป.2 : <b>{{ $arr_vehicle['vehicle_boat_2'] }}</b></span>
			<br>
		</p>
		<p style="position:relative;padding-top: 10px;">
			<img src="{{ url('/img/icon/ship3.png') }}" width="35" style="position: absolute;top:0px;"> 
			<span style="margin-left:50px;">เรือ ป.3 : <b>{{ $arr_vehicle['vehicle_boat_3'] }}</b></span>
			<br>
		</p>
		<p style="position:relative;padding-top: 10px;">
			<img src="{{ url('/img/icon/ship4.png') }}" width="35" style="position: absolute;top:0px;"> 
			<span style="margin-left:50px;">เรือประเภทอื่นๆ : <b>{{ $arr_vehicle['vehicle_boat_other'] }}</b></span>
			<br>
		</p>
	</div>
	<hr style="margin-top: -5px;margin-bottom: -5px;">
	<div class="card-body">
		<div>
			<h4 class="card-title">ระดับปฏิบัติการ</h4>
		</div>
		<div class="row">
			<div class="col-6">
				<p style="position:relative;padding-top: 10px;">
					<img src="{{ url('/img/icon/operating_unit/เขียว.png') }}" width="35" style="position: absolute;top:0px;"> 
					<span style="margin-left:50px;">FR : <b>{{ $arr_vehicle['vehicle_fr'] }}</b></span>
					<br>
				</p>
				<p style="position:relative;padding-top: 10px;">
					<img src="{{ url('/img/icon/operating_unit/เหลือง.png') }}" width="35" style="position: absolute;top:0px;"> 
					<span style="margin-left:50px;">BLS : <b>{{ $arr_vehicle['vehicle_bls'] }}</b></span>
					<br>
				</p>
			</div>
			<div class="col-6">
				<p style="position:relative;padding-top: 10px;">
					<img src="{{ url('/img/icon/operating_unit/เหลือง.png') }}" width="35" style="position: absolute;top:0px;"> 
					<span style="margin-left:50px;">ILS : <b>{{ $arr_vehicle['vehicle_ils'] }}</b></span>
					<br>
				</p>
				<p style="position:relative;padding-top: 10px;">
					<img src="{{ url('/img/icon/operating_unit/แดง.png') }}" width="35" style="position: absolute;top:0px;"> 
					<span style="margin-left:50px;">ALS : <b>{{ $arr_vehicle['vehicle_als'] }}</b></span>
					<br>
				</p>
			</div>
		</div>
	</div>
</div>

<div class="card" style="position:absolute;z-index: 99999;top: 10%;right: 1%;">
	<div class="card-body">
		<div>
			<h4 class="card-title">พื้นที่การขอความช่วยเหลือ</h4>
		</div>
		<div class="row">
			@foreach($orderedDistricts as $district => $count)
            	<div class="col-8 mb-2">
					{{$district}} 
				</div>
				<div class="col-4 mb-2">
					<span class="float-end">
						<b>{{$count}}</b> ครั้ง
					</span>
				</div>
            @endforeach
		</div>
	</div>
	<hr style="margin-top: -5px;margin-bottom: -5px;">
	<div class="card-body">
		<div>
			<h4 class="card-title">เจ้าหน้าที่ออกปฏิบัติการ</h4>
		</div>
		<div class="row">
			@foreach($data_officer_gotohelp as $officer_gotohelp)
            	<div class="col-9 mb-2">
					{{ $officer_gotohelp->name_officer }} 
				</div>
				<div class="col-3 mb-2">
					<span class="float-end">
						<b>{{ $officer_gotohelp->go_to_help }} </b> ครั้ง
					</span>
				</div>
            @endforeach
		</div>
	</div>
</div>

<div id="map_show_officer_all">
	
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th" ></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>


<script>

	document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        open_map_show_data_officer_all();

    });

    let map_show_data_officer_all ;
    let marker ;
    let markers = [] ;

    let image_operating_unit_red = "{{ url('/img/icon/operating_unit/แดง.png') }}";
    let image_operating_unit_yellow = "{{ url('/img/icon/operating_unit/เหลือง.png') }}";
    let image_operating_unit_green = "{{ url('/img/icon/operating_unit/เขียว.png') }}";
    let image_operating_unit_general = "{{ url('/img/icon/operating_unit/ทั่วไป.png') }}";

	function open_map_show_data_officer_all() {

        let m_lat = parseFloat('12.870032');
        let m_lng = parseFloat('100.992541') + 1;
        let m_numZoom = parseFloat('6.5');

        map_show_data_officer_all = new google.maps.Map(document.getElementById("map_show_officer_all"), {
            center: {lat: m_lat, lng: m_lng },
            zoom: m_numZoom,
        });

        let icon_level ;

        @foreach($data_officer_ready as $item)

        	if( "{{ $item->level }}" === "FR" ){
        		icon_level = image_operating_unit_green ;
        	}else if( "{{ $item->level }}" === "BLS" ){
        		icon_level = image_operating_unit_yellow ;
        	}else{
        		icon_level = image_operating_unit_red ;
        	}

	        marker = new google.maps.Marker({
	            position: {lat: parseFloat({{ $item->lat }}) , lng: parseFloat({{ $item->lng }}) },
	            map: map_show_data_officer_all,
	            icon: icon_level,
	        });
	        markers.push(marker);
	    @endforeach
      
    }

</script>

@endsection('content')
