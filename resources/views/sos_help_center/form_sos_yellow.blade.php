<div class="container">
	<div class="row">

		<div id="carousel_form_yellow" class="carousel slide" data-interval="false" data-ride="carousel"  style="height: 100%;padding: 25px;border-radius: 25px;">
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
							<br>
							<input type="checkbox" name="be_notified" value="โทรศัพท์หมายเลขอื่นๆ">&nbsp;&nbsp;โทรศัพท์หมายเลขอื่นๆ<sup>(๓)</sup>&nbsp;&nbsp;
							<input type="checkbox" name="be_notified" value="วิทยุสื่อสาร">&nbsp;&nbsp;วิทยุสื่อสาร&nbsp;&nbsp;
							<input type="checkbox" name="be_notified" value="วิธีอื่นๆ">&nbsp;&nbsp;วิธีอื่นๆ&nbsp;&nbsp;
						</p>
						<p style="font-size:20px;">
							<b>ชื่อ/รหัสผู้แจ้งเหตุ</b>
							<input type="text" class="form-control" name="name_user" value="{{ isset($sos_help_center->name_user) ? $sos_help_center->name_user : ''}}">
							<b>โทรศัพท์ผู้แจ้ง/ความถี่วิทยุ</b>
							<input type="text" class="form-control" name="phone_user" value="{{ isset($sos_help_center->phone_user) ? $sos_help_center->phone_user : ''}}">
							<b>สถานที่เกิดเหตุ</b>
							<input type="text" class="form-control" name="location_sos" id="location_sos" value="">
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
								<input type="checkbox" name="symptom" value="symptom_11">&nbsp;&nbsp;๑๑.<span style="text-decoration: line-through;">อื่นๆ(เว้นว่าง)</span><sup>(๔)</sup>&nbsp;&nbsp;
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
						<h3><b>4.การให้รหัสความรุนแรง <span style="font-size:15px;">IDC (Incident Dispatch Code)</span><sup>(๕)</sup></b></h3>
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
				</div>
			</div>
		</div>
		<div class="col-12">
			<h4 class="text-primary text-end" onclick="check_active();">
				<i class="fa-solid fa-caret-left" style="font-size:35px;" href="#carousel_form_yellow" role="button" data-slide="prev"></i> 
				&nbsp;&nbsp; <span id="span_form_data">1</span>  &nbsp;&nbsp;
				<i class="fa-solid fa-caret-right" style="font-size:35px;" href="#carousel_form_yellow" role="button" data-slide="next"></i>
			</h4>
		</div>

	</div>
</div>

<script>

	function check_active(){

		let max = document.querySelectorAll('.form_yellow').length ;
		// console.log("max >> " + max);
		
		let active = document.querySelector('.active').id;
		let active_sp = active.split("_");

		// console.log(active_sp);

		if (parseInt(active_sp[2]) === max) {
			document.querySelector('#span_form_data').innerHTML = '1' ;
		}else{
			document.querySelector('#span_form_data').innerHTML = parseInt(active_sp[2]) + 1 ;
		}

	}

</script>

