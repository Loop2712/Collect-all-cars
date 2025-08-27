





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
	}.mt-green{
		margin-top:-40px;

	}.mt-color{
		margin-top:15px;
	}
</style>
<br>
<div style='text-align:center;' class="@if($sos_help_center->form_color_name === "green") mt-green @else mt-color  @endif ">
	<span style="font-size: 19px;font-weight: bolder;"><b>แบบบันทึกการรับแจ้งเหตุและสั่งการการแพทย์ฉุกเฉิน</b></span>
	<span>จังหวัด {{$sos_help_center->officers_command_by->area}}</span>
</div>
<!-- {{$sos_help_center}} -->
<table width="100%" style="padding-left: 0px;">
	<tr >
		<td width="10%">
			<span >๑.ข้อมูลทั่วไป</span>
		</td>
		<td width="20%">วันที่{{ thaidate("j F Y" , strtotime($sos_help_center->created_at)) }}</td>
		<td width="20%" >
			<span >เลขปฎิบัติการที่ {{$sos_help_center->operating_code}}</span>
		</td>
		<td width="20%" >
			<span >ลำดับผู้ป่วย (CN)</span>
		</td>
	</tr>

</table>
<!-- <img src="{{ url('storage')}}/{{ Auth::user()->photo }}" alt="" width="50px" height="50px" > -->
<!-- <ul>asdf</ul> -->
<!-- <p style="position: absolute;top:10%;white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;  width: 100%; background-color: #000;">asdas</p> -->
<table width="100%" cellpadding="10" style="border: 1px solid #000;font-size: 13.5px;margin-left: 10px;">
	<tr>
		<td class="py-0" colspan="4">
				<span>
					<b>รับแจ้งเหตุทาง </b>
				</span>
				&nbsp;<input type="radio" @if($sos_help_center->form_yellow->be_notified === "แพลตฟอร์มวีเช็ค") checked="" @endif>แพลตฟอร์มวีเช็ค
				&nbsp;<input type="radio" @if($sos_help_center->form_yellow->be_notified === "โทรศัพท์หมายเลข ๑๖๖๙") checked="" @endif>โทรศัพทหมายเลข ๑๖๖๙<sup>(๑)</sup>
				&nbsp;<input type="radio" @if($sos_help_center->form_yellow->be_notified === "โทรศัพท์หมายเลข ๑๖๖๙ (second call)") checked="" @endif>โทรศัพท์หมายเลข ๑๖๖๙ (second call)<sup>(๒)</sup>
				&nbsp;<input type="radio" @if($sos_help_center->form_yellow->be_notified === "โทรศัพท์หมายเลขอื่นๆ") checked="" @endif>โทรศัพท์หมายเลขอื่น ๆ<sup>(๓)</sup>
				&nbsp;<input type="radio" @if($sos_help_center->form_yellow->be_notified === "วิทยุสื่อสาร") checked="" @endif>วิทยุสื่อสาร
				&nbsp;<input type="radio" @if($sos_help_center->form_yellow->be_notified === "วิธีอื่นๆ") checked="" @endif>วิธีอื่น ๆ
		</td>
	</tr>
	<tr>
		<td class="py-0"  colspan="2">ชื่อ/รหัสผู้แจ้งเหตุ 
			<span align="center" class="under-line text-center">{{$sos_help_center->name_user}}</span>
		</td>
		<td class="py-0" colspan="2">โทรศัพท์/ความถี่วิทยุ 
			<span class="under-line">{{$sos_help_center->phone_user}}</span>
		</td>
	</tr>
	<tr >
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
	</tr>
</table>


<p style="padding-left: 0px;margin-bottom: 2px;">๒. อาการนำสำคัญของผู้ป่วยฉุกเฉินที่ได้จากการรับแจ้ง</p>
@php
	$symptom_values = explode(',', $sos_help_center->form_yellow->symptom);
@endphp

<table width="100%" cellpadding="10" style="border: 1px solid #000;font-size: 13.5px;margin-left: 10px;">
	<tr>
		<td class="py-0"><input type="radio" @if(in_array("ปวดท้อง หลัง เชิงกราน และขาหนีบ", $symptom_values)) checked="" @endif> ๑.ปวดท้อง หลัง เชิงกราน และขาหนีบ</td>
		<td class="py-0"><input type="radio" @if(in_array("แอนนาฟิแลกซิส ปฏิกิริยาภูมิแพ้/แมลงกัด", $symptom_values)) checked="" @endif> ๒.แอนนาฟิแลกซิส ปฏิกิริยาภูมิแพ้/แมลงกัด</td>
		<td class="py-0"><input type="radio" @if(in_array("สัตว์กัด", $symptom_values)) checked="" @endif> ๓.สัตว์กัด</td>
		<td class="py-0"><input type="radio" @if(in_array("เลือดออกไม่ใช่จากการบาดเจ็บ", $symptom_values)) checked="" @endif> ๔.เลือดออกไม่ใช่จากการบาดเจ็บ</td>
	</tr>
	<tr>
		<td class="py-0"><input type="radio" @if(in_array("หายใจลำบาก", $symptom_values)) checked="" @endif> ๕.หายใจลำบาก </td>
		<td class="py-0"><input type="radio" @if(in_array("หัวใจหยุดเต้น", $symptom_values)) checked="" @endif> ๖.หัวใจหยุดเต้น</td>
		<td class="py-0"><input type="radio" @if(in_array("เจ็บแน่นทรางออก หัวใจ", $symptom_values)) checked="" @endif> ๗.เจ็บแน่นทรางออก หัวใจ</td>
		<td class="py-0"><input type="radio" @if(in_array("สำลักอุดทางเดินหายใจ", $symptom_values)) checked="" @endif> ๘.สำลักอุดทางเดินหายใจ</td>
	</tr>
	<tr>
		<td class="py-0"><input type="radio" @if(in_array("เบาหวาน", $symptom_values)) checked="" @endif> ๙.เบาหวาน</td>
		<td class="py-0"><input type="radio" @if(in_array("อันตรายจากสภาพแวดล้อม", $symptom_values)) checked="" @endif> ๑๐.อันตรายจากสภาพแวดล้อม</td>
		<td class="py-0"><input type="radio" @if(in_array("อื่นๆ(เว้นว่าง)", $symptom_values)) checked="" @endif> ๑๑.<s>อื่นๆ(เว้นว่าง)</s><sup>(๔)</sup></td>
		<td class="py-0"><input type="radio" @if(in_array("ปวดศรีษะ ลำคอ", $symptom_values)) checked="" @endif> ๑๒.ปวดศรีษะ ลำคอ </td>
	</tr>
	<tr>
		<td class="py-0"><input type="radio" @if(in_array("คลุ้มคลั่ง จิตประสาท อารมณ์", $symptom_values)) checked="" @endif> ๑๓.คลุ้มคลั่ง จิตประสาท อารมณ์ </td>
		<td class="py-0"><input type="radio" @if(in_array("ยาเกิดขนาด ได้รับพิษ", $symptom_values)) checked="" @endif> ๑๔.ยาเกิดขนาด ได้รับพิษ </td>
		<td class="py-0"><input type="radio" @if(in_array("มีครรภ คลอด นรี", $symptom_values)) checked="" @endif> ๑๕.มีครรภ คลอด นรี </td>
		<td class="py-0"><input type="radio" @if(in_array("ชัก", $symptom_values)) checked="" @endif> ๑๖.ชัก </td>
	</tr>
	<tr>
		<td class="py-0"><input type="radio" @if(in_array("ป่วย อ่อนเพลีย", $symptom_values)) checked="" @endif> ๑๗.ป่วย อ่อนเพลีย </td>
		<td class="py-0"><input type="radio" @if(in_array("อัมพาต (หลอดเลือดสมองตีบ แตก)", $symptom_values)) checked="" @endif> ๑๘.อัมพาต (หลอดเลือดสมองตีบ แตก) </td>
	</tr>
	<tr>
		<td class="py-0"><input type="radio" @if(in_array("หมดสติ ไม่ตอบสนอง หมดสติชั่ววูบ", $symptom_values)) checked="" @endif> ๑๙.หมดสติ ไม่ตอบสนอง หมดสติชั่ววูบ </td>
		<td class="py-0"><input type="radio" @if(in_array("เด็ก ทารก (กุมารเวชกรรม)", $symptom_values)) checked="" @endif> ๒๐.เด็ก ทารก (กุมารเวชกรรม) </td>
		<td class="py-0"><input type="radio" @if(in_array("ถูกทำร้าย บาดเจ็บ", $symptom_values)) checked="" @endif> ๒๑.ถูกทำร้าย บาดเจ็บ </td>
	</tr>
	<tr>
		<td class="py-0" colspan="2"><input type="radio" @if(in_array("ไฟไหม้ ลวก ความร้อน กระแสไฟฟ้า สารเคมี", $symptom_values)) checked="" @endif> ๒๒.ไฟไหม้ ลวก ความร้อน กระแสไฟฟ้า สารเคมี </td>
		<td class="py-0" colspan="2"><input type="radio" @if(in_array("จมน้ำ หน้าคว่ำจมน้ำ บาดเจ็บเหตุดำน้ำ บาดเจ็บทางน้ำ", $symptom_values)) checked="" @endif> ๒๓.จมน้ำ หน้าคว่ำจมน้ำ บาดเจ็บเหตุดำน้ำ บาดเจ็บทางน้ำ </td>
	</tr>
	<tr>
		<td class="py-0"><input type="radio" @if(in_array("พลัดตกหลุม อุบัติเหตุ", $symptom_values)) checked="" @endif> ๒๔.พลัดตกหลุม อุบัติเหตุ </td>
		<td class="py-0"><input type="radio" @if(in_array("อุบัติเหตุยานยนต์", $symptom_values)) checked="" @endif> ๒๕.อุบัติเหตุยานยนต์ </td>
	</tr>
</table>
@php

$maxWidth_symptom = 105; // ความยาวสูงสุดที่ต้องการ

$maxWidthsymptom_other = mb_strimwidth($sos_help_center->form_yellow->symptom_other, 0, $maxWidth_symptom, '...');

@endphp
<p style="margin-bottom: 0;">๓. อาการ/เหตุการณ์/รายละเอียดอื่นๆ   &nbsp;&nbsp; {{$maxWidthsymptom_other}}</p>
<p class="my-0">๔. การให้รหัสความรุนแรง <span style="font-size: 11px;">IDC (Incident Dispatch Code) <sup>(๕)</sup></span> <input type="radio" @if($sos_help_center->form_yellow->idc === "แดง(วิกฤติ)") checked="" @endif>แดง(วิกฤติ) <input type="radio" @if($sos_help_center->form_yellow->idc === "เหลือง(เร่งด่วน)") checked="" @endif>เหลือง(เร่งด่วน) <input type="radio" @if($sos_help_center->form_yellow->idc === "เขียว(ไม่รุนแรง)") checked="" @endif>เขียว(ไม่รุนแรง) <input type="radio" @if($sos_help_center->form_yellow->idc === "ขาว(ทั่วไป)") checked="" @endif>ขาว(ทั่วไป)   <input type="radio" @if($sos_help_center->form_yellow->idc === "ดำ(รับบริการสาธารณสุขอื่น)") checked="" @endif>ดำ(รับบริการสาธารณสุขอื่น) </p>


<p class="my-0">๕. การสั่งการ (โดยการเห็นชอบของหัวหน้าศูนย์ฯ)</p>
<div style="border: 1px solid #000; margin-left: 10px; padding-bottom:10px;padding-right: 5px;">
<table width="100%" style="font-size: 13.5px;margin-left: 10px;">
		<tr>
			<td colspan="6">
				<p class="my-0">
					ชนิดยานพาหนะ <sup>(๗)</sup> &nbsp;&nbsp;&nbsp;
					<input  type="radio" @if($sos_help_center->operating_officer->vehicle_type === "รถ") checked="" @endif>รถ&nbsp;&nbsp;&nbsp;
					<input  type="radio" @if($sos_help_center->operating_officer->vehicle_type === "อากาศยาน") checked="" @endif>อากาศยาน&nbsp;&nbsp;&nbsp;
					<input  type="radio" @if($sos_help_center->operating_officer->vehicle_type === "เรือ ป.1") checked="" @endif>เรือ ป.1&nbsp;&nbsp;&nbsp;
					<input  type="radio" @if($sos_help_center->operating_officer->vehicle_type === "เรือ ป.2") checked="" @endif>เรือ ป.2&nbsp;&nbsp;&nbsp;
					<input  type="radio" @if($sos_help_center->operating_officer->vehicle_type === "เรือ ป.3") checked="" @endif>เรือ ป.3&nbsp;&nbsp;&nbsp;
					<input  type="radio" @if($sos_help_center->operating_officer->vehicle_type === "เรือประเภทอื่นๆ") checked="" @endif>เรือประเภทอื่นๆ
				</p>
			</td>
		</tr>

		@php
		$maxWidth = 33; // ความยาวสูงสุดที่ต้องการ

		$operating_officer_name = mb_strimwidth($sos_help_center->operating_unit->name, 0, $maxWidth, '...');
		@endphp
		<tr>
			<td colspan="2">ชื่อหน่วยปฏิบัติการ {{$operating_officer_name}}</td>
			<td colspan="2">ชื่อชุดปฏิบัติการ {{$sos_help_center->form_yellow->action_set_name}}</td>
			<td colspan="2">
				ประเภทชุดปฏิบัติการ &nbsp;&nbsp;&nbsp;
				<input  type="radio" @if($sos_help_center->operating_officer->level === "ALS") checked="" @endif>ALS&nbsp;&nbsp;&nbsp;
				<input  type="radio" @if($sos_help_center->operating_officer->level === "ILS") checked="" @endif>ILS&nbsp;&nbsp;&nbsp;
				<input  type="radio" @if($sos_help_center->operating_officer->level === "BLS") checked="" @endif>BLS&nbsp;&nbsp;&nbsp;
				<input  type="radio" @if($sos_help_center->operating_officer->level === "FR") checked="" @endif>FR&nbsp;&nbsp;&nbsp;
			</td>
		</tr>

		
	</table>	


	<table width="100%" style="border: 1px solid #000;font-size: 11px;margin-left: 10px; padding: 0;border-spacing: -1px;">
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

		@php
			if($sos_help_center->form_color_name == "green"){
				$data_color = $sos_help_center->form_green;
			}elseif($sos_help_center->form_color_name == "blue"){
				$data_color = $sos_help_center->form_blue;
			}elseif($sos_help_center->form_color_name == "pink"){
				$data_color = $sos_help_center->form_pink;
			}
		@endphp
	<table width="100%" style="font-size: 13.5px;margin-left: 10px;">
		<tr>
			<td>ทีมผู้ปฎิบัติการ</td>
			<td>แพทย์ @if($data_color->role_doctor == "แพทย์") {{$data_color->name_doctor}} @endif</td>
			<td>พยาบาล @if($data_color->role_doctor == "พยาบาล") {{$data_color->name_doctor}} @endif</td>
			<td>เจ้าหน้าที่ ๑ {{$data_color->name_helper_1}}</td>
			<td>เจ้าหน้าที่ ๒ {{$data_color->name_helper_2}}</td>
			<td>เจ้าหน้าที่ ๓ {{$data_color->name_helper_3}}</td>
		</tr>
	</table>
</div>

<p style="margin-bottom:0">๖. การให้รหัสความรุนแรง ณจุดเกิดเหตุ <span style="font-size: 11px;">RC (Response Code) <sup>(๖)</sup></span> &nbsp; 
	<span style="font-size: 15;">
		&nbsp;<input type="radio" @if($sos_help_center->form_yellow->rc === "แดง(วิกฤติ)") checked="" @endif>แดง(วิกฤติ) 
		&nbsp;<input type="radio" @if($sos_help_center->form_yellow->rc === "เหลือง(เร่งด่วน)") checked="" @endif>เหลือง(เร่งด่วน) 
		&nbsp;<input type="radio" @if($sos_help_center->form_yellow->rc === "เขียว(ไม่รุนแรง)") checked="" @endif>เขียว(ไม่รุนแรง) 
		&nbsp;<input type="radio" @if($sos_help_center->form_yellow->rc === "ขาว(ทั่วไป)") checked="" @endif>ขาว(ทั่วไป)   
		&nbsp;<input type="radio" @if($sos_help_center->form_yellow->rc === "ดำ(รับบริการสาธารณสุขอื่น)") checked="" @endif>ดำ @if($sos_help_center->form_yellow->rc === "ดำ(รับบริการสาธารณสุขอื่น)") รหัส {{$sos_help_center->form_yellow->rc_black_text}} @endif
	</span> 
</p>

<p class="my-0">๗. การปฎิบัติการ</p>
<table width="100%" style="font-size: 13.5px;margin-left: 10px;border-spacing: -1px;">
	<tr>
		<td class="border" align="center"><input type="radio" @if($sos_help_center->form_yellow->treatment === "มีการรักษา") checked="" @endif>มีการรักษา </td>
		<td class="border" align="center"><input type="radio" @if($sos_help_center->form_yellow->treatment === "ไม่มีการรักษา") checked="" @endif>ไม่มีการรักษา </td>
	</tr>
	<tr>
		<td class="border" align="center" style="padding: 5px;">
				&nbsp;&nbsp;<input type="radio" @if($sos_help_center->form_yellow->sub_treatment === "นำส่ง") checked="" @endif>นำส่ง
				&nbsp;&nbsp;<input type="radio" @if($sos_help_center->form_yellow->sub_treatment === "ส่งต่อชุดปฏิบัติการระดับสูงกว่า") checked="" @endif>ส่งต่อชุดปฏิบัติการระดับสูงกว่า 
				&nbsp;&nbsp;<input type="radio" @if($sos_help_center->form_yellow->sub_treatment === "ไม่นำส่ง") checked="" @endif>ไม่นำส่ง <br>
				&nbsp;&nbsp;<input type="radio" @if($sos_help_center->form_yellow->sub_treatment === "เสียชีวิตระหว่างนำส่ง") checked="" @endif>เสียชีวิตระหว่างนำส่ง
				&nbsp;&nbsp;<input type="radio" @if($sos_help_center->form_yellow->sub_treatment === "เสียชีวิต ณ จุดเกิดเหตุ") checked="" @endif>เสียชีวิต ณ จุดเกิดเหตุ
		</td>
		<td class="border" align="center" style="padding: 5px;">
			&nbsp;&nbsp;<input type="radio" @if($sos_help_center->form_yellow->sub_treatment === "ผู้ป่วยปฏิเสธการรักษา") checked="" @endif>ผู้ป่วยปฏิเสธการรักษา / ไม่ประสงค์ไปโรงพยาบาล <br>
			&nbsp;&nbsp;<input type="radio" @if($sos_help_center->form_yellow->sub_treatment === "ยกเลิก") checked="" @endif>ยกเลิก
			&nbsp;&nbsp;<input type="radio" @if($sos_help_center->form_yellow->sub_treatment === "ไม่พบเหตุ") checked="" @endif>ไม่พบเหตุ
			&nbsp;&nbsp;<input type="radio" @if($sos_help_center->form_yellow->sub_treatment === "เสียชีวิตก่อนชุดปฏิบัติการไปถึง") checked="" @endif>เสียชีวิตก่อนชุดปฏิบัติการไปถึง
		</td>
	</tr>
</table>

<p class="mb-0">๘. ชื่อผู้ป่วย</p>
<div width="100%" class="border" style="font-size: 13.5px;margin-left: 10px;">
	<table width="100%" class="my-0" style="font-size: 13.5px;margin-left: 2px;margin-bottom: 0;">
		<tr width="100%">
			<td colspan="2">
				ผู้ป่วย ๑. ชื่อ-สกุล {{$data_color->name_title_1}} {{$sos_help_center->form_yellow->patient_name_1}}
			</td>
			<td colspan="1" >อายุ {{$sos_help_center->form_yellow->patient_age_1}} ปี</td>
			<td colspan="2" >HN {{$sos_help_center->form_yellow->patient_hn_1}}</td>
			<td colspan="2" >เลขประจำตัวประชาชน (VN) {{$sos_help_center->form_yellow->patient_vn_1}}</td>
			
		</tr>
		<tr width="100%">
			<td colspan="3" >นำส่งที่จังหวัด {{$sos_help_center->form_yellow->delivered_province_1}}</td>
			<td colspan="4" >นำส่งที่ รพ. {{$sos_help_center->form_yellow->delivered_hospital_1}}</td>
		</tr>

		<tr width="100%">
			<td colspan="2">
				ผู้ป่วย ๒. ชื่อ-สกุล {{$data_color->name_title_2}} {{$sos_help_center->form_yellow->patient_name_2}}
			</td>
			<td colspan="1" >อายุ {{$sos_help_center->form_yellow->patient_age_2}} ปี</td>
			<td colspan="2" >HN {{$sos_help_center->form_yellow->patient_hn_2}}</td>
			<td colspan="2" >เลขประจำตัวประชาชน (VN) {{$sos_help_center->form_yellow->patient_vn_2}}</td>
			
		</tr>
		<tr width="100%" class="mb-0">
			<td colspan="3" >นำส่งที่จังหวัด {{$sos_help_center->form_yellow->delivered_province_2}}</td>
			<td colspan="4" >นำส่งที่ รพ. {{$sos_help_center->form_yellow->delivered_hospital_2}}</td>
		</tr>

		@php
			$submission_criteria_values = explode(',', $sos_help_center->form_yellow->submission_criteria);
			$communication_hospital_values = explode(',', $sos_help_center->form_yellow->communication_hospital);
		@endphp
		
	</table>
		<p style="margin-left: 7px;" class="my-0">
			เกณฑ์การนำส่ง(เลือกได้มากกว่า ๑ ข้อ)
			&nbsp;&nbsp;<input type="radio" @if(in_array("สามารถรักษาได้", $submission_criteria_values)) checked="" @endif> สามารถรักษาได้
			&nbsp;&nbsp;<input type="radio" @if(in_array("อยู่ใกล้", $submission_criteria_values)) checked="" @endif> อยู่ใกล้
			&nbsp;&nbsp;<input type="radio" @if(in_array("มีหลักประกัน", $submission_criteria_values)) checked="" @endif> มีหลักประกัน
			&nbsp;&nbsp;<input type="radio" @if(in_array("ผู้ป่วยเก่า", $submission_criteria_values)) checked="" @endif> ผู้ป่วยเก่า
			&nbsp;&nbsp;<input type="radio" @if(in_array("เป็นความประสงค์", $submission_criteria_values)) checked="" @endif> เป็นความประสงค์
		</p>
		<p style="margin-left: 7px;" class="my-0">
			การติดต่อสื่อสารกับ ร.พ.ที่นำส่ง
			&nbsp;&nbsp;<input type="radio" @if(in_array("แจ้งวิทยุ", $communication_hospital_values)) checked="" @endif> แจ้งวิทยุ
			&nbsp;&nbsp;<input type="radio" @if(in_array("แจ้งทางโทรศัพท์", $communication_hospital_values)) checked="" @endif> แจ้งทางโทรศัพท์
			&nbsp;&nbsp;<input type="radio" @if(in_array("ไม่ได้แจ้ง", $communication_hospital_values)) checked="" @endif> ไม่ได้แจ้ง
		</p>
</div>


<p class="mb-0">๙. เพิ่มเติม เฉพาะ อาการนำสำคัญของผู้ป่วยฉุกเฉินที่ได้จากการรับแจ้ง เป็นรหัส ๒๕ อุบัติเหตุยานยนต์ รายละเอียดการกรอกข้อมูลโปรดดูในโปรแกรม</p>
<table width="100%" style="border: 1px solid #000;font-size: 12px;margin-left: 10px; ">
	<tr>
		<td>ทะเบียนรถหมวด {{$sos_help_center->form_yellow->registration_category}}</td>
		<td>เลขทะเบียน {{$sos_help_center->form_yellow->registration_number}}</td>
		<td>จังหวัด  {{$sos_help_center->form_yellow->registration_province}}</td>
		<td>
			&nbsp;&nbsp;<input type="radio" @if($sos_help_center->form_yellow->owner_registration === "ของผู้ประสบเหตุ") checked="" @endif> ของผู้ประสบเหตุ
			&nbsp;&nbsp;<input type="radio" @if($sos_help_center->form_yellow->owner_registration === "ของคู่กรณี") checked="" @endif> ของคู่กรณี
			&nbsp;&nbsp;<input type="radio" @if($sos_help_center->form_yellow->owner_registration === "ไม่สามารถระบุได้") checked="" @endif> ไม่สามารถระบุได้
		</td>
	</tr>
</table>

<table style="margin-left: 10px; " width="100%">
	<tr>
		<td width="30%">ลงนาม</td>
		<td width="30%" align="center">เจ้าหน้าที่ผู้บันทึก &nbsp;&nbsp;&nbsp; ยังไม่มีนะจ๊ะ ลงนาม</td>
		<td width="30%" align="right">ผู้รับรอง(แพทย์หรือพยาบาล) อันนี้ก็ด้วยนะครับผม </td>
	</tr>
</table>
</div>




