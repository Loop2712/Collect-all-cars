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
								ทั้งหมด : <b id="count_officer_all"></b>
								<span class="float-end btn" onclick="view_offiecr_select('status','all');">
									<i class="fa-sharp fa-solid fa-eye text-info"></i>
								</span>
							</span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/checked.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">
								พร้อมช่วยเหลือ : <b id="count_officer_ready"></b>
								<span class="float-end btn" onclick="view_offiecr_select('status','Standby');">
									<i class="fa-sharp fa-solid fa-eye text-info"></i>
								</span>
							</span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/help.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">
								กำลังช่วยเหลือ : <b id="count_officer_helping"></b>
								<span class="float-end btn" onclick="view_offiecr_select('status','Helping');">
									<i class="fa-sharp fa-solid fa-eye text-info"></i>
								</span>
							</span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/unavailable.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">ไม่อยู่ : <b id="count_officer_Not_ready"></b></span>
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
								
								ทั้งหมด : <b>{ $sum_vehicle }</b>
								<span class="float-end btn" onclick="view_offiecr_select('vehicle_type','all');">
									<i class="fa-sharp fa-solid fa-eye text-info"></i>
								</span>
							</span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/car_img.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">
								รถยนต์ : <b>{ $arr_vehicle['vehicle_car'] }</b>
								<span class="float-end btn" onclick="view_offiecr_select('vehicle_type','รถ');">
									<i class="fa-sharp fa-solid fa-eye text-info"></i>
								</span>
							</span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/helicopter.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">
								อากาศยาน : <b>{ $arr_vehicle['vehicle_aircraft'] }</b>
								<span class="float-end btn" onclick="view_offiecr_select('vehicle_type','อากาศยาน');">
									<i class="fa-sharp fa-solid fa-eye text-info"></i>
								</span>
							</span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/ship1.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">
								เรือ ป.1 : <b>{ $arr_vehicle['vehicle_boat_1'] }</b>
								<span class="float-end btn" onclick="view_offiecr_select('vehicle_type','เรือ ป.1');">
									<i class="fa-sharp fa-solid fa-eye text-info"></i>
								</span>
							</span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/ship2.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">
								เรือ ป.2 : <b>{ $arr_vehicle['vehicle_boat_2'] }</b>
								<span class="float-end btn" onclick="view_offiecr_select('vehicle_type','เรือ ป.2');">
									<i class="fa-sharp fa-solid fa-eye text-info"></i>
								</span>
							</span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/ship3.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">
								เรือ ป.3 : <b>{ $arr_vehicle['vehicle_boat_3'] }</b>
								<span class="float-end btn" onclick="view_offiecr_select('vehicle_type','เรือ ป.3');">
									<i class="fa-sharp fa-solid fa-eye text-info"></i>
								</span>
							</span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/ship4.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">
								เรือประเภทอื่นๆ : <b>{ $arr_vehicle['vehicle_boat_other'] }</b>
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
								
								ทั้งหมด : <b>{ $sum_level }</b>
								<span class="float-end btn" onclick="view_offiecr_select('level','all');">
									<i class="fa-sharp fa-solid fa-eye text-info"></i>
								</span>
							</span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/2.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">
								FR : <b>{ $arr_vehicle['vehicle_fr'] }</b>
								<span class="float-end btn" onclick="view_offiecr_select('level','FR');">
									<i class="fa-sharp fa-solid fa-eye text-info"></i>
								</span>
							</span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/3.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">
								BLS : <b>{ $arr_vehicle['vehicle_bls'] }</b>
								<span class="float-end btn" onclick="view_offiecr_select('level','BLS');">
									<i class="fa-sharp fa-solid fa-eye text-info"></i>
								</span>
							</span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/3.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">
								ILS : <b>{ $arr_vehicle['vehicle_ils'] }</b>
								<span class="float-end btn" onclick="view_offiecr_select('level','ILS');">
									<i class="fa-sharp fa-solid fa-eye text-info"></i>
								</span>
							</span>
							<br>
						</p>
						<p style="position:relative;padding-top: 10px;">
							<img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/4.png') }}" width="35" style="position: absolute;top:0px;"> 
							<span style="margin-left:50px;">
								ALS : <b>{ $arr_vehicle['vehicle_als'] }</b>
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
			ช่วยเหลือเสร็จสิ้น <b id="count_sos_success"></b> เคส (ทุกพื้นที่)
		</div>
	</div>
</div>

<div class="card_data" style="position:absolute;z-index: 99999;top: 11%;right: 1%;">
	<div class="card-body">
		<div class="row">
			<div id="div_show_select_level" class="col-12">
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
		<h4 id="h4_show_amount_by_area" class="text-info d-none">
			ข้อมูลการออกปฏิบัติการ &nbsp;&nbsp;
			<span class="float-end text-dark" style="font-size: 16px;margin-top: 6px;">
				รวม <b id="show_amount_by_area"></b> เคส
			</span>
		</h4>

		<ul class="nav nav-tabs nav-primary mt-3" role="tablist">
			<li class="nav-item" role="presentation_2">
				<a class="nav-link active" data-bs-toggle="tab" href="#primaryhome_2" role="tab" aria-selected="false" onclick="document.querySelector('#h4_show_amount_by_area').classList.add('d-none');">
					<div class="d-flex align-items-center">
						<div class="tab-icon">
							<i class="fa-solid fa-map-location-dot font-18 me-1"></i>
						</div>
						<div class="tab-title">พื้นที่</div>
					</div>
				</a>
			</li>
			<li class="nav-item" role="presentation_2">
				<a class="nav-link" data-bs-toggle="tab" href="#primaryprofile_2" role="tab" aria-selected="true" onclick="document.querySelector('#h4_show_amount_by_area').classList.remove('d-none');">
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
				
			</div>
			<div class="tab-pane fade" id="primaryprofile_2" role="tabpanel" style="padding-right:15px;">
				<div class="mb-4">
					<h4 class="card-title">เจ้าหน้าที่ออกปฏิบัติการ</h4>
				</div>
				
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
    	// ------------ SEARCH DATA ------------ //
        @php
    		$sos_success = App\Models\Sos_help_center::where('status', 'เสร็จสิ้น')->get();

    		$data_officer_all = Illuminate\Support\Facades\DB::table('data_1669_operating_officers')
                ->join('data_1669_operating_units', 'data_1669_operating_units.id', '=', 'data_1669_operating_officers.operating_unit_id')
                ->leftJoin('users' , 'data_1669_operating_officers.user_id','=','users.id')
                ->where("data_1669_operating_units.area" , $area)
                ->select('data_1669_operating_officers.*' , 'data_1669_operating_units.*' ,'users.photo as photo_user')
                ->get();
    	@endphp

    	// add data to html
    	document.querySelector('#count_sos_success').innerHTML = "{{ count($sos_success) }}" ;

    	// --------- END SEARCH DATA --------- //

        open_map_show_data_officer_all();
    });

    let map_show_data_officer_all ;
    let marker ;
    let marker_sos ;
    let markers = [] ;
    var bounds;
    var polygon;

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

	function open_map_show_data_officer_all() {

        let m_lat = parseFloat('12.870032');
        let m_lng = parseFloat('100.992541') + 1;
        let m_numZoom = parseFloat('6.5');

        map_show_data_officer_all = new google.maps.Map(document.getElementById("map_show_officer_all"), {
            center: {lat: m_lat, lng: m_lng },
            zoom: m_numZoom,
        });

        fetch("{{ url('/') }}/api/view_map_officer_all/" + "{{ $area }}" + "/draw_select_area")
	        .then(response => response.json())
	        .then(result => {
	            // console.log(result);

	            // สร้าง Polygon ใหม่
	            polygon = new google.maps.Polygon({
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
	            bounds = new google.maps.LatLngBounds();

	            set_map_fit_polygon();
	        });

        change_view_data_map("btn_view_officer");

    }

    function change_view_data_map(type_view){
    	
    	console.log('change_view_data_map');

    	for (let i = 0; i < markers.length; i++) {
	        markers[i].setMap(null);
	    }
	    markers = []; // เคลียร์อาร์เรย์เพื่อลบอ้างอิงทั้งหมด

    	console.log('type_view >> ' + type_view);

    	if (type_view == "btn_view_officer") {
    		// btn_view_officer();
    		view_offiecr_select('status','all');

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
    	let count_officer_ready = 0 ;
    	let count_officer_helping = 0 ;
    	let count_officer_Not_ready = 0 ;
    	
    	for (let i = 0; i < markers.length; i++) {
	        markers[i].setMap(null);
	    }
	    markers = []; // เคลียร์อาร์เรย์เพื่อลบอ้างอิงทั้งหมด

	    let icon_level ;
	    let i_check = 0 ;

	    let type_select = "";
	    let class_text_level ;

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

					class_text_level = "text-success";
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

					class_text_level = "text-warning";
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

					class_text_level = "text-danger";
	        	}

		        marker = new google.maps.Marker({
		            position: {lat: parseFloat({{ $item->lat }}) , lng: parseFloat({{ $item->lng }}) },
		            map: map_show_data_officer_all,
		            icon: icon_level,
		        });
		        markers.push(marker);

		        let go_to_help = "{{ $item->go_to_help }}" ;
		        let sp_go_to_help = go_to_help.split(go_to_help , ',');
		        let count_go_to_help = sp_go_to_help.length;

		        let contentString = `

			        <div id="content" style="width: 350px; height: auto;">
				    	<div class="col row" id="bodyContent">
				    		<div class="col-12">
				    			<img src="{{ url('storage')}}/{{ $item->photo_user }}" class="rounded-circle" style="width:70px;height:70px;float:left;margin-right:10px;">
					    		<h5><b>{{ $item->name_officer }}</b></h5>
					    		<span style="font-size: 16px;">ออกเหตุแล้ว : `+count_go_to_help+`</span>
				    		</div>
				    		<div class="col-12">
				    		<hr>
				    			<p style="font-size: 18px;">
				    				<b class="`+class_text_level+`">
				    					{{ $item->level }}</b> | <b>{{ $item->vehicle_type }}
				    				</b>
				    				<br>
					    			<span style="font-size: 15px;">{{ $item->name }}</span>
				    			</p>
				    		</div>
				    	</div>
				    </div>

			    `;
		        
				let infowindow = new google.maps.InfoWindow({
				    content: contentString,
				});

			    infowindow.open({
			      	anchor: marker,
			      	map_show_data_officer_all,
			    });
			}
		@endforeach

		set_map_fit_polygon();

		document.querySelector('#count_officer_all').innerHTML = "{{ count($data_officer_all) }}" ;
    	document.querySelector('#count_officer_ready').innerHTML = count_officer_ready ;
    	document.querySelector('#count_officer_helping').innerHTML = count_officer_helping ;
    	document.querySelector('#count_officer_Not_ready').innerHTML = count_officer_Not_ready ;
		
    }


    function set_map_fit_polygon(){
    	setTimeout(function() {
			// Fit map ให้เหมาะสมกับ Polygon ใหม่
	        polygon.getPath().forEach(function (point) {
	            bounds.extend(point);
	        });
	        map_show_data_officer_all.fitBounds(bounds); 
		}, 700);
    }



</script>

@endsection('content')
