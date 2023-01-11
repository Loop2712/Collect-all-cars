<div class="container">
	<div class="row">
		<div id="carousel_form_yellow" class="carousel slide m-0 p-0" data-interval="false" data-ride="carousel"  style="height: 100%;padding: 25px;border-radius: 25px;">
		  	<div class="carousel-inner">

		    	<div id="form_data_1" class="form_yellow carousel-item active">
		      		<div class="col-12">
						<h3><b>1.ข้อมูลทั่วไป</b></h3>
					</div>
					<hr>
					<div class="col-12">
						<p style="font-size:20px;">
							<b>รับแจ้งเหตุทาง</b><br>
							<input type="checkbox" name="be_notified" value="โทรศัพท์หมายเลข ๑๖๖๙">&nbsp;&nbsp;โทรศัพท์หมายเลข ๑๖๖๙<sup>(๑)</sup>&nbsp;&nbsp;
							<input type="checkbox" name="be_notified" value="โทรศัพท์หมายเลข ๑๖๖๙ (second call)">&nbsp;&nbsp;โทรศัพท์หมายเลข ๑๖๖๙ (second call)<sup>(๒)</sup>&nbsp;&nbsp;
							<input type="checkbox" name="be_notified" value="โทรศัพท์หมายเลขอื่นๆ">&nbsp;&nbsp;โทรศัพท์หมายเลขอื่นๆ<sup>(๓)</sup>&nbsp;&nbsp;
							<br>
							<input type="checkbox" name="be_notified" value="วิทยุสื่อสาร">&nbsp;&nbsp;วิทยุสื่อสาร&nbsp;&nbsp;
							<input type="checkbox" name="be_notified" value="วิธีอื่นๆ">&nbsp;&nbsp;วิธีอื่นๆ&nbsp;&nbsp;
						</p>
						<p style="font-size:20px;">
							<b>ชื่อ/รหัสผู้แจ้งเหตุ</b>
							<input type="text" class="form-control" name="name_user" value="{{ isset($sos_help_center->name_user) ? $sos_help_center->name_user : ''}}">
							<br>
							<b>โทรศัพท์ผู้แจ้ง/ความถี่วิทยุ</b>
							<input type="text" class="form-control" name="phone_user" value="{{ isset($sos_help_center->phone_user) ? $sos_help_center->phone_user : ''}}">
							<br>
							<b>สถานที่เกิดเหตุ</b>
							<span id="location_user"></span>
							<span style="float:right;" class="btn btn-sm btn-info text-white main-shadow main-radius">รับรายละเอียดที่อยู่ (<span>100</span>)</span>
							<textarea class="form-control" name="location_sos" rows="4"></textarea>

						</p>
					</div>
		    	</div>
		    	<div id="form_data_2" class="form_yellow carousel-item">
		      		<div class="col-12">
						<h3><b>2.อาการนำสำคัญของผู้ป่วยฉุกเฉินที่ได้จากการรับแข้ง</b></h3>
					</div>
					<hr>
					<div class="row">
						<div class="col-6">
							<p style="font-size:20px;">
								<input type="checkbox" name="symptom" value="symptom_1">&nbsp;&nbsp;๑.ปวดท้อง หลัง เชิงกราน และขาหนีบ&nbsp;&nbsp;
								<br>
								<input type="checkbox" name="symptom" value="symptom_2">&nbsp;&nbsp;๒.แอนนาฟิแลกซิส ปฏิกิริยาภูมิแพ้/แมลงกัด&nbsp;&nbsp;
								<br>
								<input type="checkbox" name="symptom" value="symptom_3">&nbsp;&nbsp;๓.สัตว์กัด&nbsp;&nbsp;
								<br>
								<input type="checkbox" name="symptom" value="symptom_4">&nbsp;&nbsp;๔.เลือดออกไม่ใช่จากการบาดเจ็บ&nbsp;&nbsp;
								<br>
								<input type="checkbox" name="symptom" value="symptom_5">&nbsp;&nbsp;๕.หายใจลำบาก&nbsp;&nbsp;
								<br>
								<input type="checkbox" name="symptom" value="symptom_6">&nbsp;&nbsp;๖.หัวใจหยุดเต้น&nbsp;&nbsp;
								<br>
								<input type="checkbox" name="symptom" value="symptom_7">&nbsp;&nbsp;๗.เจ็บแน่นทรางออก หัวใจ&nbsp;&nbsp;
								<br>
								<input type="checkbox" name="symptom" value="symptom_8">&nbsp;&nbsp;๘.สำลักอุดทางเดินหายใจ&nbsp;&nbsp;
								<br>
								<input type="checkbox" name="symptom" value="symptom_9">&nbsp;&nbsp;๙.เบาหวาน&nbsp;&nbsp;
								<br>
								<input type="checkbox" name="symptom" value="symptom_10">&nbsp;&nbsp;๑๐.อันตรายจากสภาพแวดล้อม&nbsp;&nbsp;
								<br>
								<input class="d-none" type="checkbox" name="symptom" value="symptom_11">&nbsp;&nbsp;&nbsp;&nbsp;๑๑.<span style="text-decoration: line-through;">อื่นๆ(เว้นว่าง)</span><sup>(๔)</sup>&nbsp;&nbsp;
								<br>
								<input type="checkbox" name="symptom" value="symptom_12">&nbsp;&nbsp;๑๒.ปวดศรีษะ ลำคอ&nbsp;&nbsp;
								<br>
								<input type="checkbox" name="symptom" value="symptom_13">&nbsp;&nbsp;๑๓.คลุ้มคลั่ง จิตประสาท อารมณ์&nbsp;&nbsp;
								<br>
							</p>
						</div>
						<div class="col-6">
							<p style="font-size:20px;">
								
								<input type="checkbox" name="symptom" value="symptom_14">&nbsp;&nbsp;๑๔.ยาเกิดขนาด ได้รับพิษ&nbsp;&nbsp;
								<br>
								<input type="checkbox" name="symptom" value="symptom_15">&nbsp;&nbsp;๑๕.มีครรภ คลอด นรี&nbsp;&nbsp;
								<br>

								<input type="checkbox" name="symptom" value="symptom_16">&nbsp;&nbsp;๑๖.ชัก&nbsp;&nbsp;
								<br>
								<input type="checkbox" name="symptom" value="symptom_17">&nbsp;&nbsp;๑๗.ป่วย อ่อนเพลีย&nbsp;&nbsp;
								<br>
								<input type="checkbox" name="symptom" value="symptom_18">&nbsp;&nbsp;๑๘.อัมพาต (หลอดเลือดสมองตีบ แตก)&nbsp;&nbsp;
								<br>
								<input type="checkbox" name="symptom" value="symptom_19">&nbsp;&nbsp;๑๙.หมดสติ ไม่ตอบสนอง หมดสติชั่ววูบ&nbsp;&nbsp;
								<br>
								<input type="checkbox" name="symptom" value="symptom_20">&nbsp;&nbsp;๒๐.เด็ก ทารก (กุมารเวชกรรม)&nbsp;&nbsp;
								<br>

								<input type="checkbox" name="symptom" value="symptom_21">&nbsp;&nbsp;๒๑.ถูกทำร้าย บาดเจ็บ&nbsp;&nbsp;
								<br>
								<input type="checkbox" name="symptom" value="symptom_22">&nbsp;&nbsp;๒๒.ไฟไหม้ ลวก ความร้อน กระแสไฟฟ้า สารเคมี&nbsp;&nbsp;
								<br>
								<input type="checkbox" name="symptom" value="symptom_23">&nbsp;&nbsp;๒๓.จมน้ำ หน้าคว่ำจมน้ำ บาดเจ็บเหตุดำน้ำ บาดเจ็บทางน้ำ&nbsp;&nbsp;
								<br>
								<input type="checkbox" name="symptom" value="symptom_24">&nbsp;&nbsp;๒๔.พลัดตกหลุม อุบัติเหตุ&nbsp;&nbsp;
								<br>
								<input type="checkbox" name="symptom" value="symptom_25">&nbsp;&nbsp;๒๕.อุบัติเหตุยานยนต์&nbsp;&nbsp;
								<br>
							</p>
						</div>
					</div>
		    	</div>
		    	<div id="form_data_3" class="form_yellow carousel-item">
		      		<div class="col-12">
						<h3><b>3.อาการ/เหตุการณ์/รายละเอียดอื่นๆ</b></h3>
					</div>
					<hr>
					<textarea class="form-control" name="symptom_other" rows="15" placeholder="อธิบายถึง อาการ เหตุการณ์หรือรายละเอียดอื่นๆ"></textarea>
		    	</div>
		    	<div id="form_data_4" class="form_yellow carousel-item">
		      		<div class="col-12">
						<h3><b>4.การให้รหัสความรุนแรง <span style="font-size:15px;">IDC (Incident Dispatch Code)<sup>(๕)</sup></span></b></h3>
					</div>
					<hr>
					<div class="row">
						<div class="col-6">
							<p style="font-size:20px;">
								<input type="checkbox" name="idc" value="idc_red">&nbsp;&nbsp;แดง(วิกฤติ)&nbsp;&nbsp;
								<br>
								<input type="checkbox" name="idc" value="idc_yellow">&nbsp;&nbsp;เหลือง(เร่งด่วน)&nbsp;&nbsp;
								<br>
								<input type="checkbox" name="idc" value="idc_green">&nbsp;&nbsp;เขียว(ไม่รุนแรง)&nbsp;&nbsp;
								<br>
							</p>
						</div>
						<div class="col-6">
							<p style="font-size:20px;">
								<input type="checkbox" name="idc" value="idc_white">&nbsp;&nbsp;ขาว(ทั่วไป)&nbsp;&nbsp;
								<br>
								<input type="checkbox" name="idc" value="idc_black">&nbsp;&nbsp;ดำ(รับบริการสาธารณสุขอื่น)&nbsp;&nbsp;
								<br>
							</p>
						</div>
					</div>
		    	</div>
		    	<div id="form_data_5" class="form_yellow carousel-item">
		      		<div class="col-12">
						<h3><b>5.การสั่งการ (โดยการเห็นชอบของหัวหน้าศูนย์ฯ)</b></h3>
					</div>
					<hr>
					<div class="row">
						<div class="col-12">
							<p style="font-size:20px;">
								<b>ชนิดยานพาหนะ<sup>(๗)</sup></b>&nbsp;&nbsp;
								<input type="checkbox" name="vehicle_type" value="vehicle_car">&nbsp;&nbsp; รถ &nbsp;&nbsp;
								<input type="checkbox" name="vehicle_type" value="vehicle_aircraft">&nbsp;&nbsp; อากาศยาน &nbsp;&nbsp;
								<input type="checkbox" name="vehicle_type" value="vehicle_ship_1">&nbsp;&nbsp; เรือ ป.๑ &nbsp;&nbsp;
								<input type="checkbox" name="vehicle_type" value="vehicle_ship_2">&nbsp;&nbsp; เรือ ป.๒ &nbsp;&nbsp;
								<input type="checkbox" name="vehicle_type" value="vehicle_ship_3">&nbsp;&nbsp; เรือ ป.๓ &nbsp;&nbsp;
								<input type="checkbox" name="vehicle_type" value="vehicle_ship_other">&nbsp;&nbsp; เรือประเภทอื่นๆ &nbsp;&nbsp;
							</p>
						</div>
						<div class="col-12">
							<div class="row">
								<div class="col-4">
									<p style="font-size:20px;"><b>ชื่อหน่วยปฏิบัติการ</b></p>
									<input type="text" class="form-control" name="operation_unit_name" value="">
								</div>
								<div class="col-4">
									<p style="font-size:20px;"><b>ชื่อชุดปฏิบัติการ</b></p>
									<input type="text" class="form-control" name="action_set_name" value="">
								</div>
								<div class="col-4">
									<p style="font-size:20px;"><b>ประเภทชุดปฏิบัติการ</b></p>
									<p style="font-size:20px;">
										<input type="checkbox" name="operating_suit_type" value="FR">&nbsp; FR &nbsp;
										<input type="checkbox" name="operating_suit_type" value="BLS">&nbsp; BLS &nbsp;
										<input type="checkbox" name="operating_suit_type" value="ILS">&nbsp; ILS &nbsp;
										<input type="checkbox" name="operating_suit_type" value="ALS">&nbsp; ALS &nbsp;
									</p>
								</div>
							</div>
						</div>
						<!-- ตารางเวลาปฏิบัติการ -->
						<div class="col-12 text-center" style="padding-right: 35px;padding-left:35px;">
							<hr>
							<div class="table-responsive-sm">
								<table class="table table-bordered " style="border-color:#000000;font-size: 18px;">
								  <thead>
								    <tr>
								      <th scope="col"></th>
								      <th scope="col">รับแจ้ง</th>
								      <th scope="col">สั่งการ</th>
								      <th scope="col">ออกจากฐาน</th>
								      <th scope="col">ถึงที่เกิดเหตุ</th>
								      <th scope="col">ออกจากที่เกิดเหตุ</th>
								      <th scope="col">ถึง รพ.</th>
								      <th scope="col">ถึงฐาน</th>
								    </tr>
								  </thead>
								  <tbody>
								    <tr>
								      	<th scope="row">
								      		เวลา (น.)
								      	</th>
							      		<td>
								      		<input class="form-control" type="time" name="time_create_sos" id="time_create_sos" value="{{ isset($sos_help_center->time_create_sos) ? $sos_help_center->time_create_sos : ''}}">
								      	</td>
								      	<td>
								      		<input class="form-control" type="time" name="time_command" id="time_command" value="{{ isset($sos_help_center->time_command) ? $sos_help_center->time_command : ''}}">
								      	</td>
								      	<td>
								      		<input class="form-control" type="time" name="time_go_to_help" id="time_go_to_help" value="{{ isset($sos_help_center->time_go_to_help) ? $sos_help_center->time_go_to_help : ''}}">
								      	</td>
								      	<td>
								      		<input class="form-control" type="time" name="time_to_the_scene" id="time_to_the_scene" value="{{ isset($sos_help_center->time_to_the_scene) ? $sos_help_center->time_to_the_scene : ''}}">
								      	</td>
								      	<td>
								      		<input class="form-control" type="time" name="time_leave_the_scene" id="time_leave_the_scene" value="{{ isset($sos_help_center->time_leave_the_scene) ? $sos_help_center->time_leave_the_scene : ''}}">
								      	</td>
								      	<td>
								      		<input class="form-control" type="time" name="time_hospital" id="time_hospital" value="{{ isset($sos_help_center->time_hospital) ? $sos_help_center->time_hospital : ''}}">
								      	</td>
								      	<td>
								      		<input class="form-control" type="time" name="time_to_the_operating_base" id="time_to_the_operating_base" value="{{ isset($sos_help_center->time_to_the_operating_base) ? $sos_help_center->time_to_the_operating_base : ''}}">
								  		</td>
								    </tr>
								    <tr>
								      	<th scope="row">
								      		รวมเวลา (นาที)
								      	</th>
									    <td colspan="4">
									    	Response time = ........ นาที
									    </td>
									    <td style="background-color:#D3D3D3;">
									    	<!--  -->
									    </td>
									    <td colspan="2">
									    	........ นาที
									    </td>
								    </tr>
								    <tr>
								      	<th scope="row">
									      	เลข กม.
									      </th>
								      	<td colspan="3">
									      	<input class="form-control" type="time" name="km_create_sos_to_go_to_help" id="km_create_sos_to_go_to_help" value="">
									    </td>
								      	<td colspan="2">
								      		<input class="form-control" type="time" name="km_to_the_scene_to_leave_the_scene" id="km_to_the_scene_to_leave_the_scene" value="">
								      	</td>
								      	<td>
								      		<input class="form-control" type="time" name="km_hospital" id="km_hospital" value="">
								      	</td>
								      	<td>
								      		<input class="form-control" type="time" name="km_operating_base" id="km_operating_base" value="">
								      	</td>
								    </tr>
								    <tr>
								      	<th rowspan="2">
									      	ระยะทาง (กม.)
									  	</th>
								      	<td rowspan="2" colspan="4">
									      	รวมระยะทางไป ................ กม.
									    </td>
								      	<td style="background-color:#D3D3D3;">
								      		<!--  -->
								      	</td>
								      	<td colspan="2">
								      		ระยะทางกลับ ....... กม.
								      	</td>
								      	</td>
								    </tr>
								    <tr>
								      	<td colspan="2">
								      		ระยะไป รพ. ....... กม.
								      	</td>
								      	<td style="background-color:#D3D3D3;">
								      		<!--  -->
								      	</td>
								    </tr>
								  </tbody>
								</table>
							</div>
							
						</div>
					</div>
				</div>
				<div id="form_data_6" class="form_yellow carousel-item">
		      		<div class="col-12">
						<h3><b>6.การให้รหัสความรุนแรง ณ จุดเกิดเหตุ RC(Response Code)</b></h3>
					</div>
					<hr>
					<div class="row">
						<div class="col-6">
							<p style="font-size:20px;">
								<input type="checkbox" name="rc" value="rc_red">&nbsp;&nbsp;แดง(วิกฤติ)&nbsp;&nbsp;
								<br>
								<input type="checkbox" name="rc" value="rc_yellow">&nbsp;&nbsp;เหลือง(เร่งด่วน)&nbsp;&nbsp;
								<br>
								<input type="checkbox" name="rc" value="rc_green">&nbsp;&nbsp;เขียว(ไม่รุนแรง)&nbsp;&nbsp;
								<br>
							</p>
						</div>
						<div class="col-6">
							<p style="font-size:20px;">
								<input type="checkbox" name="rc" value="rc_white">&nbsp;&nbsp;ขาว(ทั่วไป)&nbsp;&nbsp;
								<br>
								<input type="checkbox" name="rc" value="rc_black">&nbsp;&nbsp;ดำ รหัส..&nbsp;&nbsp;
								<input type="text" class="form-control" name="rc_black_text" placeholder="ดำ รหัส.." value="">
								<br>
							</p>
						</div>
					</div>
				</div>
				<div id="form_data_7" class="form_yellow carousel-item">
		      		<div class="col-12">
						<h3><b>7</b></h3>
					</div>
					<hr>
				</div>
				<div id="form_data_8" class="form_yellow carousel-item">
		      		<div class="col-12">
						<h3><b>8</b></h3>
					</div>
					<hr>
				</div>
				<div id="form_data_9" class="form_yellow carousel-item">
		      		<div class="col-12">
						<h3><b>9</b></h3>
					</div>
					<hr>
				</div>

			</div>
		</div>
	</div>
	<div class="row" style="position: absolute;bottom: 1%;right:3%;">
        <!-- -----------------BTN prev next------------------- -->
        <div class="col-12 d-flex align-items-end">
            <h4 class="text-primary text-end">
                <i id="btn_prev" class="fa-solid fa-caret-left text-secondary" href="#carousel_form_yellow" role="button" data-slide="prev" onclick="check_active('remove');"></i>
                &nbsp;&nbsp;

                <i id="btn_circle_1" class="fa-solid fa-circle-1 text-info" role="button" onclick="go_to_form_data('1');"></i>
                &nbsp;&nbsp;
                <i id="btn_circle_2" class="fa-regular fa-circle-2 text-success" role="button" onclick="go_to_form_data('2');"></i>
                &nbsp;&nbsp;
                <i id="btn_circle_3" class="fa-regular fa-circle-3 text-danger" role="button" onclick="go_to_form_data('3');"></i>
                &nbsp;&nbsp;
                <i id="btn_circle_4" class="fa-regular fa-circle-4 text-danger" role="button" onclick="go_to_form_data('4');"></i>
                &nbsp;&nbsp;
                <i id="btn_circle_5" class="fa-regular fa-circle-5 text-danger" role="button" onclick="go_to_form_data('5');"></i>
                &nbsp;&nbsp;
                <i id="btn_circle_6" class="fa-regular fa-circle-6 text-danger" role="button" onclick="go_to_form_data('6');"></i>
                &nbsp;&nbsp;
                <i id="btn_circle_7" class="fa-regular fa-circle-7 text-danger" role="button" onclick="go_to_form_data('7');"></i>
                &nbsp;&nbsp;
                <i id="btn_circle_8" class="fa-regular fa-circle-8 text-danger" role="button" onclick="go_to_form_data('8');"></i>
                &nbsp;&nbsp;
                <i id="btn_circle_9" class="fa-regular fa-circle-9 text-danger" role="button" onclick="go_to_form_data('9');"></i>
                &nbsp;&nbsp;

                <i id="btn_next" class="fa-solid fa-caret-right text-secondary" href="#carousel_form_yellow" role="button" data-slide="next" onclick="check_active('add');"></i>
            </h4>
        </div>
    </div>

</div>


<script>

	function check_active(type){
		// console.log(type);

		// fa-solid fa-circle-1 text-info => หน้าปุจจุบัน
		// fa-regular fa-circle-1 text-success => หน้าข้อมูลครบแล้ว
		// fa-regular fa-circle-1 text-danger => หน้าข้อมูล "ยังไม่" ครบ

		let btn_prev = document.querySelector('#btn_prev');
		let btn_next = document.querySelector('#btn_next');

		let min = 1 ;
		let max = document.querySelectorAll('.form_yellow').length ;
			// console.log("max >> " + max);
		
		let active = document.querySelector('.active').id;
		let active_sp = active.split("_");
			// console.log(active_sp[2]);

		if (type === "add") {

			if (parseInt(active_sp[2]) === max) {
				document.querySelector('#btn_circle_1').classList.remove('text-secondary') ;
				document.querySelector('#btn_circle_1').classList.add('text-info') ;

				document.querySelector('#btn_circle_' + active_sp[2]).classList.remove('text-info') ;
				document.querySelector('#btn_circle_' + active_sp[2]).classList.add('text-secondary') ;
			}else{
				// document.querySelector('#span_form_data').innerHTML = parseInt(active_sp[2]) + 1 ;
				let active_next = parseInt(active_sp[2]) + 1 ;

				document.querySelector('#btn_circle_' + active_next).classList.remove('text-secondary') ;
				document.querySelector('#btn_circle_' + active_next).classList.add('text-info') ;
				
				document.querySelector('#btn_circle_' + active_sp[2]).classList.remove('text-info') ;
				document.querySelector('#btn_circle_' + active_sp[2]).classList.add('text-secondary') ;
			}

		}else if (type === "remove"){

			if (parseInt(active_sp[2]) === min) {
				document.querySelector('#btn_circle_' + max).classList.remove('text-secondary') ;
				document.querySelector('#btn_circle_' + max).classList.add('text-info') ;

				document.querySelector('#btn_circle_' + active_sp[2]).classList.remove('text-info') ;
				document.querySelector('#btn_circle_' + active_sp[2]).classList.add('text-secondary') ;
			}else{
				// document.querySelector('#span_form_data').innerHTML = parseInt(active_sp[2]) + 1 ;
				let active_prev = parseInt(active_sp[2]) - 1 ;

				document.querySelector('#btn_circle_' + active_prev).classList.remove('text-secondary') ;
				document.querySelector('#btn_circle_' + active_prev).classList.add('text-info') ;
				
				document.querySelector('#btn_circle_' + active_sp[2]).classList.remove('text-info') ;
				document.querySelector('#btn_circle_' + active_sp[2]).classList.add('text-secondary') ;
			}
		}
	}

	function go_to_form_data(click_to){
		// console.log(click_to);

		let active = document.querySelector('.active').id;
		let active_sp = active.split("_");
			// console.log("active >> " + active_sp[2]);

		document.querySelector('#btn_circle_' + active_sp[2]).classList.remove('text-info') ;
		document.querySelector('#btn_circle_' + active_sp[2]).classList.add('text-secondary') ;

		document.querySelector('#btn_circle_' + click_to).classList.add('text-info') ;
		document.querySelector('#btn_circle_' + click_to).classList.remove('text-secondary') ;

		document.querySelector('#form_data_' + active_sp[2]).classList.remove('active');
		document.querySelector('#form_data_' + click_to).classList.add('active');
	}

</script>

