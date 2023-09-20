@extends('layouts.viicheck_for_officer')

@section('content')
<style>
	#map_show_officer_all {
      height: calc(100%);
    }

    .card_data{
    	background-color: white;
    	width: auto;
    	height: calc(85%);
    	padding: 20px;
    	border-radius: 15px;
    	box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.15), 0 4px 10px 0 rgba(0, 0, 0, 0.15);
    }

    .flex-container {
	  	display: flex;
		/*height: 350px;*/
		height: calc(85%);
	  	overflow: auto; /* เพิ่มการเลื่อนแนวตั้ง เมื่อเนื้อหาเกินขนาดของ flex container */
	}
</style>
<!-- <link href="{{ asset('partner_new/css/bootstrap.min.css') }}" rel="stylesheet"> -->

<div class="card_data" style="position:absolute;z-index: 99999;top: 10%;left: 1%;">
	<div class="card-body">
		<div class="btn-group" role="group" aria-label="Basic example" style="width:100%;">
			<button id="btn_view_officer" type="button" class="btn btn-sm btn-success" 
			onclick="change_view_data_map('btn_view_officer');document.querySelector('#a_li_1').click();">
				หน่วยปฏิบัติการแพทย์ฉุกเฉิน
			</button>
			<button id="btn_view_sos" type="button" class="btn btn-sm btn-outline-danger" 
			onclick="change_view_data_map('btn_view_sos');document.querySelector('#a_li_2').click();">
				&nbsp;&nbsp;&nbsp;จุดเกิดเหตุ&nbsp;&nbsp;&nbsp;
			</button>
		</div>

		<hr>

		<ul class="nav nav-tabs nav-primary d-none" role="tablist">
			<li class="nav-item" role="presentation">
				<a id="a_li_1" class="nav-link active" data-bs-toggle="tab" href="#primaryhome_title" role="tab" aria-selected="false">
					<div class="d-flex align-items-center">
						<div class="tab-title">หน่วยปฏิบัติการแพทย์ฉุกเฉิน (d-none)</div>
					</div>
				</a>
			</li>
			<li class="nav-item" role="presentation">
				<a id="a_li_2" class="nav-link" data-bs-toggle="tab" href="#primaryprofile_title" role="tab" aria-selected="true">
					<div class="d-flex align-items-center">
						<div class="tab-title">จุดเกิดเหตุ (d-none)</div>
					</div>
				</a>
			</li>
		</ul>
		<div class="tab-content py-3">
			<!-- ข้อมูลหน่วยปฏิบัติการ -->
			<div class="tab-pane fade active show" id="primaryhome_title" role="tabpanel">
				<ul class="nav nav-tabs nav-primary" role="tablist">
					<li class="nav-item" role="presentation">
						<a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="false">
							<div class="d-flex align-items-center">
								<div class="tab-icon">
									<i class="fa-solid fa-building-flag font-18 me-1"></i>
								</div>
								<div class="tab-title">หน่วย</div>
							</div>
						</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab" aria-selected="true">
							<div class="d-flex align-items-center">
								<div class="tab-icon">
									<i class="fa-solid fa-truck-plane font-18 me-1"></i>
								</div>
								<div class="tab-title">ยานพาหนะ</div>
							</div>
						</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" data-bs-toggle="tab" href="#primarycontact" role="tab" aria-selected="false">
							<div class="d-flex align-items-center">
								<div class="tab-icon">
									<i class="fa-sharp fa-solid fa-ranking-star font-18 me-1"></i>
								</div>
								<div class="tab-title">ระดับ</div>
							</div>
						</a>
					</li>
				</ul>
				<div class="tab-content py-3 mt-3">
					<div class="tab-pane fade active show" id="primaryhome" role="tabpanel">
						<div class="mb-4">
							<h4 class="card-title">หน่วยปฏิบัติการแพทย์ฉุกเฉิน</h4>
						</div>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/all-agree.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">ทั้งหมด : <b>{{ count($data_officer_all) }}</b></span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/checked.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">พร้อมช่วยเหลือ : <b>{{ count($data_officer_ready) }}</b></span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/help.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">กำลังช่วยเหลือ : <b>{{ count($data_officer_helping) }}</b></span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/unavailable.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">ไม่อยู่ : <b>{{ count($data_officer_Not_ready) }}</b></span>
							<br>
						</p>
					</div>
					<div class="tab-pane fade" id="primaryprofile" role="tabpanel">
						<div class="mb-4">
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
					<div class="tab-pane fade" id="primarycontact" role="tabpanel">
						<div class="mb-4">
							<h4 class="card-title">ระดับปฏิบัติการ</h4>
						</div>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/2.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">FR : <b>{{ $arr_vehicle['vehicle_fr'] }}</b></span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/3.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">BLS : <b>{{ $arr_vehicle['vehicle_bls'] }}</b></span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/3.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">ILS : <b>{{ $arr_vehicle['vehicle_ils'] }}</b></span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/4.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">ALS : <b>{{ $arr_vehicle['vehicle_als'] }}</b></span>
							<br>
						</p>
					</div>
				</div>
			</div>
			<!-- ข้อมูลจุดเกิดเหตุ -->
			<div class="tab-pane fade" id="primaryprofile_title" role="tabpanel">
				<div>
					<h4 class="card-title">ระดับเหตุการณ์</h4>
				</div>
				<p style="position:relative;padding-top: 10px;">
					<img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/1.png') }}" width="35" style="position: absolute;top:0px;"> 
					<span style="margin-left:50px;">ทั้งหมด</span>
					<br>
				</p>
				<p style="position:relative;padding-top: 10px;">
					<img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/2.png') }}" width="35" style="position: absolute;top:0px;"> 
					<span style="margin-left:50px;">เขียว(ไม่รุนแรง)</span>
					<br>
				</p>
				<p style="position:relative;padding-top: 10px;">
					<img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/3.png') }}" width="35" style="position: absolute;top:0px;"> 
					<span style="margin-left:50px;">เหลือง(เร่งด่วน)</span>
					<br>
				</p>
				<p style="position:relative;padding-top: 10px;">
					<img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/4.png') }}" width="35" style="position: absolute;top:0px;"> 
					<span style="margin-left:50px;">แดง(วิกฤติ)</span>
					<br>
				</p>
				<p style="position:relative;padding-top: 10px;">
					<img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/5.png') }}" width="35" style="position: absolute;top:0px;"> 
					<span style="margin-left:50px;">ขาว(ทั่วไป)</span>
					<br>
				</p>
				<p style="position:relative;padding-top: 10px;">
					<img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/6.png') }}" width="35" style="position: absolute;top:0px;"> 
					<span style="margin-left:50px;">ดำ(รับบริการสาธารณสุขอื่น)  </span>
					<br>
				</p>
			</div>
		</div>
	</div>
</div>

<div class="card_data" style="position:absolute;z-index: 99999;top: 5%;right: 1%;height: 5%!important;">
	<div class="card-body text-center">
		<div style="margin-top: -28px;">
			ช่วยเหลือเสร็จสิ้น <b>{{ count($sos_success) }}</b> เคส
		</div>
	</div>
</div>

<div class="card_data" style="position:absolute;z-index: 99999;top: 11%;right: 1%;">
	<div class="card-body">
		<ul class="nav nav-tabs nav-primary" role="tablist">
			<li class="nav-item" role="presentation_2">
				<a class="nav-link active" data-bs-toggle="tab" href="#primaryhome_2" role="tab" aria-selected="false">
					<div class="d-flex align-items-center">
						<div class="tab-icon">
							<i class="fa-solid fa-map-location-dot font-18 me-1"></i>
						</div>
						<div class="tab-title">พื้นที่</div>
					</div>
				</a>
			</li>
			<li class="nav-item" role="presentation_2">
				<a class="nav-link" data-bs-toggle="tab" href="#primaryprofile_2" role="tab" aria-selected="true">
					<div class="d-flex align-items-center">
						<div class="tab-icon">
							<i class="fa-solid fa-arrow-down-9-1 font-18 me-1"></i>
						</div>
						<div class="tab-title">ออกปฏิบัติการ</div>
					</div>
				</a>
			</li>
		</ul>
		<div class="tab-content py-3 mt-3 flex-container">
			<div class="tab-pane fade active show" id="primaryhome_2" role="tabpanel" style="padding-right:15px;">
				<div class="mb-4">
					<h4 class="card-title">พื้นที่การขอความช่วยเหลือ</h4>
				</div>
				@foreach($orderedDistricts as $district => $count)
					<div class="mt-2">
						{{$district}} 
						<span class="float-end">
							<b>{{$count}}</b>
						</span>
						<br>
					</div>
	            @endforeach
			</div>
			<div class="tab-pane fade" id="primaryprofile_2" role="tabpanel" style="padding-right:15px;">
				<div class="mb-4">
					<h4 class="card-title">เจ้าหน้าที่ออกปฏิบัติการ</h4>
				</div>
				@foreach($data_officer_gotohelp as $officer_gotohelp)
					<div class="mt-2">
						{{ $officer_gotohelp->name_officer }} 
						<span class="float-end">
							<b>{{ $officer_gotohelp->go_to_help }} </b> ครั้ง
						</span>
						<br>
					</div>
	            @endforeach
			</div>
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
    let marker_sos ;
    let markers = [] ;

    let image_sos_general = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/1.png') }}";
    let image_sos_green = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/2.png') }}";
    let image_sos_yellow = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/3.png') }}";
    let image_sos_red = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/4.png') }}";
    let image_sos_white = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/5.png') }}";
    let image_sos_black = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/6.png') }}";

    // FR
    let img_green_car = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/7.png') }}";
    let img_green_aircraft = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/8.png') }}";
    let img_green_ship_1 = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/9.png') }}";
    let img_green_ship_2 = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/10.png') }}";
    let img_green_ship_3 = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/11.png') }}";
    let img_green_ship_other = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/12.png') }}";

    // BLS / ILS
    let img_yellow_car = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/13.png') }}";
    let img_yellow_aircraft = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/14.png') }}";
    let img_yellow_ship_1 = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/15.png') }}";
    let img_yellow_ship_2 = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/16.png') }}";
    let img_yellow_ship_3 = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/17.png') }}";
    let img_yellow_ship_other = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/18.png') }}";

    // ALS
    let img_red_car = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/19.png') }}";
    let img_red_aircraft = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/20.png') }}";
    let img_red_ship_1 = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/21.png') }}";
    let img_red_ship_2 = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/22.png') }}";
    let img_red_ship_3 = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/23.png') }}";
    let img_red_ship_other = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/24.png') }}";


    // let image_operating_unit_red = "{{ url('/img/icon/operating_unit/แดง.png') }}";
    // let image_operating_unit_yellow = "{{ url('/img/icon/operating_unit/เหลือง.png') }}";
    // let image_operating_unit_green = "{{ url('/img/icon/operating_unit/เขียว.png') }}";
    // let image_operating_unit_general = "{{ url('/img/icon/operating_unit/ทั่วไป.png') }}";

	function open_map_show_data_officer_all() {

        let m_lat = parseFloat('12.870032');
        let m_lng = parseFloat('100.992541') + 1;
        let m_numZoom = parseFloat('6.5');

        map_show_data_officer_all = new google.maps.Map(document.getElementById("map_show_officer_all"), {
            center: {lat: m_lat, lng: m_lng },
            zoom: m_numZoom,
        });

        change_view_data_map("btn_view_officer");
    }

    function change_view_data_map(type_view){
    	
    	for (var i = 0; i < markers.length; i++) {
	        markers[i].setMap(null);
	    }
	    markers = []; // เคลียร์อาร์เรย์เพื่อลบอ้างอิงทั้งหมด

    	if (type_view == "btn_view_officer") {
    		btn_view_officer();

    		document.querySelector('#btn_view_officer').classList.remove('btn-outline-success');
    		document.querySelector('#btn_view_officer').classList.add('btn-success');

    		document.querySelector('#btn_view_sos').classList.remove('btn-danger');
    		document.querySelector('#btn_view_sos').classList.add('btn-outline-danger');

    	}else if(type_view == "btn_view_sos"){
    		btn_view_sos();

    		document.querySelector('#btn_view_officer').classList.remove('btn-success');
    		document.querySelector('#btn_view_officer').classList.add('btn-outline-success');

    		document.querySelector('#btn_view_sos').classList.remove('btn-outline-danger');
    		document.querySelector('#btn_view_sos').classList.add('btn-danger');
    	}

    }

    function btn_view_officer(){
    	// console.log('btn_view_officer');

    	let icon_level ;


        @foreach($data_officer_ready as $item)

        	// FR
        	if( "{{ $item->level }}" === "FR" ){
        		switch("{{ $item->vehicle_type }}") {
				  	case "รถ":
				    	icon_level = img_green_car ;
				    break;
				  	case "อากาศยาน":
				    	icon_level = img_green_aircraft ;
				    break;
				    case "เรือ ป.1":
				    	icon_level = img_green_ship_1 ;
				    break;
				    case "เรือ ป.2":
				    	icon_level = img_green_ship_2 ;
				    break;
				    case "เรือ ป.3":
				    	icon_level = img_green_ship_3 ;
				    break;
				    case "เรือประเภทอื่นๆ":
				    	icon_level = img_green_ship_other ;
				    break;
				}
        	}
        	// BLS && ILS 
        	else if( "{{ $item->level }}" === "BLS" || "{{ $item->level }}" === "ILS"){
        		switch("{{ $item->vehicle_type }}") {
				  	case "รถ":
				    	icon_level = img_yellow_car ;
				    break;
				  	case "อากาศยาน":
				    	icon_level = img_yellow_aircraft ;
				    break;
				    case "เรือ ป.1":
				    	icon_level = img_yellow_ship_1 ;
				    break;
				    case "เรือ ป.2":
				    	icon_level = img_yellow_ship_2 ;
				    break;
				    case "เรือ ป.3":
				    	icon_level = img_yellow_ship_3 ;
				    break;
				    case "เรือประเภทอื่นๆ":
				    	icon_level = img_yellow_ship_other ;
				    break;
				}
        	}
        	// ALS
        	else{
        		switch("{{ $item->vehicle_type }}") {
				  	case "รถ":
				    	icon_level = img_red_car ;
				    break;
				  	case "อากาศยาน":
				    	icon_level = img_red_aircraft ;
				    break;
				    case "เรือ ป.1":
				    	icon_level = img_red_ship_1 ;
				    break;
				    case "เรือ ป.2":
				    	icon_level = img_red_ship_2 ;
				    break;
				    case "เรือ ป.3":
				    	icon_level = img_red_ship_3 ;
				    break;
				    case "เรือประเภทอื่นๆ":
				    	icon_level = img_red_ship_other ;
				    break;
				}
        	}

	        marker = new google.maps.Marker({
	            position: {lat: parseFloat({{ $item->lat }}) , lng: parseFloat({{ $item->lng }}) },
	            map: map_show_data_officer_all,
	            icon: icon_level,
	        });
	        markers.push(marker);
	    @endforeach

    }

    function btn_view_sos(){
    	// console.log('btn_view_sos');
    	let icon_level ;

    	@foreach($sos_success as $item)

    		switch("{{ $item->form_yellow->rc }}") {
			  	case "แดง(วิกฤติ)":
			    	icon_level = image_sos_red ;
			    break;
			  	case "เหลือง(เร่งด่วน)":
			    	icon_level = image_sos_yellow ;
			    break;
			    case "เขียว(ไม่รุนแรง)":
			    	icon_level = image_sos_green ;
			    break;
			    case "ขาว(ทั่วไป)":
			    	icon_level = image_sos_white ;
			    break;
			    case "ดำ":
			    	icon_level = image_sos_black ;
			    break;
			    default:
			    	icon_level = image_sos_general ;
			}

	        marker_sos = new google.maps.Marker({
	            position: {lat: parseFloat({{ $item->lat }}) , lng: parseFloat({{ $item->lng }}) },
	            map: map_show_data_officer_all,
	            icon: icon_level,
	        });
	        markers.push(marker_sos);
	    @endforeach

    }

</script>

@endsection('content')
