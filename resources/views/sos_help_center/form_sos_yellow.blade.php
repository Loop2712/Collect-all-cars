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
							@php
								$check_be_notified_1 = "" ;
								$check_be_notified_2 = "" ;
								$check_be_notified_3 = "" ;
								$check_be_notified_4 = "" ;
								$check_be_notified_5 = "" ;
								$check_be_notified_6 = "" ;
								if( !empty($sos_help_center->form_yellow->be_notified) ){

									if( $sos_help_center->form_yellow->be_notified == 'แพลตฟอร์มวีเช็ค' ){
										$check_be_notified_1 = "checked";
									}else if( $sos_help_center->form_yellow->be_notified == 'โทรศัพท์หมายเลข ๑๖๖๙' ){
										$check_be_notified_2 = "checked";
									}else if ( $sos_help_center->form_yellow->be_notified == 'โทรศัพท์หมายเลข ๑๖๖๙ (second call)' ){
										$check_be_notified_3 = "checked";
									}else if ( $sos_help_center->form_yellow->be_notified == 'โทรศัพท์หมายเลขอื่นๆ' ){
										$check_be_notified_4 = "checked";
									}else if ( $sos_help_center->form_yellow->be_notified == 'วิทยุสื่อสาร' ){
										$check_be_notified_5 = "checked";
									}else if ( $sos_help_center->form_yellow->be_notified == 'วิธีอื่นๆ' ){
										$check_be_notified_6 = "checked";
									}

								}
							@endphp

							<input type="radio" {{ $check_be_notified_1 }} name="be_notified" value="แพลตฟอร์มวีเช็ค">&nbsp;&nbsp;แพลตฟอร์มวีเช็ค&nbsp;&nbsp;
							<input type="radio" {{ $check_be_notified_2 }} name="be_notified" value="โทรศัพท์หมายเลข ๑๖๖๙">&nbsp;&nbsp;โทรศัพท์หมายเลข ๑๖๖๙<sup>(๑)</sup>&nbsp;&nbsp;
							<input type="radio" {{ $check_be_notified_3 }} name="be_notified" value="โทรศัพท์หมายเลข ๑๖๖๙ (second call)">&nbsp;&nbsp;โทรศัพท์หมายเลข ๑๖๖๙ (second call)<sup>(๒)</sup>&nbsp;&nbsp;
							<br>
							<input type="radio" {{ $check_be_notified_4 }} name="be_notified" value="โทรศัพท์หมายเลขอื่นๆ">&nbsp;&nbsp;โทรศัพท์หมายเลขอื่นๆ<sup>(๓)</sup>&nbsp;&nbsp;
							<input type="radio" {{ $check_be_notified_5 }} name="be_notified" value="วิทยุสื่อสาร">&nbsp;&nbsp;วิทยุสื่อสาร&nbsp;&nbsp;
							<input type="radio" {{ $check_be_notified_6 }} name="be_notified" value="วิธีอื่นๆ">&nbsp;&nbsp;วิธีอื่นๆ&nbsp;&nbsp;
						</p>
						<p style="font-size:20px;">
							<b>ชื่อ/รหัสผู้แจ้งเหตุ</b>
							<input type="text" class="form-control" name="name_user" value="{{ isset($sos_help_center->name_user) ? $sos_help_center->name_user : ''}}">
							<br>
							<b>โทรศัพท์ผู้แจ้ง/ความถี่วิทยุ</b>
							<input type="text" class="form-control" name="phone_user" value="{{ isset($sos_help_center->phone_user) ? $sos_help_center->phone_user : ''}}">
							<br>
							<b>สถานที่เกิดเหตุ</b>
							<span id="location_user" class="d-none"></span>
							<div class="row">
								<div class="form-group col-4 {{ $errors->has('lat') ? 'has-error' : ''}}">
	                                <label for="lat" class="control-label">{{ 'Lat' }}</label>
	                                <input class="form-control" name="lat" type="text" id="lat" value="{{ isset($sos_help_center->lat) ? $sos_help_center->lat : ''}}" readonly>
	                                {!! $errors->first('lat', '<p class="help-block">:message</p>') !!}
	                            </div>
	                            <div class="form-group col-4 {{ $errors->has('lng') ? 'has-error' : ''}}">
	                                <label for="lng" class="control-label">{{ 'Lng' }}</label>
	                                <input class="form-control" name="lng" type="text" id="lng" value="{{ isset($sos_help_center->lng) ? $sos_help_center->lng : ''}}" readonly>
	                                {!! $errors->first('lng', '<p class="help-block">:message</p>') !!}
	                            </div>
	                            <div class="col-4">
	                            	<div style="float:right;margin-top: 25px;">
			                            <span class="btn btn-sm btn-danger main-shadow main-radius" data-toggle="modal" data-target="#modal_mapMarkLocation" onclick="mapMarkLocation('12.870032','100.992541','6');">
		                                	เลือกจุดเกิดเหตุ <i class="fa-sharp fa-solid fa-location-crosshairs"></i>
		                            	</span>
		                            	<button id="btn_get_location_user"  class="btn btn-sm btn-info text-white main-shadow main-radius">
		                            		รับรายละเอียดที่อยู่ (<span>100</span>)
		                            	</button>
	                            	</div>
	                            </div>
							</div>
                            <br>
							<textarea class="form-control" name="location_sos" id="detail_location_sos" rows="4" >{{ isset($sos_help_center->form_yellow->location_sos) ? $sos_help_center->form_yellow->location_sos : ''}}</textarea>

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
							@php
								$check_symptom_1 ="";$check_symptom_2 ="";$check_symptom_3 ="";$check_symptom_4 ="";$check_symptom_5 ="";$check_symptom_6 ="";$check_symptom_7 ="";$check_symptom_8 ="";$check_symptom_9 ="";$check_symptom_10 ="";$check_symptom_11 ="";$check_symptom_12 ="";$check_symptom_13 ="";$check_symptom_14 ="";$check_symptom_15 ="";$check_symptom_16 ="";$check_symptom_17 ="";$check_symptom_18 ="";$check_symptom_19 ="";$check_symptom_20 ="";$check_symptom_21 ="";$check_symptom_22 ="";$check_symptom_23 ="";$check_symptom_24 ="";$check_symptom_25 ="";

								if( !empty($sos_help_center->form_yellow->symptom) ){
									$symptom_explode = explode(",", $sos_help_center->form_yellow->symptom);

									for ($i=0; $i < count($symptom_explode); $i++){
										switch ($symptom_explode[$i]) {
							                case 'ปวดท้อง หลัง เชิงกราน และขาหนีบ':
							                    $check_symptom_1 = "checked";
							                    break;
							                case 'แอนนาฟิแลกซิส ปฏิกิริยาภูมิแพ้/แมลงกัด':
							                    $check_symptom_2 = "checked";
							                    break;
							                case 'สัตว์กัด':
							                    $check_symptom_3 = "checked";
							                    break;
							                case 'เลือดออกไม่ใช่จากการบาดเจ็บ':
							                    $check_symptom_4 = "checked";
							                    break;
							                case 'หายใจลำบาก':
							                    $check_symptom_5 = "checked";
							                    break;
							                case 'หัวใจหยุดเต้น':
							                    $check_symptom_6 = "checked";
							                    break;
							                case 'เจ็บแน่นทรางออก หัวใจ':
							                    $check_symptom_7 = "checked";
							                    break;
							                case 'สำลักอุดทางเดินหายใจ':
							                    $check_symptom_8 = "checked";
							                    break;
							                case 'เบาหวาน':
							                    $check_symptom_9 = "checked";
							                    break;
							                case 'อันตรายจากสภาพแวดล้อม':
							                    $check_symptom_10 = "checked";
							                    break;
							                case 'อื่นๆ(เว้นว่าง)':
							                    $check_symptom_11 = "checked";
							                    break;
							                case 'ปวดศรีษะ ลำคอ':
							                    $check_symptom_12 = "checked";
							                    break;
							                case 'คลุ้มคลั่ง จิตประสาท อารมณ์':
							                    $check_symptom_13 = "checked";
							                    break;
							                case 'ยาเกิดขนาด ได้รับพิษ':
							                    $check_symptom_14 = "checked";
							                    break;
							                case 'ยาเกิดขนาด ได้รับพิษ':
							                    $check_symptom_15 = "checked";
							                    break;
							                case 'ชัก':
							                    $check_symptom_16 = "checked";
							                    break;
							                case 'ป่วย อ่อนเพลีย':
							                    $check_symptom_17 = "checked";
							                    break;
							                case 'อัมพาต (หลอดเลือดสมองตีบ แตก)':
							                    $check_symptom_18 = "checked";
							                    break;
							                case 'หมดสติ ไม่ตอบสนอง หมดสติชั่ววูบ':
							                    $check_symptom_19 = "checked";
							                    break;
							                case 'เด็ก ทารก (กุมารเวชกรรม)':
							                    $check_symptom_20 = "checked";
							                    break;
							                case 'ถูกทำร้าย บาดเจ็บ':
							                    $check_symptom_21 = "checked";
							                    break;
							                case 'ไฟไหม้ ลวก ความร้อน กระแสไฟฟ้า สารเคมี':
							                    $check_symptom_22 = "checked";
							                    break;
							                case 'จมน้ำ หน้าคว่ำจมน้ำ บาดเจ็บเหตุดำน้ำ บาดเจ็บทางน้ำ':
							                    $check_symptom_23 = "checked";
							                    break;
							                case 'พลัดตกหลุม อุบัติเหตุ':
							                    $check_symptom_24 = "checked";
							                    break;
							                case 'อุบัติเหตุยานยนต์':
							                    $check_symptom_25 = "checked";
							                    break;
							                
							            }
							        }
							    }
							@endphp
							<p style="font-size:20px;">
								<input type="checkbox" {{ $check_symptom_1 }} class="symptom" name="symptom" value="ปวดท้อง หลัง เชิงกราน และขาหนีบ">&nbsp;&nbsp;๑.ปวดท้อง หลัง เชิงกราน และขาหนีบ&nbsp;&nbsp;
								<br>
								<input type="checkbox" {{ $check_symptom_2 }} class="symptom" name="symptom" value="แอนนาฟิแลกซิส ปฏิกิริยาภูมิแพ้/แมลงกัด">&nbsp;&nbsp;๒.แอนนาฟิแลกซิส ปฏิกิริยาภูมิแพ้/แมลงกัด&nbsp;&nbsp;
								<br>
								<input type="checkbox" {{ $check_symptom_3 }} class="symptom" name="symptom" value="สัตว์กัด">&nbsp;&nbsp;๓.สัตว์กัด&nbsp;&nbsp;
								<br>
								<input type="checkbox" {{ $check_symptom_4 }} class="symptom" name="symptom" value="เลือดออกไม่ใช่จากการบาดเจ็บ">&nbsp;&nbsp;๔.เลือดออกไม่ใช่จากการบาดเจ็บ&nbsp;&nbsp;
								<br>
								<input type="checkbox" {{ $check_symptom_5 }} class="symptom" name="symptom" value="หายใจลำบาก">&nbsp;&nbsp;๕.หายใจลำบาก&nbsp;&nbsp;
								<br>
								<input type="checkbox" {{ $check_symptom_6 }} class="symptom" name="symptom" value="หัวใจหยุดเต้น">&nbsp;&nbsp;๖.หัวใจหยุดเต้น&nbsp;&nbsp;
								<br>
								<input type="checkbox" {{ $check_symptom_7 }} class="symptom" name="symptom" value="เจ็บแน่นทรางออก หัวใจ">&nbsp;&nbsp;๗.เจ็บแน่นทรางออก หัวใจ&nbsp;&nbsp;
								<br>
								<input type="checkbox" {{ $check_symptom_8 }} class="symptom" name="symptom" value="สำลักอุดทางเดินหายใจ">&nbsp;&nbsp;๘.สำลักอุดทางเดินหายใจ&nbsp;&nbsp;
								<br>
								<input type="checkbox" {{ $check_symptom_9 }} class="symptom" name="symptom" value="เบาหวาน">&nbsp;&nbsp;๙.เบาหวาน&nbsp;&nbsp;
								<br>
								<input type="checkbox" {{ $check_symptom_10 }} class="symptom" name="symptom" value="อันตรายจากสภาพแวดล้อม">&nbsp;&nbsp;๑๐.อันตรายจากสภาพแวดล้อม&nbsp;&nbsp;
								<br>
								<input class="d-none" type="checkbox" {{ $check_symptom_11 }} class="symptom" name="symptom" value="อื่นๆ(เว้นว่าง)">&nbsp;&nbsp;&nbsp;&nbsp;๑๑.<span style="text-decoration: line-through;">อื่นๆ(เว้นว่าง)</span><sup>(๔)</sup>&nbsp;&nbsp;
								<br>
								<input type="checkbox" {{ $check_symptom_12 }} class="symptom" name="symptom" value="ปวดศรีษะ ลำคอ">&nbsp;&nbsp;๑๒.ปวดศรีษะ ลำคอ&nbsp;&nbsp;
								<br>
								<input type="checkbox" {{ $check_symptom_13 }} class="symptom" name="symptom" value="คลุ้มคลั่ง จิตประสาท อารมณ์">&nbsp;&nbsp;๑๓.คลุ้มคลั่ง จิตประสาท อารมณ์&nbsp;&nbsp;
								<br>
							</p>
						</div>
						<div class="col-6">
							<p style="font-size:20px;">
								
								<input type="checkbox" {{ $check_symptom_14 }} class="symptom" name="symptom" value="ยาเกิดขนาด ได้รับพิษ">&nbsp;&nbsp;๑๔.ยาเกิดขนาด ได้รับพิษ&nbsp;&nbsp;
								<br>
								<input type="checkbox" {{ $check_symptom_15 }} class="symptom" name="symptom" value="มีครรภ คลอด นรี">&nbsp;&nbsp;๑๕.มีครรภ คลอด นรี&nbsp;&nbsp;
								<br>

								<input type="checkbox" {{ $check_symptom_16 }} class="symptom" name="symptom" value="ชัก">&nbsp;&nbsp;๑๖.ชัก&nbsp;&nbsp;
								<br>
								<input type="checkbox" {{ $check_symptom_17 }} class="symptom" name="symptom" value="ป่วย อ่อนเพลีย">&nbsp;&nbsp;๑๗.ป่วย อ่อนเพลีย&nbsp;&nbsp;
								<br>
								<input type="checkbox" {{ $check_symptom_18 }} class="symptom" name="symptom" value="อัมพาต (หลอดเลือดสมองตีบ แตก)">&nbsp;&nbsp;๑๘.อัมพาต (หลอดเลือดสมองตีบ แตก)&nbsp;&nbsp;
								<br>
								<input type="checkbox" {{ $check_symptom_19 }} class="symptom" name="symptom" value="หมดสติ ไม่ตอบสนอง หมดสติชั่ววูบ">&nbsp;&nbsp;๑๙.หมดสติ ไม่ตอบสนอง หมดสติชั่ววูบ&nbsp;&nbsp;
								<br>
								<input type="checkbox" {{ $check_symptom_20 }} class="symptom" name="symptom" value="เด็ก ทารก (กุมารเวชกรรม)">&nbsp;&nbsp;๒๐.เด็ก ทารก (กุมารเวชกรรม)&nbsp;&nbsp;
								<br>

								<input type="checkbox" {{ $check_symptom_21 }} class="symptom" name="symptom" value="ถูกทำร้าย บาดเจ็บ">&nbsp;&nbsp;๒๑.ถูกทำร้าย บาดเจ็บ&nbsp;&nbsp;
								<br>
								<input type="checkbox" {{ $check_symptom_22 }} class="symptom" name="symptom" value="ไฟไหม้ ลวก ความร้อน กระแสไฟฟ้า สารเคมี">&nbsp;&nbsp;๒๒.ไฟไหม้ ลวก ความร้อน กระแสไฟฟ้า สารเคมี&nbsp;&nbsp;
								<br>
								<input type="checkbox" {{ $check_symptom_23 }} class="symptom" name="symptom" value="จมน้ำ หน้าคว่ำจมน้ำ บาดเจ็บเหตุดำน้ำ บาดเจ็บทางน้ำ">&nbsp;&nbsp;๒๓.จมน้ำ หน้าคว่ำจมน้ำ บาดเจ็บเหตุดำน้ำ บาดเจ็บทางน้ำ&nbsp;&nbsp;
								<br>
								<input type="checkbox" {{ $check_symptom_24 }} class="symptom" name="symptom" value="พลัดตกหลุม อุบัติเหตุ">&nbsp;&nbsp;๒๔.พลัดตกหลุม อุบัติเหตุ&nbsp;&nbsp;
								<br>
								<input type="checkbox" {{ $check_symptom_25 }} class="symptom" name="symptom" value="อุบัติเหตุยานยนต์">&nbsp;&nbsp;๒๕.อุบัติเหตุยานยนต์&nbsp;&nbsp;
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
					<textarea class="form-control" name="symptom_other" rows="15" placeholder="อธิบายถึง อาการ เหตุการณ์หรือรายละเอียดอื่นๆ">{{ isset($sos_help_center->form_yellow->symptom_other) ? $sos_help_center->form_yellow->symptom_other : ''}}</textarea>
		    	</div>
		    	<div id="form_data_4" class="form_yellow carousel-item">
		      		<div class="col-12">
						<h3><b>4.การให้รหัสความรุนแรง <span style="font-size:15px;">IDC (Incident Dispatch Code)<sup>(๕)</sup></span></b></h3>
					</div>
					<hr>
					@php
						$check_idc_1 = "" ;
						$check_idc_2 = "" ;
						$check_idc_3 = "" ;
						$check_idc_4 = "" ;
						$check_idc_5 = "" ;
						if( !empty($sos_help_center->form_yellow->idc) ){
							if( $sos_help_center->form_yellow->idc == 'แดง(วิกฤติ)' ){
								$check_idc_1 = "checked";
							}else if ( $sos_help_center->form_yellow->idc == 'เหลือง(เร่งด่วน)' ){
								$check_idc_2 = "checked";
							}else if ( $sos_help_center->form_yellow->idc == 'เขียว(ไม่รุนแรง)' ){
								$check_idc_3 = "checked";
							}else if ( $sos_help_center->form_yellow->idc == 'ขาว(ทั่วไป)' ){
								$check_idc_4 = "checked";
							}else if ( $sos_help_center->form_yellow->idc == 'ดำ(รับบริการสาธารณสุขอื่น)' ){
								$check_idc_5 = "checked";
							}
						}
					@endphp
					<div class="row">
						<div class="col-6">
							<p style="font-size:20px;">
								<input type="radio" {{ $check_idc_1 }} name="idc" value="แดง(วิกฤติ)">&nbsp;&nbsp;แดง(วิกฤติ)&nbsp;&nbsp;
								<br>
								<input type="radio" {{ $check_idc_2 }} name="idc" value="เหลือง(เร่งด่วน)">&nbsp;&nbsp;เหลือง(เร่งด่วน)&nbsp;&nbsp;
								<br>
								<input type="radio" {{ $check_idc_3 }} name="idc" value="เขียว(ไม่รุนแรง)">&nbsp;&nbsp;เขียว(ไม่รุนแรง)&nbsp;&nbsp;
								<br>
							</p>
						</div>
						<div class="col-6">
							<p style="font-size:20px;">
								<input type="radio" {{ $check_idc_4 }} name="idc" value="ขาว(ทั่วไป)">&nbsp;&nbsp;ขาว(ทั่วไป)&nbsp;&nbsp;
								<br>
								<input type="radio" {{ $check_idc_5 }} name="idc" value="ดำ(รับบริการสาธารณสุขอื่น)">&nbsp;&nbsp;ดำ(รับบริการสาธารณสุขอื่น)&nbsp;&nbsp;
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
					@php
						$check_vehicle_type_1 = "" ;
						$check_vehicle_type_2 = "" ;
						$check_vehicle_type_3 = "" ;
						$check_vehicle_type_4 = "" ;
						$check_vehicle_type_5 = "" ;
						$check_vehicle_type_6 = "" ;
						if( !empty($sos_help_center->form_yellow->vehicle_type) ){
							if( $sos_help_center->form_yellow->vehicle_type == 'รถ' ){
								$check_vehicle_type_1 = "checked";
							}else if ( $sos_help_center->form_yellow->vehicle_type == 'อากาศยาน' ){
								$check_vehicle_type_2 = "checked";
							}else if ( $sos_help_center->form_yellow->vehicle_type == 'เรือ ป.๑' ){
								$check_vehicle_type_3 = "checked";
							}else if ( $sos_help_center->form_yellow->vehicle_type == 'เรือ ป.๒' ){
								$check_vehicle_type_4 = "checked";
							}else if ( $sos_help_center->form_yellow->vehicle_type == 'เรือ ป.๓' ){
								$check_vehicle_type_5 = "checked";
							}else if ( $sos_help_center->form_yellow->vehicle_type == 'เรือประเภทอื่นๆ' ){
								$check_vehicle_type_6 = "checked";
							}
						}
					@endphp
					<div class="row">
						<div class="col-12">
							<p style="font-size:20px;">
								<b>ชนิดยานพาหนะ<sup>(๗)</sup></b>&nbsp;&nbsp;
								<input type="radio" {{ $check_vehicle_type_1 }} name="vehicle_type" value="รถ">&nbsp;&nbsp; รถ &nbsp;&nbsp;
								<input type="radio" {{ $check_vehicle_type_2 }} name="vehicle_type" value="อากาศยาน">&nbsp;&nbsp; อากาศยาน &nbsp;&nbsp;
								<input type="radio" {{ $check_vehicle_type_3 }} name="vehicle_type" value="เรือ ป.๑">&nbsp;&nbsp; เรือ ป.๑ &nbsp;&nbsp;
								<input type="radio" {{ $check_vehicle_type_4 }} name="vehicle_type" value="เรือ ป.๒">&nbsp;&nbsp; เรือ ป.๒ &nbsp;&nbsp;
								<input type="radio" {{ $check_vehicle_type_5 }} name="vehicle_type" value="เรือ ป.๓">&nbsp;&nbsp; เรือ ป.๓ &nbsp;&nbsp;
								<input type="radio" {{ $check_vehicle_type_6 }} name="vehicle_type" value="เรือประเภทอื่นๆ">&nbsp;&nbsp; เรือประเภทอื่นๆ &nbsp;&nbsp;
							</p>
						</div>
						<div class="col-12">
							<div class="row">
								<div class="col-4">
									<p style="font-size:20px;"><b>ชื่อหน่วยปฏิบัติการ</b></p>
									<input type="text" class="form-control" name="operation_unit_name" value="{{ isset($sos_help_center->form_yellow->operation_unit_name) ? $sos_help_center->form_yellow->operation_unit_name : ''}}">
								</div>
								<div class="col-4">
									<p style="font-size:20px;"><b>ชื่อชุดปฏิบัติการ</b></p>
									<input type="text" class="form-control" name="action_set_name" value="{{ isset($sos_help_center->form_yellow->action_set_name) ? $sos_help_center->form_yellow->action_set_name : ''}}">
								</div>
								@php
									$check_operating_suit_type_1 = "" ;
									$check_operating_suit_type_2 = "" ;
									$check_operating_suit_type_3 = "" ;
									$check_operating_suit_type_4 = "" ;
									if( !empty($sos_help_center->form_yellow->operating_suit_type) ){
										if( $sos_help_center->form_yellow->operating_suit_type == 'FR' ){
											$check_operating_suit_type_1 = "checked";
										}else if ( $sos_help_center->form_yellow->operating_suit_type == 'BLS' ){
											$check_operating_suit_type_2 = "checked";
										}else if ( $sos_help_center->form_yellow->operating_suit_type == 'ILS' ){
											$check_operating_suit_type_3 = "checked";
										}else if ( $sos_help_center->form_yellow->operating_suit_type == 'ALS' ){
											$check_operating_suit_type_4 = "checked";
										}
									}
								@endphp
								<div class="col-4">
									<p style="font-size:20px;"><b>ประเภทชุดปฏิบัติการ</b></p>
									<p style="font-size:20px;">
										<input type="radio" {{ $check_operating_suit_type_1 }} name="operating_suit_type" value="FR">&nbsp; FR &nbsp;
										<input type="radio" {{ $check_operating_suit_type_2 }} name="operating_suit_type" value="BLS">&nbsp; BLS &nbsp;
										<input type="radio" {{ $check_operating_suit_type_3 }} name="operating_suit_type" value="ILS">&nbsp; ILS &nbsp;
										<input type="radio" {{ $check_operating_suit_type_4 }} name="operating_suit_type" value="ALS">&nbsp; ALS &nbsp;
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
								      		<input class="form-control" type="time" name="time_create_sos" id="time_create_sos" value="{{ isset($sos_help_center->form_yellow->time_create_sos) ? $sos_help_center->form_yellow->time_create_sos : ''}}">
								      	</td>
								      	<td>
								      		<input class="form-control" type="time" name="time_command" id="time_command" value="{{ isset($sos_help_center->form_yellow->time_command) ? $sos_help_center->form_yellow->time_command : ''}}">
								      	</td>
								      	<td>
								      		<input class="form-control" type="time" name="time_go_to_help" id="time_go_to_help" value="{{ isset($sos_help_center->form_yellow->time_go_to_help) ? $sos_help_center->form_yellow->time_go_to_help : ''}}">
								      	</td>
								      	<td>
								      		<input class="form-control" type="time" name="time_to_the_scene" id="time_to_the_scene" value="{{ isset($sos_help_center->form_yellow->time_to_the_scene) ? $sos_help_center->form_yellow->time_to_the_scene : ''}}">
								      	</td>
								      	<td>
								      		<input class="form-control" type="time" name="time_leave_the_scene" id="time_leave_the_scene" value="{{ isset($sos_help_center->form_yellow->time_leave_the_scene) ? $sos_help_center->form_yellow->time_leave_the_scene : ''}}">
								      	</td>
								      	<td>
								      		<input class="form-control" type="time" name="time_hospital" id="time_hospital" value="{{ isset($sos_help_center->form_yellow->time_hospital) ? $sos_help_center->form_yellow->time_hospital : ''}}">
								      	</td>
								      	<td>
								      		<input class="form-control" type="time" name="time_to_the_operating_base" id="time_to_the_operating_base" value="{{ isset($sos_help_center->form_yellow->time_to_the_operating_base) ? $sos_help_center->form_yellow->time_to_the_operating_base : ''}}">
								  		</td>
								    </tr>
								    <tr>
								      	<th scope="row">
								      		รวมเวลา (นาที)
								      	</th>
									    <td colspan="4">
									    	Response time = { $response_time } นาที
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
									      	<input class="form-control" type="number" min="0" name="km_create_sos_to_go_to_help" id="km_create_sos_to_go_to_help" value="{{ isset($sos_help_center->form_yellow->km_create_sos_to_go_to_help) ? $sos_help_center->form_yellow->km_create_sos_to_go_to_help : ''}}">
									    </td>
								      	<td colspan="2">
								      		<input class="form-control" type="number"min="0" name="km_to_the_scene_to_leave_the_scene" id="km_to_the_scene_to_leave_the_scene" value="{{ isset($sos_help_center->form_yellow->km_to_the_scene_to_leave_the_scene) ? $sos_help_center->form_yellow->km_to_the_scene_to_leave_the_scene : ''}}">
								      	</td>
								      	<td>
								      		<input class="form-control"type="number" min="0" name="km_hospital" id="km_hospital" value="{{ isset($sos_help_center->form_yellow->km_hospital) ? $sos_help_center->form_yellow->km_hospital : ''}}">
								      	</td>
								      	<td>
								      		<input class="form-control" type="number" min="0" name="km_operating_base" id="km_operating_base" value="{{ isset($sos_help_center->form_yellow->km_operating_base) ? $sos_help_center->form_yellow->km_operating_base : ''}}">
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
					@php
						$check_rc_1 = "" ;
						$check_rc_2 = "" ;
						$check_rc_3 = "" ;
						$check_rc_4 = "" ;
						$check_rc_5 = "" ;
						if( !empty($sos_help_center->form_yellow->rc) ){
							if( $sos_help_center->form_yellow->rc == 'แดง(วิกฤติ)' ){
								$check_rc_1 = "checked";
							}else if ( $sos_help_center->form_yellow->rc == 'เหลือง(เร่งด่วน)' ){
								$check_rc_2 = "checked";
							}else if ( $sos_help_center->form_yellow->rc == 'เขียว(ไม่รุนแรง)' ){
								$check_rc_3 = "checked";
							}else if ( $sos_help_center->form_yellow->rc == 'ขาว(ทั่วไป)' ){
								$check_rc_4 = "checked";
							}else if ( $sos_help_center->form_yellow->rc == 'ดำ' ){
								$check_rc_5 = "checked";
							}
						}
					@endphp
					<div class="row">
						<div class="col-6">
							<p style="font-size:20px;">
								<input type="radio" {{ $check_rc_1 }} name="rc" value="แดง(วิกฤติ)" onchange="check_click_rc();">&nbsp;&nbsp;แดง(วิกฤติ)&nbsp;&nbsp;
								<br>
								<input type="radio" {{ $check_rc_2 }} name="rc" value="เหลือง(เร่งด่วน)" onchange="check_click_rc();">&nbsp;&nbsp;เหลือง(เร่งด่วน)&nbsp;&nbsp;
								<br>
								<input type="radio" {{ $check_rc_3 }} name="rc" value="เขียว(ไม่รุนแรง)" onchange="check_click_rc();">&nbsp;&nbsp;เขียว(ไม่รุนแรง)&nbsp;&nbsp;
								<br>
							</p>
						</div>
						<div class="col-6">
							<p style="font-size:20px;">
								<input type="radio" {{ $check_rc_4 }} name="rc" value="ขาว(ทั่วไป)" onchange="check_click_rc();">&nbsp;&nbsp;ขาว(ทั่วไป)&nbsp;&nbsp;
								<br>
								<input type="radio" {{ $check_rc_5 }} name="rc" id="rc_black" value="ดำ" onchange="check_click_rc();">&nbsp;&nbsp;ดำ รหัส..&nbsp;&nbsp;
								<input type="text" class="form-control" name="rc_black_text" id="rc_black_text" placeholder="ดำ รหัส.." value="{{ isset($sos_help_center->form_yellow->rc_black_text) ? $sos_help_center->form_yellow->rc_black_text : ''}}" readonly>
								<br>
							</p>
						</div>
					</div>
				</div>
				<div id="form_data_7" class="form_yellow carousel-item">
		      		<div class="col-12">
						<h3><b>7.การปฏิบัติการ</b></h3>
					</div>
					<hr>
					@php
						$check_treatment_1 = "" ;
						$check_treatment_2 = "" ;
						if( !empty($sos_help_center->form_yellow->treatment) ){
							if( $sos_help_center->form_yellow->treatment == 'มีการรักษา' ){
								$check_treatment_1 = "checked";
							}else if ( $sos_help_center->form_yellow->treatment == 'ไม่มีการรักษา' ){
								$check_treatment_2 = "checked";
							}
						}

						$check_sub_treatment_1 ="";$check_sub_treatment_2 ="";$check_sub_treatment_3 ="";$check_sub_treatment_4 ="";$check_sub_treatment_5 ="";$check_sub_treatment_6 ="";$check_sub_treatment_7 ="";$check_sub_treatment_8 ="";$check_sub_treatment_9 ="";
						if( !empty($sos_help_center->form_yellow->sub_treatment) ){
							$sub_treatment_explode = explode(",", $sos_help_center->form_yellow->sub_treatment);

							for ($i=0; $i < count($sub_treatment_explode); $i++){
								switch ($sub_treatment_explode[$i]) {
					                case 'นำส่ง':
					                    $check_sub_treatment_1 = "checked";
					                    break;
					                case 'ส่งต่อชุดปฏิบัติการระดับสูงกว่า':
					                    $check_sub_treatment_2 = "checked";
					                    break;
					                case 'ไม่นำส่ง':
					                    $check_sub_treatment_3 = "checked";
					                    break;
					                case 'เสียชีวิตระหว่างนำส่ง':
					                    $check_sub_treatment_4 = "checked";
					                    break;
					                case 'เสียชีวิต ณ จุดเกิดเหตุ':
					                    $check_sub_treatment_5 = "checked";
					                    break;
					                case 'ผู้ป่วยปฏิเสธการรักษา / ไม่ประสงค์จะไป รพ.':
					                    $check_sub_treatment_6 = "checked";
					                    break;
					                case 'ยกเลิก':
					                    $check_sub_treatment_7 = "checked";
					                    break;
					                case 'ไม่พบเหตุ':
					                    $check_sub_treatment_8 = "checked";
					                    break;
					                case 'เสียชีวิตก่อนชุดปฏิบัติการไปถึง':
					                    $check_sub_treatment_9 = "checked";
					                    break;
					            }
					        }
					    }
					@endphp
					<div class="row">
						<div class="col-6">
							<p style="font-size:20px;" class="text-center">
								<input type="radio" {{ $check_treatment_1 }} name="treatment" value="มีการรักษา">&nbsp; <b>มีการรักษา</b> &nbsp;
							</p>
							<p style="font-size:20px;">
								<input type="checkbox" {{ $check_sub_treatment_1 }} class="sub_treatment" name="sub_treatment" value="นำส่ง">&nbsp; นำส่ง &nbsp;
								<br>
								<input type="checkbox" {{ $check_sub_treatment_2 }} class="sub_treatment" name="sub_treatment" value="ส่งต่อชุดปฏิบัติการระดับสูงกว่า">&nbsp; ส่งต่อชุดปฏิบัติการระดับสูงกว่า &nbsp;
								<br>
								<input type="checkbox" {{ $check_sub_treatment_3 }} class="sub_treatment" name="sub_treatment" value="ไม่นำส่ง">&nbsp; ไม่นำส่ง &nbsp;
								<br>
								<input type="checkbox" {{ $check_sub_treatment_4 }} class="sub_treatment" name="sub_treatment" value="เสียชีวิตระหว่างนำส่ง">&nbsp; เสียชีวิตระหว่างนำส่ง &nbsp;
								<br>
								<input type="checkbox" {{ $check_sub_treatment_5 }} class="sub_treatment" name="sub_treatment" value="เสียชีวิต ณ จุดเกิดเหตุ">&nbsp; เสียชีวิต ณ จุดเกิดเหตุ &nbsp;
							</p>
						</div>
						<div class="col-6">
							<p style="font-size:20px;" class="text-center">
								<input type="radio" {{ $check_treatment_2 }} name="treatment" value="ไม่มีการรักษา">&nbsp; <b>ไม่มีการรักษา</b> &nbsp;
							</p>
							<p style="font-size:20px;">
								<input type="checkbox" {{ $check_sub_treatment_6 }} class="sub_treatment" name="sub_treatment" value="ผู้ป่วยปฏิเสธการรักษา / ไม่ประสงค์จะไป รพ.">&nbsp; ผู้ป่วยปฏิเสธการรักษา / ไม่ประสงค์จะไป รพ. &nbsp;
								<br>
								<input type="checkbox" {{ $check_sub_treatment_7 }} class="sub_treatment" name="sub_treatment" value="ยกเลิก">&nbsp; ยกเลิก &nbsp;
								<br>
								<input type="checkbox" {{ $check_sub_treatment_8 }} class="sub_treatment" name="sub_treatment" value="ไม่พบเหตุ">&nbsp; ไม่พบเหตุ &nbsp;
								<br>
								<input type="checkbox" {{ $check_sub_treatment_9 }} class="sub_treatment" name="sub_treatment" value="เสียชีวิตก่อนชุดปฏิบัติการไปถึง">&nbsp; เสียชีวิตก่อนชุดปฏิบัติการไปถึง &nbsp;
							</p>
						</div>
					</div>
				</div>
				<div id="form_data_8" class="form_yellow carousel-item">
		      		<div class="col-12">
						<h3><b>8.ชื่อผู้ป่วย</b></h3>
					</div>
					<hr>
					<div class="row">
						<!-- ---------------- ผู้ป่วย ๑. --------------- -->
						<div class="col-4">
							<p style="font-size:20px;">
								<b>ผู้ป่วย ๑. ชื่อ-สกุล</b>
							</p>
							<input class="form-control" type="text" name="patient_name_1" id="patient_name_1" value="{{ isset($sos_help_center->form_yellow->patient_name_1) ? $sos_help_center->form_yellow->patient_name_1 : ''}}">
						</div>
						<div class="col-2">
							<p style="font-size:20px;">
								<b>อายุ (ปี)</b>
							</p>
							<input class="form-control" type="number" min="1" name="patient_age_1" id="patient_age_1" value="{{ isset($sos_help_center->form_yellow->patient_age_1) ? $sos_help_center->form_yellow->patient_age_1 : ''}}">
						</div>
						<div class="col-3">
							<p style="font-size:20px;">
								<b>HN</b>
							</p>
							<input class="form-control" type="text" name="patient_hn_1" id="patient_hn_1" value="{{ isset($sos_help_center->form_yellow->patient_hn_1) ? $sos_help_center->form_yellow->patient_hn_1 : ''}}">
						</div>
						<div class="col-3">
							<p style="font-size:20px;">
								<b>เลขประจำตัวประชาชน (VN)</b>
							</p>
							<input class="form-control" type="text" name="patient_vn_1" id="patient_vn_1" value="{{ isset($sos_help_center->form_yellow->patient_vn_1) ? $sos_help_center->form_yellow->patient_vn_1 : ''}}">
						</div>
						 <p><!-- --></p> 
						<div class="col-6">
							<p style="font-size:20px;">
								<b>นำส่งที่จังหวัด</b>
							</p>
							<input class="form-control" type="text" name="delivered_province_1" id="delivered_province_1" value="{{ isset($sos_help_center->form_yellow->delivered_province_1) ? $sos_help_center->form_yellow->delivered_province_1 : ''}}">
						</div>
						<div class="col-6">
							<p style="font-size:20px;">
								<b>นำส่ง รพ.</b>
							</p>
							<input class="form-control" type="text" name="delivered_hospital_1" id="delivered_hospital_1" value="{{ isset($sos_help_center->form_yellow->delivered_hospital_1) ? $sos_help_center->form_yellow->delivered_hospital_1 : ''}}">
						</div>
						<div class="col-12">
							<center>
								<hr style="width:80%;border-width: 0.5px;">
							</center>
						</div>
						<!-- ---------------- ผู้ป่วย ๒. --------------- -->
						<div class="col-4">
							<p style="font-size:20px;">
								<b>ผู้ป่วย ๒. ชื่อ-สกุล</b>
							</p>
							<input class="form-control" type="text" name="patient_name_2" id="patient_name_2" value="{{ isset($sos_help_center->form_yellow->patient_name_2) ? $sos_help_center->form_yellow->patient_name_2 : ''}}">
						</div>
						<div class="col-2">
							<p style="font-size:20px;">
								<b>อายุ (ปี)</b>
							</p>
							<input class="form-control" type="number" min="1" name="patient_age_2" id="patient_age_2" value="{{ isset($sos_help_center->form_yellow->patient_age_2) ? $sos_help_center->form_yellow->patient_age_2 : ''}}">
						</div>
						<div class="col-3">
							<p style="font-size:20px;">
								<b>HN</b>
							</p>
							<input class="form-control" type="text" name="patient_hn_2" id="patient_hn_2" value="{{ isset($sos_help_center->form_yellow->patient_hn_2) ? $sos_help_center->form_yellow->patient_hn_2 : ''}}">
						</div>
						<div class="col-3">
							<p style="font-size:20px;">
								<b>เลขประจำตัวประชาชน (VN)</b>
							</p>
							<input class="form-control" type="text" name="patient_vn_2" id="patient_vn_2" value="{{ isset($sos_help_center->form_yellow->patient_vn_2) ? $sos_help_center->form_yellow->patient_vn_2 : ''}}">
						</div>
						 <p><!-- --></p> 
						<div class="col-6">
							<p style="font-size:20px;">
								<b>นำส่งที่จังหวัด</b>
							</p>
							<input class="form-control" type="text" name="delivered_province_2" id="delivered_province_2" value="{{ isset($sos_help_center->form_yellow->delivered_province_2) ? $sos_help_center->form_yellow->delivered_province_2 : ''}}">
						</div>
						<div class="col-6">
							<p style="font-size:20px;">
								<b>นำส่ง รพ.</b>
							</p>
							<input class="form-control" type="text" name="delivered_hospital_2" id="delivered_hospital_2" value="{{ isset($sos_help_center->form_yellow->delivered_hospital_2) ? $sos_help_center->form_yellow->delivered_hospital_2 : ''}}">
						</div>
						<p><!-- --></p> 
						<!-- ------------------------------- -->
						@php

							$check_submission_criteria_1 ="";$check_submission_criteria_2 ="";$check_submission_criteria_3 ="";$check_submission_criteria_4 ="";$check_submission_criteria_5 ="";

							if( !empty($sos_help_center->form_yellow->submission_criteria) ){
								$submission_criteria_explode = explode(",", $sos_help_center->form_yellow->submission_criteria);

								for ($i=0; $i < count($submission_criteria_explode); $i++){
									switch ($submission_criteria_explode[$i]) {
						                case 'สามารถรักษาได้':
						                    $check_submission_criteria_1 = "checked";
						                    break;
						                case 'อยู่ใกล้':
						                    $check_submission_criteria_2 = "checked";
						                    break;
						                case 'มีหลักประกัน':
						                    $check_submission_criteria_3 = "checked";
						                    break;
						                case 'ผู้ป่วยเก่า':
						                    $check_submission_criteria_4 = "checked";
						                    break;
						                case 'เป็นความประสงค์':
						                    $check_submission_criteria_5 = "checked";
						                    break;
						            }
						        }
						    }

					        $check_communication_hospital_1 ="";$check_communication_hospital_2 ="";$check_communication_hospital_3 ="";

					        if( !empty($sos_help_center->form_yellow->communication_hospital) ){
								$communication_hospital_explode = explode(",", $sos_help_center->form_yellow->communication_hospital);

								for ($i=0; $i < count($communication_hospital_explode); $i++){
									switch ($communication_hospital_explode[$i]) {
						                case 'แจ้งวิทยุ':
						                    $check_communication_hospital_1 = "checked";
						                    break;
						                case 'แจ้งทางโทรศัพท์':
						                    $check_communication_hospital_2 = "checked";
						                    break;
						                case 'ไม่ได้แจ้ง':
						                    $check_communication_hospital_3 = "checked";
						                    break;
						            }
						        }
						    }
						@endphp
						<div class="col-6">
							<p style="font-size:20px;">
								<b>เกณฑ์การนำส่ง (เลือกได้มากกว่า ๑ ข้อ)</b>
							</p>
							<p style="font-size:20px;">
								<input type="checkbox" {{ $check_submission_criteria_1 }} class="submission_criteria" name="submission_criteria" value="สามารถรักษาได้">&nbsp; สามารถรักษาได้ &nbsp;
								<input type="checkbox" {{ $check_submission_criteria_2 }} class="submission_criteria" name="submission_criteria" value="อยู่ใกล้">&nbsp; อยู่ใกล้ &nbsp;
								<input type="checkbox" {{ $check_submission_criteria_3 }} class="submission_criteria" name="submission_criteria" value="มีหลักประกัน">&nbsp; มีหลักประกัน &nbsp;
								<br>
								<input type="checkbox" {{ $check_submission_criteria_4 }} class="submission_criteria" name="submission_criteria" value="ผู้ป่วยเก่า">&nbsp; ผู้ป่วยเก่า &nbsp;
								<input type="checkbox" {{ $check_submission_criteria_5 }} class="submission_criteria" name="submission_criteria" value="เป็นความประสงค์">&nbsp; เป็นความประสงค์ &nbsp;
							</p>
						</div>
						<div class="col-6">
							<p style="font-size:20px;">
								<b>การติดต่อสื่อสารกับ รพ.ที่นำส่ง</b>
							</p>
							<p style="font-size:20px;">
								<input type="checkbox" {{ $check_communication_hospital_1 }} class="communication_hospital" name="communication_hospital" value="แจ้งวิทยุ">&nbsp; แจ้งวิทยุ &nbsp;
								<input type="checkbox" {{ $check_communication_hospital_2 }} class="communication_hospital" name="communication_hospital" value="แจ้งทางโทรศัพท์">&nbsp; แจ้งทางโทรศัพท์ &nbsp;
								<input type="checkbox" {{ $check_communication_hospital_3 }} class="communication_hospital" name="communication_hospital" value="ไม่ได้แจ้ง">&nbsp; ไม่ได้แจ้ง &nbsp;
							</p>
						</div>
					</div>
				</div>
				<div id="form_data_9" class="form_yellow carousel-item">
		      		<div class="col-12">
						<h3><b>9.เพิ่มเติม เฉพาะ อาการนำสำคัญของผู้ป่วยฉุกเฉินที่ได้จากการรับแจ้ง เป็นรหัส ๒๕ อุบัติเหตุยานยนต์ รายละเอียดการกรอกข้อมูลโปรดดูในโปรแกรม</b></h3>
					</div>
					<hr>
					<div class="row">
						<div class="col-4">
							<p style="font-size:20px;">
								<b>ทะเบียนรถหมวด</b>
							</p>
							<input class="form-control" type="text" name="registration_category" value="{{ isset($sos_help_center->form_yellow->registration_category) ? $sos_help_center->form_yellow->registration_category : ''}}">
						</div>
						<div class="col-4">
							<p style="font-size:20px;">
								<b>เลขทะเบียน</b>
							</p>
							<input class="form-control" type="text" name="registration_number" value="{{ isset($sos_help_center->form_yellow->registration_number) ? $sos_help_center->form_yellow->registration_number : ''}}">
						</div>
						<div class="col-4">
							<p style="font-size:20px;">
								<b>จังหวัด</b>
							</p>
							<input class="form-control" type="text" name="registration_province" value="{{ isset($sos_help_center->form_yellow->registration_province) ? $sos_help_center->form_yellow->registration_province : ''}}">
						</div>
						<p><!--  --></p>
						@php
							$check_owner_registration_1 = "" ;
							$check_owner_registration_2 = "" ;
							$check_owner_registration_3 = "" ;
							if( !empty($sos_help_center->form_yellow->owner_registration) ){
								if( $sos_help_center->form_yellow->owner_registration == 'ของผู้ประสบเหตุ' ){
									$check_owner_registration_1 = "checked";
								}else if ( $sos_help_center->form_yellow->owner_registration == 'ของคู่กรณี' ){
									$check_owner_registration_2 = "checked";
								}else if ( $sos_help_center->form_yellow->owner_registration == 'ไม่สามารถระบุได้้' ){
									$check_owner_registration_3 = "checked";
								}
							}

						@endphp
						<div class="col-12">
							<p style="font-size:20px;">
								<input type="radio" {{ $check_owner_registration_1 }} name="owner_registration" value="ของผู้ประสบเหตุ">&nbsp; ของผู้ประสบเหตุ &nbsp;
								<input type="radio" {{ $check_owner_registration_2 }} name="owner_registration" value="ของคู่กรณี">&nbsp; ของคู่กรณี &nbsp;
								<input type="radio" {{ $check_owner_registration_3 }} name="owner_registration" value="ไม่สามารถระบุได้้">&nbsp; ไม่สามารถระบุได้้ &nbsp;
							</p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<div class="row" style="position: absolute;bottom: 5%;right:3%;">
		<div class="col-12">
			<p>
        		ลงนาม ..................... (เจ้าหน้าที่ผู้บันทึก) &nbsp;&nbsp;&nbsp; ลงนาม ..................... ผู้รับรอง(แพทย์หรือพยาบาล)
   			</p>
		</div>
	</div>
	<div class="row" style="position: absolute;bottom: 1%;right:3%;">
        <!-- -----------------BTN prev next------------------- -->
        <div class="col-12 d-flex align-items-end">
            <h4 class="text-primary text-end">
                <i id="btn_prev" class="fa-solid fa-caret-left text-secondary" href="#carousel_form_yellow" role="button" data-slide="prev" onclick="check_go_to('remove');"></i>
                &nbsp;&nbsp;

                <i id="btn_circle_1" class="fa-solid fa-circle-1 text-secondary" role="button" onclick="go_to_form_data('1');"></i>
                &nbsp;&nbsp;
                <i id="btn_circle_2" class="fa-solid fa-circle-2 text-secondary" role="button" onclick="go_to_form_data('2');"></i>
                &nbsp;&nbsp;
                <i id="btn_circle_3" class="fa-solid fa-circle-3 text-secondary" role="button" onclick="go_to_form_data('3');"></i>
                &nbsp;&nbsp;
                <i id="btn_circle_4" class="fa-solid fa-circle-4 text-secondary" role="button" onclick="go_to_form_data('4');"></i>
                &nbsp;&nbsp;
                <i id="btn_circle_5" class="fa-solid fa-circle-5 text-secondary" role="button" onclick="go_to_form_data('5');"></i>
                &nbsp;&nbsp;
                <i id="btn_circle_6" class="fa-solid fa-circle-6 text-secondary" role="button" onclick="go_to_form_data('6');"></i>
                &nbsp;&nbsp;
                <i id="btn_circle_7" class="fa-solid fa-circle-7 text-secondary" role="button" onclick="go_to_form_data('7');"></i>
                &nbsp;&nbsp;
                <i id="btn_circle_8" class="fa-solid fa-circle-8 text-secondary" role="button" onclick="go_to_form_data('8');"></i>
                &nbsp;&nbsp;
                <i id="btn_circle_9" class="fa-solid fa-circle-9 text-secondary" role="button" onclick="go_to_form_data('9');"></i>
                &nbsp;&nbsp;

                <i id="btn_next" class="fa-solid fa-caret-right text-secondary" href="#carousel_form_yellow" role="button" data-slide="next" onclick="check_go_to('add');"></i>
            </h4>
        </div>
    </div>

</div>

<script>

	document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        check_color_btn(null,null);
        check_lat_lng();
        
        let rc_black = document.querySelector('#rc_black').checked ;
		let rc_black_text = document.querySelector('#rc_black_text') ;
		if (rc_black) {
			rc_black_text.readOnly = false ;
		}else{
			rc_black_text.readOnly = true ;
			rc_black_text.value = null ;
		}

    });

    function check_lat_lng(){
    	// Check lat lng empty
	    let input_lat = document.querySelector('#lat') ;
	    let input_lng = document.querySelector('#lng') ;

		if (input_lat.value && input_lng.value) {
			document.querySelector('#btn_get_location_user').disabled = false ;
			document.querySelector('#btn_select_operating_unit').disabled = false ;
			document.querySelector('#btn_select_operating_unit').classList.add('btn-danger');
			document.querySelector('#btn_select_operating_unit').classList.remove('btn-secondary');
		}else{
			document.querySelector('#btn_get_location_user').disabled = true ;
			document.querySelector('#btn_select_operating_unit').disabled = true ;
			document.querySelector('#btn_select_operating_unit').classList.remove('btn-danger');
			document.querySelector('#btn_select_operating_unit').classList.add('btn-secondary');
		}
    }

	function check_go_to(type){
		// console.log(type);
		let next_page ;

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
				next_page = 1 ;
			}else{
				// document.querySelector('#span_form_data').innerHTML = parseInt(active_sp[2]) + 1 ;
				let active_next = parseInt(active_sp[2]) + 1 ;
				next_page = active_next ;
			}
			check_color_btn(active_sp[2],next_page);

		}else if (type === "remove"){

			if (parseInt(active_sp[2]) === min) {
				next_page = max ;
			}else{
				// document.querySelector('#span_form_data').innerHTML = parseInt(active_sp[2]) + 1 ;
				let active_prev = parseInt(active_sp[2]) - 1 ;
				next_page = active_prev ;
			}
			check_color_btn(active_sp[2],next_page);
		}

		send_save_data(active_sp[2]);
	}

	function go_to_form_data(click_to){
		// console.log(click_to);

		let active = document.querySelector('.active').id;
		let active_sp = active.split("_");
			// console.log("active >> " + active_sp[2]);

		document.querySelector('#form_data_' + active_sp[2]).classList.remove('active');
		document.querySelector('#form_data_' + click_to).classList.add('active');

		send_save_data(active_sp[2]);
		check_color_btn(active_sp[2],click_to);
	}

	function check_click_rc(){
		let rc_black = document.querySelector('#rc_black').checked ;
		let rc_black_text = document.querySelector('#rc_black_text') ;
		if (rc_black) {
			rc_black_text.readOnly = false ;
		}else{
			rc_black_text.readOnly = true ;
			rc_black_text.value = null ;
		}
	}

	function send_save_data(active){

		// ---------------------------- ข้อใน form ----------------------------
	    // ==>> 1
		let be_notified = document.querySelectorAll('input[name="be_notified"]');
		let be_notified_value = "" ;
			be_notified.forEach(be_notified => {
			    if(be_notified.checked){
			        be_notified_value = be_notified.value;
			    }
			})
		let name_user = document.querySelector('[name="name_user"]');
		let phone_user = document.querySelector('[name="phone_user"]');
		let lat = document.querySelector('[name="lat"]');
		let lng = document.querySelector('[name="lng"]');
		let location_sos = document.querySelector('[name="location_sos"]');

		// ==>> 2
		let symptom = document.getElementsByClassName('symptom');
		let symptom_value = "" ;

			for (let i = 0; i < symptom.length; i++) {
		        if (symptom[i].checked) {
		        	if (symptom_value === "") {
		        		symptom_value = symptom[i].value ;
		        	}else{
		        		symptom_value = symptom_value + "," +  symptom[i].value ;
		        	}
		    	}
		    }

		// ==>> 3
		let symptom_other = document.querySelector('[name="symptom_other"]');

		// ==>> 4
		let idc = document.querySelectorAll('input[name="idc"]');
		let idc_value = "" ;
			idc.forEach(idc => {
			    if(idc.checked){
			        idc_value = idc.value;
			    }
			})
				
		// ==>> 5
		let vehicle_type = document.querySelectorAll('input[name="vehicle_type"]');
		let vehicle_type_value = "" ;
			vehicle_type.forEach(vehicle_type => {
			    if(vehicle_type.checked){
			        vehicle_type_value = vehicle_type.value;
			    }
			})
		let operating_suit_type = document.querySelectorAll('input[name="operating_suit_type"]');
		let operating_suit_type_value = "" ;
			operating_suit_type.forEach(operating_suit_type => {
			    if(operating_suit_type.checked){
			        operating_suit_type_value = operating_suit_type.value;
			    }
			}) 
		let operation_unit_name = document.querySelector('[name="operation_unit_name"]'); 
		let action_set_name = document.querySelector('[name="action_set_name"]'); 
		// <!-- ตารางเวลาปฏิบัติการ -->
		let time_create_sos = document.querySelector('[name="time_create_sos"]'); 
		let time_command = document.querySelector('[name="time_command"]'); 
		let time_go_to_help = document.querySelector('[name="time_go_to_help"]'); 
		let time_to_the_scene = document.querySelector('[name="time_to_the_scene"]'); 
		let time_leave_the_scene = document.querySelector('[name="time_leave_the_scene"]'); 
		let time_hospital = document.querySelector('[name="time_hospital"]'); 
		let time_to_the_operating_base = document.querySelector('[name="time_to_the_operating_base"]'); 
		let km_create_sos_to_go_to_help = document.querySelector('[name="km_create_sos_to_go_to_help"]'); 
		let km_to_the_scene_to_leave_the_scene = document.querySelector('[name="km_to_the_scene_to_leave_the_scene"]'); 
		let km_hospital = document.querySelector('[name="km_hospital"]'); 
		let km_operating_base = document.querySelector('[name="km_operating_base"]'); 
		
		// ==>> 6
		let rc = document.querySelectorAll('input[name="rc"]');
		let rc_value = "" ;
			rc.forEach(rc => {
			    if(rc.checked){
			        rc_value = rc.value;
			    }
			})
		let rc_black_text = document.querySelector('[name="rc_black_text"]'); 

		// ==>> 7
		let treatment = document.querySelectorAll('input[name="treatment"]');
		let treatment_value = "" ;
			treatment.forEach(treatment => {
			    if(treatment.checked){
			        treatment_value = treatment.value;
			    }
			})
		let sub_treatment = document.getElementsByClassName('sub_treatment');
		let sub_treatment_value = "" ;
			for (let i = 0; i < sub_treatment.length; i++) {
		        if (sub_treatment[i].checked) {
		        	if (sub_treatment_value === "") {
		        		sub_treatment_value = sub_treatment[i].value ;
		        	}else{
		        		sub_treatment_value = sub_treatment_value + "," +  sub_treatment[i].value ;
		        	}
		        }
		    }

		// ==>> 8
		let patient_name_1 = document.querySelector('[name="patient_name_1"]');
		let patient_age_1 = document.querySelector('[name="patient_age_1"]'); 
		let patient_hn_1 = document.querySelector('[name="patient_hn_1"]'); 
		let patient_vn_1 = document.querySelector('[name="patient_vn_1"]'); 
		let delivered_province_1 = document.querySelector('[name="delivered_province_1"]'); 
		let delivered_hospital_1 = document.querySelector('[name="delivered_hospital_1"]'); 
		let patient_name_2 = document.querySelector('[name="patient_name_2"]'); 
		let patient_age_2 = document.querySelector('[name="patient_age_2"]'); 
		let patient_hn_2 = document.querySelector('[name="patient_hn_2"]'); 
		let patient_vn_2 = document.querySelector('[name="patient_vn_2"]'); 
		let delivered_province_2 = document.querySelector('[name="delivered_province_2"]'); 
		let delivered_hospital_2 = document.querySelector('[name="delivered_hospital_2"]'); 

		let submission_criteria = document.getElementsByClassName('submission_criteria');
		let submission_criteria_value = "" ;
			for (let i = 0; i < submission_criteria.length; i++) {
		        if (submission_criteria[i].checked) {
		        	if (submission_criteria_value === "") {
		        		submission_criteria_value = submission_criteria[i].value ;
		        	}else{
		        		submission_criteria_value = submission_criteria_value + "," +  submission_criteria[i].value ;
		        	}
		        }
		    }

		let communication_hospital = document.getElementsByClassName('communication_hospital');
		let communication_hospital_value = "" ;
			for (let i = 0; i < communication_hospital.length; i++) {
		        if (communication_hospital[i].checked) {
		        	if (communication_hospital_value === "") {
		        		communication_hospital_value = communication_hospital[i].value ;
		        	}else{
		        		communication_hospital_value = communication_hospital_value + "," +  communication_hospital[i].value ;
		        	}
		        }
		    }

		// ==>> 9
		let registration_category = document.querySelector('[name="registration_category"]'); 
		let registration_number = document.querySelector('[name="registration_number"]'); 
		let registration_province = document.querySelector('[name="registration_province"]'); 
		let owner_registration = document.querySelectorAll('input[name="owner_registration"]');
		let owner_registration_value = "" ;
			owner_registration.forEach(owner_registration => {
			    if(owner_registration.checked){
			        owner_registration_value = owner_registration.value;
			    }
			})

		// ------------------------------------------------------------------------------------------------------------

		let data_arr = [] ;

		switch(active) {
		  	case '1':
		    	data_arr = {
			        "sos_help_center_id" : {{ $sos_help_center->id }},
			        "be_notified" : be_notified_value,
			        "name_user" : name_user.value,
			        "phone_user" : phone_user.value,
			        "lat" : lat.value,
			        "lng" : lng.value,
			        "location_sos" : location_sos.value,
			    };
		    break;
		  	case '2':
		    	data_arr = {
			        "sos_help_center_id" : {{ $sos_help_center->id }},
			        "symptom" : symptom_value,
			    };
		    break;
			case '3':
		    	data_arr = {
			        "sos_help_center_id" : {{ $sos_help_center->id }},
			        "symptom_other" : symptom_other.value,
			    };
		    break;
		    case '4':
		    	data_arr = {
			        "sos_help_center_id" : {{ $sos_help_center->id }},
			        "idc" : idc_value,
			    };
		    break;
		    case '5':
		    	data_arr = {
			        "sos_help_center_id" : {{ $sos_help_center->id }},
			        "vehicle_type" : vehicle_type_value,
			        "operating_suit_type" : operating_suit_type_value,
			        "operation_unit_name" : operation_unit_name.value,
			        "action_set_name" : action_set_name.value,
			        "time_create_sos" : time_create_sos.value,
			        "time_command" : time_command.value,
			        "time_go_to_help" : time_go_to_help.value,
			        "time_to_the_scene" : time_to_the_scene.value,
			        "time_leave_the_scene" : time_leave_the_scene.value,
			        "time_hospital" : time_hospital.value,
			        "time_to_the_operating_base" : time_to_the_operating_base.value,
			        "km_create_sos_to_go_to_help" : km_create_sos_to_go_to_help.value,
			        "km_to_the_scene_to_leave_the_scene" : km_to_the_scene_to_leave_the_scene.value,
			        "km_hospital" : km_hospital.value,
			        "km_operating_base" : km_operating_base.value,
			    };
		    break;
		    case '6':

		    	if ( rc_value && rc_value === "ดำ" ) {
		    		data_arr = {
				        "sos_help_center_id" : {{ $sos_help_center->id }},
				        "rc" : rc_value,
				        "rc_black_text" : rc_black_text.value,
				    };
		    	}else{
		    		data_arr = {
				        "sos_help_center_id" : {{ $sos_help_center->id }},
				        "rc" : rc_value,
				    };
		    	}
		    	
		    break;
		    case '7':
		    	data_arr = {
			        "sos_help_center_id" : {{ $sos_help_center->id }},
			        "treatment" : treatment_value,
			        "sub_treatment" : sub_treatment_value,
			    };
		    break;
		    case '8':
		    	data_arr = {
			        "sos_help_center_id" : {{ $sos_help_center->id }},
			        "patient_name_1" : patient_name_1.value,
			        "patient_age_1" : patient_age_1.value,
			        "patient_hn_1" : patient_hn_1.value,
			        "patient_vn_1" : patient_vn_1.value,
			        "delivered_province_1" : delivered_province_1.value,
			        "delivered_hospital_1" : delivered_hospital_1.value,
			        "patient_name_2" : patient_name_2.value,
			        "patient_age_2" : patient_age_2.value,
			        "patient_hn_2" : patient_hn_2.value,
			        "patient_vn_2" : patient_vn_2.value,
			        "delivered_province_2" : delivered_province_2.value,
			        "delivered_hospital_2" : delivered_hospital_2.value,
			        "submission_criteria" : submission_criteria_value,
			        "communication_hospital" : communication_hospital_value,
			    };
			    console.log(data_arr);
		    break;
		    case '9':
		    	data_arr = {
			        "sos_help_center_id" : {{ $sos_help_center->id }},
			        "registration_category" : registration_category.value,
			        "registration_number" : registration_number.value,
			        "registration_province" : registration_province.value,
			        "owner_registration" : owner_registration_value,
			    }; 
		    break;
		}


		// console.log(data_arr);

		fetch("{{ url('/') }}/api/send_save_data/form_yellow", {
            method: 'post',
            body: JSON.stringify(data_arr),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(function (response){
            // return response.text();
        }).then(function(data){
            // console.log(data);
        }).catch(function(error){
            // console.error(error);
        });

	}

</script>

<!-- check_color_btn() อยู่ในนี้ -->
<script src="{{ asset('js/form1669/check_color_btn_form_yellow.js')}}"></script>


