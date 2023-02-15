<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="row">
	<div class="col-xl-12 mx-auto">
		<div class="card-body">
            <style>
            	
                .checkmark__circle {
				    stroke-dasharray: 166;
				    stroke-dashoffset: 166;
				    stroke-width: 2;
				    stroke-miterlimit: 10;
				    stroke: #ffffff;
				    fill: none;
				    animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards
				}

				.checkmark {
				    width: 18px;
				    height: 18px;
				    border-radius: 50%;
				    display: block;
				    stroke-width: 2;
				    stroke: #29cc39;
				    stroke-miterlimit: 10;
				    margin: 10% auto;
				    box-shadow: inset 0px 0px 0px #ffffff;
				    animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both
				}

				.checkmark__check {
				    transform-origin: 50% 50%;
				    stroke-dasharray: 48;
				    stroke-dashoffset: 48;
				    animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards
				}

				@keyframes stroke {
				    100% {
				        stroke-dashoffset: 0
				    }
				}

				@keyframes scale {

				    0%,
				    100% {
				        transform: none
				    }

				    50% {
				        transform: scale3d(1.1, 1.1, 1)
				    }
				}

				@keyframes fill {
				    100% {
				        box-shadow: inset 0px 0px 0px 60px #fff
				    }
				}
            </style>
			<!-- <br />
			<p>
				<label>Theme:</label>
				<select id="theme_selector">
					<option value="default">Default</option>
					<option value="arrows">Arrows</option>
					<option value="dots" selected>Dots</option>
					<option value="dark">Dark</option>
				</select>&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="checkbox" id="is_justified" value="1" checked />
				<label for="is_justified">Justified</label>&nbsp;&nbsp;&nbsp;&nbsp;
				<label>Animation:</label>
				<select id="animation">
					<option value="none">None</option>
					<option value="fade">Fade</option>
					<option value="slide-horizontal" selected>Slide Horizontal</option>
					<option value="slide-vertical">Slide Vertical</option>
					<option value="cssBounceSlideH">Slide Swing</option>
				</select>&nbsp;&nbsp;&nbsp;&nbsp;
				<label>Go To:</label>
				<select id="got_to_step">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
				</select>&nbsp;&nbsp;&nbsp;&nbsp;
				<label>External Buttons:</label>

			</p>
			<br /> -->
			<!-- SmartWizard html -->
			
			<div id="smartwizard">
				<ul class="nav">
					<!-- <li class="nav-item">
						<button style="position: relative;z-index: 999999;border-radius: 50px;" class="btn btn-info shadow" id="prev-btn-form-yellow" type="button"><i class="fa-solid fa-chevron-left"></i></button>
					</li> -->
					<li class="nav-item">
						<a class="nav-link danger position div_detail page_number" href="#step-1" onclick="go_to_form_data('1');"  id="form_data_1" page="number_1"> 
							<strong>1</strong>
							<span class="tooltip text-center">ข้อมูลทั่วไป</span>
						</a>
					</li> 
					<li class="nav-item">
						<a class="nav-link danger position div_detail page_number" href="#step-2" onclick="go_to_form_data('2');"  id="form_data_2" page="number_2"> 
							<strong>2</strong>
							<span class="tooltip">อาการนำสำคัญ</span>
						</a>
					</li>
					<li class="nav-item danger">
						<a class="nav-link danger position div_detail page_number" href="#step-3" onclick="go_to_form_data('3');"  id="form_data_3" page="number_3"> 
							<strong>3</strong>
							<span class="tooltip">รายละเอียด</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link danger position div_detail page_number" href="#step-4" onclick="go_to_form_data('4');"  id="form_data_4" page="number_4"> 
							<strong>4</strong>
							<span class="tooltip">รหัสความรุนแรง</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link danger position div_detail page_number" href="#step-5" onclick="go_to_form_data('5');"  id="form_data_5" page="number_5"> 
							<strong>5</strong>
							<span class="tooltip">การสั่งการ(หัวหน้าศูนย์ฯ)</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link danger position div_detail page_number" href="#step-6" onclick="go_to_form_data('6');"  id="form_data_6" page="number_6"> 
							<strong>6</strong>
							<span class="tooltip">รหัสความรุนแรง ณ จุดเกิดเหตุ</span>
						</a>
					</li>
					<li class="nav-item inactive">
						<a class="nav-link danger position div_detail page_number" href="#step-7" onclick="go_to_form_data('7');"  id="form_data_7" page="number_7"> 
							<strong>7</strong>
							<span class="tooltip">การปฏิบัติการ</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link danger position div_detail page_number" href="#step-8" onclick="go_to_form_data('8');"  id="form_data_8" page="number_8"> 
							<strong>8</strong>
							<span class="tooltip">ชื่อผู้ป่วย</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link danger position div_detail page_number" href="#step-9" onclick="go_to_form_data('9');"  id="form_data_9" page="number_9"> 
							<strong>9</strong>
							<span class="tooltip">เพิ่มเติม</span>
						</a>
					</li>
					<!-- <li class="nav-item">
						<button class="btn btn-info text-white"style="position: relative;z-index: 999999;border-radius: 50px;" id="next-btn-form-yellow" type="button"><i class="fa-solid fa-chevron-right"></i></button>

					</li> -->
				</ul>
				<style>
					label {
					width: 100%;
					font-size: 1rem;
					}
					.position{
					position: relative;
					z-index: 1;
					}
					.tooltip{
						text-align: center;
					background-color: #333;
					color: white;
					position: absolute;
					left: 50%;
					transform: translateX(-50%);
					-webkit-transform: translateX(-50%);
					-moz-transform: translateX(-50%);
					-ms-transform: translateX(-50%);
					-o-transform: translateX(-50%);
					font-size: 12px;
					width: 190px;
					padding: 10px 15px;
					top: -210%;
					transition: 0.5s;
					-webkit-transition: 0.5s;
					-moz-transition: 0.5s;
					-ms-transition: 0.5s;
					-o-transition: 0.5s;
					opacity: 0; /* to hide it but still there*/
					border-radius:10px;
					font-family: 'Kanit', sans-serif;
					}
					.tooltip::before{
					content: "";
					position: absolute;
					bottom: -15px ;
					left: 50%;
					transform: translateX(-50%);
					-webkit-transform: translateX(-50%);
					-moz-transform: translateX(-50%);
					-ms-transform: translateX(-50%);
					-o-transform: translateX(-50%);
					border:10px solid;
					border-color: #333 transparent transparent transparent;

					}.div_detail:hover{
					overflow: visible;
					}
					.div_detail:hover .tooltip{
					display: inline;
					opacity: 80%;
					}
					
					.card-input-element+.card {
					height: calc(36px + 2*1rem);
					color: #0d6efd;
					-webkit-box-shadow: none;
					box-shadow: none;
					border: 2px solid transparent;
					border-radius: 10px;
					}

					.card-input-element+.card:hover {
					cursor: pointer;
					}

					.card-input-element:checked+.card {
					border: 2px solid #0d6efd;
					color: #fff !important;
					background-color: #0d6efd !important;
					-webkit-transition: border .3s;
					-o-transition: border .3s;
					transition: border .3s;
					}

					.card-input-element:checked+.card::after {
					content: '\e5ca';
					color: #AFB8EA;
					font-family: 'Material Icons';
					font-size: 24px;
					-webkit-animation-name: fadeInCheckbox;
					animation-name: fadeInCheckbox;
					-webkit-animation-duration: .5s;
					animation-duration: .5s;
					-webkit-animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
					animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
					}

					@-webkit-keyframes fadeInCheckbox {
						from {
							opacity: 0;
							-webkit-transform: rotateZ(-20deg);
						}
						to {
							opacity: 1;
							-webkit-transform: rotateZ(0deg);
						}
					}

					@keyframes fadeInCheckbox {
						from {
							opacity: 0;
							transform: rotateZ(-20deg);
						}
						to {
							opacity: 1;
							transform: rotateZ(0deg);
						}
					}
					.radius{
						border-radius: 10px;
					}
					.radius-1{
						border-radius: 10px 0 0 10px ;
					}
					.radius-2{
						border-radius: 0 10px 10px 0 ;
					}.input-name{
						width: auto;
						max-width: 20em;
						border: none;
						border-bottom: 1px dashed #000000;
					}.input-wrapper {
							position: relative;
							box-sizing: border-box;
							font-size: 14px;
							display: inline-block;
							max-width: 20em;
							text-overflow: ellipsis;
							overflow: hidden;
					}.size-span {
							font-family: inherit;
							white-space: pre;
							height: 1em;
							font-size: 16px;
							display: inline-block;
							box-sizing: border-box;
							position: relative;
							min-width: 60px;
							user-select: none;
							vertical-align: bottom;
							opacity: 0;
					}.tab-content{
						height: 100%;
					}.input_code_black::placeholder{
						text-align: center; 
					}
					.show-data{
						animation: myAnim 1s ease 0s 1 normal forwards;
					}
					@keyframes myAnim {
						0% {
							opacity: 0;
						}

						100% {
							opacity: 1;
						}
					}.card-input-red:checked+.card {
					border: 2px solid #db2d2e !important;
					background-color: #db2d2e !important;
					color: #fff !important;
					-webkit-transition: border .3s;
					-o-transition: border .3s;
					transition: border .3s;
					}
					
					.card-input-success:checked+.card {
					border: 2px solid #29cc39 !important;
					background-color: #29cc39 !important;
					color: #fff !important;
					-webkit-transition: border .3s;
					-o-transition: border .3s;
					transition: border .3s;
					}

					.card-input-warning:checked+.card {
					border: 2px solid #ffc30e !important;
					background-color: #ffc30e !important;
					color: #fff !important;
					-webkit-transition: border .3s;
					-o-transition: border .3s;
					transition: border .3s;
					}

					.card-input-dark:checked+.card {
					border: 2px solid #000 !important;
					background-color: #000 !important;
					color: #fff !important;
					-webkit-transition: border .3s;
					-o-transition: border .3s;
					transition: border .3s;
					}
					
					
					.field-user{
						border: #000 1px solid;
					}.field-user legend{
						font-size: 18px;
						font-weight: bold;
					}
				</style>
			

				<div class="tab-content">
					<!---------------------------------- ข้อ 1  ---------------------------------->
					<div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
						<div class="card-title d-flex align-items-center">
							<div><i class="bx bxs-user me-1 font-22 text-primary"></i>
							</div>
							<h5 class="mb-0 text-primary">ข้อมูลทั่วไป</h5>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-12">
								<label  class="form-label m-0">รับแจ้งเหตุทาง</label>
								@php
									$check_be_notified_1 = "" ;
									$check_be_notified_2 = "" ;
									$check_be_notified_3 = "" ;
									$check_be_notified_4 = "" ;
									$check_be_notified_5 = "" ;
									$check_be_notified_6 = "" ;
									if( !empty($data_form_yellow->be_notified) ){

										if( $data_form_yellow->be_notified == 'แพลตฟอร์มวีเช็ค' ){
											$check_be_notified_1 = "checked";
										}else if( $data_form_yellow->be_notified == 'โทรศัพท์หมายเลข ๑๖๖๙' ){
											$check_be_notified_2 = "checked";
										}else if ( $data_form_yellow->be_notified == 'โทรศัพท์หมายเลข ๑๖๖๙ (second call)' ){
											$check_be_notified_3 = "checked";
										}else if ( $data_form_yellow->be_notified == 'โทรศัพท์หมายเลขอื่นๆ' ){
											$check_be_notified_4 = "checked";
										}else if ( $data_form_yellow->be_notified == 'วิทยุสื่อสาร' ){
											$check_be_notified_5 = "checked";
										}else if ( $data_form_yellow->be_notified == 'วิธีอื่นๆ' ){
											$check_be_notified_6 = "checked";
										}

									}
								@endphp

								<div class="row mt-3">
									<div class="col-12	col-md-3 col-lg-3">
										<label>
											<input type="radio" {{ $check_be_notified_1 }} name="be_notified" value="แพลตฟอร์มวีเช็ค"  class="card-input-element d-none" >
											<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
												แพลตฟอร์มวีเช็ค 
											</div>
										</label>
									</div>
									<div class="col-12	col-md-3 col-lg-3">
										<label>
											<input type="radio" {{ $check_be_notified_2 }} name="be_notified" value="โทรศัพท์หมายเลข ๑๖๖๙" class="card-input-element d-none" >
											<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
												<span>
													โทรศัพท์หมายเลข ๑๖๖๙<sup>(๑)</sup>
												</span>
											</div>
										</label>
									</div>
									<div class="col-12	col-md-3 col-lg-3">
										<label>
											<input type="radio" {{ $check_be_notified_3 }} name="be_notified" value="โทรศัพท์หมายเลข ๑๖๖๙ (second call)" class="card-input-element d-none" >
											<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
												<span>
													โทรศัพท์หมายเลข ๑๖๖๙ (second call)<sup>(๒)</sup>
												</span>
											</div>
										</label>
									</div>
									<div class="col-12	col-md-3 col-lg-3">
										<label>
											<input type="radio" {{ $check_be_notified_4 }} name="be_notified" value="โทรศัพท์หมายเลขอื่นๆ" class="card-input-element d-none" >
											<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
												<span>
													โทรศัพท์หมายเลขอื่นๆ<sup>(๓)</sup>
												</span>
											</div>
										</label>
									</div>
									<div class="col-12	col-md-3 col-lg-3">
										<label>
											<input type="radio" {{ $check_be_notified_5 }} name="be_notified" value="วิทยุสื่อสาร" class="card-input-element d-none" >
											<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
												<span>
													วิทยุสื่อสาร
												</span>
											</div>
										</label>
									</div>
									<div class="col-12	col-md-3 col-lg-3">
										<label>
											<input type="radio" {{ $check_be_notified_6 }} name="be_notified" value="วิธีอื่นๆ" class="card-input-element d-none" >
											<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
												<span>
													วิธีอื่นๆ  
												</span>
											</div>
										</label>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<label for="name_user" class="form-label">ชื่อ/รหัสผู้แจ้งเหตุ</label>
								<div class="input-group"> <span class="input-group-text bg-white radius-1" ><i class="bx bxs-user"></i></span>
									<input type="text" class="form-control border-start-0 radius-2" id="name_user" name="name_user" value="{{ isset($sos_help_center->name_user) ? $sos_help_center->name_user : ''}}" placeholder="ชื่อ/รหัสผู้แจ้งเหตุ" oninput="document.querySelector('#u_name_user').innerHTML = document.querySelector('#name_user').value ;">
								</div>
							</div>
							<div class="col-md-6">
								<label for="phone_user" class="form-label">โทรศัพท์ผู้แจ้ง/ความถี่วิทยุ</label>
								<div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-phone"></i></span>
									<input type="text" class="form-control border-start-0 radius-2" id="phone_user" name="phone_user" value="{{ isset($sos_help_center->phone_user) ? $sos_help_center->phone_user : ''}}" placeholder="โทรศัพท์ผู้แจ้ง/ความถี่วิทยุ" oninput="document.querySelector('#u_phone_user').innerHTML = document.querySelector('#phone_user').value ;">
								</div>
							</div>

							<div class="col-12 mt-3">
								<label for="inputAddress3" class="form-label">สถานที่เกิดเหตุ
									<span id="location_user" class="d-none"></span>
								</label>
								<div class="row">
									<div class="col-6 col-md-4 col-lg-4">
										<div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-location-dot"></i></span>
											<input type="text" class="form-control border-start-0 radius-2" name="lat" id="lat" value="{{ isset($sos_help_center->lat) ? $sos_help_center->lat : ''}}" readonly placeholder="ละติจูด">
										</div>
									</div>
									<div class="col-6 col-md-4 col-lg-4">
										<div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-location-dot"></i></span>
											<input type="text" class="form-control border-start-0 radius-2" name="lng" id="lng" value="{{ isset($sos_help_center->lng) ? $sos_help_center->lng : ''}}" readonly placeholder="ลองติจูด">
										</div>
									</div>
									<div class="col-6 col-md-2 col-lg-2">
										<span class="btn btn-sm btn-danger main-shadow main-radius" data-toggle="modal" data-target="#modal_mapMarkLocation" onclick="mapMarkLocation('12.870032','100.992541','6');">
											เลือกจุดเกิดเหตุ <i class="fa-sharp fa-solid fa-location-crosshairs"></i>
										</span>
									</div>
									<div class="col-6 col-md-2 col-lg-2">
										<button id="btn_get_location_user"  class="btn btn-sm btn-info text-white main-shadow main-radius">
											รับรายละเอียดที่อยู่ (<span>100</span>)
										</button>
									</div>
								</div>
								<br>
								<textarea class="form-control radius" name="location_sos" id="detail_location_sos" rows="4" placeholder="รายละเอียดสถานที่เกิดเหตุ" rows="3">{{ isset($data_form_yellow->location_sos) ? $data_form_yellow->location_sos : ''}}</textarea>
							</div>
						</div>
					</div>

					<!---------------------------------- ข้อ 2  ---------------------------------->
					<div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
						<div class="card-title d-flex align-items-center">
							<div><i class="fa-regular fa-bone-break me-1 font-22 text-primary"></i>
							</div>
							<h5 class="mb-0 text-primary">อาการนำสำคัญของผู้ป่วยฉุกเฉินที่ได้จากการรับแจ้ง</h5>
						</div>
						<hr>
						@php
							$check_symptom_1 ="";$check_symptom_2 ="";$check_symptom_3 ="";$check_symptom_4 ="";$check_symptom_5 ="";$check_symptom_6 ="";$check_symptom_7 ="";$check_symptom_8 ="";$check_symptom_9 ="";$check_symptom_10 ="";$check_symptom_11 ="";$check_symptom_12 ="";$check_symptom_13 ="";$check_symptom_14 ="";$check_symptom_15 ="";$check_symptom_16 ="";$check_symptom_17 ="";$check_symptom_18 ="";$check_symptom_19 ="";$check_symptom_20 ="";$check_symptom_21 ="";$check_symptom_22 ="";$check_symptom_23 ="";$check_symptom_24 ="";$check_symptom_25 ="";

							if( !empty($data_form_yellow->symptom) ){
								$symptom_explode = explode(",", $data_form_yellow->symptom);

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
										case 'มีครรภ คลอด นรี':
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

						<div class="row">
							<div class="col-12 col-md-3 col-lg-3 ">
								<label>
									<input type="checkbox" {{ $check_symptom_1 }} name="symptom" value="ปวดท้อง หลัง เชิงกราน และขาหนีบ" class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๑.ปวดท้อง หลัง เชิงกราน และขาหนีบ
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_2 }} name="symptom" value="แอนนาฟิแลกซิส ปฏิกิริยาภูมิแพ้/แมลงกัด"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๒.แอนนาฟิแลกซิส ปฏิกิริยาภูมิแพ้/แมลงกัด
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_3 }} name="symptom" value="สัตว์กัด"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๓.สัตว์กัด
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_4 }} name="symptom" value="เลือดออกไม่ใช่จากการบาดเจ็บ"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๔.เลือดออกไม่ใช่จากการบาดเจ็บ
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_5 }} name="symptom" value="หายใจลำบาก"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๕.หายใจลำบาก 
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_6 }} name="symptom" value="หัวใจหยุดเต้น"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๖.หัวใจหยุดเต้น
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_7 }} name="symptom" value="เจ็บแน่นทรางออก หัวใจ"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๗.เจ็บแน่นทรางออก หัวใจ
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_8 }} name="symptom" value="สำลักอุดทางเดินหายใจ"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๘.สำลักอุดทางเดินหายใจ
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_9 }} name="symptom" value="เบาหวาน"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๙.เบาหวาน
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_10 }} name="symptom" value="อันตรายจากสภาพแวดล้อม"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๑๐.อันตรายจากสภาพแวดล้อม
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_11 }} name="symptom" value="อื่นๆ(เว้นว่าง)"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										<div>
											๑๑.<s>อื่นๆ(เว้นว่าง)</s><sup>(๔)</sup>
										</div>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_12 }} name="symptom" value="ปวดศรีษะ ลำคอ"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๑๒.ปวดศรีษะ ลำคอ 
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_13 }} name="symptom" value="คลุ้มคลั่ง จิตประสาท อารมณ์"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๑๓.คลุ้มคลั่ง จิตประสาท อารมณ์ 
									</div>
								</label>
							</div>

							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_14 }} name="symptom" value="ยาเกิดขนาด ได้รับพิษ"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๑๔.ยาเกิดขนาด ได้รับพิษ 
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_15 }} name="symptom" value="มีครรภ คลอด นรี"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๑๕.มีครรภ คลอด นรี 
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_16 }} name="symptom" value="ชัก"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๑๖.ชัก 
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_17 }} name="symptom" value="ป่วย อ่อนเพลีย"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๑๗.ป่วย อ่อนเพลีย 
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_18 }} name="symptom" value="อัมพาต (หลอดเลือดสมองตีบ แตก)"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๑๘.อัมพาต (หลอดเลือดสมองตีบ แตก) 
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_19 }} name="symptom" value="หมดสติ ไม่ตอบสนอง หมดสติชั่ววูบ"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๑๙.หมดสติ ไม่ตอบสนอง หมดสติชั่ววูบ 
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_20 }} name="symptom" value="เด็ก ทารก (กุมารเวชกรรม)"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๒๐.เด็ก ทารก (กุมารเวชกรรม) 
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_21 }} name="symptom" value="ถูกทำร้าย บาดเจ็บ"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๒๑.ถูกทำร้าย บาดเจ็บ 
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_22 }} name="symptom" value="ไฟไหม้ ลวก ความร้อน กระแสไฟฟ้า สารเคมี"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๒๒.ไฟไหม้ ลวก ความร้อน กระแสไฟฟ้า สารเคมี 
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_23 }} name="symptom" value="จมน้ำ หน้าคว่ำจมน้ำ บาดเจ็บเหตุดำน้ำ บาดเจ็บทางน้ำ"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๒๓.จมน้ำ หน้าคว่ำจมน้ำ บาดเจ็บเหตุดำน้ำ บาดเจ็บทางน้ำ 
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_24 }} name="symptom" value="พลัดตกหลุม อุบัติเหตุ"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๒๔.พลัดตกหลุม อุบัติเหตุ 
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_25 }} name="symptom" value="อุบัติเหตุยานยนต์"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๒๕.อุบัติเหตุยานยนต์ 
									</div>
								</label>
							</div>
						</div>
					</div>

					<!---------------------------------- ข้อ 3  ---------------------------------->
					<div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
						<div class="card-title d-flex align-items-center">
							<div><i class="fa-solid fa-square-info me-1 font-22 text-primary"></i>
							</div>
							<h5 class="mb-0 text-primary">อาการ/เหตุการณ์/รายละเอียดอื่นๆ</h5>
						</div>
						<hr>
						<textarea class="form-control" name="symptom_other" rows="15" placeholder="อธิบายถึง อาการ เหตุการณ์หรือรายละเอียดอื่นๆ">{{ isset($data_form_yellow->symptom_other) ? $data_form_yellow->symptom_other : ''}}</textarea>
					</div>

					<!---------------------------------- ข้อ 4  ---------------------------------->
					<div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">
						<div class="card-title d-flex align-items-center">
							<div><i class="fa-solid fa-person-falling-burst me-1 font-22 text-primary"></i>
							</div>
							<h5 class="mb-0 text-primary"><b>การให้รหัสความรุนแรง <span style="font-size:15px;">IDC (Incident Dispatch Code)<sup>(๕)</sup></span></b></h5>
						</div>
						<hr>
						@php
							$check_idc_1 = "" ;
							$check_idc_2 = "" ;
							$check_idc_3 = "" ;
							$check_idc_4 = "" ;
							$check_idc_5 = "" ;
							if( !empty($data_form_yellow->idc) ){
								if( $data_form_yellow->idc == 'แดง(วิกฤติ)' ){
									$check_idc_1 = "checked";
								}else if ( $data_form_yellow->idc == 'เหลือง(เร่งด่วน)' ){
									$check_idc_2 = "checked";
								}else if ( $data_form_yellow->idc == 'เขียว(ไม่รุนแรง)' ){
									$check_idc_3 = "checked";
								}else if ( $data_form_yellow->idc == 'ขาว(ทั่วไป)' ){
									$check_idc_4 = "checked";
								}else if ( $data_form_yellow->idc == 'ดำ(รับบริการสาธารณสุขอื่น)' ){
									$check_idc_5 = "checked";
								}
							}
						@endphp
						<div class="row">
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="radio" {{ $check_idc_1 }} name="idc" value="แดง(วิกฤติ)"  class="card-input-red card-input-element d-none" >
									<div class="card card-body text-danger d-flex flex-row justify-content-between align-items-center">
										<b>
											แดง(วิกฤติ)  
										</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="radio" {{ $check_idc_4 }} name="idc" value="ขาว(ทั่วไป)"  class="card-input-element d-none" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										<b>
											ขาว(ทั่วไป)    
										</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="radio" {{ $check_idc_2 }} name="idc" value="เหลือง(เร่งด่วน)"  class="card-input-warning card-input-element d-none" >
									<div class="card card-body text-warning d-flex flex-row justify-content-between align-items-center">
										<b>
											เหลือง(เร่งด่วน)  
										</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="radio" {{ $check_idc_5 }} name="idc" value="ดำ(รับบริการสาธารณสุขอื่น)"  class="card-input-dark card-input-element d-none" >
									<div class="card card-body  text-dark d-flex flex-row justify-content-between align-items-center">
										<b>
											ดำ(รับบริการสาธารณสุขอื่น)  
										</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="radio" {{ $check_idc_3 }} name="idc" value="เขียว(ไม่รุนแรง)"  class="card-input-success card-input-element d-none" >
									<div class="card card-body text-success d-flex flex-row justify-content-between align-items-center">
										<b>
											เขียว(ไม่รุนแรง)
										</b>
									</div>
								</label>
							</div>
						</div>
					</div>

					<!---------------------------------- ข้อ 5  ---------------------------------->
					<div id="step-5" class="tab-pane" role="tabpanel" aria-labelledby="step-5">
						<div class="card-title d-flex align-items-center">
							<div>
								<i class="fa-duotone fa-chalkboard-user me-1 font-22 text-primary"></i>
							</div>
							<h5 class="mb-0 text-primary">การสั่งการ (โดยการเห็นชอบของหัวหน้าศูนย์ฯ)</h5>
						</div>
						<hr>
						@php
							$check_vehicle_type_1 = "" ;
							$check_vehicle_type_2 = "" ;
							$check_vehicle_type_3 = "" ;
							$check_vehicle_type_4 = "" ;
							$check_vehicle_type_5 = "" ;
							$check_vehicle_type_6 = "" ;
							if( !empty($data_form_yellow->vehicle_type) ){
								if( $data_form_yellow->vehicle_type == 'รถ' ){
									$check_vehicle_type_1 = "checked";
								}else if ( $data_form_yellow->vehicle_type == 'อากาศยาน' ){
									$check_vehicle_type_2 = "checked";
								}else if ( $data_form_yellow->vehicle_type == 'เรือ ป.๑' ){
									$check_vehicle_type_3 = "checked";
								}else if ( $data_form_yellow->vehicle_type == 'เรือ ป.๒' ){
									$check_vehicle_type_4 = "checked";
								}else if ( $data_form_yellow->vehicle_type == 'เรือ ป.๓' ){
									$check_vehicle_type_5 = "checked";
								}else if ( $data_form_yellow->vehicle_type == 'เรือประเภทอื่นๆ' ){
									$check_vehicle_type_6 = "checked";
								}
							}
						@endphp
						
						<div class="row">
							<div class="col-md-12 mb-2">
								<label  class="form-label m-0">
									<b>
										ชนิดยานพาหนะ<sup>(๗)</sup>
									</b>
								</label>
							</div>	
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="radio" {{ $check_vehicle_type_1 }} name="vehicle_type" value="รถ"  class="card-input-element d-none" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										<b>รถ</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="radio" {{ $check_vehicle_type_2 }} name="vehicle_type" value="อากาศยาน"  class="card-input-element d-none" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										<b>อากาศยาน</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="radio" {{ $check_vehicle_type_3 }} name="vehicle_type" value="เรือ ป.๑"  class="card-input-element d-none" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										<b>เรือ ป.๑</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="radio" {{ $check_vehicle_type_4 }} name="vehicle_type" value="เรือ ป.๒"  class="card-input-element d-none" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										<b>เรือ ป.๒</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="radio" {{ $check_vehicle_type_5 }} name="vehicle_type" value="เรือ ป.๓"  class="card-input-element d-none" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										<b>เรือ ป.๓</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="radio" {{ $check_vehicle_type_6 }} name="vehicle_type" value="เรือประเภทอื่นๆ"  class="card-input-element d-none" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										<b>เรือประเภทอื่นๆ</b>
									</div>
								</label>
							</div>

							<div class="col-md-12 mb-2 mt-2">
								<label  class="form-label mt-2">
									<b>
										ประเภทชุดปฏิบัติการ
									</b>
								</label>
							</div>	
							@php
								$check_operating_suit_type_1 = "" ;
								$check_operating_suit_type_2 = "" ;
								$check_operating_suit_type_3 = "" ;
								$check_operating_suit_type_4 = "" ;
								if( !empty($data_form_yellow->operating_suit_type) ){
									if( $data_form_yellow->operating_suit_type == 'FR' ){
										$check_operating_suit_type_1 = "checked";
									}else if ( $data_form_yellow->operating_suit_type == 'BLS' ){
										$check_operating_suit_type_2 = "checked";
									}else if ( $data_form_yellow->operating_suit_type == 'ILS' ){
										$check_operating_suit_type_3 = "checked";
									}else if ( $data_form_yellow->operating_suit_type == 'ALS' ){
										$check_operating_suit_type_4 = "checked";
									}
								}
							@endphp
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="radio" {{ $check_operating_suit_type_1 }} name="operating_suit_type" value="FR"  class="card-input-element d-none" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center" onclick="check_show_btn_form_color('FR');">
										<b>FR</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="radio" {{ $check_operating_suit_type_2 }} name="operating_suit_type" value="BLS"  class="card-input-element d-none" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center" onclick="check_show_btn_form_color('BLS');">
										<b>BLS</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="radio" {{ $check_operating_suit_type_3 }} name="operating_suit_type" value="ILS"  class="card-input-element d-none" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center" onclick="check_show_btn_form_color('ILS');">
										<b>ILS</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="radio" {{ $check_operating_suit_type_4 }} name="operating_suit_type" value="ALS"  class="card-input-element d-none" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center" onclick="check_show_btn_form_color('ALS');">
										<b>ALS</b>
									</div>
								</label>
							</div>

							<div class="col-md-12"></div>

							<div class="col-md-4">
								<label for="" class="form-label"><b>ชื่อหน่วยปฏิบัติการ</b></label>
								<div class="input-group"> <span class="input-group-text bg-white radius-1" ><i class="fa-solid fa-user-nurse"></i></span>
									<input type="text" class="form-control border-start-0 radius-2" name="operation_unit_name" value="{{ isset($data_form_yellow->operation_unit_name) ? $data_form_yellow->operation_unit_name : ''}}" placeholder="ชื่อหน่วยปฏิบัติการ" readonly>
								</div>
							</div>
							<div class="col-md-4">
								<label for="phone_user" class="form-label"><b>ชื่อชุดปฏิบัติการ</b></label>
								<div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-users-medical"></i></span>
									<input type="text" class="form-control border-start-0 radius-2" name="action_set_name" value="{{ isset($data_form_yellow->action_set_name) ? $data_form_yellow->action_set_name : ''}}" placeholder="ชื่อชุดปฏิบัติการ" readonly>
								</div>
							</div>
							<div class="col-md-4">
								<label for="" class="form-label"><b>&nbsp;</b></label>
								<span class="nav-link btn-danger btn" data-bs-toggle="pill" href="#operating_unit" role="tab" aria-selected="false" onclick="check_go_to(null);document.querySelector('#tag_a_open_map_operating_unit').click();select_level();" style="width:100%;" >
                                    <i class="fa-solid fa-hospital-user"></i> เลือกหน่วยแพทย์
								</span>
							</div>
							<hr class="mt-2">
							<div class="col-12 mt-2">
								<div class="table-responsive">
									<!--Table-->
									<table class="table  table-bordered border-secondary ">
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
												<th scope="row" style="vertical-align: middle;">
													เวลา (น.)
												</th>
												<td>
													<input class="form-control" type="time" name="time_create_sos" id="time_create_sos" value="{{ isset($data_form_yellow->time_create_sos) ? $data_form_yellow->time_create_sos : ''}}">
												</td>
												<td>
													<input class="form-control" type="time" name="time_command" id="time_command" value="{{ isset($data_form_yellow->time_command) ? $data_form_yellow->time_command : ''}}">
												</td>
												<td>
													<input class="form-control" type="time" name="time_go_to_help" id="time_go_to_help" value="{{ isset($data_form_yellow->time_go_to_help) ? $data_form_yellow->time_go_to_help : ''}}">
												</td>
												<td>
													<input class="form-control" type="time" name="time_to_the_scene" id="time_to_the_scene" value="{{ isset($data_form_yellow->time_to_the_scene) ? $data_form_yellow->time_to_the_scene : ''}}">
												</td>
												<td>
													<input class="form-control" type="time" name="time_leave_the_scene" id="time_leave_the_scene" value="{{ isset($data_form_yellow->time_leave_the_scene) ? $data_form_yellow->time_leave_the_scene : ''}}">
												</td>
												<td>
													<input class="form-control" type="time" name="time_hospital" id="time_hospital" value="{{ isset($data_form_yellow->time_hospital) ? $data_form_yellow->time_hospital : ''}}">
												</td>
												<td>
													<input class="form-control" type="time" name="time_to_the_operating_base" id="time_to_the_operating_base" value="{{ isset($data_form_yellow->time_to_the_operating_base) ? $data_form_yellow->time_to_the_operating_base : ''}}">
												</td>
											</tr>
											<tr>
												<th scope="row">
													รวมเวลา (นาที)
												</th>
												<td colspan="4" style="text-align: center;">
													Response time = { $response_time } นาที
												</td>
												<td style="background-color:#D3D3D3;">
													<!--  -->
												</td>
												<td colspan="2" style="text-align: center;">
													........ นาที
												</td>
											</tr>
											<tr>
												<th scope="row" style="vertical-align: middle;">
													เลข กม.
												</th>
												<td colspan="3">
													<input class="form-control" type="number" min="0" name="km_create_sos_to_go_to_help" id="km_create_sos_to_go_to_help" value="{{ isset($data_form_yellow->km_create_sos_to_go_to_help) ? $data_form_yellow->km_create_sos_to_go_to_help : ''}}">
												</td>
												<td colspan="2">
													<input class="form-control" type="number"min="0" name="km_to_the_scene_to_leave_the_scene" id="km_to_the_scene_to_leave_the_scene" value="{{ isset($data_form_yellow->km_to_the_scene_to_leave_the_scene) ? $data_form_yellow->km_to_the_scene_to_leave_the_scene : ''}}">
												</td>
												<td>
													<input class="form-control"type="number" min="0" name="km_hospital" id="km_hospital" value="{{ isset($data_form_yellow->km_hospital) ? $data_form_yellow->km_hospital : ''}}">
												</td>
												<td>
													<input class="form-control" type="number" min="0" name="km_operating_base" id="km_operating_base" value="{{ isset($data_form_yellow->km_operating_base) ? $data_form_yellow->km_operating_base : ''}}">
												</td>
											</tr>
											<tr>
												<th rowspan="2" style="vertical-align: middle;">
													ระยะทาง (กม.)
												</th>
												<td  style="vertical-align: middle;text-align: center;" rowspan="2" colspan="4">
													รวมระยะทางไป ................ กม.
												</td>
												<td style="background-color:#D3D3D3;">
													<!--  -->
												</td>
												<td colspan="2" style="text-align: center;">
													ระยะทางกลับ ....... กม.
												</td>
												</td>
											</tr>
											<tr>
												<td colspan="2" style="text-align: center;">
													ระยะไป รพ. ....... กม.
												</td>
												<td style="background-color:#D3D3D3;">
													<!--  -->
												</td>
											</tr>
										</tbody>
									</table>
									<!--Table-->
									</div>
								</div>
						</div>
					</div>
					
					<!---------------------------------- ข้อ 6  ---------------------------------->
					<div id="step-6" class="tab-pane" role="tabpanel" aria-labelledby="step-6">
						<div class="card-title d-flex align-items-center">
							<div><i class="fa-duotone fa-burst me-1 font-22 text-primary"></i>
							</div>
							
							<h5 class="mb-0 text-primary"><b>6.การให้รหัสความรุนแรง ณ จุดเกิดเหตุ  <span style="font-size:15px;">RC(Response Code)<sup>(๕)</sup></span></b></h5>
						</div>
						<hr>
						@php
							$check_rc_1 = "" ;
							$check_rc_2 = "" ;
							$check_rc_3 = "" ;
							$check_rc_4 = "" ;
							$check_rc_5 = "" ;
							if( !empty($data_form_yellow->rc) ){
								if( $data_form_yellow->rc == 'แดง(วิกฤติ)' ){
									$check_rc_1 = "checked";
								}else if ( $data_form_yellow->rc == 'เหลือง(เร่งด่วน)' ){
									$check_rc_2 = "checked";
								}else if ( $data_form_yellow->rc == 'เขียว(ไม่รุนแรง)' ){
									$check_rc_3 = "checked";
								}else if ( $data_form_yellow->rc == 'ขาว(ทั่วไป)' ){
									$check_rc_4 = "checked";
								}else if ( $data_form_yellow->rc == 'ดำ' ){
									$check_rc_5 = "checked";
								}
							}
						@endphp
						<div class="row">
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="radio" {{ $check_rc_1 }} name="rc" value="แดง(วิกฤติ)"  class="card-input-red card-input-element d-none" onchange="check_click_rc();">
									<div class="card card-body text-danger d-flex flex-row justify-content-between align-items-center">
										<b>
											แดง(วิกฤติ)  
										</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="radio" {{ $check_rc_4 }} name="rc" value="ขาว(ทั่วไป)"  class="card-input-element d-none" onchange="check_click_rc();">
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										<b>
											ขาว(ทั่วไป)    
										</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="radio" {{ $check_rc_2 }} name="rc" value="เหลือง(เร่งด่วน)"  class="card-input-warning card-input-element d-none" onchange="check_click_rc();">
									<div class="card card-body  text-warning d-flex flex-row justify-content-between align-items-center">
										<b>
											เหลือง(เร่งด่วน)  
										</b>
									</div>
								</label>
							</div>
							
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="radio" {{ $check_rc_3 }} name="rc" value="เขียว(ไม่รุนแรง)"  class="card-input-success card-input-element d-none" onchange="check_click_rc();">
									<div class="card card-body  text-success d-flex flex-row justify-content-between align-items-center">
										<b>
											เขียว(ไม่รุนแรง)
										</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="radio" {{ $check_rc_5 }} name="rc" id="rc_black"  value="ดำ"  class="card-input-dark card-input-element d-none" onchange="check_click_rc();">
									<div class="card card-body text-dark d-flex flex-row justify-content-between align-items-center">
										<b>
											<div class="input-wrapper-b-code inline">
												<span>
													ดำ <input name="rc_black_text" id="rc_black_text" size="10" style="border-radius: 5px;border: 1px solid dark; border-bottom: 1px dashed #ffffff;color:#000" class="form-control input_code_black  p-0 m-0" placeholder="ใส่รหัส" type="text" value="{{ isset($data_form_yellow->rc_black_text) ? $data_form_yellow->rc_black_text : ''}}" readonly>
												</span>

											</div>
										</b>
										
									</div>
								</label>
							</div>
						</div>
					</div>
					
					<!---------------------------------- ข้อ 7  ---------------------------------->
					<div id="step-7" class="tab-pane" role="tabpanel" aria-labelledby="step-7">
						<div class="card-title d-flex align-items-center">
							<div><i class="fa-solid fa-truck-medical me-1 font-22 text-primary"></i>
							</div>
							<h5 class="mb-0 text-primary"><b>การปฏิบัติการ</b></h5>
						</div>
						<hr>
						<style>
							.select-case{
								background: rgba(255, 255, 255, 0.8);
								padding: 10px;
								margin: 5px;
								border-radius: 15px;
							}
						</style>
						@php
							$check_treatment_1 = "" ;
							$check_treatment_2 = "" ;
							if( !empty($data_form_yellow->treatment) ){
								if( $data_form_yellow->treatment == 'มีการรักษา' ){
									$check_treatment_1 = "checked";
								}else if ( $data_form_yellow->treatment == 'ไม่มีการรักษา' ){
									$check_treatment_2 = "checked";
								}
							}

							$check_sub_treatment_1 ="";$check_sub_treatment_2 ="";$check_sub_treatment_3 ="";$check_sub_treatment_4 ="";$check_sub_treatment_5 ="";$check_sub_treatment_6 ="";$check_sub_treatment_7 ="";$check_sub_treatment_8 ="";$check_sub_treatment_9 ="";
							if( !empty($data_form_yellow->sub_treatment) ){
								$sub_treatment_explode = explode(",", $data_form_yellow->sub_treatment);

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
							<div class="col-12 col-md-6 col-lg-6">
								<div class=" col-12">
									<label>
										<input type="radio" {{ $check_treatment_1 }} name="treatment" value="มีการรักษา"  class="card-input-red card-input-element d-none" onchange="check_treatment(); reset_sub_treatment();">
										<div class="card card-body d-flex flex-row justify-content-between align-items-center text-danger" >
											<b>
												มีการรักษา
											</b>
										</div>
									</label>
								</div>
							</div>

							<div class="col-12 col-md-6 col-lg-6">
								<div class="">
									<label>
										<input type="radio"{{ $check_treatment_2 }} name="treatment" value="ไม่มีการรักษา"  class="card-input-element d-none" onchange="check_treatment(); reset_sub_treatment();">
										<div class="card card-body d-flex flex-row-reverse  justify-content-between align-items-center">
											<b>
												ไม่มีการรักษา
											</b>
										</div>
									</label>
								</div>
							</div>

							<div class="col-12" style="margin-bottom: 20%;">
								<!-- -------------------------------------------   เคสมีการรักษา  ----------------------------------------------------- -->
								<div class="row d-none" id="treatment_yes">
									<br><br><br>
									<div class="col-12 col-md-4 col-lg-4">
										<label>
											<input type="checkbox" {{ $check_sub_treatment_1 }} name="sub_treatment" value="นำส่ง"  class="sub_treatment card-input-red card-input-element d-none">
											<div class="text-danger card card-body d-flex flex-row justify-content-between align-items-center">
												<b>
													นำส่ง
												</b>
											</div>
										</label>
									</div>
									<div class="col-12 col-md-4 col-lg-4">
										<label>
											<input type="checkbox" {{ $check_sub_treatment_2 }} name="sub_treatment" value="ส่งต่อชุดปฏิบัติการระดับสูงกว่า"  class="sub_treatment card-input-red card-input-element d-none">
											<div class="text-danger card card-body d-flex flex-row justify-content-between align-items-center">
												<b>
													ส่งต่อชุดปฏิบัติการระดับสูงกว่า  
												</b>
											</div>
										</label>
									</div>
									<div class="col-12 col-md-4 col-lg-4">
										<label>
											<input type="checkbox" {{ $check_sub_treatment_3}} name="sub_treatment" value="ไม่นำส่ง"  class="sub_treatment card-input-red card-input-element d-none">
											<div class="text-danger card card-body d-flex flex-row justify-content-between align-items-center">
												<b>
													ไม่นำส่ง 
												</b>
											</div>
										</label>
									</div>
									<div class="col-12 col-md-4 col-lg-4">
										<label>
											<input type="checkbox" {{ $check_sub_treatment_4 }} name="sub_treatment" value="เสียชีวิตระหว่างนำส่ง"  class="sub_treatment card-input-red card-input-element d-none">
											<div class="text-danger card card-body d-flex flex-row justify-content-between align-items-center">
												<b>
													เสียชีวิตระหว่างนำส่ง  
												</b>
											</div>
										</label>
									</div>
									<div class="col-12 col-md-4 col-lg-4">
										<label>
											<input type="checkbox" {{ $check_sub_treatment_5 }} name="sub_treatment" value="เสียชีวิต ณ จุดเกิดเหตุ"  class="sub_treatment card-input-red card-input-element d-none">
											<div class="text-danger card card-body d-flex flex-row justify-content-between align-items-center">
												<b>
													เสียชีวิต ณ จุดเกิดเหตุ
												</b>
											</div>
										</label>
									</div>
								</div>

								<!-- -------------------------------------------   เคส ไม่มี การรักษา  ----------------------------------------------------- -->
								<div class="row d-none" id="treatment_no">
									<div class="col-12 col-md-4 col-lg-4">
										<label>
											<input type="checkbox" {{ $check_sub_treatment_6 }} name="sub_treatment" value="ผู้ป่วยปฏิเสธการรักษา"  class="sub_treatment card-input-element d-none">
											<div class="card card-body d-flex flex-row justify-content-between align-items-center">
												<b>
													ผู้ป่วยปฏิเสธการรักษา
												</b>
											</div>
										</label>
									</div>
									<div class="col-12 col-md-4 col-lg-4">
										<label>
											<input type="checkbox" {{ $check_sub_treatment_7 }} name="sub_treatment" value="ยกเลิก"  class="sub_treatment card-input-element d-none">
											<div class="card card-body d-flex flex-row justify-content-between align-items-center">
												<b>
													ยกเลิก  
												</b>
											</div>
										</label>
									</div>
									<div class="col-12 col-md-4 col-lg-4">
										<label>
											<input type="checkbox" {{ $check_sub_treatment_8 }} name="sub_treatment" value="ไม่พบเหตุ"  class="sub_treatment card-input-element d-none">
											<div class="card card-body d-flex flex-row justify-content-between align-items-center">
												<b>
													ไม่พบเหตุ 
												</b>
											</div>
										</label>
									</div>
									<div class="col-12 col-md-4 col-lg-4">
										<label>
											<input type="checkbox" {{ $check_sub_treatment_9 }} name="sub_treatment" value="เสียชีวิตก่อนชุดปฏิบัติการไปถึง"  class="sub_treatment card-input-element d-none">
											<div class="card card-body d-flex flex-row justify-content-between align-items-center">
												<b>
													เสียชีวิตก่อนชุดปฏิบัติการไปถึง
												</b>
											</div>
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!---------------------------------- ข้อ 8  ---------------------------------->
					<div id="step-8" class="tab-pane" role="tabpanel" aria-labelledby="step-8">
						<div class="card-title d-flex align-items-center">
							<div><i class="fa-duotone fa-user-group me-1 font-22 text-primary"></i>
							</div>
							
							<h5 class="mb-0 text-primary"><b> ชื่อผู้ป่วย</b></h5>
						</div>
						<hr>
						<!-- ----------------------------------------------- ผู้ป่วย 1 ------------------------------------------------------------- -->
						<fieldset class="rounded-3 p-3 field-user">
							<legend class="float-none w-auto px-3">ผู้ป่วย ๑</legend>
							<div class="row">
								<div class="col-12 col-md-4 col-lg-4">
									<label for="" class="form-label">ผู้ป่วย ๑. ชื่อ-สกุล</label>
									<div class="input-group"> <span class="input-group-text bg-white radius-1" ><i class="fa-solid fa-user"></i></span>
										<input type="text" class="form-control border-start-0 radius-2" name="patient_name_1" id="patient_name_1" value="{{ isset($data_form_yellow->patient_name_1) ? $data_form_yellow->patient_name_1 : ''}}" placeholder="ชื่อ-สกุล">
									</div>
								</div>
								<div class="col-12 col-md-2 col-lg-2">
									<label for="phone_user" class="form-label">อายุ (ปี)</label>
									<div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-input-numeric"></i></span>
										<input  type="number" min="1" class="form-control border-start-0 radius-2" name="patient_age_1" id="patient_age_1" value="{{ isset($data_form_yellow->patient_age_1) ? $data_form_yellow->patient_age_1 : ''}}" placeholder="อายุ">
									</div>
								</div>
								<div class="col-12 col-md-3 col-lg-3">
									<label for="phone_user" class="form-label">HN</label>
									<div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-id-card-clip"></i></span>
										<input type="text" class="form-control border-start-0 radius-2"  name="patient_hn_1" id="patient_hn_1" value="{{ isset($data_form_yellow->patient_hn_1) ? $data_form_yellow->patient_hn_1 : ''}}" placeholder="รหัสผู้ป่วย">
									</div>
								</div>
								<div class="col-12 col-md-3 col-lg-3">
									<label for="phone_user" class="form-label">เลขประจำตัวประชาชน</label>
									<div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-id-card"></i></span>
										<input type="text" class="form-control border-start-0 radius-2"name="patient_vn_1" id="patient_vn_1" value="{{ isset($data_form_yellow->patient_vn_1) ? $data_form_yellow->patient_vn_1 : ''}}" placeholder="เลขประจำตัวประชาชน">
									</div>
								</div>
								<div class="col-12 mt-3"></div>
								
								<div class="col-12 col-md-6 col-lg-6">
									<label for="phone_user" class="form-label">นำส่งที่จังหวัด</label>
									<div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-map-location-dot"></i></span>
										<input type="text" class="form-control border-start-0 radius-2" name="delivered_province_1" id="delivered_province_1" value="{{ isset($data_form_yellow->delivered_province_1) ? $data_form_yellow->delivered_province_1 : ''}}" placeholder="จังหวัดที่นำส่ง">
									</div>
								</div>
								<div class="ccol-12 col-md-6 col-lg-6">
									<label for="phone_user" class="form-label">นำส่ง รพ.</label>
									<div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-hospital"></i></span>
										<input type="text" class="form-control border-start-0 radius-2" name="delivered_hospital_1" id="delivered_hospital_1" value="{{ isset($data_form_yellow->delivered_hospital_1) ? $data_form_yellow->delivered_hospital_1 : ''}}" placeholder="โรงพยาบาลที่นำส่ง">
									</div>
								</div>
							</div>
						</fieldset>
						

						<fieldset class="rounded-3 p-3 field-user mt-4">
							<legend class="float-none w-auto px-3">ผู้ป่วย ๒</legend>
							<div class="row">
								<div class="col-12 col-md-4 col-lg-4">
									<label for="" class="form-label">ผู้ป่วย ๑. ชื่อ-สกุล</label>
									<div class="input-group"> <span class="input-group-text bg-white radius-1" ><i class="fa-solid fa-user"></i></span>
										<input type="text" class="form-control border-start-0 radius-2" name="patient_name_2" id="patient_name_2" value="{{ isset($data_form_yellow->patient_name_2) ? $data_form_yellow->patient_name_2 : ''}}" placeholder="ชื่อ-สกุล">
									</div>
								</div>
								<div class="col-12 col-md-2 col-lg-2">
									<label for="phone_user" class="form-label">อายุ (ปี)</label>
									<div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-input-numeric"></i></span>
										<input  type="number" min="1" class="form-control border-start-0 radius-2" name="patient_age_2" id="patient_age_2" value="{{ isset($data_form_yellow->patient_age_2) ? $data_form_yellow->patient_age_2 : ''}}" placeholder="อายุ">
									</div>
								</div>
								<div class="col-12 col-md-3 col-lg-3">
									<label for="phone_user" class="form-label">HN</label>
									<div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-id-card-clip"></i></span>
										<input type="text" class="form-control border-start-0 radius-2"  name="patient_hn_2" id="patient_hn_2" value="{{ isset($data_form_yellow->patient_hn_2) ? $data_form_yellow->patient_hn_2 : ''}}" placeholder="รหัสผู้ป่วย">
									</div>
								</div>
								<div class="col-12 col-md-3 col-lg-3">
									<label for="phone_user" class="form-label">เลขประจำตัวประชาชน</label>
									<div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-id-card"></i></span>
										<input type="text" class="form-control border-start-0 radius-2"name="patient_vn_2" id="patient_vn_2" value="{{ isset($data_form_yellow->patient_vn_2) ? $data_form_yellow->patient_vn_2 : ''}}" placeholder="เลขประจำตัวประชาชน">
									</div>
								</div>
								<div class="col-12 mt-3"></div>
								
								<div class="col-12 col-md-6 col-lg-6">
									<label for="phone_user" class="form-label">นำส่งที่จังหวัด</label>
									<div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-map-location-dot"></i></span>
										<input type="text" class="form-control border-start-0 radius-2" name="delivered_province_2" id="delivered_province_2" value="{{ isset($data_form_yellow->delivered_province_2) ? $data_form_yellow->delivered_province_2 : ''}}" placeholder="จังหวัดที่นำส่ง">
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6">
									<label for="phone_user" class="form-label">นำส่ง รพ.</label>
									<div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-hospital"></i></span>
										<input type="text" class="form-control border-start-0 radius-2" name="delivered_hospital_2" id="delivered_hospital_2" value="{{ isset($data_form_yellow->delivered_hospital_2) ? $data_form_yellow->delivered_hospital_2 : ''}}" placeholder="โรงพยาบาลที่นำส่ง">
									</div>
								</div>
							</div>
						</fieldset>

						@php

							$check_submission_criteria_1 ="";$check_submission_criteria_2 ="";$check_submission_criteria_3 ="";$check_submission_criteria_4 ="";$check_submission_criteria_5 ="";

							if( !empty($data_form_yellow->submission_criteria) ){
								$submission_criteria_explode = explode(",", $data_form_yellow->submission_criteria);

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

					        if( !empty($data_form_yellow->communication_hospital) ){
								$communication_hospital_explode = explode(",", $data_form_yellow->communication_hospital);

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

						<div class="row mt-4">
							<div class="col-md-12 mb-2">
								<label  class="form-label m-0 h-3">
									<b>
										เกณฑ์การนำส่ง (เลือกได้มากกว่า ๑ ข้อ)
									</b>
								</label>
							</div>	
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_submission_criteria_1 }} name="submission_criteria" value="สามารถรักษาได้"  class="card-input-element d-none submission_criteria" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										<b>สามารถรักษาได้</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_submission_criteria_2 }} name="submission_criteria" value="อยู่ใกล้"  class="card-input-element d-none submission_criteria" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										<b>อยู่ใกล้</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_submission_criteria_3 }} name="submission_criteria" value="มีหลักประกัน"  class="card-input-element d-none submission_criteria" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										<b>มีหลักประกัน</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_submission_criteria_4 }} name="submission_criteria" value="ผู้ป่วยเก่า"  class="card-input-element d-none submission_criteria" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										<b>ผู้ป่วยเก่า</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_submission_criteria_5 }} name="submission_criteria" value="เป็นความประสงค์"  class="card-input-element d-none submission_criteria" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										<b>เป็นความประสงค์</b>
									</div>
								</label>
							</div>
						</div>


						<div class="row mt-2">
							<div class="col-md-12 mb-2">
								<label  class="form-label m-0 h-3">
									<b>
										การติดต่อสื่อสารกับ รพ.ที่นำส่ง
									</b>
								</label>
							</div>	
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_communication_hospital_1 }} name="communication_hospital" value="แจ้งวิทยุ"  class="card-input-element d-none communication_hospital" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										<b>แจ้งวิทยุ</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_communication_hospital_2 }} name="communication_hospital" value="แจ้งทางโทรศัพท์"  class="card-input-element d-none communication_hospital" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										<b>แจ้งทางโทรศัพท์</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_communication_hospital_3 }} name="communication_hospital" value="ไม่ได้แจ้ง"  class="card-input-element d-none communication_hospital" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										<b>ไม่ได้แจ้ง</b>
									</div>
								</label>
							</div>
						</div>
					</div>

					<!---------------------------------- ข้อ 9  ---------------------------------->
					<div id="step-9" class="tab-pane" role="tabpanel" aria-labelledby="step-9">
						<div class="card-title d-flex align-items-center">
							<div>
								<i class="fa-regular fa-circle-info me-3 font-22 text-primary"></i>
							</div>
							<h5 class="mb-0 text-primary"><b> เพิ่มเติม เฉพาะ อาการนำสำคัญของผู้ป่วยฉุกเฉินที่ได้จากการรับแจ้ง เป็นรหัส ๒๕ อุบัติเหตุยานยนต์ รายละเอียดการกรอกข้อมูลโปรดดูในโปรแกรม</b></h5>
						</div>
						<hr>
						<div class="row">
							<div class="col-12 col-md-4 col-lg-4">
								<label for="registration_category" class="form-label">ทะเบียนรถหมวด</label>
								<div class="input-group"> <span class="input-group-text bg-white radius-1" ><i class="fa-duotone fa-cars"></i></span>
									<input type="text" class="form-control border-start-0 radius-2"  name="registration_category" value="{{ isset($data_form_yellow->registration_category) ? $data_form_yellow->registration_category : ''}}" placeholder="ทะเบียนรถหมวด">
								</div>
							</div>
							<div class="col-12 col-md-4 col-lg-4">
								<label for="registration_number" class="form-label">เลขทะเบียน</label>
								<div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-duotone fa-input-numeric"></i></span>
									<input  type="text" min="1" class="form-control border-start-0 radius-2" name="registration_number" value="{{ isset($data_form_yellow->registration_number) ? $data_form_yellow->registration_number : ''}}" placeholder="เลขทะเบียน">
								</div>
							</div>
							<div class="col-12 col-md-4 col-lg-4">
								<label for="registration_province" class="form-label">จังหวัด</label>
								<div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-duotone fa-map-location"></i></span>
									<input type="text" class="form-control border-start-0 radius-2" name="registration_province" value="{{ isset($data_form_yellow->registration_province) ? $data_form_yellow->registration_province : ''}}" placeholder="จังหวัด">
								</div>
							</div>
						</div>

						@php
							$check_owner_registration_1 = "" ;
							$check_owner_registration_2 = "" ;
							$check_owner_registration_3 = "" ;
							if( !empty($data_form_yellow->owner_registration) ){
								if( $data_form_yellow->owner_registration == 'ของผู้ประสบเหตุ' ){
									$check_owner_registration_1 = "checked";
								}else if ( $data_form_yellow->owner_registration == 'ของคู่กรณี' ){
									$check_owner_registration_2 = "checked";
								}else if ( $data_form_yellow->owner_registration == 'ไม่สามารถระบุได้' ){
									$check_owner_registration_3 = "checked";
								}
							}

						@endphp
						<div class="row mt-3">
							<div class="col-md-12">
								<label class="form-label m-0 h-3">
									เจ้าของ
								</label>
							</div>	
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="radio" {{ $check_owner_registration_1 }} name="owner_registration" value="ของผู้ประสบเหตุ"  class="card-input-element d-none" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										<b>ของผู้ประสบเหตุ</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="radio" {{ $check_owner_registration_2 }} name="owner_registration" value="ของคู่กรณี"  class="card-input-element d-none" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										<b>ของคู่กรณี</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="radio" {{ $check_owner_registration_3 }} name="owner_registration" value="ไม่สามารถระบุได้"  class="card-input-element d-none" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										<b>ไม่สามารถระบุได้</b>
									</div>
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="row  m-0 p-0">
					<div class="d-flex justify-content-end my-3 float-end">
						<div class="d-flex align-items-end">
						
							<span>
								ลงนาม 
								<div class="input-wrapper">
									<span class="size-span" id="span_name_officer_1"></span>
									<input id="name_officer_1" oninput="updateChange(event)" size="5" style="border-radius:0;font-family: inherit;border: none; border-bottom: 1px dashed #000000;" class="form-control bg-transparent p-0 m-0"  type="text" >
								</div>
								(เจ้าหน้าที่ผู้บันทึก) 
							</span>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<span>
								ลงนาม 
								<div class="input-wrapper">
									<span class="size-span" id="span_name_officer_2"></span>
									<input id="name_officer_2" oninput="updateChange(event)" size="5" style="border-radius:0;border: none; border-bottom: 1px dashed #000000;" class="form-control bg-transparent p-0 m-0"  type="text" >
								</div>
								 (แพทย์หรือพยาบาล) 
							</span>
						</div>
					</div>
					<div class="d-flex justify-content-between">
						<button class="btn btn-primary " id="prev-btn-form-yellow" type="button" onclick="check_go_to('remove');">ย้อนกลับ</button>
						&nbsp;&nbsp;
						<button class="btn btn-primary" id="next-btn-form-yellow" type="button" onclick="check_go_to('add');">ต่อไป</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="container">
	
	<!-- <div class="row" style="position: absolute;bottom: 5%;right:3%;">
		<div class="col-12">
			<p>
        		ลงนาม ..................... (เจ้าหน้าที่ผู้บันทึก) &nbsp;&nbsp;&nbsp; ลงนาม ..................... ผู้รับรอง(แพทย์หรือพยาบาล)
   			</p>
		</div>
	</div> -->
	<!-- <i id="btn_next" class="fa-solid fa-caret-right text-secondary" href="#carousel_form_yellow" role="button" data-slide="next" onclick="check_go_to('add');"></i> -->

	<!-- <div class="row" style="position: absolute;bottom: 1%;right:3%;"> -->
        <!-- -----------------BTN prev next------------------- -->
        <!-- <div class="col-12 d-flex align-items-end">
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
    </div> -->

</div>

<script>

	document.addEventListener('DOMContentLoaded', (event) => {
		
        // console.log("START");
        setTimeout(function() {
            check_color_btn(null,null);
			check_treatment();
	        check_lat_lng();
	        check_click_rc();
        }, 1500);

    });

    function check_lat_lng(){
    	// Check lat lng empty
	    let input_lat = document.querySelector('#lat') ;
	    let input_lng = document.querySelector('#lng') ;

		if (input_lat.value && input_lng.value) {
			document.querySelector('#btn_get_location_user').disabled = false ;
			document.querySelector('#btn_select_operating_unit').disabled = false ;

		}else{
			document.querySelector('#btn_get_location_user').disabled = true ;
			document.querySelector('#btn_select_operating_unit').disabled = true ;
		}
    }

	function check_go_to(type){
		// console.log(type);
		
		let active = window.location.href.split('#step-')[1];
			// console.log(active);

		check_color_btn(active);
		send_save_data(active);
		btn_save_data();

	}

	function go_to_form_data(click_to){
		// console.log(click_to);

		let active = window.location.href.split('#step-')[1];

			// console.log("active >> " + active_sp[2]);

		// document.querySelector('#form_data_' + active_sp[2]).classList.remove('active');
		// document.querySelector('#form_data_' + click_to).classList.add('active');

		send_save_data(active);
		check_color_btn(active,click_to);
		btn_save_data();
	}

	function check_click_rc(){
		let rc_black = document.querySelector('#rc_black').checked ;
		let rc_black_text = document.querySelector('#rc_black_text') ;
		if (rc_black) {
			rc_black_text.readOnly = false;
		}else{
			rc_black_text.readOnly = true;
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
			        "sos_help_center_id" : "{{ $sos_help_center->id }}",
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
			        "sos_help_center_id" : "{{ $sos_help_center->id }}",
			        "symptom" : symptom_value,
			    };
		    break;
			case '3':
		    	data_arr = {
			        "sos_help_center_id" : "{{ $sos_help_center->id }}",
			        "symptom_other" : symptom_other.value,
			    };
		    break;
		    case '4':
		    	data_arr = {
			        "sos_help_center_id" : "{{ $sos_help_center->id }}",
			        "idc" : idc_value,
			    };
		    break;
		    case '5':
		    	data_arr = {
			        "sos_help_center_id" : "{{ $sos_help_center->id }}",
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

			    if (operating_suit_type_value) {
			    	let level_of_no5 = document.querySelector('#input_select_level');
			    		level_of_no5.value = operating_suit_type_value ;
			    }

			    if (vehicle_type_value) {
            		let vehicle_type_of_no5 = document.querySelector('#input_vehicle_type');
            			vehicle_type_of_no5.value = vehicle_type_value ;
			    }
			   
		    break;
		    case '6':

		    	if ( rc_value && rc_value === "ดำ" ) {
		    		data_arr = {
				        "sos_help_center_id" : "{{ $sos_help_center->id }}",
				        "rc" : rc_value,
				        "rc_black_text" : rc_black_text.value,
				    };
		    	}else{
		    		data_arr = {
				        "sos_help_center_id" : "{{ $sos_help_center->id }}",
				        "rc" : rc_value,
				    };
		    	}
		    	
		    break;
		    case '7':
		    	data_arr = {
			        "sos_help_center_id" : "{{ $sos_help_center->id }}",
			        "treatment" : treatment_value,
			        "sub_treatment" : sub_treatment_value,
			    };
		    break;
		    case '8':
		    	data_arr = {
			        "sos_help_center_id" : "{{ $sos_help_center->id }}",
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
			    // console.log(data_arr);
		    break;
		    case '9':
		    	data_arr = {
			        "sos_help_center_id" : "{{ $sos_help_center->id }}",
			        "registration_category" : registration_category.value,
			        "registration_number" : registration_number.value,
			        "registration_province" : registration_province.value,
			        "owner_registration" : owner_registration_value,
			    }; 
		    break;
			default :
				data_arr = {
					"sos_help_center_id" : "{{ $sos_help_center->id }}",
					"be_notified" : be_notified_value,
					"name_user" : name_user.value,
					"phone_user" : phone_user.value,
					"lat" : lat.value,
					"lng" : lng.value,
					"location_sos" : location_sos.value,
					"symptom" : symptom_value,
					"symptom_other" : symptom_other.value,
					"idc" : idc_value,
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
					"rc" : rc_value,
					"rc_black_text" : rc_black_text.value,
					"treatment" : treatment_value,
					"sub_treatment" : sub_treatment_value,
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
					"registration_category" : registration_category.value,
					"registration_number" : registration_number.value,
					"registration_province" : registration_province.value,
					"owner_registration" : owner_registration_value,
				};

				if (operating_suit_type_value) {
			    	let level_of_no5 = document.querySelector('#input_select_level');
			    		level_of_no5.value = operating_suit_type_value ;
			    }

			    if (vehicle_type_value) {
            		let vehicle_type_of_no5 = document.querySelector('#input_vehicle_type');
            			vehicle_type_of_no5.value = vehicle_type_value ;
			    }

		    break;
		}


		console.log(data_arr);

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
<!--end row-->

<!--end wrapper-->
<!--start switcher-->
</body>
<script src="{{ asset('partner_new/js/jquery.min.js') }}"></script>
<script>
	$(document).ready(function() {
		// Step show event
		$("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
			$("#prev-btn-form-yellow").removeClass('disabled');
			$("#next-btn-form-yellow").removeClass('disabled');
			if (stepPosition === 'first') {
				$("#prev-btn-form-yellow").addClass('disabled');
			} else if (stepPosition === 'last') {
				$("#next-btn-form-yellow").addClass('disabled');
			} else {
				$("#prev-btn-form-yellow").removeClass('disabled');
				$("#next-btn-form-yellow").removeClass('disabled');
			}
		});
		// Smart Wizard
		$('#smartwizard').smartWizard({
			selected: 9,
			theme: 'dots',
			transition: {
				animation: 'fade', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
			},
			anchorSettings: {
				anchorClickable: true, // Enable/Disable anchor navigation
				enableAllAnchors: true, // Activates all anchors clickable all times
				markDoneStep: true, // add done css
				enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
        	},
			toolbarSettings: {
				toolbarPosition: 'none', // both bottom
			},
		});
		// External Button Events
		$("#reset-btn").on("click", function() {
			// Reset wizard
			$('#smartwizard').smartWizard("reset");
			return true;
		});
		$("#prev-btn-form-yellow").on("click", function() {
			// Navigate previous
			$('#smartwizard').smartWizard("prev");
			return true;
		});
		$("#next-btn-form-yellow").on("click", function() {
			// Navigate next
			$('#smartwizard').smartWizard("next");
			return true;
		});
	});
</script>
<script>
	// ช่อง input ขยายตามตัวหนังสือ
	function updateChange(event) {
		if(event.target.id === "name_officer_1"){
			const spanElement = document.querySelector('#span_name_officer_1');
			const value = event.target.value;	
			spanElement.innerText = value;
		}if(event.target.id === "name_officer_2"){
			const spanElement = document.querySelector('#span_name_officer_2');
			const value = event.target.value;	
			spanElement.innerText = value;
		}
	}
</script>

<script>
	
	function check_treatment() {
		var check_treatment = document.getElementsByName('treatment');
		// เช็คช่อง input ว่าเลือกมีการรักษาหรือไม่
		for (var i = 0, length = check_treatment.length; i < length; i++) {
			if (check_treatment[i].checked) {
				if(check_treatment[i].value == "มีการรักษา"){
					document.querySelector('#treatment_no').classList.add('d-none');
					document.querySelector('#treatment_yes').classList.remove('d-none');
					document.querySelector('#treatment_yes').classList.add('show-data');
				}else{
					document.querySelector('#treatment_yes').classList.add('d-none');
					document.querySelector('#treatment_no').classList.remove('d-none');
					document.querySelector('#treatment_no').classList.add('show-data');
				}
				
				break;
			} 
		}

        
	}
	function reset_sub_treatment(){
		
		var clist = document.getElementsByName('sub_treatment');

		for (var i = 0, length = clist.length; i < length; i++) { 
			if (clist[i].checked) {
				
				clist[i].checked = false; 
			
			}
		}

	}

</script>