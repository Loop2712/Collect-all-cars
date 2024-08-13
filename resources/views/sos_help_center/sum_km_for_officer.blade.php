@extends('layouts.viicheck_for_officer')

@section('content')

<style>
	body.bg-white {
		background-color: #f0f3f8 !important;
	}

	body,
	html {
		height: 100% !important;
		width: 100% !important;
	}

	.timeline-offilcer {
		background-color: #fff;
		border-radius: 1.5rem;
		padding: 1.5rem;
		display: block;
		position: relative;
		max-width: 700px;
	}

	.timeline-detail-offilcer {
		position: relative;
		display: flex;
		margin-top: 2rem;
		align-items: center;
	}

	.timeline-detail-offilcer i {
		font-size: 1.5rem;
		padding: 0 .7rem;
	}

	.timeline-header {
		font-size: 1.1rem;
		font-weight: bold;
		font-family: 'Mitr', sans-serif;
		position: relative;

	}

	

	.timeline-green {
		color: #3ac47d;
	}

	.timeline-purple {
		color: #5E17EB;
	}

	.timeline-yellow {
		color: #f7b924;
	}

	.timeline-red {
		color: #e15173;
	}

	.timeline-blue {
		color: #3f6ad8;
	}

	.timeline-brown {
		color: #874c48;
	}

	.timeline-lightblue {
		color: #16aaff;
	}

	.timeline-orange {
		color: #f58611;
	}

	
	li span {
		position: relative;
		left: -9px;
	}

	.timeline-detail-offilcer span:first-child {
		font-size: 14px;
		/* order: 3	; */
	}

	/* .timeline-detail-offilcer div span:last-child{
		order: 1	;
	}
	.timeline-detail-offilcer div i{
		order: 2	;
	} */

	.timeline-detail-offilcer i {
		padding-left: 7px;
	}

	@media (max-width: 450px) {
		.timeline-detail-offilcer span:first-child {
		order: 3	;
		margin-left: 5px;
	}

	.timeline-detail-offilcer div span:last-child{
		order: 2	;
	}
	.timeline-detail-offilcer div i{
		order: 1	;
	}
	.timeline-detail-offilcer::before {
		content: "";
		width: 0.3rem;
		height: 100%;
		border-radius: 50rem;
		position: absolute;
		top: 1.8rem;
		left: calc(4.3rem - 52px);
		background-color: #e9ecef;

	}
	.timeline-detail-status {
		position: relative;
		padding-left: calc(7.3rem - 52px);
		text-align: left !important;
	}

	}

	@media (min-width: 450px) {
		.timeline-detail-offilcer::before {
		content: "";
		width: 0.3rem;
		height: 100%;
		border-radius: 50rem;
		position: absolute;
		top: 1.8rem;
		left: calc(4.3rem - 1px);
		background-color: #e9ecef;

	}
	.timeline-detail-status {
		position: relative;
		padding-left: calc(7.3rem - 1px);
		text-align: left !important;
	}

	}
</style>

<div class="d-none">
	<label>รับแจ้ง</label>
	<input class="form-control" type="time" name="time_create_sos" id="time_create_sos" step="2" value="{{ isset($data_form_yellow->time_create_sos) ? $data_form_yellow->time_create_sos : ''}}" readonly>

	<label>สั่งการ</label>
	<input class="form-control" type="time" name="time_command" id="time_command" step="2" value="{{ isset($data_form_yellow->time_command) ? $data_form_yellow->time_command : ''}}" readonly>

	<label>ออกจากฐาน</label>
	<input class="form-control" type="time" name="time_go_to_help" id="time_go_to_help" step="2" value="{{ isset($data_form_yellow->time_go_to_help) ? $data_form_yellow->time_go_to_help : ''}}" readonly>

	<label>ถึงที่เกิดเหตุ</label>
	<input class="form-control" type="time" name="time_to_the_scene" id="time_to_the_scene" step="2" value="{{ isset($data_form_yellow->time_to_the_scene) ? $data_form_yellow->time_to_the_scene : ''}}" readonly>

	<label>ออกจากที่เกิดเหตุ</label>
	<input class="form-control" type="time" name="time_leave_the_scene" id="time_leave_the_scene" step="2" value="{{ isset($data_form_yellow->time_leave_the_scene) ? $data_form_yellow->time_leave_the_scene : ''}}" readonly>

	<label>ถึง รพ.</label>
	<input class="form-control" type="time" name="time_hospital" id="time_hospital" step="2" value="{{ isset($data_form_yellow->time_hospital) ? $data_form_yellow->time_hospital : ''}}" readonly>

	<label>ถึงฐาน</label>
	<input class="form-control" type="time" name="time_to_the_operating_base" id="time_to_the_operating_base" step="2" value="{{ isset($data_form_yellow->time_to_the_operating_base) ? $data_form_yellow->time_to_the_operating_base : ''}}" readonly>
</div>



<!-- /// Timelime /// -->
<div style="min-height: 100dvh;min-width: 100%;max-width: 700px;padding: 25px 10px 10px 10px;">

	<div style="display: flex;justify-content: center;min-width: 100%;">


		<div class="col-12 timeline-offilcer">

			<div id="div_create_sos" class="timeline-detail-offilcer mt-0">
				<span id="time_title_create">
					@if(!empty($data_form_yellow->time_create_sos))
					{{ (\Carbon\Carbon::parse($data_form_yellow->time_create_sos))->format('h:i น.') }}
					@else
					ไม่ได้แจ้ง
					@endif
				</span>
				<i class="fa-solid fa-circle-dot timeline-purple"></i>
				<span class="timeline-header timeline-purple">
					รับแจ้งเหตุ
				</span>
			</div>

			<div id="div_time_command" class="timeline-detail-offilcer d-block d-none">
				<div class="d-flex align-items-center">
					<span id="title_time_command">
						@if(!empty($data_form_yellow->time_command))
						{{ (\Carbon\Carbon::parse($data_form_yellow->time_command))->format('h:i น.') }}
						@else
						ไม่ได้แจ้ง
						@endif
					</span>
					<i class="fa-solid fa-circle-dot timeline-yellow"></i>
					<span class="timeline-header timeline-yellow">
						สั่งการ
					</span>
				</div>
				<ul class="timeline-detail-status m-0 mt-2">
					<li>
						<span>
							ใช้เวลา
							<span class="timeline-purple m-0 p-0" style="left: 0 !important;"> <b> รับแจ้งเหตุ </b></span>
							ถึง
							<span class="timeline-yellow m-0 p-0" style="left: 0 !important;"> <b> สั่งการ </b></span>
							&nbsp;:&nbsp;
							<b class="timeline-red" id="time_create_to_command">...</b>
						</span>
					</li>
				</ul>
			</div>

			<div id="div_time_go_to_help" class="timeline-detail-offilcer d-block d-none">
				<div class="d-flex align-items-center">
					<span id="title_time_go_to_help">
						@if(!empty($data_form_yellow->time_go_to_help))
						{{ (\Carbon\Carbon::parse($data_form_yellow->time_go_to_help))->format('h:i น.') }}
						@else
						ไม่ได้แจ้ง
						@endif
					</span>
					<i class="fa-solid fa-circle-dot timeline-green"></i>
					<span class="timeline-header timeline-green">
						ออกจากฐาน
					</span>
				</div>
				<ul class="timeline-detail-status m-0 mt-2">
					<li>
						<span>
							เลขกิโลเมตร
							<span class="timeline-green m-0 p-0" style="left: 0 !important;"> <b> ออกจากฐาน </b> </span>
							&nbsp;:&nbsp;
							<b class="timeline-red" id="show_kilometer_go_to_help">
								{{ isset($data_form_yellow->km_create_sos_to_go_to_help) ? $data_form_yellow->km_create_sos_to_go_to_help : 'ไม่ได้ระบุ'}} กม.
							</b>
							<input class="form-control d-none" type="number" min="0" name="km_create_sos_to_go_to_help" id="km_create_sos_to_go_to_help" value="{{ isset($data_form_yellow->km_create_sos_to_go_to_help) ? $data_form_yellow->km_create_sos_to_go_to_help : ''}}" onchange="distance_in_no5();" readonly>
						</span>
					</li>
					<li>
						<span>
							ใช้เวลา
							<span class="timeline-yellow m-0 p-0" style="left: 0 !important;"> <b> สั่งการ </b></span>
							ถึง
							<span class="timeline-green m-0 p-0" style="left: 0 !important;"> <b> ออกจากฐาน </b></span>
							&nbsp;:&nbsp;
							<b class="timeline-red" id="time_command_to_go_to_help">...</b>
						</span>
					</li>
				</ul>
			</div>

			<div id="div_time_to_the_scene" class="timeline-detail-offilcer d-block d-none">

				<div class="d-flex align-items-center">
					<span id="title_time_to_the_scene">
						@if(!empty($data_form_yellow->time_to_the_scene))
						{{ (\Carbon\Carbon::parse($data_form_yellow->time_to_the_scene))->format('h:i น.') }}
						@else
						ไม่ได้แจ้ง
						@endif
					</span>
					<i class="fa-solid fa-circle-dot timeline-blue"></i>
					<span class="timeline-header timeline-blue">
						ถึงที่เกิดเหตุ
					</span>
				</div>
				<ul class="timeline-detail-status m-0 mt-2">
					<li>
						<span>
							เลขกิโลเมตร
							<span class="timeline-blue m-0 p-0" style="left: 0 !important;"> <b> ถึงที่เกิดเหตุ </b></span>
							&nbsp;:&nbsp;
							<b class="timeline-red" id="show_kilometer_the_scene">
								{{ isset($data_form_yellow->km_to_the_scene_to_leave_the_scene) ? $data_form_yellow->km_to_the_scene_to_leave_the_scene : 'ไม่ได้ระบุ'}} กม.
							</b>
							<input class="form-control d-none" type="number" min="0" name="km_to_the_scene_to_leave_the_scene" id="km_to_the_scene_to_leave_the_scene" value="{{ isset($data_form_yellow->km_to_the_scene_to_leave_the_scene) ? $data_form_yellow->km_to_the_scene_to_leave_the_scene : ''}}" onchange="distance_in_no5();" readonly>
						</span>
					</li>
					<li>
						<span>
							ระยะทาง
							<span class="timeline-green m-0 p-0" style="left: 0 !important;"> <b> ออกจากฐาน </b></span>
							ถึง
							<span class="timeline-blue m-0 p-0" style="left: 0 !important;"> <b> ที่เกิดเหตุ </b></span>
							&nbsp;:&nbsp;
							<b class="timeline-red" id="distance_go_to_help_to_scene"></b> <b class="timeline-red">กม.</b>
						</span>
					</li>
					<li>
						<span>
							ใช้เวลา
							<span class="timeline-green m-0 p-0" style="left: 0 !important;"> <b> ออกจากฐาน </b></span>
							ถึง
							<span class="timeline-blue m-0 p-0" style="left: 0 !important;"> <b> ที่เกิดเหตุ </b></span>
							&nbsp;:&nbsp;
							<b class="timeline-red" id="time_go_to_help_to_scene">...</b>
						</span>
					</li>
				</ul>
			</div>

			<div id="div_time_leave_the_scene" class="timeline-detail-offilcer d-block d-none">
				<div class="d-flex align-items-center">
					<span id="title_time_leave_the_scene">
						@if(!empty($data_form_yellow->time_leave_the_scene))
						{{(\Carbon\Carbon::parse($data_form_yellow->time_leave_the_scene))->format('h:i น.')}}
						@else
						ไม่ได้แจ้ง
						@endif
					</span>
					<i class="fa-solid fa-circle-dot timeline-lightblue"></i>
					<span class="timeline-header timeline-lightblue">
						ออกจากที่เกิดเหตุ
					</span>
				</div>
				<ul class="timeline-detail-status m-0 mt-2">
					<li>
						<span>
							ใช้เวลา
							<span class="timeline-blue m-0 p-0" style="left: 0 !important;"> <b> จากที่เกิดเหตุ </b></span>
							ถึง
							<span class="timeline-lightblue m-0 p-0" style="left: 0 !important;"> <b> ออกจากที่เกิดเหตุ </b></span>
							&nbsp;:&nbsp;
							<b class="timeline-red" id="time_scene_to_leave_scene">...</b>
						</span>
					</li>
				</ul>
			</div>

			<div id="div_time_hospital" class="timeline-detail-offilcer d-block d-none">
				<div class="d-flex align-items-center">
					<span id="title_time_hospital">
						@if(!empty($data_form_yellow->time_hospital))
						{{ (\Carbon\Carbon::parse($data_form_yellow->time_hospital))->format('h:i น.') }}
						@else
						ไม่ได้แจ้ง
						@endif
					</span>
					<i class="fa-solid fa-circle-dot timeline-brown"></i>
					<span class="timeline-header timeline-brown">
						ถึงโรงพยาบาล
					</span>
				</div>
				<ul class="timeline-detail-status m-0 mt-2">
					<li>
						<span>
							เลขกิโลเมตร
							<span class="timeline-brown m-0 p-0" style="left: 0 !important;"> <b>ถึงโรงพยาบาล</b></span>
							&nbsp;:&nbsp;
							<b class="timeline-red" id="show_kilometer_hospital">
								{{ isset($data_form_yellow->km_hospital) ? $data_form_yellow->km_hospital : 'ไม่ได้ระบุ'}} กม.
							</b>
							<input class="form-control d-none" type="number" min="0" name="km_hospital" id="km_hospital" value="{{ isset($data_form_yellow->km_hospital) ? $data_form_yellow->km_hospital : ''}}" onchange="distance_in_no5();" readonly>
						</span>
					</li>
					<li>
						<span>
							ระยะทาง
							<span class="timeline-lightblue m-0 p-0" style="left: 0 !important;"> <b> ออกจากที่เกิดเหตุ </b></span>
							ถึง
							<span class="timeline-brown m-0 p-0" style="left: 0 !important;"> <b> โรงพยาบาล </b></span>
							&nbsp;:&nbsp;
							<b class="timeline-red" id="distance_leave_scene_to_hospital"></b> <b class="timeline-red">กม.</b>
						</span>
					</li>
					<li>
						<span>
							ใช้เวลา
							<span class="timeline-lightblue m-0 p-0" style="left: 0 !important;"> <b> ออกจากที่เกิดเหตุ </b></span>
							ถึง
							<span class="timeline-brown m-0 p-0" style="left: 0 !important;"> <b> โรงพยาบาล </b></span>
							&nbsp;:&nbsp;
							<b class="timeline-red" id="time_leave_scene_to_hospital">...</b>
						</span>
					</li>
				</ul>
			</div>

			<div id="div_time_to_the_operating_base" class="timeline-detail-offilcer d-block d-none">
				<div class="d-flex align-items-center">
					<span id="title_time_to_the_operating_base">
						@if(!empty($data_form_yellow->time_to_the_operating_base))
						{{ (\Carbon\Carbon::parse($data_form_yellow->time_to_the_operating_base))->format('h:i น.') }}
						@else
						ไม่ได้แจ้ง
						@endif
					</span>
					<i class="fa-solid fa-circle-dot timeline-orange"></i>
					<span class="timeline-header timeline-orange">
						ถึงฐาน
					</span>
				</div>
				<ul class="timeline-detail-status m-0 mt-2">
					<li>
						<span>
							เลขกิโลเมตร
							<span class="timeline-orange m-0 p-0" style="left: 0 !important;"> <b>ถึงฐาน</b></span>
							&nbsp;:&nbsp;
							<b class="timeline-red" id="show_kilometer_operating_base">
								{{ isset($data_form_yellow->km_operating_base) ? $data_form_yellow->km_operating_base : 'ไม่ได้ระบุ'}} กม.
							</b>
							<input class="form-control d-none" type="number" min="0" name="km_operating_base" id="km_operating_base" value="{{ isset($data_form_yellow->km_operating_base) ? $data_form_yellow->km_operating_base : ''}}" onchange="distance_in_no5();" readonly>
						</span>
					</li>
					<li>
						<span>
							ระยะทาง
							<span class="timeline-brown m-0 p-0" style="left: 0 !important;">
								<b id="title_1_return_distance"></b>
							</span>
							ถึง
							<span class="timeline-orange m-0 p-0" style="left: 0 !important;">
								<b>ฐาน</b>
							</span>
							&nbsp;:&nbsp;
							<b class="timeline-red" id="text_distance_title_1"></b> <b class="timeline-red">กม.</b>
						</span>
					</li>
					<li>
						<span>
							ใช้เวลา
							<span class="timeline-brown m-0 p-0 " style="left: 0 !important;">
								<b id="text_time_title_2"></b>
							</span>
							ถึง
							<span class="timeline-orange m-0 p-0 " style="left: 0 !important;">
								<b>ฐาน</b>
							</span>
							&nbsp;:&nbsp;
							<b class="timeline-red" id="time_title_2">...</b>
						</span>
					</li>
				</ul>
			</div>

			<br><br>
			<div id="sum_time_and_distance" class="d-none">
				<span class="timeline-header m-0 p-0 " style="left: 0 !important;">
					<b>รวม</b> ใช้เวลาในการช่วยเหลือ &nbsp;:&nbsp; <b class="timeline-red" id="time_total_help"></b>
				</span>
				<hr>
				<span>
					ใช้เวลา
					<span class="timeline-header timeline-green">
						ออกจากฐาน
					</span>
					ถึง
					<span class="timeline-header timeline-orange">
						กลับถึงฐาน
					</span>
					&nbsp;:&nbsp;
					<b class="timeline-red" id="time_go_to_help_to_base">...</b>
					<br>
					เป็นระยะทางทั้งหมด
					&nbsp;:&nbsp;
					<b class="timeline-red" id="distance_total_help"></b>
					<b class="timeline-red">กม.</b>
				</span>
			</div>
			<hr>
			<div class="row d-flex justify-content-center mt-3 mb-3">
				<a id="tag_a_switch_standby" href="{{ url('/officers/switch_standby') }}" class="btn btn-success" style="width:65%;border-radius: 50px;">
					ไปยังหน้าเปิดสถานะ
				</a>
			</div>
		</div>
	</div>

</div>






<script>
	document.addEventListener('DOMContentLoaded', (event) => {
		// console.log("START");
		distance_in_no5();
	});


	function time_in_no5() {

		let time_create_sos = document.querySelector('[name="time_create_sos"]');
		let time_command = document.querySelector('[name="time_command"]');
		let time_go_to_help = document.querySelector('[name="time_go_to_help"]');
		let time_to_the_scene = document.querySelector('[name="time_to_the_scene"]');
		let time_leave_the_scene = document.querySelector('[name="time_leave_the_scene"]');
		let time_hospital = document.querySelector('[name="time_hospital"]');
		let time_to_the_operating_base = document.querySelector('[name="time_to_the_operating_base"]');
		// ------------------------------------------------------------------------------------------------//

		if (time_create_sos.value) {
			document.querySelector('#div_create_sos').classList.remove('d-none');
		}
		if (time_command.value) {
			document.querySelector('#div_time_command').classList.remove('d-none');
			document.querySelector('#title_time_command').innerHTML = time_command.value.slice(0, 5) + " น.";
			tab_content_h100();
		}
		if (time_go_to_help.value) {
			document.querySelector('#div_time_go_to_help').classList.remove('d-none');
			document.querySelector('#title_time_go_to_help').innerHTML = time_go_to_help.value.slice(0, 5) + " น.";
			tab_content_h100();
		}
		if (time_to_the_scene.value) {
			document.querySelector('#div_time_to_the_scene').classList.remove('d-none');
			document.querySelector('#title_time_to_the_scene').innerHTML = time_to_the_scene.value.slice(0, 5) + " น.";
			tab_content_h100();
		}
		if (time_leave_the_scene.value) {
			document.querySelector('#div_time_leave_the_scene').classList.remove('d-none');
			document.querySelector('#title_time_leave_the_scene').innerHTML = time_leave_the_scene.value.slice(0, 5) + " น.";
			tab_content_h100();
		}
		if (time_hospital.value) {
			document.querySelector('#div_time_hospital').classList.remove('d-none');
			document.querySelector('#title_time_hospital').innerHTML = time_hospital.value.slice(0, 5) + " น.";
			tab_content_h100();
		}
		if (time_to_the_operating_base.value) {
			document.querySelector('#div_time_to_the_operating_base').classList.remove('d-none');
			document.querySelector('#title_time_to_the_operating_base').innerHTML = time_to_the_operating_base.value.slice(0, 5) + " น.";
			tab_content_h100();
		}
		if (time_leave_the_scene.value || time_hospital.value) {
			document.querySelector('#sum_time_and_distance').classList.remove('d-none');
		}

		// ------------------------------------------------------------------------------------------------//

		let time_total_help = [];
		let time_go_to_help_to_base = [];

		// ---------------------- รับแจ้งเหตุ ถึง สั่งการ ---------------------- //
		let calculate_time_create = time_create_sos.value;
		let calculate_time_command = time_command.value;

		if (calculate_time_create && calculate_time_command) {
			// Extract the hours, minutes, and seconds from the two times
			let [create_to_command_hours1, create_to_command_minutes1, create_to_command_seconds1] = calculate_time_create.split(":");
			let [create_to_command_hours2, create_to_command_minutes2, create_to_command_seconds2] = calculate_time_command.split(":");
			// Convert the hours, minutes, and seconds to the total number of seconds
			let create_to_command_totalSeconds1 = parseInt(create_to_command_hours1) * 3600 + parseInt(create_to_command_minutes1) * 60 + parseInt(create_to_command_seconds1);
			let create_to_command_totalSeconds2 = parseInt(create_to_command_hours2) * 3600 + parseInt(create_to_command_minutes2) * 60 + parseInt(create_to_command_seconds2);
			// Calculate the time difference in seconds
			let create_to_command_TotalSeconds = create_to_command_totalSeconds2 - create_to_command_totalSeconds1;
			// console.log('TotalSeconds >> ' + TotalSeconds);
			let create_to_command_Time_min = Math.floor(create_to_command_TotalSeconds / 60);
			// console.log('Time_min >> ' + Time_min);
			let create_to_command_Time_Seconds = create_to_command_TotalSeconds - (create_to_command_Time_min * 60);
			// console.log('Time_Seconds >> ' + Time_Seconds);
			let time_create_to_command;

			if (create_to_command_Time_Seconds === 0) {
				time_create_to_command = create_to_command_Time_min + " นาที";
			} else if (create_to_command_Time_min === 0) {
				time_create_to_command = create_to_command_Time_Seconds + " วินาที";
			} else {
				time_create_to_command = create_to_command_Time_min + " นาที " + create_to_command_Time_Seconds + " วินาที";
			}
			// console.log('ระยะห่าง >> ' + time_create_to_command + " นาที");

			if (time_create_to_command != 0) {
				document.querySelector('#time_create_to_command').innerHTML = time_create_to_command;
			}

			let min_create_to_command_to_sec = create_to_command_Time_min * 60;
			time_total_help[0] = min_create_to_command_to_sec + create_to_command_Time_Seconds;
		}
		// ---------------------- จบ รับแจ้งเหตุ ถึง สั่งการ ---------------------- //

		// ---------------------- สั่งการ ถึง ออกจากฐาน ---------------------- //
		let calculate_time_go_to_help = time_go_to_help.value;

		if (calculate_time_command && calculate_time_go_to_help) {
			// Extract the hours, minutes, and seconds from the two times
			let [command_to_go_to_help_hours1, command_to_go_to_help_minutes1, command_to_go_to_help_seconds1] = calculate_time_command.split(":");
			let [command_to_go_to_help_hours2, command_to_go_to_help_minutes2, command_to_go_to_help_seconds2] = calculate_time_go_to_help.split(":");
			// Convert the hours, minutes, and seconds to the total number of seconds
			let command_to_go_to_help_totalSeconds1 = parseInt(command_to_go_to_help_hours1) * 3600 + parseInt(command_to_go_to_help_minutes1) * 60 + parseInt(command_to_go_to_help_seconds1);
			let command_to_go_to_help_totalSeconds2 = parseInt(command_to_go_to_help_hours2) * 3600 + parseInt(command_to_go_to_help_minutes2) * 60 + parseInt(command_to_go_to_help_seconds2);
			// Calculate the time difference in seconds
			let command_to_go_to_help_TotalSeconds = command_to_go_to_help_totalSeconds2 - command_to_go_to_help_totalSeconds1;
			// console.log('TotalSeconds >> ' + TotalSeconds);
			let command_to_go_to_help_Time_min = Math.floor(command_to_go_to_help_TotalSeconds / 60);
			// console.log('Time_min >> ' + Time_min);
			let command_to_go_to_help_Time_Seconds = command_to_go_to_help_TotalSeconds - (command_to_go_to_help_Time_min * 60);
			// console.log('Time_Seconds >> ' + Time_Seconds);
			let time_command_to_go_to_help;

			if (command_to_go_to_help_Time_Seconds === 0) {
				time_command_to_go_to_help = command_to_go_to_help_Time_min + " นาที";
			} else if (command_to_go_to_help_Time_min === 0) {
				time_command_to_go_to_help = command_to_go_to_help_Time_Seconds + " วินาที";
			} else {
				time_command_to_go_to_help = command_to_go_to_help_Time_min + " นาที " + command_to_go_to_help_Time_Seconds + " วินาที";
			}
			// console.log('ระยะห่าง >> ' + time_command_to_go_to_help + " นาที");

			if (time_command_to_go_to_help != 0) {
				document.querySelector('#time_command_to_go_to_help').innerHTML = time_command_to_go_to_help;
			}

			let min_command_to_go_to_help_to_sec = command_to_go_to_help_Time_min * 60;
			time_total_help[1] = min_command_to_go_to_help_to_sec + command_to_go_to_help_Time_Seconds;
		}
		// ---------------------- จบ สั่งการ ถึง ออกจากฐาน ---------------------- //


		// ---------------------- ออกจากฐาน ถึง ที่เกิดเหตุ ---------------------- //
		let calculate_time_to_the_scene = time_to_the_scene.value;

		if (calculate_time_go_to_help && calculate_time_to_the_scene) {
			// Extract the hours, minutes, and seconds from the two times
			let [go_to_help_to_scene_hours1, go_to_help_to_scene_minutes1, go_to_help_to_scene_seconds1] = calculate_time_go_to_help.split(":");
			let [go_to_help_to_scene_hours2, go_to_help_to_scene_minutes2, go_to_help_to_scene_seconds2] = calculate_time_to_the_scene.split(":");
			// Convert the hours, minutes, and seconds to the total number of seconds
			let go_to_help_to_scene_totalSeconds1 = parseInt(go_to_help_to_scene_hours1) * 3600 + parseInt(go_to_help_to_scene_minutes1) * 60 + parseInt(go_to_help_to_scene_seconds1);
			let go_to_help_to_scene_totalSeconds2 = parseInt(go_to_help_to_scene_hours2) * 3600 + parseInt(go_to_help_to_scene_minutes2) * 60 + parseInt(go_to_help_to_scene_seconds2);
			// Calculate the time difference in seconds
			let go_to_help_to_scene_TotalSeconds = go_to_help_to_scene_totalSeconds2 - go_to_help_to_scene_totalSeconds1;
			// console.log('TotalSeconds >> ' + TotalSeconds);
			let go_to_help_to_scene_Time_min = Math.floor(go_to_help_to_scene_TotalSeconds / 60);
			// console.log('Time_min >> ' + Time_min);
			let go_to_help_to_scene_Time_Seconds = go_to_help_to_scene_TotalSeconds - (go_to_help_to_scene_Time_min * 60);
			// console.log('Time_Seconds >> ' + Time_Seconds);
			let time_go_to_help_to_scene;

			if (go_to_help_to_scene_Time_Seconds === 0) {
				time_go_to_help_to_scene = go_to_help_to_scene_Time_min + " นาที";
			} else if (go_to_help_to_scene_Time_min === 0) {
				time_go_to_help_to_scene = go_to_help_to_scene_Time_Seconds + " วินาที";
			} else {
				time_go_to_help_to_scene = go_to_help_to_scene_Time_min + " นาที " + go_to_help_to_scene_Time_Seconds + " วินาที";
			}
			// console.log('ระยะห่าง >> ' + time_go_to_help_to_scene + " นาที");

			if (time_go_to_help_to_scene != 0) {
				document.querySelector('#time_go_to_help_to_scene').innerHTML = time_go_to_help_to_scene;
			}

			let min_go_to_help_to_scene_to_sec = go_to_help_to_scene_Time_min * 60;
			time_total_help[2] = min_go_to_help_to_scene_to_sec + go_to_help_to_scene_Time_Seconds;

			time_go_to_help_to_base[0] = min_go_to_help_to_scene_to_sec + go_to_help_to_scene_Time_Seconds;
		}
		// ---------------------- จบ ออกจากฐาน ถึง ที่เกิดเหตุ ---------------------- //


		// ---------------------- ที่เกิดเหตุ ถึง ออกจากที่เกิดเหตุ ---------------------- //
		let calculate_time_leave_the_scene = time_leave_the_scene.value;

		if (calculate_time_to_the_scene && calculate_time_leave_the_scene) {
			// Extract the hours, minutes, and seconds from the two times
			let [scene_to_leave_scene_hours1, scene_to_leave_scene_minutes1, scene_to_leave_scene_seconds1] = calculate_time_to_the_scene.split(":");
			let [scene_to_leave_scene_hours2, scene_to_leave_scene_minutes2, scene_to_leave_scene_seconds2] = calculate_time_leave_the_scene.split(":");
			// Convert the hours, minutes, and seconds to the total number of seconds
			let scene_to_leave_scene_totalSeconds1 = parseInt(scene_to_leave_scene_hours1) * 3600 + parseInt(scene_to_leave_scene_minutes1) * 60 + parseInt(scene_to_leave_scene_seconds1);
			let scene_to_leave_scene_totalSeconds2 = parseInt(scene_to_leave_scene_hours2) * 3600 + parseInt(scene_to_leave_scene_minutes2) * 60 + parseInt(scene_to_leave_scene_seconds2);
			// Calculate the time difference in seconds
			let scene_to_leave_scene_TotalSeconds = scene_to_leave_scene_totalSeconds2 - scene_to_leave_scene_totalSeconds1;
			// console.log('TotalSeconds >> ' + TotalSeconds);
			let scene_to_leave_scene_Time_min = Math.floor(scene_to_leave_scene_TotalSeconds / 60);
			// console.log('Time_min >> ' + Time_min);
			let scene_to_leave_scene_Time_Seconds = scene_to_leave_scene_TotalSeconds - (scene_to_leave_scene_Time_min * 60);
			// console.log('Time_Seconds >> ' + Time_Seconds);
			let time_scene_to_leave_scene;

			if (scene_to_leave_scene_Time_Seconds === 0) {
				time_scene_to_leave_scene = scene_to_leave_scene_Time_min + " นาที";
			} else if (scene_to_leave_scene_Time_min === 0) {
				time_scene_to_leave_scene = scene_to_leave_scene_Time_Seconds + " วินาที";
			} else {
				time_scene_to_leave_scene = scene_to_leave_scene_Time_min + " นาที " + scene_to_leave_scene_Time_Seconds + " วินาที";
			}
			// console.log('ระยะห่าง >> ' + time_scene_to_leave_scene + " นาที");

			if (time_scene_to_leave_scene != 0) {
				document.querySelector('#time_scene_to_leave_scene').innerHTML = time_scene_to_leave_scene;
			}

			let min_scene_to_leave_scene_to_sec = scene_to_leave_scene_Time_min * 60;
			time_total_help[3] = min_scene_to_leave_scene_to_sec + scene_to_leave_scene_Time_Seconds;

			time_go_to_help_to_base[1] = min_scene_to_leave_scene_to_sec + scene_to_leave_scene_Time_Seconds;
		}
		// ---------------------- จบ ที่เกิดเหตุ ถึง ออกจากที่เกิดเหตุ ---------------------- //


		// ---------------------- ออกจากที่เกิดเหตุ ถึง โรงพยาบาล ---------------------- //
		let calculate_time_hospital = time_hospital.value;

		if (calculate_time_leave_the_scene && calculate_time_hospital) {
			// Extract the hours, minutes, and seconds from the two times
			let [leave_scene_to_hospital_hours1, leave_scene_to_hospital_minutes1, leave_scene_to_hospital_seconds1] = calculate_time_leave_the_scene.split(":");
			let [leave_scene_to_hospital_hours2, leave_scene_to_hospital_minutes2, leave_scene_to_hospital_seconds2] = calculate_time_hospital.split(":");
			// Convert the hours, minutes, and seconds to the total number of seconds
			let leave_scene_to_hospital_totalSeconds1 = parseInt(leave_scene_to_hospital_hours1) * 3600 + parseInt(leave_scene_to_hospital_minutes1) * 60 + parseInt(leave_scene_to_hospital_seconds1);
			let leave_scene_to_hospital_totalSeconds2 = parseInt(leave_scene_to_hospital_hours2) * 3600 + parseInt(leave_scene_to_hospital_minutes2) * 60 + parseInt(leave_scene_to_hospital_seconds2);
			// Calculate the time difference in seconds
			let leave_scene_to_hospital_TotalSeconds = leave_scene_to_hospital_totalSeconds2 - leave_scene_to_hospital_totalSeconds1;
			// console.log('TotalSeconds >> ' + TotalSeconds);
			let leave_scene_to_hospital_Time_min = Math.floor(leave_scene_to_hospital_TotalSeconds / 60);
			// console.log('Time_min >> ' + Time_min);
			let leave_scene_to_hospital_Time_Seconds = leave_scene_to_hospital_TotalSeconds - (leave_scene_to_hospital_Time_min * 60);
			// console.log('Time_Seconds >> ' + Time_Seconds);
			let time_leave_scene_to_hospital;

			if (leave_scene_to_hospital_Time_Seconds === 0) {
				time_leave_scene_to_hospital = leave_scene_to_hospital_Time_min + " นาที";
			} else if (leave_scene_to_hospital_Time_min === 0) {
				time_leave_scene_to_hospital = leave_scene_to_hospital_Time_Seconds + " วินาที";
			} else {
				time_leave_scene_to_hospital = leave_scene_to_hospital_Time_min + " นาที " + leave_scene_to_hospital_Time_Seconds + " วินาที";
			}
			// console.log('ระยะห่าง >> ' + time_leave_scene_to_hospital + " นาที");

			if (time_leave_scene_to_hospital != 0) {
				document.querySelector('#time_leave_scene_to_hospital').innerHTML = time_leave_scene_to_hospital;
			}

			let min_leave_scene_to_hospital_to_sec = leave_scene_to_hospital_Time_min * 60;
			time_total_help[4] = min_leave_scene_to_hospital_to_sec + leave_scene_to_hospital_Time_Seconds;

			time_go_to_help_to_base[2] = min_leave_scene_to_hospital_to_sec + leave_scene_to_hospital_Time_Seconds;
		}
		// ---------------------- จบ ออกจากที่เกิดเหตุ ถึง โรงพยาบาล ---------------------- //


		// ---------------------- เวลากลับฐาน ---------------------- //
		let calculate_go_to_base_from;
		let text_time_title_2;
		let class_color_title_2;

		if (calculate_time_hospital) {
			calculate_go_to_base_from = calculate_time_hospital;
			text_time_title_2 = "รพ.";
			class_color_title_2 = "timeline-brown";
		} else if (calculate_time_leave_the_scene) {
			calculate_go_to_base_from = calculate_time_leave_the_scene;
			text_time_title_2 = "ออกจากที่เกิดเหตุ";
			class_color_title_2 = "timeline-lightblue";
		}

		document.querySelector('#text_time_title_2').innerHTML = text_time_title_2;
		document.querySelector('#text_time_title_2').classList.add(class_color_title_2);

		let calculate_time_to_the_operating_base = time_to_the_operating_base.value;

		if (calculate_go_to_base_from && calculate_time_to_the_operating_base) {
			// Extract the hours, minutes, and seconds from the two times
			let [time_title_2_hours1, time_title_2_minutes1, time_title_2_seconds1] = calculate_go_to_base_from.split(":");
			let [time_title_2_hours2, time_title_2_minutes2, time_title_2_seconds2] = calculate_time_to_the_operating_base.split(":");
			// Convert the hours, minutes, and seconds to the total number of seconds
			let time_title_2_totalSeconds1 = parseInt(time_title_2_hours1) * 3600 + parseInt(time_title_2_minutes1) * 60 + parseInt(time_title_2_seconds1);
			let time_title_2_totalSeconds2 = parseInt(time_title_2_hours2) * 3600 + parseInt(time_title_2_minutes2) * 60 + parseInt(time_title_2_seconds2);
			// Calculate the time difference in seconds
			let time_title_2_TotalSeconds = time_title_2_totalSeconds2 - time_title_2_totalSeconds1;
			// console.log('TotalSeconds >> ' + TotalSeconds);
			let time_title_2_Time_min = Math.floor(time_title_2_TotalSeconds / 60);
			// console.log('Time_min >> ' + Time_min);
			let time_title_2_Time_Seconds = time_title_2_TotalSeconds - (time_title_2_Time_min * 60);
			// console.log('Time_Seconds >> ' + Time_Seconds);
			let time_time_title_2;

			if (time_title_2_Time_Seconds === 0) {
				time_time_title_2 = time_title_2_Time_min + " นาที";
			} else if (time_title_2_Time_min === 0) {
				time_time_title_2 = time_title_2_Time_Seconds + " วินาที";
			} else {
				time_time_title_2 = time_title_2_Time_min + " นาที " + time_title_2_Time_Seconds + " วินาที";
			}
			// console.log('ระยะห่าง >> ' + time_time_title_2 + " นาที");

			if (time_time_title_2 != 0) {
				document.querySelector('#time_title_2').innerHTML = time_time_title_2;
			}

			let min_time_title_2_to_sec = time_title_2_Time_min * 60;
			time_go_to_help_to_base[3] = min_time_title_2_to_sec + time_title_2_Time_Seconds;
		}
		// ---------------------- จบ เวลาทางกลับฐาน ---------------------- //


		// ---------------------- TIME time_total_help ---------------------- //

		// console.log(time_total_help.length);
		let sum_time_total_help = 0;

		time_total_help.forEach(
			element => sum_time_total_help += element
		);

		let class_sum_time_total_help;

		if (sum_time_total_help < 480) {
			class_sum_time_total_help = "text-success";
		} else if (sum_time_total_help >= 480 && sum_time_total_help < 720) {
			class_sum_time_total_help = "text-warning";
		} else if (sum_time_total_help >= 720) {
			class_sum_time_total_help = "text-danger";
		}

		let hours_time_total_help = Math.floor(sum_time_total_help / 3600);
		let minutes_time_total_help = Math.floor((sum_time_total_help % 3600) / 60);
		let seconds_time_total_help = Math.floor(sum_time_total_help % 60);

		let text_time_total_help = '';

		if (hours_time_total_help > 0) {
			text_time_total_help += `${hours_time_total_help} ชั่วโมง${hours_time_total_help > 1 ? '' : ''} `;
		}
		text_time_total_help += `${minutes_time_total_help} นาที${minutes_time_total_help > 1 ? '' : ''} `;
		text_time_total_help += `${seconds_time_total_help} วินาที${seconds_time_total_help > 1 ? '' : ''}`;

		document.querySelector('#time_total_help').innerHTML = text_time_total_help;
		document.querySelector('#time_total_help').classList.add(class_sum_time_total_help);
		// ---------------------- END TIME time_total_help ---------------------- //


		// ---------------------- TIME time_go_to_help_to_base ---------------------- //

		let sum_time_go_to_help_to_base = 0;

		time_go_to_help_to_base.forEach(
			element_2 => sum_time_go_to_help_to_base += element_2
		);

		let hours_time_go_to_help_to_base = Math.floor(sum_time_go_to_help_to_base / 3600);
		let minutes_time_go_to_help_to_base = Math.floor((sum_time_go_to_help_to_base % 3600) / 60);
		let seconds_time_go_to_help_to_base = Math.floor(sum_time_go_to_help_to_base % 60);

		let text_time_go_to_help_to_base = '';

		if (hours_time_go_to_help_to_base > 0) {
			text_time_go_to_help_to_base += `${hours_time_go_to_help_to_base} ชั่วโมง${hours_time_go_to_help_to_base > 1 ? '' : ''} `;
		}
		text_time_go_to_help_to_base += `${minutes_time_go_to_help_to_base} นาที${minutes_time_go_to_help_to_base > 1 ? '' : ''} `;
		text_time_go_to_help_to_base += `${seconds_time_go_to_help_to_base} วินาที${seconds_time_go_to_help_to_base > 1 ? '' : ''}`;

		document.querySelector('#time_go_to_help_to_base').innerHTML = text_time_go_to_help_to_base;
		// ---------------------- ENDTIME time_go_to_help_to_base ---------------------- //
	}

	function distance_in_no5() {
		let num_km_1 = 0;
		let num_km_2 = 0;
		let num_km_3 = 0;
		let num_km_4 = 0;

		let distance_total_help = 0;

		let km_create_sos_to_go_to_help = document.querySelector('#km_create_sos_to_go_to_help');
		if (km_create_sos_to_go_to_help.value) {
			num_km_1 = km_create_sos_to_go_to_help.value;
			document.querySelector('#show_kilometer_go_to_help').innerHTML = num_km_1 + " กม.";
		}
		let km_to_the_scene_to_leave_the_scene = document.querySelector('#km_to_the_scene_to_leave_the_scene');
		if (km_to_the_scene_to_leave_the_scene.value) {
			num_km_2 = km_to_the_scene_to_leave_the_scene.value;
			document.querySelector('#show_kilometer_the_scene').innerHTML = num_km_2 + " กม.";
		}
		let km_hospital = document.querySelector('#km_hospital');
		if (km_hospital.value) {
			num_km_3 = km_hospital.value;
			document.querySelector('#show_kilometer_hospital').innerHTML = num_km_3 + " กม.";
		}
		let km_operating_base = document.querySelector('#km_operating_base');
		if (km_operating_base.value) {
			num_km_4 = km_operating_base.value;
			document.querySelector('#show_kilometer_operating_base').innerHTML = num_km_4 + " กม.";
		}

		// ------------------------------- รวมระยะ ออกจากฐาน ถึง ที่เกิดเหตุ ---------------------------------------//
		let distance_go_to_help_to_scene = 0;

		distance_go_to_help_to_scene = parseFloat(num_km_2) - parseFloat(num_km_1);
		distance_total_help = parseFloat(distance_total_help) + parseFloat(distance_go_to_help_to_scene);

		if (parseFloat(num_km_1) === 0 || parseFloat(num_km_2) === 0) {
			document.querySelector('#distance_go_to_help_to_scene').innerHTML = '0';
		} else {
			document.querySelector('#distance_go_to_help_to_scene').innerHTML = distance_go_to_help_to_scene.toFixed(2);
		}
		// ------------------------------- จบ รวมระยะ ออกจากฐาน ถึง ที่เกิดเหตุ ---------------------------------------//


		// ------------------------------- ระยะ ที่เกิดเหตุ ถึง รพ ---------------------------------------//
		let distance_leave_scene_to_hospital = 0;

		if (num_km_3) {
			distance_leave_scene_to_hospital = parseFloat(num_km_3) - parseFloat(num_km_2);
			distance_total_help = parseFloat(distance_total_help) + parseFloat(distance_leave_scene_to_hospital);
		}

		if (!num_km_3 && parseFloat(num_km_2) === 0 || parseFloat(num_km_3) === 0) {
			document.querySelector('#distance_leave_scene_to_hospital').innerHTML = '0';
		} else {
			document.querySelector('#distance_leave_scene_to_hospital').innerHTML = distance_leave_scene_to_hospital.toFixed(2);
		}
		// ------------------------------- จบ ที่เกิดเหตุ ถึง รพ ---------------------------------------//

		// ------------------------------- รวมระยะทางกลับ ---------------------------------------//
		let text_distance_title_1 = 0;

		let num_title_1;
		let text_title_1;

		if (num_km_3) {
			num_title_1 = num_km_3;
			text_title_1 = " รพ.";
		} else if (!num_km_3 && num_km_2) {
			num_title_1 = num_km_2;
			text_title_1 = " ที่เกิดเหตุ";
		}

		document.querySelector('#title_1_return_distance').innerHTML = text_title_1;
		text_distance_title_1 = parseFloat(num_km_4) - parseFloat(num_title_1);
		distance_total_help = parseFloat(distance_total_help) + parseFloat(text_distance_title_1);

		if (parseFloat(num_title_1) === 0 || parseFloat(num_km_4) === 0) {
			document.querySelector('#text_distance_title_1').innerHTML = '0';
		} else {
			document.querySelector('#text_distance_title_1').innerHTML = text_distance_title_1.toFixed(2);
		}
		// ------------------------------- จบ รวมระยะทางกลับ ---------------------------------------//


		document.querySelector('#distance_total_help').innerHTML = parseFloat(distance_total_help).toFixed(2);

		time_in_no5();
	}
</script>
<script>
	function tab_content_h100() {
		$('.tab-content').height('100%');
	}
</script>
@endsection