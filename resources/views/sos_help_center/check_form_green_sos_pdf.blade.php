

<!--favicon-->
<link rel="shortcut icon" href="{{ asset('/img/logo/logo_x-icon.png') }}" type="image/x-icon" />

<style>
    /* กำหนดขอบในส่วนของเนื้อหา */
    body {
		font-family: "THSarabun";

        margin: 0; /* ไม่มีขอบเพิ่มเติมในส่วนของเนื้อหา */
    }

    /* ส่วนอื่น ๆ ที่ต้องการกำหนด */
    /* ... */
</style>

<style>
	.py-0{
		padding-top: 0;
		padding-bottom: 0;
	}.under-line{
		text-decoration-line: underline;
	}
	.my-0{
		margin-top: 0;
		margin-bottom: 0;
	}.mb-0{
		margin-bottom: 0;
	}.border{
		border: 1px solid #000;
		margin: 0;
		padding: 0;
	} 
</style>
@php
	if($sos_help_center->form_color_name == "green"){
		$data_color = $data_form;
	}elseif($sos_help_center->form_color_name == "blue"){
		$data_color = $sos_help_center->form_blue;
	}elseif($sos_help_center->form_color_name == "pink"){
		$data_color = $sos_help_center->form_pink;
	}
@endphp
<div style='text-align:center;margin:0; margin-top:50px'>
	<span style="font-size: 19px;font-weight: bolder;"><b>แบบบันทึกการรับแจ้งเหตุและสั่งการการแพทย์ฉุกเฉินระดับสูง</b></span>
</div>
<!-- {{$sos_help_center}} -->
<table width="100%" style="padding-left: 10px;" class="my-0">
	<tr >
		<td width="10%">
			<span ><b>๑.ข้อมูลทั่วไป</b></span>
		</td>
		<td width="20%" >
			<span >ลำดับผู้ป่วย (CN)</span>
		</td>
		<td width="20%" >
			<span >เลขที่ผู้ป่วย</span>
		</td>
	</tr>

</table>
<!-- <img src="{{ url('storage')}}/{{ Auth::user()->photo }}" alt="" width="60px" height="50px" > -->
<!-- <ul>asdf</ul> -->
<!-- <p style="position: absolute;top:10%;white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;  width: 100%; background-color: #000;">asdas</p> -->
<div width="100%" class="border">


	<table width="100%" cellpadding="10" style="font-size: 13.5px;"  class="my-0">
		<tr>
			<td class="py-0" ><b>ชื่อหน่วยปฏิบัติการ</b> 
					@php
						$operating_officer_name = mb_strimwidth($sos_help_center->operating_unit->name, 0,80, '...');
					@endphp
				<span align="center" class="under-line text-center">{{ $operating_officer_name}}</span>
			</td>
			<td class="py-0">วันที่ 
				<span class="under-line">{{ thaidate("j F Y" , strtotime($sos_help_center->created_at)) }}</span>
			</td>
			<td class="py-0">เลขที่ปฎิบัติการ
				<span class="under-line">{{$sos_help_center->operating_code}}</span>
			</td>
		</tr>

		
		<!-- <tr >
			<td class="py-0" colspan="4">
			<span style="background-color: #fff;width: 100%;">
				สถานที่ที่เกิดเหตุ
			</span>
			@php

			$maxWidth_location = 145; // ความยาวสูงสุดที่ต้องการ

			$maxWidth_location = mb_strimwidth($sos_help_center->form_yellow->location_sos, 0, $maxWidth_location, '...');

			@endphp
			<span width="100%" style="background-color: #fff;width: 100%;">{{$maxWidth_location}}</span>
			</td>
		</tr> -->
	</table>
	<table style="font-size: 13.5px;padding-left: 10px;" colspan="9" width="100%">
		<tr class="my-0">
			<td colspan="1" class="py-0"><b>เจ้าหน้าที่ผู้ให้บริการ</b></td>
			<td colspan="3" class="py-0">1.{{$sos_help_center->operating_officer->name_officer}}</td>
			<td colspan="1" class="py-0">รหัส {{$data_form->id_helper_1}}</td>
			<td colspan="3" class="py-0">2.{{$data_form->name_helper_2}}</td>
			<td colspan="1" class="py-0">รหัส {{$data_form->id_helper_2}}</td>
		</tr>
		<tr class="my-0">
			<td colspan="1" class="py-0"></td>
			<td colspan="3" class="py-0">3.{{$data_form->name_helper_3}}</td>
			<td colspan="1" class="py-0">รหัส {{$data_form->id_helper_3}}</td>
			<td colspan="3" class="py-0">4.{{$data_form->name_helper_4}}</td>
			<td colspan="1" class="py-0">รหัส {{$data_form->id_helper_4}}</td>
		</tr>

		<tr class="my-0">
			<td colspan="1" class="py-0"><b>ผลการปฎิบัติงาน</b></td>
			<td colspan="3" class="py-0">
				<input type="radio" name="" id="" @if($data_color->help_result == "ไม่พบเหตุ") checked="" @endif>ไม่พบเหตุ
				&nbsp;<input type="radio" name="" id="" @if($data_color->help_result == "พบเหตุ") checked="" @endif>พบเหตุ
			</td>
			@php
			
				$detail_location_sos = mb_strimwidth($data_form->location_sos, 0,40, '...');
				$symptom_other = mb_strimwidth($data_form->symptom, 0,40, '...');
			@endphp
			<td colspan="2" class="py-0">สถานที่เกิดเหตุ {{$detail_location_sos}}</td>
			<td colspan="2" class="py-0">เหตุการณ์ {{$symptom_other}}</td>
		</tr>
	</table>
</div>
<p style="padding-left: 15px;margin-bottom: 2px;"  class="my-0"><b>๒. ข้อมูลเวลา</b></p>
<table width="100%" style="border: 1px solid #000;font-size: 11px;padding: 0;border-spacing: -1px;">
	<tr style="padding: 0;">
		<th class="border"></th>
		<th class="border">รับแจ้ง</th>
		<th class="border">สั่งการ</th>
		<th class="border">ออกจากฐาน</th>
		<th class="border">ถึงที่เกิดเหตุ</th>
		<th class="border">ออกจากที่เกิดเหตุ</th>
		<th class="border">ถึงรพ.</th>
		<th class="border">ถึงฐาน</th>
	</tr>
	

	<tr>
		<td class="border">&nbsp;เวลา น.</td>
		<td class="border" align="center">
			{{ thaidate("j-N-Y" , strtotime($sos_help_center->created_at)) }} <br>
			{{ isset($sos_help_center->time_create_sos) ? \Carbon\Carbon::parse($sos_help_center->time_create_sos)->format('H:i น.') : '' }}
		</td>
		<td class="border" align="center">
			{{ thaidate("j-N-Y" , strtotime($sos_help_center->time_command)) }} <br>
			{{ isset($sos_help_center->time_command) ? \Carbon\Carbon::parse($sos_help_center->time_command)->format('H:i น.') : '' }}
		</td>
		<td class="border" align="center">
			{{ thaidate("j-N-Y" , strtotime($sos_help_center->time_go_to_help)) }} <br>
			{{ isset($sos_help_center->time_go_to_help) ? \Carbon\Carbon::parse($sos_help_center->time_go_to_help)->format('H:i น.') : '' }}
		</td>
		<td class="border" align="center">
			{{ thaidate("j-N-Y" , strtotime($sos_help_center->time_to_the_scene)) }} <br>
			{{ isset($sos_help_center->time_to_the_scene) ? \Carbon\Carbon::parse($sos_help_center->time_to_the_scene)->format('H:i น.') : '' }}
		</td>
		<td class="border" align="center">
			{{ thaidate("j-N-Y" , strtotime($sos_help_center->time_leave_the_scene)) }} <br>
			{{ isset($sos_help_center->time_leave_the_scene) ? \Carbon\Carbon::parse($sos_help_center->time_leave_the_scene)->format('H:i น.') : '' }}
		</td>
		<td class="border" align="center">
			{{ thaidate("j-N-Y" , strtotime($sos_help_center->time_hospital)) }} <br>
			{{ isset($sos_help_center->time_hospital) ? \Carbon\Carbon::parse($sos_help_center->time_hospital)->format('H:i น.') : '' }}
		</td>
		<td class="border" align="center">
			{{ thaidate("j-N-Y" , strtotime($sos_help_center->time_to_the_operating_base)) }} <br>
			{{ isset($sos_help_center->time_to_the_operating_base) ? \Carbon\Carbon::parse($sos_help_center->time_to_the_operating_base)->format('H:i น.') : '' }}

		</td>
	</tr>
	<tr>
		<td class="border" rowspan="2">&nbsp;รวมเวลา (นาที)</td>
		<td class="border" rowspan="2" colspan="4" align="center">
			{{ \Carbon\Carbon::parse($sos_help_center->time_create_sos)->diffInMinutes(\Carbon\Carbon::parse($sos_help_center->time_to_the_scene)) }} นาที
		</td>
		<td class="border" align="center" colspan="2">
			{{ \Carbon\Carbon::parse($sos_help_center->time_leave_the_scene)->diffInMinutes(\Carbon\Carbon::parse($sos_help_center->time_hospital)) }} นาที
		</td>
		<td class="border" align="center" style="background-color: #000;"></td>
	</tr>
	<tr>
		<td class="border" align="center" style="background-color: #000;"></td>
		<td class="border" align="center" colspan="2">
			{{ \Carbon\Carbon::parse($sos_help_center->time_hospital)->diffInMinutes(\Carbon\Carbon::parse($sos_help_center->time_to_the_operating_base)) }} นาที
		</td>
	</tr>

	<tr>
		<td class="border">&nbsp;เลข กม.</td>
		<td class="border" align="center" colspan="3">{{ number_format($sos_help_center->form_yellow->km_create_sos_to_go_to_help)}}</td>
		<td class="border" align="center" colspan="2">{{ number_format($sos_help_center->form_yellow->km_to_the_scene_to_leave_the_scene)}}</td>
		<td class="border" align="center">{{ number_format($sos_help_center->form_yellow->km_hospital)}}</td>
		<td class="border" align="center">{{ number_format($sos_help_center->form_yellow->km_operating_base)}}</td>
	</tr>


	<tr>
		<td class="border" rowspan="2">&nbsp;ระยะทาง (กม.)</td>
		<td class="border" rowspan="2" colspan="4" align="center">รวมระยะทางไป {{ number_format($sos_help_center->form_yellow->km_to_the_scene_to_leave_the_scene - $sos_help_center->form_yellow->km_create_sos_to_go_to_help) }} กม.</td>
		<td class="border" align="center" style="background-color: #000;"></td>
		<td class="border" align="center" colspan="2" >ระยะทางกลับ {{ number_format($sos_help_center->form_yellow->km_operating_base - $sos_help_center->form_yellow->km_hospital) }}   กม.</td>
	</tr>
	<tr>
		<td class="border" align="center" colspan="2" >ระยะทางไปรพ. {{ number_format($sos_help_center->form_yellow->km_to_the_scene_to_leave_the_scene - $sos_help_center->form_yellow->km_create_sos_to_go_to_help) }}  กม.</td>
		<td class="border" align="center" style="background-color: #000;">s</td>
	</tr>
</table>

<p style="margin-bottom: 0;margin-left: 15px;margin-top: 0;"><b>๓. ข้อมูลผู้ป่วย</b></p>
<div>
	<table width="100%" style="border-spacing: -1px; font-size: 10px;">
		<tr>
			<td class="border" width="62%">
				<table width="100%" style="padding-left:10px ;" class="my-0">
					<tr>
						<td width="20%">คำนำหน้า {{$data_color->name_title}}</td>
						<td width="40%">ชื่อผู้ป่วย {{$sos_help_center->form_yellow->patient_name_.$number_user}}</td>
						<td width="10%">อายุ {{$sos_help_center->form_yellow->patient_age_.$number_user}} ปี</td>
						<td width="30%">
							เพศ(จากระบบ)
							&nbsp;<input type="radio" @if($data_color->gender == "ชาย") checked="" @endif>ชาย
							&nbsp;<input type="radio" @if($data_color->gender == "หญิง") checked="" @endif>หญิง
						</td>
					</tr>
				</table>
				<table width="100%" style="padding-left:10px;margin-top:-5px" class="my-0">
					<tr>
						<td width="60%">
							&nbsp;<input width="50%" align="center" type="radio" @if($data_color->people_type == "คนไทย") checked="" @endif>&nbsp;คนไทย &nbsp;&nbsp;&nbsp; เลขบัตรประชาชน 
							{{ substr_replace(substr_replace(substr_replace(substr_replace($sos_help_center->form_yellow->patient_vn_.$number_user, '-', 1, 0), '-', 6, 0), '-', 12, 0), '-', 15, 0) }}

						</td>
						<td width="40%">
							<input width="50%" align="center"  type="radio" @if($data_color->people_type == "แรงงานต่างด้าว") checked="" @endif>แรงงานต่างด้าว
						</td>
					</tr>
				</table>
				<table width="100%" style="padding-left:10px;margin-top:-5px" class="my-0">
					<tr>
						<td width="60%">
							&nbsp;<input width="50%" align="center" type="radio" @if($data_color->people_type == "ชาวต่างชาติ") checked="" @endif>&nbsp;ชาวต่างชาติ &nbsp;&nbsp;&nbsp; ประเทศ 
							{{ $data_color->people_country }}

						</td>
						<td width="40%">
							เลขที่หนังสือเดินทาง {{ $data_color->passport }}
						</td>
					</tr>
				</table>
			</td>
			<td class="border" style="padding-left:10px;">
				<p style="margin: 0;">ประกันอื่นๆ (ถ้ามี)</p>
				<table width="100%" style="margin-top:-5px;margin-left: -3px;" class="my-0">
					<tr>
						<td width="60%">
							<input width="50%" type="radio" @if($data_color->insurance == "ประกันท่องเที่ยว") checked="" @endif>&nbsp;ประกันท่องเที่ยว &nbsp;&nbsp;&nbsp; ประเทศ 
							{{ $data_color->insurance_country }}
							<br>
							<input width="50%" type="radio" @if($data_color->insurance == "ผู้ประสบภัยจากรถ") checked="" @endif>&nbsp;ผู้ประสบภัยจากรถ
						</td>
					</tr>
				</table>
				<table width="100%" style="margin-top:-5px;margin-left: -3px;font-size: 8px;" class="my-0">
					<tr>
						<td width="25%">
							ประเภทรถ {{$data_color->insurance_type_car}}
						</td>
						<td width="25%">
							ทะเบียนรถหมวด {{$sos_help_center->form_yellow->registration_category}}
						</td>
						<td width="25%">
							เลขทะเบียน {{$sos_help_center->form_yellow->registration_number}}
						</td>
						<td width="25%">
							จังหวัด {{$sos_help_center->form_yellow->registration_province}}
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<table width="100%" style="border-spacing: -1px; font-size: 10px; margin-top:1px">
		<tr>
			<td align="center" class="border" rowspan="2">Time</td>
			<td align="center" class="border" colspan="4">Vital Signs</td>
			<td align="center" class="border" colspan="3">neuro Signs</td>
			<td align="center" class="border" colspan="4">Pupils</td>
			<td align="center" class="border" rowspan="2">O<sub>2</sub> Sat</td>
			<td align="center" class="border" rowspan="2">DXT</td>
		</tr>
		<tr>
			<td align="center" class="border">T</td>
			<td align="center" class="border">BP</td>
			<td align="center" class="border">PR</td>
			<td align="center" class="border">RR</td>
			<td align="center" class="border">E</td>
			<td align="center" class="border">V</td>
			<td align="center" class="border">M</td>
			<td align="center" class="border">Rt</td>
			<td align="center" class="border">RTL</td>
			<td align="center" class="border">LT</td>
			<td align="center" class="border">RTL</td>
		</tr>

		<tr>
			<td align="center" class="border">{!! isset($data_color->time_of_measurement_1) ? $data_color->time_of_measurement_1 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->vital_signs_t_1) ? $data_color->vital_signs_t_1 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->vital_signs_bp_1) ? $data_color->vital_signs_bp_1 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->vital_signs_pr_1) ? $data_color->vital_signs_pr_1 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->vital_signs_rr_1) ? $data_color->vital_signs_rr_1 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->neuro_signs_e_1) ? $data_color->neuro_signs_e_1 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->neuro_signs_v_1) ? $data_color->neuro_signs_v_1 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->neuro_signs_m_1) ? $data_color->neuro_signs_m_1 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->pupils_rt_1) ? $data_color->pupils_rt_1 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->pupils_rtl_one_1) ? $data_color->pupils_rtl_one_1 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->pupils_lt_1) ? $data_color->pupils_lt_1 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->pupils_rtl_two_1) ? $data_color->pupils_rtl_two_1 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->o2_sat_1) ? $data_color->o2_sat_1 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->dxt_1) ? $data_color->dxt_1 : '&nbsp;'!!}</td>
		</tr>
		<tr>
			<td align="center" class="border">{!! isset($data_color->time_of_measurement_2) ? $data_color->time_of_measurement_2 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->vital_signs_t_2) ? $data_color->vital_signs_t_2 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->vital_signs_bp_2) ? $data_color->vital_signs_bp_2 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->vital_signs_pr_2) ? $data_color->vital_signs_pr_2 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->vital_signs_rr_2) ? $data_color->vital_signs_rr_2 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->neuro_signs_e_2) ? $data_color->neuro_signs_e_2 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->neuro_signs_v_2) ? $data_color->neuro_signs_v_2 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->neuro_signs_m_2) ? $data_color->neuro_signs_m_2 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->pupils_rt_2) ? $data_color->pupils_rt_2 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->pupils_rtl_one_2) ? $data_color->pupils_rtl_one_2 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->pupils_lt_2) ? $data_color->pupils_lt_2 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->pupils_rtl_two_2) ? $data_color->pupils_rtl_two_2 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->o2_sat_2) ? $data_color->o2_sat_2 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->dxt_2) ? $data_color->dxt_2 : '&nbsp;'!!}</td>
		</tr>
		<tr>
			<td align="center" class="border">{!! isset($data_color->time_of_measurement_3) ? $data_color->time_of_measurement_3 : '&nbsp;' !!}</td>
			<td align="center" class="border">{!! isset($data_color->vital_signs_t_3) ? $data_color->vital_signs_t_3 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->vital_signs_bp_3) ? $data_color->vital_signs_bp_3 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->vital_signs_pr_3) ? $data_color->vital_signs_pr_3 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->vital_signs_rr_3) ? $data_color->vital_signs_rr_3 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->neuro_signs_e_3) ? $data_color->neuro_signs_e_3 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->neuro_signs_v_3) ? $data_color->neuro_signs_v_3 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->neuro_signs_m_3) ? $data_color->neuro_signs_m_3 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->pupils_rt_3) ? $data_color->pupils_rt_3 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->pupils_rtl_one_3) ? $data_color->pupils_rtl_one_3 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->pupils_lt_3) ? $data_color->pupils_lt_3 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->pupils_rtl_two_3) ? $data_color->pupils_rtl_two_3 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->o2_sat_3) ? $data_color->o2_sat_3 : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_color->dxt_3) ? $data_color->dxt_3 : '&nbsp;'!!}</td>
		</tr>
	</table>
	<table width="100%" style="border-spacing: -1px; font-size: 10px; margin-top:1px">
		<tr style="position: fixed; right: 0mm; bottom: 0mm; rotate: 120;">
			<td class="border" height="2%" align="center" text-rotate="90">
				&nbsp;Truauma&nbsp;
			</td  >
			<td class="border" width="98%">
				<table width="100%">
					<tr>
						<td width="60px">บาดแผล</td>

						@php
                                $wound_values = explode(',', $data_color->wound);
								$deformed_bone_values = explode(',', $data_color->deformed_bone);
                                $blood_loss_values = explode(',', $data_color->blood_loss);
                                $organ_values = explode(',', $data_color->organ);
						@endphp
						<td>
							<input type="radio" @if(in_array("No", $wound_values)) checked="" @endif> No
							&nbsp;&nbsp;<input type="radio" @if(in_array("Cut/Laceration", $wound_values)) checked="" @endif> Cut/Laceration
							&nbsp;&nbsp;<input type="radio" @if(in_array("Abration", $wound_values)) checked="" @endif> Abration
							&nbsp;&nbsp;<input type="radio" @if(in_array("Contustion", $wound_values)) checked="" @endif> Contustion
							&nbsp;&nbsp;<input type="radio" @if(in_array("Burn", $wound_values)) checked="" @endif> Burn
							&nbsp;&nbsp;<input type="radio" @if(in_array("Stab_wound", $wound_values)) checked="" @endif> Stab Wound
							&nbsp;&nbsp;<input type="radio" @if(in_array("Ambutate", $wound_values)) checked="" @endif> Ambutate
							&nbsp;&nbsp;<input type="radio" @if(in_array("Gsw", $wound_values)) checked="" @endif> Gsw
						</td>
					</tr>
					<!-- <tr>
						<td>บาดแผล</td>
						<td class="border"><input type="radio" @if($data_color->respiratory_tract == "No") checked="" @endif> No</td>
						<td class="border"><input type="radio" @if($data_color->respiratory_tract == "Clear_airway") checked="" @endif> Clear airway</td>
						<td class="border"><input type="radio" @if($data_color->respiratory_tract == "Suction") checked="" @endif> Suction</td>
						<td class="border"><input type="radio" @if($data_color->respiratory_tract == "Oral_airway") checked="" @endif> Oral airway</td>
						<td class="border"><input type="radio" @if($data_color->respiratory_tract == "O2_canula/mask") checked="" @endif> ให้ O<sub>2</sub> canula/mask</td>
						<td class="border"><input type="radio" @if($data_color->respiratory_tract == "Ambubag") checked="" @endif> Ambu bag</td>
						<td class="border"><input type="radio" @if($data_color->respiratory_tract == "ET") checked="" @endif> ET</td>

							&nbsp;&nbsp;<input type="radio" @if(in_array("aaa", $wound_values)) checked="" @endif> aaa

					</tr> -->
				</table>
				<table width="100%">
					<tr>
						<td width="60px">กระดูกผิดรูป</td>
						<td>
							<input type="radio" @if(in_array("No", $deformed_bone_values)) checked="" @endif> No
							&nbsp;&nbsp;<input type="radio" @if(in_array("Closed", $deformed_bone_values)) checked="" @endif> Closed
							&nbsp;&nbsp;<input type="radio" @if(in_array("Opened", $deformed_bone_values)) checked="" @endif> Opened
							&nbsp;&nbsp;<input type="radio" @if(in_array("Dislocate", $deformed_bone_values)) checked="" @endif> Dislocate
						</td>
					</tr>
				</table>
				<table width="100%">
					<tr>
						<td width="60px">การเสียเลือด</td>
						<td>
							<input type="radio" @if(in_array("No", $blood_loss_values)) checked="" @endif> No
							&nbsp;&nbsp;<input type="radio" @if(in_array("Ext/Stopped", $blood_loss_values)) checked="" @endif> Ext/Stopped
							&nbsp;&nbsp;<input type="radio" @if(in_array("Ext/Active", $blood_loss_values)) checked="" @endif> Ext/Active
							&nbsp;&nbsp;<input type="radio" @if(in_array("Int.", $blood_loss_values)) checked="" @endif> Int. hemor

						</td>
					</tr>
				</table>
				<table width="100%">
					<tr>
						<td width="60px">อวัยวะ</td>

						<td>
						<input type="radio" @if(in_array("Head/neck", $organ_values)) checked="" @endif> Head/neck
						&nbsp;&nbsp;<input type="radio" @if(in_array("Face", $organ_values)) checked="" @endif> Face
						&nbsp;&nbsp;<input type="radio" @if(in_array("Spine/back", $organ_values)) checked="" @endif> Spine/back
						&nbsp;&nbsp;<input type="radio" @if(in_array("Chest/Clavicle", $organ_values)) checked="" @endif> Chest/Clavicle
						&nbsp;&nbsp;<input type="radio" @if(in_array("Abdomen", $organ_values)) checked="" @endif> Abdomen
						&nbsp;&nbsp;<input type="radio" @if(in_array("Pelvis", $organ_values)) checked="" @endif> Pelvis
						&nbsp;&nbsp;<input type="radio" @if(in_array("Extremities", $organ_values)) checked="" @endif> Extremities
						&nbsp;&nbsp;<input type="radio" @if(in_array("External_body_surface", $organ_values)) checked="" @endif> External body surface
						&nbsp;&nbsp;<input type="radio" @if(in_array("Multiple_Injury_back", $organ_values)) checked="" @endif> Multiple Injury back

						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr style="position: fixed; right: 0mm; bottom: 0mm; rotate: 120;">
			<td class="border" height="2%" align="center" text-rotate="90">
				&nbsp;Non Truauma&nbsp;
			</td  >
			<td class="border" width="98%">
				<table width="100%">
					<tr>
						<td width="60px">อายุรกรรม</td>

						@php
							$non_treatment_others_values = explode(',', $data_color->non_treatment_others);
						@endphp
						<td>
						<input type="radio" @if($data_color->internal_medicine === "Dyspnea") checked="" @endif> Dyspnea
						&nbsp;&nbsp;<input type="radio" @if($data_color->internal_medicine === "High_Fever") checked="" @endif> High Fever
						&nbsp;&nbsp;<input type="radio" @if($data_color->internal_medicine === "Alteration_of_conscious") checked="" @endif> Alteration of conscious
						&nbsp;&nbsp;<input type="radio" @if($data_color->internal_medicine === "Seizure") checked="" @endif> Seizure
						&nbsp;&nbsp;<input type="radio" @if($data_color->internal_medicine === "Chest_Pain") checked="" @endif> Chest Pain
						&nbsp;&nbsp;<input type="radio" @if($data_color->internal_medicine === "Poisoning") checked="" @endif> Poisoning
						&nbsp;&nbsp;<input type="radio" @if($data_color->internal_medicine === "Digestive") checked="" @endif> Digestive
						@if($data_color->internal_medicine !== "Dyspnea" && $data_color->internal_medicine !== "High_Fever" && $data_color->internal_medicine !== "Alteration_of_conscious" && $data_color->internal_medicine !== "Seizure" && $data_color->internal_medicine !== "Chest_Pain" && $data_color->internal_medicine !== "Poisoning" && $data_color->internal_medicine !== "Digestive" && !empty($data_color->internal_medicine))
							&nbsp;&nbsp;<input type="radio"  checked=""> อื่นๆ {{$data_color->internal_medicine}}
						@else
							&nbsp;&nbsp;<input type="radio"> อื่นๆ
						@endif
						</td>
					</tr>
					<!-- <tr>
						<td>บาดแผล</td>
						<td class="border"><input type="radio" @if($data_color->respiratory_tract == "No") checked="" @endif> No</td>
						<td class="border"><input type="radio" @if($data_color->respiratory_tract == "Clear_airway") checked="" @endif> Clear airway</td>
						<td class="border"><input type="radio" @if($data_color->respiratory_tract == "Suction") checked="" @endif> Suction</td>
						<td class="border"><input type="radio" @if($data_color->respiratory_tract == "Oral_airway") checked="" @endif> Oral airway</td>
						<td class="border"><input type="radio" @if($data_color->respiratory_tract == "O2_canula/mask") checked="" @endif> ให้ O<sub>2</sub> canula/mask</td>
						<td class="border"><input type="radio" @if($data_color->respiratory_tract == "Ambubag") checked="" @endif> Ambu bag</td>
						<td class="border"><input type="radio" @if($data_color->respiratory_tract == "ET") checked="" @endif> ET</td>

							&nbsp;&nbsp;<input type="radio" @if(in_array("aaa", $wound_values)) checked="" @endif> aaa

							&nbsp;&nbsp;<input type="radio" @if($data_color->internal_medicine === "aaa") checked="" @endif> aaa


					</tr> -->
				</table>
				<table width="100%">
					<tr>
						<td width="60px">สูติ-นรีเวชฯ</td>
						<td>
							<input type="radio" @if($data_color->obstetrics_and_gynecology === "Labour_pain_child_birth") checked="" @endif> Labour pain child birth
							&nbsp;&nbsp;<input type="radio" @if($data_color->obstetrics_and_gynecology === "Bleeding_er_Vagina") checked="" @endif> Bleeding per Vagina
							&nbsp;&nbsp;<input type="radio" @if($data_color->obstetrics_and_gynecology === "High_risk_preg") checked="" @endif>  High risk preg
							&nbsp;&nbsp;<input type="radio" @if($data_color->obstetrics_and_gynecology === "Rape") checked="" @endif> Rape
							@if($data_color->obstetrics_and_gynecology !== "Labour_pain_child_birth" && $data_color->obstetrics_and_gynecology !== "Bleeding_er_Vagina" && $data_color->obstetrics_and_gynecology !== "High_risk_preg" && $data_color->obstetrics_and_gynecology !== "Rape" && !empty($data_color->obstetrics_and_gynecology))
								&nbsp;&nbsp;<input type="radio" checked="" > อื่นๆ {{$data_color->obstetrics_and_gynecology}}
							@else
								<input type="radio" > อื่นๆ
							@endif

						</td>
					</tr> 
				</table>
				<table width="100%">
					<tr>
						<td width="60px">กุมารฯ</td>
						<td>
							<input type="radio" @if($data_color->pediatrics === "Convulsion") checked="" @endif> Convulsion
							&nbsp;&nbsp;<input type="radio" @if($data_color->pediatrics === "High_Feve") checked="" @endif> High Feve
							&nbsp;&nbsp;<input type="radio" @if($data_color->pediatrics === "Dyspnea") checked="" @endif> Dyspnea
							&nbsp;&nbsp;<input type="radio" @if($data_color->pediatrics === "Digestive") checked="" @endif> Digestive
							@if($data_color->pediatrics !== "Convulsion" && $data_color->pediatrics !== "High_Feve" && $data_color->pediatrics !== "Dyspnea" && $data_color->pediatrics !== "Digestive" && !empty($data_color->pediatrics))
							&nbsp;&nbsp;<input type="radio" checked="" > อื่นๆ {{$data_color->pediatrics}}
							@else
								<input type="radio" > อื่นๆ
							@endif
						</td>
					</tr>
				</table>
				<table width="100%">
					<tr>
						<td width="60px">ศัลยกรรม</td>

						<td>
						<input type="radio" @if($data_color->surgery === "Ac_abdominal_pain") checked="" @endif> Ac. abdominal pain
						&nbsp;&nbsp;<input type="radio" @if($data_color->surgery === "GI_Bleeding") checked="" @endif> GI Bleeding

						@if($data_color->surgery !== "Ac_abdominal_pain" && $data_color->surgery !== "GI_Bleeding" && !empty($data_color->surgery))
							&nbsp;&nbsp;<input type="radio" checked="" > อื่นๆ {{$data_color->surgery}}
						@else
							<input type="radio"> อื่นๆ
						@endif
						</td>
					</tr>
				</table>
				<table width="100%">
					<tr>
						<td width="60px">อื่นๆ</td>

						<td>
						<input type="radio" @if(in_array("EYE", $non_treatment_others_values)) checked="" @endif> EYE
						&nbsp;&nbsp;<input type="radio" @if(in_array("ENT", $non_treatment_others_values)) checked="" @endif> ENT
						&nbsp;&nbsp;<input type="radio" @if(in_array("Ortho", $non_treatment_others_values)) checked="" @endif> Ortho
						&nbsp;&nbsp;<input type="radio" @if(in_array("Psychological_problem", $non_treatment_others_values)) checked="" @endif> Psychological problem


						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr style="position: fixed; right: 0mm; bottom: 0mm; rotate: 120;">
			<td class="border" height="2%" align="center" text-rotate="90">
				&nbsp;Treatment&nbsp;
			</td  >
			<td class="border" width="98%">
				<table width="100%">
					<tr>
						<td width="60px">ทางเดินหายใจ</td>

						@php
							$respiratory_tract_values = explode(',', $data_color->respiratory_tract);

						@endphp
						<td>
						<input type="radio" @if(in_array("No", $respiratory_tract_values)) checked="" @endif> No
						&nbsp;&nbsp;<input type="radio" @if(in_array("Clear_airway", $respiratory_tract_values)) checked="" @endif> Clear airway
						&nbsp;&nbsp;<input type="radio" @if(in_array("Suction", $respiratory_tract_values)) checked="" @endif> Suction
						&nbsp;&nbsp;<input type="radio" @if(in_array("Oral_airway", $respiratory_tract_values)) checked="" @endif> Oral airway
						&nbsp;&nbsp;<input type="radio" @if(in_array("O2_canula/mask", $respiratory_tract_values)) checked="" @endif> ให้ O<sub>2</sub> canula/mask
						&nbsp;&nbsp;<input type="radio" @if(in_array("Ambubag", $respiratory_tract_values)) checked="" @endif> Ambu bag
						&nbsp;&nbsp;<input type="radio" @if(in_array("ET", $respiratory_tract_values)) checked="" @endif> ET

						</td>
					</tr>
				</table>
				<table width="100%">
					<tr>
						<td width="60px">บาดแผล/ห้ามเลือด</td>
						<td>
						<input type="radio" @if($data_color->wound_hemostasis === "No") checked="" @endif> No
						&nbsp;&nbsp;<input type="radio" @if($data_color->wound_hemostasis === "Pressure_Dressing") checked="" @endif>  Pressure Dressing
						&nbsp;&nbsp;<input type="radio" @if($data_color->wound_hemostasis === "Dressing") checked="" @endif> Dressing


						</td>
					</tr> 
				</table>
				<table width="100%">
					<tr>
						<td width="60px">การให้สารน้ำ</td>
						<td>
						<input type="radio" @if($data_color->fluid_resuscitation === "No") checked="" @endif> No
						&nbsp;&nbsp;<input type="radio" @if($data_color->fluid_resuscitation === "NSS") checked="" @endif> NSS
						&nbsp;&nbsp;<input type="radio" @if($data_color->fluid_resuscitation === "RLS") checked="" @endif> RLS
						&nbsp;&nbsp;<input type="radio" @if($data_color->fluid_resuscitation === "5%DN/2") checked="" @endif> 5%DN/2
						&nbsp;&nbsp;<input type="radio" @if($data_color->fluid_resuscitation === "no_locked") checked="" @endif> no locked

						@if($data_color->fluid_resuscitation !== "No" && $data_color->fluid_resuscitation !== "NSS" && $data_color->fluid_resuscitation !== "RLS" && $data_color->fluid_resuscitation !== "5%DN/2" && $data_color->fluid_resuscitation !== "no_locked" && !empty($data_color->fluid_resuscitation))
							&nbsp;&nbsp;<input type="radio" checked=""> อื่นๆ {{$data_color->fluid_resuscitation}}
						@else
							&nbsp;&nbsp;<input type="radio"> อื่นๆ
						@endif
						</td>
					</tr>
				</table>
				<table width="100%">
					<tr>
						<td width="60px">การดามกระดูก</td>

						<td>
							<input type="radio" @if($data_color->bone_splint === "No") checked="" @endif> No
						&nbsp;&nbsp;<input type="radio" @if($data_color->bone_splint === "เฝือกลม/ไม้ดาม/sling") checked="" @endif> เฝือกลม/ไม้ดาม/sling
						&nbsp;&nbsp;<input type="radio" @if($data_color->bone_splint === "Collar_With_Long_Spinal_Board") checked="" @endif> Collar With Long Spinal Board
						&nbsp;&nbsp;<input type="radio" @if($data_color->bone_splint === "KED") checked="" @endif> KED

						</td>
					</tr>
				</table>
				<table width="100%">
					<tr>
						<td width="60px">การทำ CPR</td>

						<td>
						<input type="radio" @if($data_color->help_revive === "No") checked="" @endif> No
						&nbsp;&nbsp;<input type="radio" @if($data_color->help_revive === "Yes") checked="" @endif> Yes
						&nbsp;&nbsp;<input type="radio" @if($data_color->help_revive === "AED/Defib") checked="" @endif> AED/Defib

						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<table width="100%" style="border-spacing: -1px; font-size: 10px; margin-top:1px">
		<tr >
			<td class="border" height="2%" >
			&nbsp;&nbsp; <b>ยา (วิธีใช้และขาด ให้ระบุ)</b> <span>{{mb_strimwidth($data_color->medication_route_and_dose, 0,180, '...')}}
				<!-- {{$data_color->medication_route_and_dose}} -->
			</span>
			</td >
		</tr>
	</table>
	<table width="100%" style="border-spacing: -1px; font-size: 10px; margin-top:1px">
		<tr >
			<td class="border" height="2%" >
			&nbsp;&nbsp; <b>ผลการดูแลรักษาขั้นต้น</b> <span>

			@php
				$results_of_care_values = explode(',', $data_color->results_of_care);
			@endphp

			&nbsp;&nbsp;<input type="radio" @if(in_array("ไม่มีการรักษา", $results_of_care_values)) checked="" @endif> ไม่มีการรักษา
			&nbsp;&nbsp;<input type="radio" @if(in_array("ทุเลา", $results_of_care_values)) checked="" @endif> ทุเลา
			&nbsp;&nbsp;<input type="radio" @if(in_array("คงเดิม", $results_of_care_values)) checked="" @endif> คงเดิม
			&nbsp;&nbsp;<input type="radio" @if(in_array("ทรุดหนัก", $results_of_care_values)) checked="" @endif> ทรุดหนัก
			&nbsp;&nbsp;<input type="radio" @if(in_array("เสียชีวิต ณ จุดเกิดเหตุ", $results_of_care_values)) checked="" @endif> เสียชีวิต ณ จุดเกิดเหตุ
			&nbsp;&nbsp;<input type="radio" @if(in_array("เสียชีวิตขณะนำส่ง", $results_of_care_values)) checked="" @endif> เสียชีวิตขณะนำส่ง

			</span>
			</td >
		</tr>
	</table>
	<table width="100%" style="border-spacing: -1px; font-size: 10px; margin-top:1px">
		<tr >
			<td class="border" height="2%" >
			&nbsp;&nbsp; <b>ระดับการคัดแยก (RC Code)</b> <span>


			&nbsp;&nbsp;<input width="50%" type="radio" @if($sos_help_center->form_yellow->rc == "แดง(วิกฤติ)") checked="" @endif>&nbsp;แดง(วิกฤติ)
			&nbsp;&nbsp;<input width="50%" type="radio" @if($sos_help_center->form_yellow->rc == "ขาว(ทั่วไป)") checked="" @endif>&nbsp;ขาว(ทั่วไป)
			&nbsp;&nbsp;<input width="50%" type="radio" @if($sos_help_center->form_yellow->rc == "เหลือง(เร่งด่วน) ") checked="" @endif>&nbsp;เหลือง(เร่งด่วน) 
			&nbsp;&nbsp;<input width="50%" type="radio" @if($sos_help_center->form_yellow->rc == "ดำ(รับบริการสาธารณสุขอื่น)") checked="" @endif>&nbsp;ดำ(รับบริการสาธารณสุขอื่น)
			&nbsp;&nbsp;<input width="50%" type="radio" @if($sos_help_center->form_yellow->rc == "เขียว(ไม่รุนแรง)") checked="" @endif>&nbsp;เขียว(ไม่รุนแรง)
			</span>
			</td >
		</tr>
	</table>
</div>

<p style="margin-bottom: 0;margin-left: 15px;margin-top: 0;"><b>๔. เกณฑ์การตัดสินใจส่งโรงพยาบาล <small>(โดยหัวหน้าทีมและ/ผ่านการเห็นชอบของศูนย์ฯ)</small></b></p>
<div class="border" style="margin-top:1px">
	<table  width="100%"   style="border-spacing:0px; font-size: 10px;">
		<tr  width="100%">
			<td style="padding-left: 5px;" colspan="2">
				นำส่งห้องฉุกเฉินโรงพยาบาล 
				
				<span>{{mb_strimwidth($data_color->name_hospital, 0,150, '...')}}</span> 
				<span>
					&nbsp;&nbsp;<input width="50%" type="radio" @if($data_color->type_hospital == "โรงพยาบาลรัฐ") checked="" @endif>&nbsp;โรงพยาบาลรัฐ
					&nbsp;&nbsp;<input width="50%" type="radio" @if($data_color->type_hospital == "โรงพยาบาลเอกชน") checked="" @endif>&nbsp;โรงพยาบาลเอกชน
					
				</span>
			</td>
		</tr>
		<tr width="100%">
			<td style="padding-left: 5px;">
				เหตุผล 
				<span>
					@php
						$reason_choosing_hospital_values = explode(',', $data_color->reason_choosing_hospital);
					@endphp
					&nbsp;&nbsp;<input width="50%" type="radio" @if(in_array("เหมาะสม/รักษาได้", $reason_choosing_hospital_values)) checked="" @endif>&nbsp;เหมาะสม/รักษาได้
					&nbsp;&nbsp;<input width="50%" type="radio" @if(in_array("อยู่ใกล้", $reason_choosing_hospital_values)) checked="" @endif>&nbsp;อยู่ใกล้
					&nbsp;&nbsp;<input width="50%" type="radio" @if(in_array("มีหลักประกัน", $reason_choosing_hospital_values)) checked="" @endif>&nbsp;มีหลักประกัน
					&nbsp;&nbsp;<input width="50%" type="radio" @if(in_array("เป็นผู้ป่วยเก่า", $reason_choosing_hospital_values)) checked="" @endif>&nbsp;เป็นผู้ป่วยเก่า
					&nbsp;&nbsp;<input width="50%" type="radio" @if(in_array("เป็นความประสงค์", $reason_choosing_hospital_values)) checked="" @endif>&nbsp;เป็นความประสงค์
				</span>
			</td>
		</tr>
		
	</table>
	<table style="border-spacing:0px; font-size: 10px;">
		<tr>
			<td style="padding-left: 5px;width: 200px;">
				ผู้สรุปรายงาน
				
				{{mb_strimwidth($data_color->recorder, 0,120, '...')}}

			</td>
			<td width="200px">รหัส
				{{$data_color->id_recorder}}
			</td>
		</tr>
	</table>
</div>

<p style="margin-bottom: 0;margin-left: 15px;margin-top: 0;">๕. <b>การประเมิน/รับรองการนำส่ง (โดยแพทย์ พยาบาล ประจำโรงพยาบาลที่รับดูแลต่อ) เพิ่ม RC code</b></p>
<div>
	<div class="border">
		<table  width="100%" style="border-spacing:0px; font-size: 10px;">
			<tr>
				<td style="padding-left: 5px;" width="100px">
					HN
					
					{{mb_strimwidth($data_color->HN, 0,120, '...')}}

				</td>
				<td width="200px">การวินิจฉัยโรค
				{{mb_strimwidth($data_color->diagnosis, 0,150, '...')}}

				</td>
			</tr>
		</table>
		<table  width="100%" style="border-spacing:0px; font-size: 10px;">
			<tr>
				<td style="padding-left: 5px;">ระดับการคัดแยก (ER Triage)

				&nbsp;&nbsp;<input width="50%" type="radio" @if($data_color->er == "แดง(วิกฤติ)") checked="" @endif>&nbsp;แดง(วิกฤติ) L1,L2	
				&nbsp;&nbsp;<input width="50%" type="radio" @if($data_color->er == "เหลือง(เร่งด่วน) ") checked="" @endif>&nbsp;เหลือง(เร่งด่วน) L3
				&nbsp;&nbsp;<input width="50%" type="radio" @if($data_color->er == "เขียว(ไม่รุนแรง)") checked="" @endif>&nbsp;เขียว(ไม่รุนแรง) L4
				&nbsp;&nbsp;<input width="50%" type="radio" @if($data_color->er == "ขาว(ทั่วไป)") checked="" @endif>&nbsp;ขาว(ทั่วไป) L5
				&nbsp;&nbsp;<input width="50%" type="radio" @if($data_color->er == "ดำ(รับบริการสาธารณสุขอื่น)") checked="" @endif>&nbsp;ดำ(รับบริการสาธารณสุขอื่น) ไม่ใช่ผู้ป่วย
				</td>
			</tr>
		</table>
	</div>
	
	<table class="border" width="100%" style="border-spacing:0px; font-size: 10px;margin-top:-1px">
		<tr>
			<td style="padding-left: 5px;">ทางเดินหายใจ</td>
			<td>
				<input width="50%" type="radio" @if($data_color->respiratory_tract_by_doctor == "ไม่จำเป็น") checked="" @endif>&nbsp;ไม่จำเป็น
			</td>
			<td>
				<input width="50%" type="radio" @if($data_color->respiratory_tract_by_doctor == "ไม่ได้ทำ") checked="" @endif>&nbsp;ไม่ได้ทำ
			</td>
			<td>
				<input width="50%" type="radio" @if($data_color->respiratory_tract_by_doctor == "ทำและเหมาสม") checked="" @endif>&nbsp;ทำและเหมาสม
			</td>
			<td>
				<input width="50%" type="radio" @if($data_color->respiratory_tract_by_doctor == "ทำแต่ไม่เหมาะ") checked="" @endif>&nbsp;ทำแต่ไม่เหมาะสม ระบุ  @if($data_color->respiratory_tract_by_doctor == "ทำแต่ไม่เหมาะ") {{mb_strimwidth($data_color->respiratory_tract_by_doctor_detail, 0,150, '...')}} @endif
			</td>
		</tr>
		<tr>
			<td style="padding-left: 5px;">การห้ามเลือด</td>
			<td>
				<input width="50%" type="radio" @if($data_color->hemostasis_by_doctor == "ไม่จำเป็น") checked="" @endif>&nbsp;ไม่จำเป็น
			</td>
			<td>
				<input width="50%" type="radio" @if($data_color->hemostasis_by_doctor == "ไม่ได้ทำ") checked="" @endif>&nbsp;ไม่ได้ทำ
			</td>
			<td>
				<input width="50%" type="radio" @if($data_color->hemostasis_by_doctor == "ทำและเหมาสม") checked="" @endif>&nbsp;ทำและเหมาสม
			</td>
			<td>
				<input width="50%" type="radio" @if($data_color->hemostasis_by_doctor == "ทำแต่ไม่เหมาะ") checked="" @endif>&nbsp;ทำแต่ไม่เหมาะสม ระบุ @if($data_color->hemostasis_by_doctor == "ทำแต่ไม่เหมาะ") {{mb_strimwidth($data_color->hemostasis_by_doctor_detail, 0,150, '...')}}  @endif
			</td>
		</tr>
		<tr>
			<td style="padding-left: 5px;">การให้สารน้ำ</td>
			<td>
				<input width="50%" type="radio" @if($data_color->fluid_resuscitation_by_doctor == "ไม่จำเป็น") checked="" @endif>&nbsp;ไม่จำเป็น
			</td>
			<td>
				<input width="50%" type="radio" @if($data_color->fluid_resuscitation_by_doctor == "ไม่ได้ทำ") checked="" @endif>&nbsp;ไม่ได้ทำ
			</td>
			<td>
				<input width="50%" type="radio" @if($data_color->fluid_resuscitation_by_doctor == "ทำและเหมาสม") checked="" @endif>&nbsp;ทำและเหมาสม
			</td>
			<td>
				<input width="50%" type="radio" @if($data_color->fluid_resuscitation_by_doctor == "ทำแต่ไม่เหมาะ") checked="" @endif>&nbsp;ทำแต่ไม่เหมาะสม ระบุ  @if($data_color->fluid_resuscitation_by_doctor == "ทำแต่ไม่เหมาะ") {{mb_strimwidth($data_color->fluid_resuscitation_by_doctor_detail, 0,150, '...')}} @endif
			</td>
		</tr>
		<tr>
			<td style="padding-left: 5px;">การดามกระดูก</td>
			<td>
				<input width="50%" type="radio" @if($data_color->splint_by_doctor == "ไม่จำเป็น") checked="" @endif>&nbsp;ไม่จำเป็น
			</td>
			<td>
				<input width="50%" type="radio" @if($data_color->splint_by_doctor == "ไม่ได้ทำ") checked="" @endif>&nbsp;ไม่ได้ทำ
			</td>
			<td>
				<input width="50%" type="radio" @if($data_color->splint_by_doctor == "ทำและเหมาสม") checked="" @endif>&nbsp;ทำและเหมาสม
			</td>
			<td>
				<input width="50%" type="radio" @if($data_color->splint_by_doctor == "ทำแต่ไม่เหมาะ") checked="" @endif>&nbsp;ทำแต่ไม่เหมาะสม ระบุ @if($data_color->splint_by_doctor == "ทำแต่ไม่เหมาะ")  {{mb_strimwidth($data_color->splint_by_doctor_detail, 0,150, '...')}}  @endif
			</td>
		</tr>
	</table>
	<table class="border" width="100%" style="border-spacing:0px; font-size: 10px;margin-top:-1px">
		<tr>
			<td width="250px" style="padding-left: 5px;">
				ชื่อผู้ประเมิน {{mb_strimwidth($data_color->name_doctor, 0,150, '...')}}
			</td>
			<td style="padding-left: 5px;">
				<input width="50%" type="radio" @if($data_color->role_doctor == "แพทย์") checked="" @endif>&nbsp;แพทย์
				&nbsp;&nbsp;<input width="50%" type="radio" @if($data_color->role_doctor == "พยาบาล") checked="" @endif>&nbsp;พยาบาล
				@if($data_color->role_doctor !== "แพทย์" && $data_color->role_doctor !== "พยาบาล")
					&nbsp;&nbsp;<input type="radio" checked="">ตำแหน่ง {{$data_color->role_other}}
				@endif
			</td>
		</tr>
	</table>
</div>

<p style="margin-bottom: 0;margin-left: 15px;margin-top: 0;">๖. <b>ผลการรักษาในโรงพยาบาล</b> (ติดตามทุกวันสิ้นเดือน)</small></p>
<table class="border" width="100%" style="font-size: 10px;margin-top:-1px">
	<tr>
		<td rowspan="2" width="50px">Admitted</td>
		<td >
			<input width="50%" type="radio" @if($data_color->admitted == "Yes") checked="" @endif>&nbsp;Yes
			<input width="50%" type="radio" @if($data_color->admitted == "No") checked="" @endif>&nbsp;No

		</td>
	</tr>
	<tr>
		<td>
		<input width="50%" type="radio" @if($data_color->treatment_effect == "ทุเลา") checked="" @endif>&nbsp;ทุเลา
		<input width="50%" type="radio" @if($data_color->treatment_effect == "รักษาต่อที่อื่น") checked="" @endif>&nbsp;รักษาต่อที่อื่น
		<input width="50%" type="radio" @if($data_color->treatment_effect == "ยังรักษาต่อในรพ") checked="" @endif>&nbsp;ยังรักษาต่อในรพ
		<input width="50%" type="radio" @if($data_color->treatment_effect == "เสียชีวิตใน รพ.") checked="" @endif>&nbsp;รักษาต่อที่อื่น
		<input width="50%" type="radio" @if($data_color->treatment_effect == "ปฎิเสธการรักษา/หนีกลับ") checked="" @endif>&nbsp;ปฎิเสธการรักษา/หนีกลับ
		<input width="50%" type="radio" @if($data_color->treatment_effect == "กลับไปตายบ้าน") checked="" @endif>&nbsp;กลับไปตายบ้าน
		<input width="50%" type="radio" @if($data_color->treatment_effect == "ตามแล้วไม่ทราบผล") checked="" @endif>&nbsp;ตามแล้วไม่ทราบผล
		</td>
	</tr>
</table>