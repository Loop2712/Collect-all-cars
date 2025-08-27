<style>
    /* กำหนดขอบของเอกสาร */
    @page {
        margin-top: 25px ; /* ขอบบน-ล่าง 20px ขอบซ้าย-ขวา 30px */
    }

    /* กำหนดขอบในส่วนของเนื้อหา */
	body{
		font-family: "THSarabun";
		font-size: 15px;
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
		$data_color = $sos_help_center->form_green;
	}elseif($sos_help_center->form_color_name == "blue"){
		$data_color = $sos_help_center->form_blue;
	}elseif($sos_help_center->form_color_name == "pink"){
		$data_color = $sos_help_center->form_pink;
	}
@endphp
<div style='text-align:center;margin:0; margin-top:50px'>
	<span style="font-size: 19px;font-weight: bolder;"><b>แบบบันทึกการรับแจ้งเหตุและสั่งการการแพทย์ฉุกเฉินระดับพื้นฐาน</b></span>
</div>
<!-- {{$sos_help_center}} -->
<table width="100%" style="padding-left: 10px;" class="my-0">
	<tr >
		<td width="10%">
			<span ><b>๑.หน่วยบริการ</b></span>
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
	</table>
	<table style="font-size: 13.5px;padding-left: 10px;" colspan="9" width="100%">
		<tr>
			<td>
				<span><b>ผลการปฎิบัติงาน</b></span>
				<span>
					<input type="radio" name="" id="">ไม่พบเหตุ
					&nbsp;<input type="radio" name="" id="">พบเหตุ
				</span>
				<span>
					<b>สถานที่เกิดเหตุ</b> &nbsp; {{ mb_strimwidth($sos_help_center->form_yellow->location_sos, 0,200, '...')}}
				</span>
				<span>
					<b>เหตุการณ์</b> &nbsp; {{mb_strimwidth($sos_help_center->form_yellow->symptom_other, 0,60, '...')}}
				</span>
			</td>
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
		<td class="border" align="center" style="background-color: #606060;"></td>
	</tr>
	<tr>
		<td class="border" align="center" style="background-color: #606060;"></td>
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
		<td class="border" align="center" style="background-color: #606060;"></td>
		<td class="border" align="center" colspan="2" >ระยะทางกลับ {{ number_format($sos_help_center->form_yellow->km_operating_base - $sos_help_center->form_yellow->km_hospital) }}   กม.</td>
	</tr>
	<tr>
		<td class="border" align="center" colspan="2" >ระยะทางไปรพ. {{ number_format($sos_help_center->form_yellow->km_to_the_scene_to_leave_the_scene - $sos_help_center->form_yellow->km_create_sos_to_go_to_help) }}  กม.</td>
		<td class="border" align="center" style="background-color: #606060;">s</td>
	</tr>
</table>

<p style="margin-bottom: 0;margin-left: 15px;margin-top: 0;"><b>๓. ข้อมูลผู้ป่วย</b></p>
<div>
	<table width="100%" style="border-spacing: -1px;font-size: 12px;">
		<tr>
			<td class="border" width="62%">
				<table width="100%" style="padding-left:10px ;" class="my-0">
					<tr>
						<td width="20%">คำนำหน้า {{$data_form->name_title}}</td>
						<td width="40%">ชื่อผู้ป่วย {{$sos_help_center->form_yellow->patient_name.$number_user}}</td>
						<td width="10%">อายุ {{$sos_help_center->form_yellow->patient_age.$number_user}} ปี</td>
						<td width="30%">
							เพศ(จากระบบ)
							&nbsp;<input type="radio" @if($data_form->gender == "ชาย") checked="" @endif>ชาย
							&nbsp;<input type="radio" @if($data_form->gender == "หญิง") checked="" @endif>หญิง
						</td>
					</tr>
				</table>
				<table width="100%" style="padding-left:10px;margin-top:-5px" class="my-0">
					<tr>
						<td width="60%">
							&nbsp;<input width="50%" align="center" type="radio" @if($data_form->people_type == "คนไทย") checked="" @endif>&nbsp;คนไทย &nbsp;&nbsp;&nbsp; เลขบัตรประชาชน 
							{{ substr_replace(substr_replace(substr_replace(substr_replace($sos_help_center->form_yellow->patient_vn.$number_user, '-', 1, 0), '-', 6, 0), '-', 12, 0), '-', 15, 0) }}

						</td>
						<td width="40%">
							<input width="50%" align="center"  type="radio" @if($data_form->people_type == "แรงงานต่างด้าว") checked="" @endif>แรงงานต่างด้าว
						</td>
					</tr>
				</table>
				<table width="100%" style="padding-left:10px;margin-top:-5px" class="my-0">
					<tr>
						<td width="60%">
							&nbsp;<input width="50%" align="center" type="radio" @if($data_form->people_type == "ชาวต่างชาติ") checked="" @endif>&nbsp;ชาวต่างชาติ &nbsp;&nbsp;&nbsp; ประเทศ 
							{{ $data_form->people_country }}

						</td>
						<td width="40%">
							เลขที่หนังสือเดินทาง {{ $data_form->passport }}
						</td>
					</tr>
				</table>
				<table width="100%" style="padding-left:10px;margin-top:-5px" class="my-0">
					<tr>
						<td>
							สิทธิการรักษา 
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input width="50%" align="center" type="radio" @if($data_form->treatment_rights == "บัตรทอง") checked="" @endif>&nbsp;บัตรทอง
							&nbsp;&nbsp;<input width="50%" align="center" type="radio" @if($data_form->treatment_rights == "ข้าราชการ") checked="" @endif>&nbsp;ข้าราชการ
							&nbsp;&nbsp;<input width="50%" align="center" type="radio" @if($data_form->treatment_rights == "ประกันสังคม") checked="" @endif>&nbsp;ประกันสังคม
							&nbsp;&nbsp;<input width="50%" align="center" type="radio" @if($data_form->treatment_rights == "แรงงานต่างด้าวขึ้นทะเบียน") checked="" @endif>&nbsp;แรงงานต่างด้าวขึ้นทะเบียน
							&nbsp;&nbsp;<input width="50%" align="center" type="radio" @if($data_form->treatment_rights == "ไม่มีหลักประกัน") checked="" @endif>&nbsp;ไม่มีหลักประกัน
							
						</td>
					</tr>
				</table>
			</td>
			<td class="border" style="padding-left:10px;">
				<p style="margin: 0;">ประกันอื่นๆ (ถ้ามี)</p>
				<table width="100%" style="margin-top:-5px;margin-left: -3px;" class="my-0">
					<tr>
						<td width="60%">
							<input width="50%" type="radio" @if($data_form->insurance == "ประกันท่องเที่ยว") checked="" @endif>&nbsp;ประกันท่องเที่ยว &nbsp;&nbsp;&nbsp; ประเทศ 
							{{ $data_form->insurance_country }}
							<br>
							<input width="50%" type="radio" @if($data_form->insurance == "ผู้ประสบภัยจากรถ") checked="" @endif>&nbsp;ผู้ประสบภัยจากรถ
						</td>
					</tr>
				</table>
				<table width="100%" style="margin-top:-5px;margin-left: -3px;font-size: 8px;" class="my-0">
					<tr>
						<td width="25%">
							ประเภทรถ {{$data_form->insurance_type_car}}
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
	<table width="100%" style="border-spacing: -1px;font-size: 13px; margin-top:1px" >		
		<tr>
			<td align="center"  class="border">
				<b>สภาพผู้ป่วย</b>
			</td>
		</tr>
		<tr >
			<td  style="padding-left:10px;" class="border">ประเภทผู้ป่วย 
			<input type="radio" @if($data_form->type_patient == "บาดเจ็บ/อุบัติเหตุ") checked="" @endif> บาดเจ็บ/อุบัติเหตุ
			<input type="radio" @if($data_form->type_patient == "ป่วยฉุกเฉิน") checked="" @endif> ป่วยฉุกเฉิน 
			</td>
		</tr>
	</table>
	<table width="100%" style="border-spacing: -1px;font-size: 13px; margin-top:1px">
		<tr>
			<td align="center" class="border" rowspan="2">Time</td>
			<td align="center" class="border" colspan="4">Vital Signs</td>
			<td align="center" class="border" colspan="3">neuro Signs</td>
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
		</tr>

		<tr>
			<td align="center" class="border">{!! isset($data_form->time_of_measurement) ? $data_form->time_of_measurement : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_form->vital_signs_t) ? $data_form->vital_signs_t : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_form->vital_signs_bp) ? $data_form->vital_signs_bp : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_form->vital_signs_pr) ? $data_form->vital_signs_pr : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_form->vital_signs_rr) ? $data_form->vital_signs_rr : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_form->neuro_signs_e) ? $data_form->neuro_signs_e : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_form->neuro_signs_v) ? $data_form->neuro_signs_v : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_form->neuro_signs_m) ? $data_form->neuro_signs_m : '&nbsp;'!!}</td>
			<td align="center" class="border">{!! isset($data_form->dxt) ? $data_form->dxt : '&nbsp;'!!}</td>
		</tr>
	</table>
	
	<table width="100%" style="border-spacing: -1px;font-size: 13px; margin-top:1px">
	<tr style="position: fixed; right: 0mm; bottom: 0mm; rotate: 120;">
			<td class="border" width="98%">
				<table width="100%">
					<tr>
						<td width="60px"><b>ความรู้สึกตัว</b></td>
						<td>
							<input type="radio" @if($data_form->consciousness === "รู้สึกตัวดี") checked="" @endif> รู้สึกตัวดี

							&nbsp;&nbsp;<input type="radio" @if($data_form->consciousness === "ซึม") checked="" @endif> ซึม
							&nbsp;&nbsp;<input type="radio" @if($data_form->consciousness === "หมดสติปลุกตื่น") checked="" @endif> หมดสติปลุกตื่น
							&nbsp;&nbsp;<input type="radio" @if($data_form->consciousness === "หมดสติปลุกไม่ตื่น") checked="" @endif> หมดสติปลุกไม่ตื่น
							&nbsp;&nbsp;<input type="radio" @if($data_form->consciousness === "แอะอะโวยวาย") checked="" @endif> แอะอะโวยวาย

						</td>
					</tr>
				</table>
				<table width="100%">
					<tr>
						<td width="60px"><b>การหายใจ</b></td>
						<td>
								<input type="radio" @if($data_form->breathing === "ปกติ") checked="" @endif> ปกติ
								&nbsp;&nbsp;<input type="radio" @if($data_form->breathing === "เร็ว") checked="" @endif> เร็ว
								&nbsp;&nbsp;<input type="radio" @if($data_form->breathing === "ช้า") checked="" @endif> ช้า
								&nbsp;&nbsp;<input type="radio" @if($data_form->breathing === "ไม่สม่ำเสมอ") checked="" @endif> ไม่สม่ำเสมอ
								&nbsp;&nbsp;<input type="radio" @if($data_form->breathing === "ไม่หายใจ") checked="" @endif> ไม่หายใจ
						</td>
					</tr> 
				</table>
				<table width="100%">
					<tr>
						<td width="60px"><b>บาดแผล</b></td>

						<td>
							@php
								$wound_values = explode(',', $data_form->wound);
							@endphp
							<input type="radio" @if(in_array("ไม่มี", $wound_values)) checked="" @endif> ไม่มี
							&nbsp;&nbsp;<input type="radio" @if(in_array("แผลถลอก", $wound_values)) checked="" @endif> แผลถลอก
							&nbsp;&nbsp;<input type="radio" @if(in_array("ฉีกขาด/ตัด", $wound_values)) checked="" @endif> ฉีกขาด/ตัด
							&nbsp;&nbsp;<input type="radio" @if(in_array("แผลฝกช้ำ", $wound_values)) checked="" @endif> แผลฝกช้ำ
							&nbsp;&nbsp;<input type="radio" @if(in_array("แผลไหม้", $wound_values)) checked="" @endif> แผลไหม้
							&nbsp;&nbsp;<input type="radio" @if(in_array("ถูกยิง", $wound_values)) checked="" @endif> ถูกยิง
							&nbsp;&nbsp;<input type="radio" @if(in_array("ถูกแทง", $wound_values)) checked="" @endif> ถูกแทง
							&nbsp;&nbsp;<input type="radio" @if(in_array("อวัยวะตัดขาด", $wound_values)) checked="" @endif> อวัยวะตัดขาด
							&nbsp;&nbsp;<input type="radio" @if(in_array("ถูกระเบิด", $wound_values)) checked="" @endif> ถูกระเบิด
						</td>
					</tr>
				</table>
				<table width="100%">
					<tr>
						<td width="60px"><b>กระดูกผิดรูป</b></td>

						<td>
						<input type="radio" @if($data_form->deformed_bone === "ไม่มี") checked="" @endif> ไม่มี
						&nbsp;&nbsp;<input type="radio" @if($data_form->deformed_bone === "ผิดรูป") checked="" @endif> ผิดรูป

						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td class="border" style="padding-left: 5px;">
				อวัยวะ
				@php
					$organ_values = explode(',', $data_form->organ);
				@endphp
							<input type="radio" @if(in_array("ศีรษะ/คอ", $organ_values)) checked="" @endif> ศีรษะ/คอ
				&nbsp;&nbsp;<input type="radio" @if(in_array("ใบหน้า", $organ_values)) checked="" @endif> ใบหน้า
				&nbsp;&nbsp;<input type="radio" @if(in_array("สันหลัง/หลัง", $organ_values)) checked="" @endif> สันหลัง/หลัง
				&nbsp;&nbsp;<input type="radio" @if(in_array("หน้าอก/ไหปลาร้า", $organ_values)) checked="" @endif> หน้าอก/ไหปลาร้า
				&nbsp;&nbsp;<input type="radio" @if(in_array("ช่องท้อง", $organ_values)) checked="" @endif> ช่องท้อง
				&nbsp;&nbsp;<input type="radio" @if(in_array("เชิงกราน", $organ_values)) checked="" @endif> เชิงกราน
				&nbsp;&nbsp;<input type="radio" @if(in_array("Extremities", $organ_values)) checked="" @endif> Extremities
				&nbsp;&nbsp;<input type="radio" @if(in_array("ผิวหนัง", $organ_values)) checked="" @endif> ผิวหนัง
				&nbsp;&nbsp;<input type="radio" @if(in_array("Multiple injury back", $organ_values)) checked="" @endif> Multiple injury back
			</td>
		</tr>
		<tr>
			<td class="border" align="center">
				การช่วยเหลือ
			</td>
		</tr>
		<tr style="position: fixed; right: 0mm; bottom: 0mm; rotate: 120;">
			<td class="border" width="98%">
				<table width="100%">
					<tr>
						<td width="72px"><b>ทางเดินหายใจ</b></td>

						@php
							$respiratory_tract_values = explode(',', $data_form->respiratory_tract);

						@endphp
						<td>
						<input type="radio" @if(in_array("ไม่", $respiratory_tract_values)) checked="" @endif> ไม่
						&nbsp;&nbsp;<input type="radio" @if(in_array("เปิดทางเดินหายใจ", $respiratory_tract_values)) checked="" @endif> เปิดทางเดินหายใจ
						&nbsp;&nbsp;<input type="radio" @if(in_array("Oral_airway", $respiratory_tract_values)) checked="" @endif> ใส่ Oral airway
						&nbsp;&nbsp;<input type="radio" @if(in_array("O2_canula/mask", $respiratory_tract_values)) checked="" @endif> ให้ O<sub>2</sub> canula/mask
						&nbsp;&nbsp;<input type="radio" @if(in_array("Ambubag", $respiratory_tract_values)) checked="" @endif> ให้ Ambu bag
						&nbsp;&nbsp;<input type="radio" @if(in_array("Pocket Mask", $respiratory_tract_values)) checked="" @endif> Pocket Mask

						</td>
					</tr>
				</table>
				<table width="100%">
					<tr>
						<td width="72px"><b>บาดแผล/ห้ามเลือด</b></td>
						<td>
						<input type="radio" @if($data_form->wound_hemostasis === "ไม่ได้ทำ") checked="" @endif> ไม่ได้ทำ
						&nbsp;&nbsp;<input type="radio" @if($data_form->wound_hemostasis === "การกดห้ามเลือด") checked="" @endif>  การกดห้ามเลือด
						&nbsp;&nbsp;<input type="radio" @if($data_form->wound_hemostasis === "ทำแผล") checked="" @endif> ทำแผล


						</td>
					</tr> 
				</table>
				<table width="100%">
					<tr>
						<td width="72px"><b>การดามกระดูก</b></td>

						<td>

							@php
                                $bone_splint_values = explode(',', $data_form->bone_splint);
							@endphp

							<input type="radio" @if(in_array("ไม่ได้ทำ", $bone_splint_values)) checked="" @endif> ไม่ได้ทำ
							&nbsp;&nbsp;<input type="radio" @if(in_array("เฝือกลม/ไม้ดาม/sling", $bone_splint_values)) checked="" @endif> เฝือกลม/ไม้ดาม/sling
							&nbsp;&nbsp;<input type="radio" @if(in_array("เฝือกดามคอและกระดานรองหลังยาว", $bone_splint_values)) checked="" @endif> เฝือกดามคอและกระดานรองหลังยาว
							&nbsp;&nbsp;<input type="radio" @if(in_array("เฝือกหลังและคอ (KED)", $bone_splint_values)) checked="" @endif> เฝือกหลังและคอ (KED)

						</td>
					</tr>
				</table>
				<table width="100%">
					<tr>
						<td width="72px"><b>ช่วยฟื้นคืนชีพ</b></td>

						<td>
						<input type="radio" @if($data_form->help_revive === "ไม่ได้ทำ") checked="" @endif> ไม่ได้ทำ
						&nbsp;&nbsp;<input type="radio" @if($data_form->help_revive === "ทำ") checked="" @endif> ทำ

						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<table width="100%" style="border-spacing: -1px;font-size: 13px; margin-top:1px">
		<tr >
			<td class="border" height="2%" >
			&nbsp;&nbsp; <b>ผลการดูแลรักษาขั้นต้น</b> <span>

			@php
				$results_of_care_values = explode(',', $data_form->results_of_care);
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
</div>

<p style="margin-bottom: 0;margin-left: 15px;margin-top: 0;"><b>๔. เกณฑ์การตัดสินใจส่งโรงพยาบาล <small>(โดยหัวหน้าทีมและ/ผ่านการเห็นชอบของศูนย์ฯ)</small></b></p>
<div class="border" style="margin-top:1px">
	<table  width="100%"   style="border-spacing:0px;font-size: 13px;">
		<tr  width="100%">
			<td style="padding-left: 5px;" colspan="2">
				นำส่งห้องฉุกเฉินโรงพยาบาล 
				
				<span>{{mb_strimwidth($data_form->name_hospital, 0,150, '...')}}</span> 
				<span>
					&nbsp;&nbsp;<input width="50%" type="radio" @if($data_form->type_hospital == "โรงพยาบาลรัฐ") checked="" @endif>&nbsp;โรงพยาบาลรัฐ
					&nbsp;&nbsp;<input width="50%" type="radio" @if($data_form->type_hospital == "โรงพยาบาลเอกชน") checked="" @endif>&nbsp;โรงพยาบาลเอกชน
					
				</span>
			</td>
		</tr>
		<tr width="100%">
			<td style="padding-left: 5px;">
				เหตุผล 
				<span>
					@php
						$reason_choosing_hospital_values = explode(',', $data_form->reason_choosing_hospital);
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
	<table style="border-spacing:0px;font-size: 13px;">
		<tr>
			<td style="padding-left: 5px;width: 200px;">
				ผู้สรุปรายงาน
				
				{{mb_strimwidth($data_form->recorder, 0,120, '...')}}

			</td>
			<td width="200px">รหัส
				{{$data_form->id_recorder}}
			</td>
		</tr>
	</table>
</div>

<p style="margin-bottom: 0;margin-left: 15px;margin-top: 0;">๕. <b>การประเมิน/รับรองการนำส่ง (โดยแพทย์ พยาบาล ประจำโรงพยาบาลที่รับดูแลต่อ) เพิ่ม RC code</b></p>
<div>
	<div class="border">
		<table  width="100%" style="border-spacing:0px;font-size: 13px;">
			<tr>
				<td style="padding-left: 5px;" width="100px">
					HN
					
					{{mb_strimwidth($data_form->HN, 0,120, '...')}}

				</td>
				<td width="200px">การวินิจฉัยโรค
				{{mb_strimwidth($data_form->diagnosis, 0,150, '...')}}

				</td>
			</tr>
		</table>
		<table  width="100%" style="border-spacing:0px;font-size: 13px;">
			<tr>
				<td style="padding-left: 5px;">ระดับการคัดแยก (ER Triage)

				&nbsp;&nbsp;<input width="50%" type="radio" @if($data_form->er == "แดง(วิกฤติ)") checked="" @endif>&nbsp;แดง(วิกฤติ) L1,L2	
				&nbsp;&nbsp;<input width="50%" type="radio" @if($data_form->er == "เหลือง(เร่งด่วน) ") checked="" @endif>&nbsp;เหลือง(เร่งด่วน) L3
				&nbsp;&nbsp;<input width="50%" type="radio" @if($data_form->er == "เขียว(ไม่รุนแรง)") checked="" @endif>&nbsp;เขียว(ไม่รุนแรง) L4
				&nbsp;&nbsp;<input width="50%" type="radio" @if($data_form->er == "ขาว(ทั่วไป)") checked="" @endif>&nbsp;ขาว(ทั่วไป) L5
				&nbsp;&nbsp;<input width="50%" type="radio" @if($data_form->er == "ดำ(รับบริการสาธารณสุขอื่น)") checked="" @endif>&nbsp;ดำ(รับบริการสาธารณสุขอื่น) ไม่ใช่ผู้ป่วย
				</td>
			</tr>
		</table>
	</div>
	
	<table class="border" width="100%" style="border-spacing:0px;font-size: 13px;margin-top:-1px">
		<tr>
			<td style="padding-left: 5px;">ทางเดินหายใจ</td>
			<td>
				<input width="50%" type="radio" @if($data_form->respiratory_tract_by_doctor == "ไม่จำเป็น") checked="" @endif>&nbsp;ไม่จำเป็น
			</td>
			<td>
				<input width="50%" type="radio" @if($data_form->respiratory_tract_by_doctor == "ไม่ได้ทำ") checked="" @endif>&nbsp;ไม่ได้ทำ
			</td>
			<td>
				<input width="50%" type="radio" @if($data_form->respiratory_tract_by_doctor == "ทำและเหมาสม") checked="" @endif>&nbsp;ทำและเหมาสม
			</td>
			<td>
				<input width="50%" type="radio" @if($data_form->respiratory_tract_by_doctor == "ทำแต่ไม่เหมาะ") checked="" @endif>&nbsp;ทำแต่ไม่เหมาะสม ระบุ  @if($data_form->respiratory_tract_by_doctor == "ทำแต่ไม่เหมาะ") {{mb_strimwidth($data_form->respiratory_tract_by_doctor_detail, 0,150, '...')}} @endif
			</td>
		</tr>
		<tr>
			<td style="padding-left: 5px;">การห้ามเลือด</td>
			<td>
				<input width="50%" type="radio" @if($data_form->hemostasis_by_doctor == "ไม่จำเป็น") checked="" @endif>&nbsp;ไม่จำเป็น
			</td>
			<td>
				<input width="50%" type="radio" @if($data_form->hemostasis_by_doctor == "ไม่ได้ทำ") checked="" @endif>&nbsp;ไม่ได้ทำ
			</td>
			<td>
				<input width="50%" type="radio" @if($data_form->hemostasis_by_doctor == "ทำและเหมาสม") checked="" @endif>&nbsp;ทำและเหมาสม
			</td>
			<td>
				<input width="50%" type="radio" @if($data_form->hemostasis_by_doctor == "ทำแต่ไม่เหมาะ") checked="" @endif>&nbsp;ทำแต่ไม่เหมาะสม ระบุ @if($data_form->hemostasis_by_doctor == "ทำแต่ไม่เหมาะ") {{mb_strimwidth($data_form->hemostasis_by_doctor_detail, 0,150, '...')}}  @endif
			</td>
		</tr>
		<tr>
			<td style="padding-left: 5px;">การดามกระดูก</td>
			<td>
				<input width="50%" type="radio" @if($data_form->splint_by_doctor == "ไม่จำเป็น") checked="" @endif>&nbsp;ไม่จำเป็น
			</td>
			<td>
				<input width="50%" type="radio" @if($data_form->splint_by_doctor == "ไม่ได้ทำ") checked="" @endif>&nbsp;ไม่ได้ทำ
			</td>
			<td>
				<input width="50%" type="radio" @if($data_form->splint_by_doctor == "ทำและเหมาสม") checked="" @endif>&nbsp;ทำและเหมาสม
			</td>
			<td>
				<input width="50%" type="radio" @if($data_form->splint_by_doctor == "ทำแต่ไม่เหมาะ") checked="" @endif>&nbsp;ทำแต่ไม่เหมาะสม ระบุ @if($data_form->splint_by_doctor == "ทำแต่ไม่เหมาะ")  {{mb_strimwidth($data_form->splint_by_doctor_detail, 0,150, '...')}}  @endif
			</td>
		</tr>
	</table>
	<table class="border" width="100%" style="border-spacing:0px;font-size: 13px;margin-top:-1px">
		<tr>
			<td width="250px" style="padding-left: 5px;">
				ชื่อผู้ประเมิน {{mb_strimwidth($data_form->name_doctor, 0,150, '...')}}
			</td>
			<td style="padding-left: 5px;">
				<input width="50%" type="radio" @if($data_form->role_doctor == "แพทย์") checked="" @endif>&nbsp;แพทย์
				&nbsp;&nbsp;<input width="50%" type="radio" @if($data_form->role_doctor == "พยาบาล") checked="" @endif>&nbsp;พยาบาล
				@if($data_form->role_doctor !== "แพทย์" && $data_form->role_doctor !== "พยาบาล")
					&nbsp;&nbsp;<input type="radio" checked="">อื่นๆ {{$data_form->role_other}}
				@endif
			</td>
		</tr>
	</table>
</div>

<p style="margin-bottom: 0;margin-left: 15px;margin-top: 0;">๖. <b>ผลการรักษาในโรงพยาบาล</b> (ติดตามทุกวันสิ้นเดือน)</small></p>
<table class="border" width="100%" style="font-size: 13px;margin-top:-1px">
	<tr>
		<td >
		&nbsp;<b>Admitted</b>
			&nbsp;&nbsp;&nbsp;&nbsp;<input width="50%" type="radio" @if($data_form->admitted == "Yes") checked="" @endif>&nbsp;Yes
			<input width="50%" type="radio" @if($data_form->admitted == "No") checked="" @endif>&nbsp;No

		</td>
	</tr>
	<tr>
		<td>
		&nbsp;&nbsp;&nbsp;&nbsp;<input width="50%" type="radio" @if($data_form->treatment_effect == "ทุเลา") checked="" @endif>&nbsp;ทุเลา
		<input width="50%" type="radio" @if($data_form->treatment_effect == "รักษาต่อที่อื่น") checked="" @endif>&nbsp;รักษาต่อที่อื่น
		<input width="50%" type="radio" @if($data_form->treatment_effect == "ยังรักษาต่อในรพ") checked="" @endif>&nbsp;ยังรักษาต่อในรพ
		<input width="50%" type="radio" @if($data_form->treatment_effect == "เสียชีวิตใน รพ.") checked="" @endif>&nbsp;รักษาต่อที่อื่น
		<input width="50%" type="radio" @if($data_form->treatment_effect == "ปฎิเสธการรักษา/หนีกลับ") checked="" @endif>&nbsp;ปฎิเสธการรักษา/หนีกลับ
		<input width="50%" type="radio" @if($data_form->treatment_effect == "กลับไปตายบ้าน") checked="" @endif>&nbsp;กลับไปตายบ้าน
		<input width="50%" type="radio" @if($data_form->treatment_effect == "ตามแล้วไม่ทราบผล") checked="" @endif>&nbsp;ตามแล้วไม่ทราบผล
		</td>
	</tr>
</table>

<p align="center" class="my-0" style="font-size: 13px;">
	ส่งแบบบันทึกกลับมาที่สำนักงานระบบบริการการแพทย์ฉุกเฉินประจังหวัดก่อนวันสิ้นเดือนนั้น
</p>