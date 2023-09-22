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
		height: calc(70%);
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
							<span style="margin-left:50px;">
								ทั้งหมด : <b>{{ count($data_officer_all) }}</b>
								<span class="float-end btn" onclick="view_offiecr_select('status','all');">
									<i class="fa-sharp fa-solid fa-eye text-info"></i>
								</span>
							</span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/checked.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">
								พร้อมช่วยเหลือ : <b>{{ count($data_officer_ready) }}</b>
								<span class="float-end btn" onclick="view_offiecr_select('status','Standby');">
									<i class="fa-sharp fa-solid fa-eye text-info"></i>
								</span>
							</span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/help.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">
								กำลังช่วยเหลือ : <b>{{ count($data_officer_helping) }}</b>
								<span class="float-end btn" onclick="view_offiecr_select('status','Helping');">
									<i class="fa-sharp fa-solid fa-eye text-info"></i>
								</span>
							</span>
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
							<img src="{{ url('/img/icon/all_vehicle.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">
								@php
									$sum_vehicle = $arr_vehicle['vehicle_car'] + $arr_vehicle['vehicle_aircraft'] + $arr_vehicle['vehicle_boat_1'] + $arr_vehicle['vehicle_boat_2'] + $arr_vehicle['vehicle_boat_3'] + $arr_vehicle['vehicle_boat_other'] ;
								@endphp
								ทั้งหมด : <b>{{ $sum_vehicle }}</b>
								<span class="float-end btn" onclick="view_offiecr_select('vehicle_type','all');">
									<i class="fa-sharp fa-solid fa-eye text-info"></i>
								</span>
							</span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/car_img.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">
								รถยนต์ : <b>{{ $arr_vehicle['vehicle_car'] }}</b>
								<span class="float-end btn" onclick="view_offiecr_select('vehicle_type','รถ');">
									<i class="fa-sharp fa-solid fa-eye text-info"></i>
								</span>
							</span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/helicopter.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">
								อากาศยาน : <b>{{ $arr_vehicle['vehicle_aircraft'] }}</b>
								<span class="float-end btn" onclick="view_offiecr_select('vehicle_type','อากาศยาน');">
									<i class="fa-sharp fa-solid fa-eye text-info"></i>
								</span>
							</span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/ship1.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">
								เรือ ป.1 : <b>{{ $arr_vehicle['vehicle_boat_1'] }}</b>
								<span class="float-end btn" onclick="view_offiecr_select('vehicle_type','เรือ ป.1');">
									<i class="fa-sharp fa-solid fa-eye text-info"></i>
								</span>
							</span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/ship2.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">
								เรือ ป.2 : <b>{{ $arr_vehicle['vehicle_boat_2'] }}</b>
								<span class="float-end btn" onclick="view_offiecr_select('vehicle_type','เรือ ป.2');">
									<i class="fa-sharp fa-solid fa-eye text-info"></i>
								</span>
							</span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/ship3.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">
								เรือ ป.3 : <b>{{ $arr_vehicle['vehicle_boat_3'] }}</b>
								<span class="float-end btn" onclick="view_offiecr_select('vehicle_type','เรือ ป.3');">
									<i class="fa-sharp fa-solid fa-eye text-info"></i>
								</span>
							</span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/ship4.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">
								เรือประเภทอื่นๆ : <b>{{ $arr_vehicle['vehicle_boat_other'] }}</b>
								<span class="float-end btn" onclick="view_offiecr_select('vehicle_type','เรือประเภทอื่นๆ');">
									<i class="fa-sharp fa-solid fa-eye text-info"></i>
								</span>
							</span>
							<br>
						</p>
					</div>
					<div class="tab-pane fade" id="primarycontact" role="tabpanel">
						<div class="mb-4">
							<h4 class="card-title">ระดับปฏิบัติการ</h4>
						</div>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/1.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">
								@php
									$sum_level = $arr_vehicle['vehicle_fr'] + $arr_vehicle['vehicle_bls'] + $arr_vehicle['vehicle_ils'] + $arr_vehicle['vehicle_als'] ;
								@endphp
								ทั้งหมด : <b>{{ $sum_level }}</b>
								<span class="float-end btn" onclick="view_offiecr_select('level','all');">
									<i class="fa-sharp fa-solid fa-eye text-info"></i>
								</span>
							</span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/2.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">
								FR : <b>{{ $arr_vehicle['vehicle_fr'] }}</b>
								<span class="float-end btn" onclick="view_offiecr_select('level','FR');">
									<i class="fa-sharp fa-solid fa-eye text-info"></i>
								</span>
							</span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/3.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">
								BLS : <b>{{ $arr_vehicle['vehicle_bls'] }}</b>
								<span class="float-end btn" onclick="view_offiecr_select('level','BLS');">
									<i class="fa-sharp fa-solid fa-eye text-info"></i>
								</span>
							</span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/3.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">
								ILS : <b>{{ $arr_vehicle['vehicle_ils'] }}</b>
								<span class="float-end btn" onclick="view_offiecr_select('level','ILS');">
									<i class="fa-sharp fa-solid fa-eye text-info"></i>
								</span>
							</span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/4.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">
								ALS : <b>{{ $arr_vehicle['vehicle_als'] }}</b>
								<span class="float-end btn" onclick="view_offiecr_select('level','ALS');">
									<i class="fa-sharp fa-solid fa-eye text-info"></i>
								</span>
							</span>
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
					<img src="{{ url('/img/icon/operating_unit/sos.png') }}" width="35" style="position: absolute;top:0px;"> 
					<span style="margin-left:50px;">
						ทั้งหมด : <b><span id="show_amount_sos_all"></span></b>
						<span class="float-end btn" onclick="btn_view_sos('all');">
							<i class="fa-sharp fa-solid fa-eye text-info"></i>
						</span>
					</span>
					<br>
				</p>
				<p style="position:relative;padding-top: 10px;">
					<img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/2.png') }}" width="35" style="position: absolute;top:0px;"> 
					<span style="margin-left:50px;">
						เขียว(ไม่รุนแรง) : <b><span id="show_amount_sos_green"></span></b>
						<span class="float-end btn" onclick="btn_view_sos('เขียว(ไม่รุนแรง)');">
							<i class="fa-sharp fa-solid fa-eye text-info"></i>
						</span>
					</span>
					<br>
				</p>
				<p style="position:relative;padding-top: 10px;">
					<img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/3.png') }}" width="35" style="position: absolute;top:0px;"> 
					<span style="margin-left:50px;">
						เหลือง(เร่งด่วน) : <b><span id="show_amount_sos_yellow"></span></b>
						<span class="float-end btn" onclick="btn_view_sos('เหลือง(เร่งด่วน)');">
							<i class="fa-sharp fa-solid fa-eye text-info"></i>
						</span>
					</span>
					<br>
				</p>
				<p style="position:relative;padding-top: 10px;">
					<img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/4.png') }}" width="35" style="position: absolute;top:0px;"> 
					<span style="margin-left:50px;">
						แดง(วิกฤติ) : <b><span id="show_amount_sos_red"></span></b>
						<span class="float-end btn" onclick="btn_view_sos('แดง(วิกฤติ)');">
							<i class="fa-sharp fa-solid fa-eye text-info"></i>
						</span>
					</span>
					<br>
				</p>
				<p style="position:relative;padding-top: 10px;">
					<img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/5.png') }}" width="35" style="position: absolute;top:0px;"> 
					<span style="margin-left:50px;">
						ขาว(ทั่วไป) : <b><span id="show_amount_sos_white"></span></b>
						<span class="float-end btn" onclick="btn_view_sos('ขาว(ทั่วไป)');">
							<i class="fa-sharp fa-solid fa-eye text-info"></i>
						</span>
					</span>
					<br>
				</p>
				<p style="position:relative;padding-top: 10px;">
					<img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/6.png') }}" width="35" style="position: absolute;top:0px;"> 
					<span style="margin-left:50px;">
						ดำ(รับบริการสาธารณสุขอื่น) : <b><span id="show_amount_sos_black"></span></b>
						<span class="float-end btn" onclick="btn_view_sos('ดำ');">
							<i class="fa-sharp fa-solid fa-eye text-info"></i>
						</span>
					</span>
					<br>
				</p>
				<p style="position:relative;padding-top: 10px;">
					<img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/1.png') }}" width="35" style="position: absolute;top:0px;"> 
					<span style="margin-left:50px;">
						ไม่มีการประเมิน : <b><span id="show_amount_sos_general"></span></b>
						<span class="float-end btn" onclick="btn_view_sos('general');">
							<i class="fa-sharp fa-solid fa-eye text-info"></i>
						</span>
					</span>
					<br>
				</p>
			</div>
		</div>
	</div>
</div>

<div class="card_data" style="position:absolute;z-index: 99999;top: 5%;right: 1%;height: 5%!important;">
	<div class="card-body text-center">
		<div style="margin-top: -28px;">
			ช่วยเหลือเสร็จสิ้น <b>{{ count($sos_success) }}</b> เคส (ทุกพื้นที่)
		</div>
	</div>
</div>

<div class="card_data" style="position:absolute;z-index: 99999;top: 11%;right: 1%;">
	<div class="card-body">
		<div class="row">
			<div class="col-7">
				<label for="select_area">เลือกพื้นที่</label>
				<select name="select_area" id="select_area" class="form-control" onchange="func_select_area_and_level();">
					<option class="notranslate" selected value="all">ทั้งหมด</option>
					@foreach($data_area as $item_area)
						@if($item_area->area != "ศูนย์ใหญ่")
						<option class="notranslate" value="{{ $item_area->area }}">
							{{ $item_area->area }}
						</option>
						@endif
					@endforeach
                </select>
			</div>

			<div id="div_d_none_select_level" class="col-5"></div>

			<div id="div_show_select_level" class="col-5 d-none">
				<label for="select_level">เลือกระดับ</label>
				<select name="select_level" id="select_level" class="form-control" onchange="func_select_area_and_level();">
					<option class="notranslate" selected value="all">ทั้งหมด</option>
					<option class="notranslate text-success" value="FR">FR</option>
					<option class="notranslate text-warning" value="BLS">BLS</option>
					<option class="notranslate text-warning" value="ILS">ILS</option>
					<option class="notranslate text-danger" value="ALS">ALS</option>
                </select>
			</div>
		</div>
		<hr>
		<h4 class="text-info">
			เฉพาะเคสที่เสร็จสิ้น &nbsp;&nbsp;
			<span class="float-end text-dark" style="font-size: 16px;margin-top: 6px;">
				รวม <b id="show_amount_by_area">{{ count($sos_success) }}</b> เคส
			</span>
		</h4>

		<ul class="nav nav-tabs nav-primary mt-3" role="tablist">
			<li class="nav-item" role="presentation_2">
				<a class="nav-link active" data-bs-toggle="tab" href="#primaryhome_2" role="tab" aria-selected="false" onclick="document.querySelector('#div_d_none_select_level').classList.remove('d-none');document.querySelector('#div_show_select_level').classList.add('d-none')">
					<div class="d-flex align-items-center">
						<div class="tab-icon">
							<i class="fa-solid fa-map-location-dot font-18 me-1"></i>
						</div>
						<div class="tab-title">พื้นที่</div>
					</div>
				</a>
			</li>
			<li class="nav-item" role="presentation_2">
				<a class="nav-link" data-bs-toggle="tab" href="#primaryprofile_2" role="tab" aria-selected="true" onclick="document.querySelector('#div_show_select_level').classList.remove('d-none');document.querySelector('#div_d_none_select_level').classList.add('d-none')">
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
					@php
						$area_province = explode("/",$district)[0];
					@endphp
					<div class="mt-2 show_count_area" area="{{ $area_province }}">
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
					<div class="mt-2 show_officer" level="{{ $officer_gotohelp->level }}" area="{{ $officer_gotohelp->operating_unit->area }}" lan_lng="{{ $officer_gotohelp->lat }},{{ $officer_gotohelp->lng }}" vehicle_type="{{ $officer_gotohelp->vehicle_type }}">
						<div class="col-12">
							ชื่อ : <b>{{ $officer_gotohelp->name_officer }}</b>
							<span class="float-end">
								<u><b>{{ $officer_gotohelp->go_to_help }} </b> ครั้ง</u>
							</span>
							<br>
							พื้นที่ : {{ $officer_gotohelp->operating_unit->area }}
							<br>
							หน่วย : {{ $officer_gotohelp->operating_unit->name }}
							<br>

							ระดับ : 

							@php
								$color_level = '' ;
								switch ($officer_gotohelp->level) {
								  	case 'FR':
								    	$color_level = 'success' ;
								    break;
								  	case 'BLS':
								    	$color_level = 'warning' ;
							    	break;
								  	case 'ILS':
								    	$color_level = 'warning' ;
								    break;
								    case 'ALS':
								    	$color_level = 'danger' ;
								    break;
								}
							@endphp
							<span class="text-{{$color_level}}" >
								<b>{{ $officer_gotohelp->level }}</b>
							</span>
							<br>
						</div>
						<hr>
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
    	
    	for (let i = 0; i < markers.length; i++) {
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
    		btn_view_sos('all');

    		document.querySelector('#btn_view_officer').classList.remove('btn-success');
    		document.querySelector('#btn_view_officer').classList.add('btn-outline-success');

    		document.querySelector('#btn_view_sos').classList.remove('btn-outline-danger');
    		document.querySelector('#btn_view_sos').classList.add('btn-danger');
    	}

    }

    function btn_view_officer(){
    	// console.log('btn_view_officer');

    	let icon_level ;


        @foreach($data_officer_all as $item)

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

    function btn_view_sos(type){
    	// console.log('btn_view_sos');

    	for (let i = 0; i < markers.length; i++) {
	        markers[i].setMap(null);
	    }
	    markers = []; // เคลียร์อาร์เรย์เพื่อลบอ้างอิงทั้งหมด

    	let icon_level ;

    	let show_amount_sos_red = 0 ;
    	let show_amount_sos_yellow = 0 ;
    	let show_amount_sos_green = 0 ;
    	let show_amount_sos_white = 0 ;
    	let show_amount_sos_black = 0 ;
    	let show_amount_sos_general = 0 ;

    	@foreach($sos_success as $item)

    		switch("{{ $item->form_yellow->rc }}") {
			  	case "แดง(วิกฤติ)":
			    	icon_level = image_sos_red ;
			    	show_amount_sos_red = show_amount_sos_red + 1 ;
			    break;
			  	case "เหลือง(เร่งด่วน)":
			    	icon_level = image_sos_yellow ;
			    	show_amount_sos_yellow = show_amount_sos_yellow + 1 ;
			    break;
			    case "เขียว(ไม่รุนแรง)":
			    	icon_level = image_sos_green ;
			    	show_amount_sos_green = show_amount_sos_green + 1 ;
			    break;
			    case "ขาว(ทั่วไป)":
			    	icon_level = image_sos_white ;
			    	show_amount_sos_white = show_amount_sos_white + 1 ;
			    break;
			    case "ดำ":
			    	icon_level = image_sos_black ;
			    	show_amount_sos_black = show_amount_sos_black + 1 ;
			    break;
			    default:
			    	icon_level = image_sos_general ;
			    	show_amount_sos_general = show_amount_sos_general + 1 ;
			}

			if(type == "{{ $item->form_yellow->rc }}" || type == 'all'){

		        marker_sos = new google.maps.Marker({
		            position: {lat: parseFloat({{ $item->lat }}) , lng: parseFloat({{ $item->lng }}) },
		            map: map_show_data_officer_all,
		            icon: icon_level,
		        });
		        markers.push(marker_sos);
		    }
		    else if(type == 'general'){

		    	if(!"{{ $item->form_yellow->rc }}"){
		    		marker_sos = new google.maps.Marker({
			            position: {lat: parseFloat({{ $item->lat }}) , lng: parseFloat({{ $item->lng }}) },
			            map: map_show_data_officer_all,
			            icon: icon_level,
			        });
			        markers.push(marker_sos);
		    	}

		    }

	    @endforeach

	    let sum_sos = show_amount_sos_red + show_amount_sos_yellow + show_amount_sos_green + show_amount_sos_white + show_amount_sos_black + show_amount_sos_general ;

    	document.querySelector('#show_amount_sos_all').innerHTML = sum_sos;
    	document.querySelector('#show_amount_sos_red').innerHTML = show_amount_sos_red;
    	document.querySelector('#show_amount_sos_yellow').innerHTML = show_amount_sos_yellow;
    	document.querySelector('#show_amount_sos_green').innerHTML = show_amount_sos_green;
    	document.querySelector('#show_amount_sos_white').innerHTML = show_amount_sos_white;
    	document.querySelector('#show_amount_sos_black').innerHTML = show_amount_sos_black;
    	document.querySelector('#show_amount_sos_general').innerHTML = show_amount_sos_general;

    }


    function view_offiecr_select(type , data){

    	// console.log(type);
    	
    	for (let i = 0; i < markers.length; i++) {
	        markers[i].setMap(null);
	    }
	    markers = []; // เคลียร์อาร์เรย์เพื่อลบอ้างอิงทั้งหมด

	    let icon_level ;
	    let i_check = 0 ;

	    let type_select = "";

        @foreach($data_officer_all as $item)

        	if(type == "status"){
		    	type_select = "{{ $item->status }}" ;
		    }
		    else if(type == "vehicle_type"){
		    	type_select = "{{ $item->vehicle_type }}" ;
		    }
		    else if(type == 'level'){
		    	type_select = "{{ $item->level }}" ;
		    }

        	// status = type_officer_status
        	if(data === type_select || data === "all"){

        		i_check = i_check + 1 ;

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
			}
		@endforeach

		// console.log(i_check);
    }

    function func_select_area_and_level(){

    	let select_area = document.querySelector('#select_area').value ;
    		// console.log(select_area);
    	let select_level = document.querySelector('#select_level').value ;
    		// console.log("select_level >> " + select_level);

    	// LEVEL
    	let tag_level = document.querySelectorAll('.show_officer');
    		// console.log(tag_level);
				
			tag_level.forEach(tag_level => {
				let check_area = tag_level.getAttribute('area');
				let check_level = tag_level.getAttribute('level');
			        // console.log("check_area >> " + check_area) ;
			        // console.log("check_level >> " + check_level) ;

			    if( (check_level == select_level && check_area == select_area) 
			    	|| 
			    	(check_level == select_level && select_area == 'all') 
			    	|| 
			    	(select_level == 'all' && check_area == select_area) 
			    	|| 
			    	(select_level == 'all' && select_area == 'all') 
			    ){
			        tag_level.classList.remove('d-none') ;
			    }else{
			        tag_level.classList.add('d-none') ;
			    }

			})

		// AREA
    	let tag_area = document.querySelectorAll('.show_count_area');
    		// console.log(tag_area);
				
			tag_area.forEach(tag_area => {
				let check_area_2 = tag_area.getAttribute('area');
			        // console.log("check_area_2 >> " + check_area_2) ;

			    if( (select_area == check_area_2) || (select_area == 'all')){
			        tag_area.classList.remove('d-none') ;
			    }else{
			        tag_area.classList.add('d-none') ;
			    }

			})

		// เซตแมพ วาดพื้นที่
		if(select_area != 'all'){
			draw_select_area(select_area);
		}else{
			if (currentPolygon) {
		        currentPolygon.setMap(null);

		        let m_lat = parseFloat('12.870032');
		        let m_lng = parseFloat('100.992541');

	            map_show_data_officer_all.setZoom(6);
	            map_show_data_officer_all.setCenter({lat: m_lat, lng: m_lng });

		    }
		}

		// mark จุดเจ้าหน้าที่
		if(select_level != 'all'){

			for (let i = 0; i < markers.length; i++) {
		        markers[i].setMap(null);
		    }
		    markers = []; // เคลียร์อาร์เรย์เพื่อลบอ้างอิงทั้งหมด

    		let tag_level_2 = document.querySelectorAll('.show_officer');

			tag_level_2.forEach(tag_level_2 => {

				let check_level_3 = tag_level_2.getAttribute('level');

				if(check_level_3 == select_level){

					let check_lat_lng = tag_level_2.getAttribute('lan_lng');
					let vehicle_type = tag_level_2.getAttribute('vehicle_type');
				        // console.log("check_lat_lng >> " + check_lat_lng) ;
				        // console.log("vehicle_type >> " + vehicle_type) ;

				    mark_location_officer(check_lat_lng , select_level , vehicle_type);
				}
			})

		}else{
			view_offiecr_select('level','all');
		}

    }

    function mark_location_officer(check_lat_lng , select_level , vehicle_type){
    	
    	// FR
    	if( select_level === "FR" ){
    		switch(vehicle_type) {
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
    	else if( select_level === "BLS" || select_level === "ILS"){
    		switch(vehicle_type) {
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
    		switch(vehicle_type) {
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

    	let sp_lat_lng = check_lat_lng.split(',');
    	let sp_lat = sp_lat_lng[0];
    	let sp_lng = sp_lat_lng[1];

        marker = new google.maps.Marker({
            position: {lat: parseFloat(sp_lat) , lng: parseFloat(sp_lng) },
            map: map_show_data_officer_all,
            icon: icon_level,
        });
        markers.push(marker);

    }

    // สร้างตัวแปร global ไว้เก็บข้อมูล Polygon ปัจจุบัน
	let currentPolygon = null;

	function draw_select_area(select_area) {
	    // หากมี Polygon อยู่แล้ว ให้ลบออก
	    if (currentPolygon) {
	        currentPolygon.setMap(null);
	    }

	    fetch("{{ url('/') }}/api/view_map_officer_all/" + select_area + "/draw_select_area")
	        .then(response => response.json())
	        .then(result => {
	            // console.log(result);

	            // สร้าง Polygon ใหม่
	            let polygon = new google.maps.Polygon({
	                paths: JSON.parse(result['polygon']),
	                strokeColor: "#008450",
	                strokeOpacity: 0.8,
	                strokeWeight: 1,
	                fillColor: "#008450",
	                fillOpacity: 0.25,
	            });

	            // กำหนด Polygon ใหม่ให้กับตัวแปร currentPolygon
	            currentPolygon = polygon;

	            // กำหนดให้ Polygon ใหม่แสดงบนแผนที่
	            polygon.setMap(map_show_data_officer_all);

	            // Fit map ให้เหมาะสมกับ Polygon ใหม่
	            let bounds = new google.maps.LatLngBounds();
	            polygon.getPath().forEach(function (point) {
	                bounds.extend(point);
	            });
	            map_show_data_officer_all.fitBounds(bounds);
	            map_show_data_officer_all.setZoom(9);
	        });
	}


</script>

@endsection('content')
