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
				}.hidden {
  display: none !important;
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
						max-height:100% !important;
						min-height: 100% !important;
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
					.timeline-offilcer{
						background-color: #fff;
						border-radius: 1.5rem;
						padding: 1.5rem;
						display: block;
						position: relative;
					}.timeline-detail-offilcer{
						position: relative;
						display: flex;
						margin-top: 2rem;
						align-items: center;
					}.timeline-detail-offilcer i{
						font-size: 1.5rem;
						padding: 0 .7rem;
					}.timeline-header{
						font-size: 1.1rem;	
						font-weight: bold;
						font-family: 'Mitr', sans-serif;
						position: relative;
						
					}
					.timeline-detail-offilcer::before{
						content: "";
						width: 0.3rem;
						height: 100%;
						border-radius: 50rem;
						position: absolute;
						top: 1.8rem;
						left: calc(4.3rem - 1px);
						background-color: #e9ecef;
						
					}
					.timeline-green{
						color: #3ac47d;
					}
					.timeline-purple{
						color: #5E17EB;
					}.timeline-yellow{
						color: #f7b924;
					}.timeline-red{
						color: #e15173;
					}.timeline-blue{
						color: #3f6ad8;
					}.timeline-brown{
						color: #874c48;
					}.timeline-lightblue{
						color: #16aaff;
					}.timeline-orange{
						color: #f58611;
					}
					.timeline-detail-status{
						position: relative;
						padding-left: calc(7.3rem - 1px);
					}li span {
						position: relative;
						left: -9px;
					}.card-detail-officer img{
						border-radius: 15px 15px 0 0;
						opacity: 1 !important;
					}.card-detail-officer{
						border-radius: 15px !important;
						position: sticky;
					}
					.profile-data-officer::before {    
						content: "";
						background-image: url("{{ asset('/img/more/blurry-gradient2.svg') }}");
						background-size: cover;
						position: absolute;
						top: 0px;
						right: 0px;
						bottom: 0px;
						left: 0px;
						opacity: 0.75;
						border-radius: 1rem 1rem 0 0;

					}
					.footer-detail-officer{
						top: 3.5rem;
						background-color: #fff;
						padding: 1rem;
						-webkit-transition: all 0.1s ease-in-out;
						-moz-transition: all 0.1s ease-in-out;
						-ms-transition: all 0.1s ease-in-out;
						-o-transition: all 0.1s ease-in-out;
						transition: all 0.1s ease-in-out;
						-webkit-transform: scale(1);
						-moz-transform: scale(1);
						-ms-transform: scale(1);
						-o-transform: scale(1);
						transform: scale(1); 
						
					}
					.footer-detail-officer:hover{
						background-color: #525f7f;
						color: #fff;
					}
					.footer-detail-officer:hover i{
						-webkit-transition: all 0.1s ease-in-out;
						-moz-transition: all 0.1s ease-in-out;
						-ms-transition: all 0.1s ease-in-out;
						-o-transition: all 0.1s ease-in-out;
						transition: all 0.1s ease-in-out;
						-webkit-transform: scale(1.2);
						-moz-transform: scale(1.2);
						-ms-transform: scale(1.2);
						-o-transform: scale(1.2);
						transform: scale(1.2); 		
					}
					
					.footer-detail-officer:hover .h3{
						-webkit-transition: all 0.1s ease-in-out;
						-moz-transition: all 0.1s ease-in-out;
						-ms-transition: all 0.1s ease-in-out;
						-o-transition: all 0.1s ease-in-out;
						transition: all 0.1s ease-in-out;
						-webkit-transform: scale(1.2);
						-moz-transform: scale(1.2);
						-ms-transform: scale(1.2);
						-o-transform: scale(1.2);
						transform: scale(1.2); 		
					}

					.profile-officer{
						position: relative;
						opacity: 1 !important;
						width: 4rem;
						height: 4rem;
					}
					.profile-data-officer{
						position: relative;
						opacity: 1 !important;
						width: 100%;
						font-family: 'Mitr', sans-serif;
						color: #fff;
						padding: 1rem 0;
					}.text-name-officer{
						position: relative;
						font-size:1rem;
						white-space: nowrap;
						overflow: hidden;
						text-overflow: ellipsis;
						width: 100%;
					}.icon-data-officer{
						font-size: 2rem;
					}

					.operating-unit{
						margin-top: 1px;
					}

					.operating-unit-danger{
						color: #d92550 !important;
					}
					.operating-unit-danger:hover{
						color: #fff !important;
						background-color: #d92550 !important;
					}
					.operating-unit-success{
						color: #3ac47d !important;
					}
					.operating-unit-success:hover{
						color: #fff !important;
						background-color: #3ac47d !important;

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
									$check_be_notified_7 = "" ;

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
										}else if ( $data_form_yellow->be_notified == 'ส่งต่อชุดปฏิบัติการระดับสูงกว่า' ){
											$check_be_notified_7 = "checked";
										}

									}
								@endphp

								<div class="row mt-3">
									<div class="col-12	col-md-3 col-lg-3">
										<label>
											<input type="radio" {{ $check_be_notified_1 }} data-be_notified="แพลตฟอร์มวีเช็ค" name="be_notified" value="แพลตฟอร์มวีเช็ค"  class="card-input-element d-none" >
											<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
												แพลตฟอร์มวีเช็ค 
											</div>
										</label>
									</div>
									<div class="col-12	col-md-3 col-lg-3">
										<label>
											<input type="radio" {{ $check_be_notified_2 }} data-be_notified="โทรศัพท์หมายเลข ๑๖๖๙" name="be_notified" value="โทรศัพท์หมายเลข ๑๖๖๙" class="card-input-element d-none" >
											<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
												<span>
													โทรศัพท์หมายเลข ๑๖๖๙<sup>(๑)</sup>
												</span>
											</div>
										</label>
									</div>
									<div class="col-12	col-md-3 col-lg-3">
										<label>
											<input type="radio" {{ $check_be_notified_3 }} data-be_notified="โทรศัพท์หมายเลข ๑๖๖๙ (second call)" name="be_notified" value="โทรศัพท์หมายเลข ๑๖๖๙ (second call)" class="card-input-element d-none" >
											<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
												<span>
													โทรศัพท์หมายเลข ๑๖๖๙ (second call)<sup>(๒)</sup>
												</span>
											</div>
										</label>
									</div>
									<div class="col-12	col-md-3 col-lg-3">
										<label>
											<input type="radio" {{ $check_be_notified_4 }} data-be_notified="โทรศัพท์หมายเลขอื่นๆ" name="be_notified" value="โทรศัพท์หมายเลขอื่นๆ" class="card-input-element d-none" >
											<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
												<span>
													โทรศัพท์หมายเลขอื่นๆ<sup>(๓)</sup>
												</span>
											</div>
										</label>
									</div>
									<div class="col-12	col-md-3 col-lg-3">
										<label>
											<input type="radio" {{ $check_be_notified_5 }} data-be_notified="วิทยุสื่อสาร" name="be_notified" value="วิทยุสื่อสาร" class="card-input-element d-none" >
											<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
												<span>
													วิทยุสื่อสาร
												</span>
											</div>
										</label>
									</div>
									<div class="col-12	col-md-3 col-lg-3">
										<label>
											<input type="radio" {{ $check_be_notified_6 }} data-be_notified="วิธีอื่นๆ" name="be_notified" value="วิธีอื่นๆ" class="card-input-element d-none" >
											<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
												<span>
													วิธีอื่นๆ  
												</span>
											</div>
										</label>
									</div>
									<div class="col-12	col-md-3 col-lg-3">
										<label>
											<input type="radio" {{ $check_be_notified_7 }} data-be_notified="ส่งต่อชุดปฏิบัติการระดับสูงกว่า" name="be_notified" value="ส่งต่อชุดปฏิบัติการระดับสูงกว่า" class="card-input-element d-none" >
											<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
												<span>
													ส่งต่อชุดปฏิบัติการระดับสูงกว่า  
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
								<label for="phone_user" class="form-label">โทรศัพท์ผู้แจ้ง</label>
								<span id="phone-error" style="color: red;"></span>
								<div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-phone"></i></span>
									<input type="tel" pattern="[0-9]{9,10}" class="form-control border-start-0 radius-2" id="phone_user" name="phone_user" value="{{ isset($sos_help_center->phone_user) ? $sos_help_center->phone_user : ''}}" placeholder="โทรศัพท์ผู้แจ้ง" oninput="document.querySelector('#u_phone_user').innerHTML = document.querySelector('#phone_user').value ;validatePhone(this);">
								</div>
							</div>

							<script>
								// JavaScript
								let delay_check_phone ;
								function validatePhone(input) {
									
									document.getElementById("phone-error").textContent = "";
									clearTimeout(delay_check_phone);

							        delay_check_phone = setTimeout(function() {
							            const phonePattern = /^[0-9]{9,10}$/; // รูปแบบตัวเลขที่ต้องการ (9 หรือ 10 หลัก)

										if (input.validity.patternMismatch) {
										    // ถ้ามีรูปแบบไม่ตรงกับที่กำหนด
										    input.setCustomValidity("กรุณาใส่เบอร์โทรศัพท์ให้ถูกต้อง (ตัวเลข 9 หรือ 10 หลัก)");
										    document.getElementById("phone-error").textContent = "กรุณาใส่เบอร์โทรศัพท์ให้ถูกต้อง (ตัวเลข 9 หรือ 10 หลัก)";
										} else {
										    input.setCustomValidity("");
										    document.getElementById("phone-error").textContent = "";
										}
							        }, 1500);

								}
							</script>

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
									<div class="col-6 col-md-4 col-lg-4">
										<span id="title_1_select_latlng" class="btn btn-danger main-shadow main-radius" data-toggle="modal" data-target="#modal_mapMarkLocation" style="width:90%;" onclick="mapMarkLocation('12.870032','100.992541','6');">
											เลือกจุดเกิดเหตุ <i class="fa-sharp fa-solid fa-location-crosshairs"></i>
										</span>
									</div>
									<div class="col-6 col-md-2 col-lg-2 d-none">
										<button id="btn_get_location_user" class="btn btn-sm btn-info text-white main-shadow main-radius" onclick="document.querySelector('#detail_location_sos').value = document.querySelector('#text_location_sos').value ;">
											รับรายละเอียดที่อยู่
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
									<input type="checkbox" {{ $check_symptom_1 }} name="symptom" data-symptom="ปวดท้อง หลัง เชิงกราน และขาหนีบ" value="ปวดท้อง หลัง เชิงกราน และขาหนีบ" class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๑.ปวดท้อง หลัง เชิงกราน และขาหนีบ
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_2 }} name="symptom" data-symptom="แอนนาฟิแลกซิส ปฏิกิริยาภูมิแพ้/แมลงกัด" value="แอนนาฟิแลกซิส ปฏิกิริยาภูมิแพ้/แมลงกัด"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๒.แอนนาฟิแลกซิส ปฏิกิริยาภูมิแพ้/แมลงกัด
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_3 }} name="symptom" data-symptom="สัตว์กัด" value="สัตว์กัด"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๓.สัตว์กัด
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_4 }} name="symptom" data-symptom="เลือดออกไม่ใช่จากการบาดเจ็บ" value="เลือดออกไม่ใช่จากการบาดเจ็บ"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๔.เลือดออกไม่ใช่จากการบาดเจ็บ
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_5 }} name="symptom" data-symptom="หายใจลำบาก" value="หายใจลำบาก"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๕.หายใจลำบาก 
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_6 }} name="symptom" data-symptom="หัวใจหยุดเต้น" value="หัวใจหยุดเต้น"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๖.หัวใจหยุดเต้น
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_7 }} name="symptom" data-symptom="เจ็บแน่นทรางออก หัวใจ" value="เจ็บแน่นทรางออก หัวใจ"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๗.เจ็บแน่นทรางออก หัวใจ
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_8 }} name="symptom" data-symptom="สำลักอุดทางเดินหายใจ" value="สำลักอุดทางเดินหายใจ"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๘.สำลักอุดทางเดินหายใจ
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_9 }} name="symptom" data-symptom="เบาหวาน" value="เบาหวาน"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๙.เบาหวาน
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_10 }} name="symptom" data-symptom="อันตรายจากสภาพแวดล้อม" value="อันตรายจากสภาพแวดล้อม"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๑๐.อันตรายจากสภาพแวดล้อม
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_11 }} name="symptom" data-symptom="อื่นๆ(เว้นว่าง)" value="อื่นๆ(เว้นว่าง)"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										<div>
											๑๑.<s>อื่นๆ(เว้นว่าง)</s><sup>(๔)</sup>
										</div>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_12 }} name="symptom" data-symptom="ปวดศรีษะ ลำคอ" value="ปวดศรีษะ ลำคอ"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๑๒.ปวดศรีษะ ลำคอ 
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_13 }} name="symptom" data-symptom="คลุ้มคลั่ง จิตประสาท อารมณ์" value="คลุ้มคลั่ง จิตประสาท อารมณ์"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๑๓.คลุ้มคลั่ง จิตประสาท อารมณ์ 
									</div>
								</label>
							</div>

							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_14 }} name="symptom" data-symptom="ยาเกิดขนาด ได้รับพิษ" value="ยาเกิดขนาด ได้รับพิษ"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๑๔.ยาเกิดขนาด ได้รับพิษ 
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_15 }} name="symptom" data-symptom="มีครรภ คลอด นรี" value="มีครรภ คลอด นรี"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๑๕.มีครรภ คลอด นรี 
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_16 }} name="symptom" data-symptom="ชัก" value="ชัก"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๑๖.ชัก 
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_17 }} name="symptom" data-symptom="ป่วย อ่อนเพลีย" value="ป่วย อ่อนเพลีย"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๑๗.ป่วย อ่อนเพลีย 
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_18 }} name="symptom" data-symptom="อัมพาต (หลอดเลือดสมองตีบ แตก)" value="อัมพาต (หลอดเลือดสมองตีบ แตก)"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๑๘.อัมพาต (หลอดเลือดสมองตีบ แตก) 
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_19 }} name="symptom" data-symptom="หมดสติ ไม่ตอบสนอง หมดสติชั่ววูบ" value="หมดสติ ไม่ตอบสนอง หมดสติชั่ววูบ"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๑๙.หมดสติ ไม่ตอบสนอง หมดสติชั่ววูบ 
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_20 }} name="symptom" data-symptom="เด็ก ทารก (กุมารเวชกรรม)" value="เด็ก ทารก (กุมารเวชกรรม)"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๒๐.เด็ก ทารก (กุมารเวชกรรม) 
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_21 }} name="symptom" data-symptom="ถูกทำร้าย บาดเจ็บ" value="ถูกทำร้าย บาดเจ็บ"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๒๑.ถูกทำร้าย บาดเจ็บ 
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_22 }} name="symptom" data-symptom="ไฟไหม้ ลวก ความร้อน กระแสไฟฟ้า สารเคมี" value="ไฟไหม้ ลวก ความร้อน กระแสไฟฟ้า สารเคมี"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๒๒.ไฟไหม้ ลวก ความร้อน กระแสไฟฟ้า สารเคมี 
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_23 }} name="symptom" data-symptom="จมน้ำ หน้าคว่ำจมน้ำ บาดเจ็บเหตุดำน้ำ บาดเจ็บทางน้ำ" value="จมน้ำ หน้าคว่ำจมน้ำ บาดเจ็บเหตุดำน้ำ บาดเจ็บทางน้ำ"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๒๓.จมน้ำ หน้าคว่ำจมน้ำ บาดเจ็บเหตุดำน้ำ บาดเจ็บทางน้ำ 
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_24 }} name="symptom" data-symptom="พลัดตกหลุม อุบัติเหตุ" value="พลัดตกหลุม อุบัติเหตุ"  class="card-input-element d-none symptom" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										๒๔.พลัดตกหลุม อุบัติเหตุ 
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_symptom_25 }} name="symptom" data-symptom="อุบัติเหตุยานยนต์" value="อุบัติเหตุยานยนต์"  class="card-input-element d-none symptom" >
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
									<input type="radio" {{ $check_idc_1 }} data-idc="แดง(วิกฤติ)" name="idc" value="แดง(วิกฤติ)"  class="card-input-red card-input-element d-none" >
									<div class="card card-body text-danger d-flex flex-row justify-content-between align-items-center">
										<b>
											แดง(วิกฤติ)  
										</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="radio" {{ $check_idc_4 }} data-idc="ขาว(ทั่วไป)" name="idc" value="ขาว(ทั่วไป)"  class="card-input-element d-none" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										<b>
											ขาว(ทั่วไป)    
										</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="radio" {{ $check_idc_2 }} data-idc="เหลือง(เร่งด่วน)" name="idc" value="เหลือง(เร่งด่วน)"  class="card-input-warning card-input-element d-none" >
									<div class="card card-body text-warning d-flex flex-row justify-content-between align-items-center">
										<b>
											เหลือง(เร่งด่วน)  
										</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="radio" {{ $check_idc_5 }} data-idc="ดำ(รับบริการสาธารณสุขอื่น)" name="idc" value="ดำ(รับบริการสาธารณสุขอื่น)"  class="card-input-dark card-input-element d-none" >
									<div class="card card-body  text-dark d-flex flex-row justify-content-between align-items-center">
										<b>
											ดำ(รับบริการสาธารณสุขอื่น)  
										</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="radio" {{ $check_idc_3 }} data-idc="เขียว(ไม่รุนแรง)" name="idc" value="เขียว(ไม่รุนแรง)"  class="card-input-success card-input-element d-none" >
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
					@php
						if( empty($data_form_yellow->operation_unit_name) ){
							$class_no_operating_unit = "" ;
							$class_has_an_operating_unit = "d-none" ;
						}
						else{
							$class_no_operating_unit = "d-none" ;
							$class_has_an_operating_unit = "" ;
						}
					@endphp
					@php
						$check_checked = "" ;
						$text_vehicle_type = "ยังไม่ได้เลือก" ;
						$value_vehicle_type = "" ;
						$class_vehicle_type = "" ;

						if( !empty($data_form_yellow->vehicle_type) ){
							if( $data_form_yellow->vehicle_type == 'รถ' ){
								$check_checked = "checked";
								$text_vehicle_type = 'รถ' ;
								$value_vehicle_type = "รถ" ;
								$class_vehicle_type = "fa-solid fa-truck-medical" ;
							}else if ( $data_form_yellow->vehicle_type == 'อากาศยาน' ){
								$check_checked = "checked";
								$text_vehicle_type = "อากาศยาน" ;
								$value_vehicle_type = "อากาศยาน" ;
								$class_vehicle_type = "fa-sharp fa-solid fa-plane" ;
							}else if ( $data_form_yellow->vehicle_type == 'เรือ ป.๑' || $data_form_yellow->vehicle_type == 'เรือ ป.1'){
								$check_checked = "checked";
								$text_vehicle_type = "เรือ ป.๑" ;
								$value_vehicle_type = "เรือ ป.๑" ;
								$class_vehicle_type = "fa-duotone fa-ship" ;
							}else if ( $data_form_yellow->vehicle_type == 'เรือ ป.๒' || $data_form_yellow->vehicle_type == 'เรือ ป.2'){
								$check_checked = "checked";
								$text_vehicle_type = "เรือ ป.๒" ;
								$value_vehicle_type = "เรือ ป.๒" ;
								$class_vehicle_type = "fa-duotone fa-ship" ;
							}else if ( $data_form_yellow->vehicle_type == 'เรือ ป.๓' || $data_form_yellow->vehicle_type == 'เรือ ป.3'){
								$check_checked = "checked";
								$text_vehicle_type = "เรือ ป.๓" ;
								$value_vehicle_type = "เรือ ป.๓" ;
								$class_vehicle_type = "fa-duotone fa-ship" ;
							}else if ( $data_form_yellow->vehicle_type == 'เรือประเภทอื่นๆ' ){
								$check_checked = "checked";
								$text_vehicle_type = "เรือประเภทอื่นๆ" ;
								$value_vehicle_type = "เรือประเภทอื่นๆ" ;
								$class_vehicle_type = "fa-duotone fa-ship" ;
							}
						}
					@endphp
					<!-- operating_suit -->
					@php
						$check_checked_operating = "" ;
						$text_operating = "ยังไม่ได้เลือก" ;
						$value_operating = "" ;
						$color_operating = "bg-light" ;
						$text_detail_operating = "ยังไม่ได้เลือก" ;

						if( !empty($data_form_yellow->operating_suit_type) ){
							if( $data_form_yellow->operating_suit_type == 'FR' ){
								$check_checked_operating = "checked";
								$text_operating = "FR" ;
								$value_operating = "FR" ;
								$color_operating = "success" ;
								$text_detail_operating = "ระดับเบื้องต้น" ;
							}else if ( $data_form_yellow->operating_suit_type == 'BLS' ){
								$check_checked_operating = "checked";
								$text_operating = "BLS" ;
								$value_operating = "BLS" ;
								$color_operating = "warning" ;
								$text_detail_operating = "ระดับต้น" ;

							}else if ( $data_form_yellow->operating_suit_type == 'ILS' ){
								$check_checked_operating = "checked";
								$text_operating = "ILS" ;
								$value_operating = "ILS" ;
								$color_operating = "danger" ;
								$text_detail_operating = "ระดับกลาง" ;

							}else if ( $data_form_yellow->operating_suit_type == 'ALS' ){
								$check_checked_operating = "checked";
								$text_operating = "ALS" ;
								$value_operating = "ALS" ;
								$color_operating = "danger" ;
								$text_detail_operating = "ระดับสูง" ;

							}
						}

					@endphp
					<div id="step-5" class="tab-pane" role="tabpanel" aria-labelledby="step-5">

						<div class="card-title d-flex align-items-center">
							<div>
								<i class="fa-duotone fa-chalkboard-user me-1 font-22 text-primary"></i>
							</div>
							<h5 class="mb-0 text-primary">การสั่งการ (โดยการเห็นชอบของหัวหน้าศูนย์ฯ)</h5>
						</div>
						<hr>
							
						<div class="row {{ $class_no_operating_unit }}" id="no_operating_unit">
							<div class="col-md-4">
								<label for="" class="form-label"><b>&nbsp;</b></label>
								<span class="nav-link btn-danger btn" style="width:100%;" > <!-- select_level(); -->
                                    <i class="fa-solid fa-hospital-user"></i> เลือกหน่วยปฏิบัติการ
								</span>
								<div class="mt-3">
									<center>
										<button id="btn_select_unit_in_no5" class="btn btn-primary px-5" data-bs-toggle="pill" href="#operating_unit" role="tab" aria-selected="false" onclick="check_go_to(null,null);document.querySelector('#tag_a_open_map_operating_unit').click();">
											เดี่ยว
										</button>
										<button class="btn btn-danger px-5" data-toggle="modal" data-target="#Modal-Mass-casualty-incident" onclick="document.querySelector('#btn_save').click();open_map_joint_sos_1669();">
											ร่วม
										</button>
									</center>
								</div>
							</div>
						</div>
						
						<div class="row {{$class_has_an_operating_unit}}" id="has_an_operating_unit">
							<!-- /// Data Officer /// -->
							<div class="col-5 ">
								<div class="card-detail-officer main-shadow sticky">

									<div class="profile-data-officer text-center">
										@if(!empty($data_officer->user->photo))
											<img  style="opacity: 1 !important;" src="{{ url('storage')}}/{{ $data_officer->user->photo }}" class="rounded-circle shadow profile-officer">
										@else
											<img style="opacity: 1 !important;" src="{{ url('/img/stickerline/Flex/12.png') }}"  class="rounded-circle shadow profile-officer">
										@endif
										<p  class="d-block m-0 text-center text-name-officer">
											{{ isset($data_form_yellow->action_set_name) ? $data_form_yellow->action_set_name : ''}}
										</p>
										<p  style="font-size:1rem;font-weight: 100;" class=" text-name-officer d-block m-0 text-center">
											{{$data_form_yellow->operation_unit_name}}
										</p>
									</div>
									
									<div class="row">
										<div class="col-12 col-md-6 col-lg-6 pl-0" style="padding-right:0;border-right: #dee2e6 1px solid;">
											<div class="footer-detail-officer text-center font-weight-bold d-block" style=" border-radius:0 0 0 15px; outline: 1px 1px 1px 1px solid #000;outline-style: l;">
												<i class="mt-1 icon-data-officer d-block {{$class_vehicle_type}}"></i>

												<span class="d-block p-0">
													{{ isset($value_vehicle_type) ? $value_vehicle_type : 'ไม่ได้เลือก'}}
												</span>
											</div>
										</div>
										<div class="col-12 col-md-6 col-lg-6 pr-0"  style="padding-left:0">
											<div class="footer-detail-officer operating-unit operating-unit-{{$color_operating}} text-center"style=" ;border-radius:0 0 15px;">
												<span class="m-0 p-0 h3 d-block">{{$text_operating}}</span>
												<span class="d-block">{{$text_detail_operating }}</span>
											</div>
										</div>
									</div>
									
								</div>
							</div>
							<!-- /// Timelime /// -->
							<div class="col-7 timeline-offilcer">

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
												<span class="timeline-purple m-0 p-0" style="left: 0 !important;">  <b> รับแจ้งเหตุ </b></span> 
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
												<span class="timeline-green m-0 p-0" style="left: 0 !important;">  <b> ออกจากฐาน </b></span> 
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
												<input class="form-control d-none" type="number"min="0" name="km_to_the_scene_to_leave_the_scene" id="km_to_the_scene_to_leave_the_scene" value="{{ isset($data_form_yellow->km_to_the_scene_to_leave_the_scene) ? $data_form_yellow->km_to_the_scene_to_leave_the_scene : ''}}" onchange="distance_in_no5();" readonly>
											</span>
										</li>
										<li>
											<span>
												ระยะทาง
												<span class="timeline-green m-0 p-0" style="left: 0 !important;">  <b> ออกจากฐาน </b></span> 
												ถึง
												<span class="timeline-blue m-0 p-0" style="left: 0 !important;"> <b> ที่เกิดเหตุ </b></span>
												&nbsp;:&nbsp;
												<b class="timeline-red" id="distance_go_to_help_to_scene"></b> <b class="timeline-red">กม.</b>
											</span>
										</li>
										<li>
											<span>
												ใช้เวลา
												<span class="timeline-green m-0 p-0" style="left: 0 !important;">  <b> ออกจากฐาน </b></span> 
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
												<span class="timeline-blue m-0 p-0" style="left: 0 !important;">  <b> จากที่เกิดเหตุ </b></span> 
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
												<input class="form-control d-none"type="number" min="0" name="km_hospital" id="km_hospital" value="{{ isset($data_form_yellow->km_hospital) ? $data_form_yellow->km_hospital : ''}}" onchange="distance_in_no5();"readonly>
											</span>
										</li>
										<li>
											<span>
												ระยะทาง
												<span class="timeline-lightblue m-0 p-0" style="left: 0 !important;">  <b> ออกจากที่เกิดเหตุ </b></span> 
												ถึง
												<span class="timeline-brown m-0 p-0" style="left: 0 !important;"> <b> โรงพยาบาล </b></span>
												&nbsp;:&nbsp;
												<b class="timeline-red" id="distance_leave_scene_to_hospital"></b> <b class="timeline-red">กม.</b>
											</span>
										</li>
										<li>
											<span>
												ใช้เวลา
												<span class="timeline-lightblue m-0 p-0" style="left: 0 !important;">  <b> ออกจากที่เกิดเหตุ </b></span> 
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
												<b class="timeline-red" id="text_distance_title_1"></b> <b class="timeline-red" >กม.</b>
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

							</div>
						</div>
						

						<!------------------------------- for calculating ---------------------------->
						<div class="d-none">
							<label for="" class="form-label"><b>ชื่อหน่วยปฏิบัติการ</b></label>
							<div class="input-group">
								<span class="input-group-text bg-white radius-1" ><i class="fa-solid fa-user-nurse"></i></span>
								<input type="text" class="form-control border-start-0 radius-2" id="operation_unit_name" name="operation_unit_name" value="{{ isset($data_form_yellow->operation_unit_name) ? $data_form_yellow->operation_unit_name : ''}}" placeholder="ชื่อหน่วยปฏิบัติการ" readonly>
							</div>

							<label for="phone_user" class="form-label"><b>ชื่อชุดปฏิบัติการ</b></label>
							<div class="input-group">
								<span class="input-group-text bg-white radius-1"><i class="fa-solid fa-users-medical"></i></span>
								<input type="text" class="form-control border-start-0 radius-2" id="action_set_name" name="action_set_name" value="{{ isset($data_form_yellow->action_set_name) ? $data_form_yellow->action_set_name : ''}}" placeholder="ชื่อชุดปฏิบัติการ" readonly>
							</div>

							<label  class="form-label mb-2">
								<b>ชนิดยานพาหนะ<sup>(๗)</sup></b>
							</label>
							<label>
								<input type="radio" {{ $check_checked }} name="vehicle_type" data-vehicle_type="{{ $value_vehicle_type }}" value="{{ $value_vehicle_type }}"  class="card-input-element d-none" disabled>
								<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
									<b id="text_show_vehicle_type"><i id="tag_i_vehicle_type" class="{{ $class_vehicle_type }}"></i> &nbsp;&nbsp; {{ $text_vehicle_type }}</b> 
								</div>
							</label>

							<label class="form-label mb-2">
								<b>ประเภทชุดปฏิบัติการ</b>
							</label>
							<label>
								<input type="radio" {{ $check_checked_operating }} data-operating_suit_type="{{ $value_operating }}" name="operating_suit_type" value="{{ $value_operating }}" class="card-input-{{ $color_operating }} card-input-element d-none" disabled>
								<div class="card card-body  d-flex flex-row justify-content-between align-items-center">
									<b id="text_show_operating_suit_type">{{ $text_operating }}</b>
								</div>
							</label>

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
						<!------------------------------- end for calculating ---------------------------->

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
									<input type="radio" {{ $check_rc_1 }} name="rc" data-rc="แดง(วิกฤติ)" value="แดง(วิกฤติ)"  class="card-input-red card-input-element d-none" onchange="check_click_rc();">
									<div class="card card-body text-danger d-flex flex-row justify-content-between align-items-center">
										<b>
											แดง(วิกฤติ)  
										</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="radio" {{ $check_rc_4 }} name="rc" data-rc="ขาว(ทั่วไป)" value="ขาว(ทั่วไป)"  class="card-input-element d-none" onchange="check_click_rc();">
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										<b>
											ขาว(ทั่วไป)    
										</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="radio" {{ $check_rc_2 }} name="rc" data-rc="เหลือง(เร่งด่วน)" value="เหลือง(เร่งด่วน)"  class="card-input-warning card-input-element d-none" onchange="check_click_rc();">
									<div class="card card-body  text-warning d-flex flex-row justify-content-between align-items-center">
										<b>
											เหลือง(เร่งด่วน)  
										</b>
									</div>
								</label>
							</div>
							
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="radio" {{ $check_rc_3 }} name="rc" data-rc="เขียว(ไม่รุนแรง)" value="เขียว(ไม่รุนแรง)"  class="card-input-success card-input-element d-none" onchange="check_click_rc();">
									<div class="card card-body  text-success d-flex flex-row justify-content-between align-items-center">
										<b>
											เขียว(ไม่รุนแรง)
										</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="radio" {{ $check_rc_5 }} name="rc" data-rc="ดำ" id="rc_black"  value="ดำ"  class="card-input-dark card-input-element d-none" onchange="check_click_rc();">
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
										<input type="radio" {{ $check_treatment_1 }} name="treatment" data-treatment="มีการรักษา" value="มีการรักษา"  class="card-input-red card-input-element d-none" onchange="check_treatment(); reset_sub_treatment();">
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
										<input type="radio"{{ $check_treatment_2 }} name="treatment" data-treatment="ไม่มีการรักษา" value="ไม่มีการรักษา"  class="card-input-element d-none" onchange="check_treatment(); reset_sub_treatment();">
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
											<input type="checkbox" {{ $check_sub_treatment_1 }} name="sub_treatment" data-sub_treatment="นำส่ง" value="นำส่ง"  class="sub_treatment card-input-red card-input-element d-none">
											<div class="text-danger card card-body d-flex flex-row justify-content-between align-items-center">
												<b>
													นำส่ง
												</b>
											</div>
										</label>
									</div>
									<div class="col-12 col-md-4 col-lg-4">
										<label>
											<input type="checkbox" {{ $check_sub_treatment_2 }} name="sub_treatment" data-sub_treatment="ส่งต่อชุดปฏิบัติการระดับสูงกว่า" value="ส่งต่อชุดปฏิบัติการระดับสูงกว่า"  class="sub_treatment card-input-red card-input-element d-none">
											<div class="text-danger card card-body d-flex flex-row justify-content-between align-items-center">
												<b>
													ส่งต่อชุดปฏิบัติการระดับสูงกว่า  
												</b>
											</div>
										</label>
									</div>
									<div class="col-12 col-md-4 col-lg-4">
										<label>
											<input type="checkbox" {{ $check_sub_treatment_3}} name="sub_treatment" data-sub_treatment="ไม่นำส่ง" value="ไม่นำส่ง"  class="sub_treatment card-input-red card-input-element d-none">
											<div class="text-danger card card-body d-flex flex-row justify-content-between align-items-center">
												<b>
													ไม่นำส่ง 
												</b>
											</div>
										</label>
									</div>
									<div class="col-12 col-md-4 col-lg-4">
										<label>
											<input type="checkbox" {{ $check_sub_treatment_4 }} name="sub_treatment" data-sub_treatment="เสียชีวิตระหว่างนำส่ง" value="เสียชีวิตระหว่างนำส่ง"  class="sub_treatment card-input-red card-input-element d-none">
											<div class="text-danger card card-body d-flex flex-row justify-content-between align-items-center">
												<b>
													เสียชีวิตระหว่างนำส่ง  
												</b>
											</div>
										</label>
									</div>
									<div class="col-12 col-md-4 col-lg-4">
										<label>
											<input type="checkbox" {{ $check_sub_treatment_5 }} name="sub_treatment" data-sub_treatment="เสียชีวิต ณ จุดเกิดเหตุ" value="เสียชีวิต ณ จุดเกิดเหตุ"  class="sub_treatment card-input-red card-input-element d-none">
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
											<input type="checkbox" {{ $check_sub_treatment_6 }} name="sub_treatment" data-sub_treatment="ผู้ป่วยปฏิเสธการรักษา" value="ผู้ป่วยปฏิเสธการรักษา"  class="sub_treatment card-input-element d-none">
											<div class="card card-body d-flex flex-row justify-content-between align-items-center">
												<b>
													ผู้ป่วยปฏิเสธการรักษา
												</b>
											</div>
										</label>
									</div>
									<div class="col-12 col-md-4 col-lg-4">
										<label>
											<input type="checkbox" {{ $check_sub_treatment_7 }} name="sub_treatment" data-sub_treatment="ยกเลิก" value="ยกเลิก"  class="sub_treatment card-input-element d-none">
											<div class="card card-body d-flex flex-row justify-content-between align-items-center">
												<b>
													ยกเลิก  
												</b>
											</div>
										</label>
									</div>
									<div class="col-12 col-md-4 col-lg-4">
										<label>
											<input type="checkbox" {{ $check_sub_treatment_8 }} name="sub_treatment" data-sub_treatment="ไม่พบเหตุ" value="ไม่พบเหตุ"  class="sub_treatment card-input-element d-none">
											<div class="card card-body d-flex flex-row justify-content-between align-items-center">
												<b>
													ไม่พบเหตุ 
												</b>
											</div>
										</label>
									</div>
									<div class="col-12 col-md-4 col-lg-4">
										<label>
											<input type="checkbox" {{ $check_sub_treatment_9 }} name="sub_treatment" data-sub_treatment="เสียชีวิตก่อนชุดปฏิบัติการไปถึง" value="เสียชีวิตก่อนชุดปฏิบัติการไปถึง"  class="sub_treatment card-input-element d-none">
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
					
					<style>
						.btnAddPatient{
							float: right !important;
							padding: 8pt 15pt 7pt 7pt;
							font-size: 12pt;
							background-color: #2a915c;
							color: #fff;
							border-radius: .4rem;
						}.btnAddPatient i{
							font-size: 10pt;
						}.cardTitle{
							width: 100% !important;
							display: flex !important;
							justify-content: space-between;

						}.patientTitle{
							display: flex;
							align-items: center;
						}
						.btnDelPatient{
							float: right !important;
							padding: 8pt 15pt 7pt 7pt;
							font-size: 12pt;
							background-color: #db2d2e;
							color: #fff;
							border-radius: .4rem;
						}
					</style>
					@php	
						if(empty($data_form_yellow->patient_name_2 )){
							$dataPatient2 = "hidden";
						}else {
							$dataPatient2 = "";
						}

						if(empty($data_form_yellow->patient_name_3 )){
							$dataPatient3 = "hidden";
						}else {
							$dataPatient3 = "";
						}
					@endphp
					<!---------------------------------- ข้อ 8  ---------------------------------->
					<div id="step-8" class="tab-pane" role="tabpanel" aria-labelledby="step-8">
						<div class="cardTitle ">
							<div class="patientTitle">
								<i class="fa-duotone fa-user-group me-1 font-22 text-primary"></i>
								<h5 class="mb-0 text-primary"><b> ชื่อผู้ป่วย</b></h5>
							</div>

							<div>
								<button id="delete-btn" onclick="deleteFieldsets(); tab_content_h100();" class="{{$dataPatient2}} btnDelPatient btn">
									ลบ
								</button>
								<button id="add-btn" class="float-right btn btnAddPatient" onclick="tab_content_h100();showFieldsets();">
									<i class="fa-solid fa-plus"></i>เพิ่มผู้ป่วย
								</button>
							</div>
						</div>
						<hr>
						
						<!-- ----------------------------------------------- ผู้ป่วย 1 ------------------------------------------------------------- -->
						<fieldset id="fieldset1" class="rounded-3 p-3 field-user">
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
						
						
						<fieldset id="fieldset2" class=" {{$dataPatient2}} dataPatient rounded-3 p-3 field-user mt-4">
							<legend class="float-none w-auto px-3">ผู้ป่วย ๒ </legend>
							<div class="row">
								<div class="col-12 col-md-4 col-lg-4">
									<label for="" class="form-label">ผู้ป่วย ๒. ชื่อ-สกุล</label>
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
							<!-- <button type="button" class="btn btn-danger float-end mt-3" onclick="deleteDiv(this)">ลบผู้ป่วย ๒</button> -->
						</fieldset>
						
  	
						<fieldset id="fieldset3" class="{{$dataPatient3}} dataPatient rounded-3 p-3 field-user mt-4">
							<legend class="float-none w-auto px-3">ผู้ป่วย ๓</legend>
							<div class="row">
								<div class="col-12 col-md-4 col-lg-4">
									<label for="" class="form-label">ผู้ป่วย ๓. ชื่อ-สกุล</label>
									<div class="input-group"> <span class="input-group-text bg-white radius-1" ><i class="fa-solid fa-user"></i></span>
										<input type="text" class="form-control border-start-0 radius-2" name="patient_name_3" id="patient_name_3" value="{{ isset($data_form_yellow->patient_name_3) ? $data_form_yellow->patient_name_3 : ''}}" placeholder="ชื่อ-สกุล">
									</div>
								</div>
								<div class="col-12 col-md-2 col-lg-2">
									<label for="phone_user" class="form-label">อายุ (ปี)</label>
									<div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-input-numeric"></i></span>
										<input  type="number" min="1" class="form-control border-start-0 radius-2" name="patient_age_3" id="patient_age_3" value="{{ isset($data_form_yellow->patient_age_3) ? $data_form_yellow->patient_age_3 : ''}}" placeholder="อายุ">
									</div>
								</div>
								<div class="col-12 col-md-3 col-lg-3">
									<label for="phone_user" class="form-label">HN</label>
									<div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-id-card-clip"></i></span>
										<input type="text" class="form-control border-start-0 radius-2"  name="patient_hn_3" id="patient_hn_3" value="{{ isset($data_form_yellow->patient_hn_3) ? $data_form_yellow->patient_hn_3 : ''}}" placeholder="รหัสผู้ป่วย">
									</div>
								</div>
								<div class="col-12 col-md-3 col-lg-3">
									<label for="phone_user" class="form-label">เลขประจำตัวประชาชน</label>
									<div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-id-card"></i></span>
										<input type="text" class="form-control border-start-0 radius-2"name="patient_vn_3" id="patient_vn_3" value="{{ isset($data_form_yellow->patient_vn_3) ? $data_form_yellow->patient_vn_3 : ''}}" placeholder="เลขประจำตัวประชาชน">
									</div>
								</div>
								<div class="col-12 mt-3"></div>
								
								<div class="col-12 col-md-6 col-lg-6">
									<label for="phone_user" class="form-label">นำส่งที่จังหวัด</label>
									<div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-map-location-dot"></i></span>
										<input type="text" class="form-control border-start-0 radius-2" name="delivered_province_3" id="delivered_province_3" value="{{ isset($data_form_yellow->delivered_province_3) ? $data_form_yellow->delivered_province_3 : ''}}" placeholder="จังหวัดที่นำส่ง">
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6">
									<label for="phone_user" class="form-label">นำส่ง รพ.</label>
									<div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-hospital"></i></span>
										<input type="text" class="form-control border-start-0 radius-2" name="delivered_hospital_3" id="delivered_hospital_3" value="{{ isset($data_form_yellow->delivered_hospital_3) ? $data_form_yellow->delivered_hospital_3 : ''}}" placeholder="โรงพยาบาลที่นำส่ง">
									</div>
								</div>
								
							</div>
							<!-- <button type="button" class="btn btn-danger float-end mt-3" onclick="deleteDiv(this)">ลบผู้ป่วย ๓</button> -->
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
									<input type="checkbox" {{ $check_submission_criteria_1 }} name="submission_criteria" data-submission_criteria="สามารถรักษาได้" value="สามารถรักษาได้"  class="card-input-element d-none submission_criteria" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										<b>สามารถรักษาได้</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_submission_criteria_2 }} name="submission_criteria" data-submission_criteria="อยู่ใกล้" value="อยู่ใกล้"  class="card-input-element d-none submission_criteria" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										<b>อยู่ใกล้</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_submission_criteria_3 }} name="submission_criteria" data-submission_criteria="มีหลักประกัน" value="มีหลักประกัน"  class="card-input-element d-none submission_criteria" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										<b>มีหลักประกัน</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_submission_criteria_4 }} name="submission_criteria" data-submission_criteria="ผู้ป่วยเก่า" value="ผู้ป่วยเก่า"  class="card-input-element d-none submission_criteria" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										<b>ผู้ป่วยเก่า</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_submission_criteria_5 }} name="submission_criteria" data-submission_criteria="เป็นความประสงค์" value="เป็นความประสงค์"  class="card-input-element d-none submission_criteria" >
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
									<input type="checkbox" {{ $check_communication_hospital_1 }} name="communication_hospital" data-communication_hospital="แจ้งวิทยุ" value="แจ้งวิทยุ"  class="card-input-element d-none communication_hospital" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										<b>แจ้งวิทยุ</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_communication_hospital_2 }} name="communication_hospital" data-communication_hospital="แจ้งทางโทรศัพท์" value="แจ้งทางโทรศัพท์"  class="card-input-element d-none communication_hospital" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										<b>แจ้งทางโทรศัพท์</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="checkbox" {{ $check_communication_hospital_3 }} name="communication_hospital" data-communication_hospital="ไม่ได้แจ้ง" value="ไม่ได้แจ้ง"  class="card-input-element d-none communication_hospital" >
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
									<input type="text" class="form-control border-start-0 radius-2" id="registration_category"  name="registration_category" value="{{ isset($data_form_yellow->registration_category) ? $data_form_yellow->registration_category : ''}}" placeholder="ทะเบียนรถหมวด">
								</div>
							</div>
							<div class="col-12 col-md-4 col-lg-4">
								<label for="registration_number" class="form-label">เลขทะเบียน</label>
								<div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-duotone fa-input-numeric"></i></span>
									<input  type="text" min="1" class="form-control border-start-0 radius-2" id="registration_number" name="registration_number" value="{{ isset($data_form_yellow->registration_number) ? $data_form_yellow->registration_number : ''}}" placeholder="เลขทะเบียน">
								</div>
							</div>
							<div class="col-12 col-md-4 col-lg-4">
								<label for="registration_province" class="form-label">จังหวัด</label>
								<div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-duotone fa-map-location"></i></span>
									<input type="text" class="form-control border-start-0 radius-2" id="registration_province" name="registration_province" value="{{ isset($data_form_yellow->registration_province) ? $data_form_yellow->registration_province : ''}}" placeholder="จังหวัด">
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
									<input type="radio" {{ $check_owner_registration_1 }} name="owner_registration" data-owner_registration="ของผู้ประสบเหตุ" value="ของผู้ประสบเหตุ"  class="card-input-element d-none" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										<b>ของผู้ประสบเหตุ</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="radio" {{ $check_owner_registration_2 }} name="owner_registration" data-owner_registration="ของคู่กรณี" value="ของคู่กรณี"  class="card-input-element d-none" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										<b>ของคู่กรณี</b>
									</div>
								</label>
							</div>
							<div class="col-12 col-md-3 col-lg-3">
								<label>
									<input type="radio" {{ $check_owner_registration_3 }} name="owner_registration" data-owner_registration="ไม่สามารถระบุได้" value="ไม่สามารถระบุได้"  class="card-input-element d-none" >
									<div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
										<b>ไม่สามารถระบุได้</b>
									</div>
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="row  m-0 p-0 d-none">
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
						<button class="btn btn-primary " id="prev-btn-form-yellow" type="button" onclick="check_go_to('remove',null);">ย้อนกลับ</button>
						&nbsp;&nbsp;
						<button class="btn btn-primary" id="next-btn-form-yellow" type="button" onclick="check_go_to('add',null);">ต่อไป</button>
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
	<!-- <i id="btn_next" class="fa-solid fa-caret-right text-secondary" href="#carousel_form_yellow" role="button" data-slide="next" onclick="check_go_to('add',null);"></i> -->

	<!-- <div class="row" style="position: absolute;bottom: 1%;right:3%;"> -->
        <!-- -----------------BTN prev next------------------- -->
        <!-- <div class="col-12 d-flex align-items-end">
            <h4 class="text-primary text-end">
                <i id="btn_prev" class="fa-solid fa-caret-left text-secondary" href="#carousel_form_yellow" role="button" data-slide="prev" onclick="check_go_to('remove',null);"></i>
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

                <i id="btn_next" class="fa-solid fa-caret-right text-secondary" href="#carousel_form_yellow" role="button" data-slide="next" onclick="check_go_to('add',null);"></i>
            </h4>
        </div>
    </div> -->

</div>

<div>
	<!-- Button trigger modal -->
	<button id="btn_modal_alet_data_change" class="btn btn-primary d-none" data-toggle="modal" data-target="#modal_alet_data_change">
	  	modal_alet_data_change
	</button>

	<!-- Modal  data-backdrop="static" -->
	<div class="modal fade notranslate" id="modal_alet_data_change" data-keyboard="false" tabindex="-1" aria-labelledby="Label_modal_alet_data_change" aria-hidden="true">
		<div class="modal-dialog modal-xl">
		    <div class="modal-content">
		      	<div class="modal-header">
		        	<h3 class="modal-title" id="Label_modal_alet_data_change">
		        		<b>มีการอัพเดทข้อมูลจากหน่วยปฏิบัติการ</b>
		        	</h3>
		        	<button type="button" class="close d-none" data-dismiss="modal" aria-label="Close">
		          		<span aria-hidden="true">&times;</span>
	        		</button>
		      	</div>
		      	<div class="modal-body">
		        	<table class="table table-bordered mb-0">
						<thead>
							<tr>
								<th scope="col" style="width:10%;">
									<input class="d-none" type="checkbox" id="select_titel_all" name="select_titel_all" onclick="select_titel_update_all();">
								</th>
								<th scope="col" style="width:30%;">หัวข้อ</th>
								<th scope="col" style="width:30%;">ข้อมูลจากหน่วยปฏิบัติการ</th>
								<th scope="col" style="width:30%;">ข้อมูลของคุณ</th>
							</tr>
						</thead>
						<tbody id="for_create_modal_alet_data_change">
							<!-- content -->
						</tbody>
					</table>

					<hr>
					<div class="row">
						<div class="col-9">
							<p style="font-size: 22px;">
								<span class="text-success mt-2">
									<i class="fa-solid fa-circle" style="color: #25db00;"></i> สีเขียว = ข้อมูลที่บันทึกแทนที่
								</span>
								<br>
								<span class="text-danger mt-2">
									<i class="fa-solid fa-circle" style="color: #ff0000;"></i> สีแดง = ข้อมูลจะถูกลบ
								</span>
							</p>
						</div>
						<div class="col-3">
							<button style="width: 80%;" type="button" class="btn btn-success" data-dismiss="modal" onclick="save_data_change_form_yellow();">
				        		บันทึก
				        	</button>
						</div>
					</div>
					<br>
		      	</div>
		    </div>
		</div>
	</div>
</div>

<script>

	var form_yellow_current_topic = 1 ;
	var page_before_click_button ;

	var load_first_time = 'Yes' ;

	document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");

        check_start_data_form_yellow();

        setTimeout(function() {
            check_color_btn(null);
			check_treatment();
	        check_lat_lng();
	        check_click_rc();
        }, 1500);

        // Loop_check_form_yellow();

    });

	var start_data_arr = [] ;
	var check_start_data_arr = "No" ;

	var data_arr = [] ;
	var all_data_arr = [] ;

	function Loop_check_form_yellow() {

        // console.log("LOOP check form yellow");
        reface_check_form_yellow = setInterval(function() {
        	check_start_data_form_yellow();
        	distance_in_no5();
        }, 7000);

    }

	function Stop_reface_check_form_yellow() {
        clearInterval(reface_check_form_yellow);
        // console.log("STOP LOOP check form yellow");
    }

    function check_start_data_form_yellow(){

		// console.log('----------------------------');
		console.log("** Check data form yellow **");
		// console.log("ตอนนี้อยู่ที่หน้า >> " + form_yellow_current_topic);
		// console.log("กำลังจะอัพเดทหน้าอื่นๆ และแจ้งเตือนหน้า "+ form_yellow_current_topic + " ถ้าข้อมูลมีการเปลี่ยนแปลง");
		// console.log('----------------------------');

    	// ---------------------------- เช็คข้อมูลก่อนอัพเดท ----------------------------//
		fetch("{{ url('/') }}/api/check_update/form_yellow" + "/" + '{{ $sos_help_center->id }}')
            .then(response => response.json())
            .then(data_new_5vi => {

				// console.log(" >>>>>>>>>>>>>>>><<<<<<<<<<<<<<<<");
				// console.log(" >>>>>>>>> data_new_5vi <<<<<<<<<");
				// console.log(" >>>>>>>>>>>>>>>><<<<<<<<<<<<<<<<");
				// console.log(data_new_5vi);

				// console.log(" >>>>>>>>>---------------------<<<<<<<<<");
				// console.log("ปัจจุบันอยู่หน้าที่ >> " + form_yellow_current_topic);
				// console.log("start_data_arr ข้อมูล ก่อน อัพเดท");
				// console.log(start_data_arr);
				// console.log(" >>>>>>>>>---------------------<<<<<<<<<");

				if (start_data_arr && check_start_data_arr == "Yes") {

					for (const [main_key, main_value ] of Object.entries(data_new_5vi)) {
			  		
				  		// console.log("หัวข้อ : " + main_key);
				  		// console.log(data_new_5vi[main_key]);

				  		let key_title = main_key.split('_')[1];

				  		if (key_title != form_yellow_current_topic && key_title != '5') {

				  			// หัวข้อ main_key ไม่เท่ากับหน้าปัจจุบัน ให้เข้าไปทำกับอัพเดทข้อมูล
				  			// console.log("อัพเดทข้อมูล หน้า : " + main_key);

				  			for (const [sub_key, sub_value ] of Object.entries(data_new_5vi[main_key])) {

					  			if (data_new_5vi[main_key][sub_key] === null) {
						  			data_new_5vi[main_key][sub_key] = '';
						  		}

					  			// console.log(" ==>> " + sub_key + " <<== ");
					  			// console.log(data_new_5vi[main_key][sub_key]);

						  		// UPDATE ข้อมูล sub_key
					  			start_data_arr[main_key][sub_key] = data_new_5vi[main_key][sub_key] ;

					  			if( sub_key === 'operation_unit_name' || sub_key === 'action_set_name' || sub_key === 'time_create_sos' || sub_key === 'time_command' || sub_key === 'time_go_to_help' || sub_key === 'time_to_the_scene' || sub_key === 'time_leave_the_scene' || sub_key === 'time_hospital' || sub_key === 'time_to_the_operating_base' || sub_key === 'km_create_sos_to_go_to_help' || sub_key === 'km_to_the_scene_to_leave_the_scene' || sub_key === 'km_hospital' || sub_key === 'km_operating_base' ){

						        	document.querySelector('#'+sub_key).value = data_new_5vi[main_key][sub_key] ;
						        	
								}
								// else if(sub_key === 'rc' || sub_key === 'treatment' || sub_key === 'sub_treatment'){

								// 	edit_form_yellow(main_key , sub_key , data_new_5vi[main_key][sub_key] , null);

								// }
								else if (sub_key === 'vehicle_type' || sub_key === 'operating_suit_type') {

									// console.log(data_new_5vi[key]);

									if (data_new_5vi[main_key][sub_key]){
										document.querySelector('#no_operating_unit').classList.add('d-none')  ;
										document.querySelector('#has_an_operating_unit').classList.remove('d-none')  ;

										let input_Element_key = document.querySelector('input[name="'+sub_key+'"]');

											input_Element_key.value = data_new_5vi[main_key][sub_key] ;
											input_Element_key.checked = true ;
											input_Element_key.setAttribute('data-'+sub_key , data_new_5vi[main_key][sub_key]);

											document.querySelector('#text_show_' + sub_key).innerHTML = data_new_5vi[main_key][sub_key] ;

										// ถ้า KEY = operating_suit_type
										let color_operating ;
										if (data_new_5vi[main_key][sub_key] === "FR") {
											color_operating = "success" ;
										}else if(data_new_5vi[main_key][sub_key] === "BLS"){
											color_operating = "warning" ;
										}else if(data_new_5vi[main_key][sub_key] === "ILS" || data_new_5vi[main_key][sub_key] === "ALS"){
											color_operating = "danger" ;
										}

										input_Element_key.setAttribute('class', "card-input-"+color_operating+" card-input-element d-none");
									}

					  			}else if (sub_key === 'lat' || sub_key === 'lng') {
					  				// console.log("สั่งบันทึก lat lng >> " + key)
	        						check_go_to(null,null);
	        						
					  			}else{
					  				edit_form_yellow(main_key , sub_key , data_new_5vi[main_key][sub_key] , null);
					  			}

								// console.log("---------------------------------------");

					  		}

				  		}else if(key_title == form_yellow_current_topic && key_title != '5'){

				  			// หัวข้อ main_key ตรงกับหน้าที่เปิดอยู่ ตรวจสอบการเปลี่ยนแปลงของข้อมูล
				  			// console.log("ตรวจสอบการเปลี่ยนแปลงของข้อมูล หน้า : " + main_key);

				  			for (const [sub_key, sub_value ] of Object.entries(data_new_5vi[main_key])) {

					  			if (data_new_5vi[main_key][sub_key] === null) {
						  			data_new_5vi[main_key][sub_key] = '';
						  		}

					  			// console.log(" ==>> " + sub_key + " <<== ");
					  			// console.log(data_new_5vi[main_key][sub_key]);

					  			if( start_data_arr[main_key][sub_key] == data_new_5vi[main_key][sub_key] ){
					  				// console.log(main_key + " / หัวข้อ : " + sub_key);
					  				// console.log(">> ข้อมูล ไม่มี การเปลี่ยนแปลง <<");
					  				check_go_to(null,null);
					  			}else{
					  				// console.log(main_key + " / หัวข้อ : " + sub_key);
					  				// console.log(">> ข้อมูล มี การเปลี่ยนแปลง <<");
					  				// console.log("จาก " + start_data_arr[main_key][sub_key] + " | เปลี่ยนเป็น " + data_new_5vi[main_key][sub_key]);
					  				// console.log(key_title);

					  				if(key_title == '1' || key_title == '2' || key_title == '3' || key_title == '4'){
						  				// ไม่ต้องแจ้งเตือน
			        				}else{
			        					// แจ้งเตือนข้อมูลเปลี่ยนแปลง
			        					// alet_new_data('form_yellow' , main_key , sub_key , data_new_5vi[main_key][sub_key] , start_data_arr[main_key][sub_key]);
					  					edit_form_yellow(main_key , sub_key , data_new_5vi[main_key][sub_key] , start_data_arr[main_key][sub_key]);

			        				}
					  			}
					  			
								// console.log("---------------------------------------");

					  		}

				  		}

				  		
						// console.log("---------------------------------------------------------");
						// console.log("---------------------------------------------------------");


					}

					// console.log("start_data_arr ข้อมูล หลัง อัพเดท");
					// console.log(start_data_arr);

					// console.log("*************************************************");
					// console.log("*************************************************");

				}


            	setTimeout(function() {
			        check_color_btn(null);
		        }, 1000);
            });

        if(load_first_time == "Yes"){
        	load_first_time = "No" ;
        	Loop_check_form_yellow();
        }

    }

    function edit_form_yellow(main_key , sub_key , value , old){

		// console.log("-------------------------------------------");
		// console.log(">>> SAVE NEW DATA <<<");
		// console.log(main_key + " : " + sub_key + " >> " + value);
		// console.log("--------------------------------------------");

		// start_data_arr[main_key][sub_key] = value ;
		// data_arr[key] = value ;

		//  radio
		if (sub_key === 'be_notified' || sub_key === 'idc' || sub_key === 'rc' || sub_key === 'treatment' || sub_key === 'owner_registration') {
			// console.log("radio");
			if (value === null || value === '') {

				let key_radio = document.getElementsByName(sub_key);

		        for (let iov = 0, length = key_radio.length; iov < length; iov++) { 
		            if (key_radio[iov].checked) {
		                key_radio[iov].checked = false; 
		            }
		        }

			}else{
				document.querySelector('[data-'+sub_key+'="'+ value +'"]').checked = true;
			}

			if (sub_key === 'treatment') {
				check_treatment();
				reset_sub_treatment();
			}
		}
		// cheeck box
		else if (sub_key === 'sub_treatment' || sub_key === 'symptom' || sub_key === 'submission_criteria' || sub_key === 'communication_hospital' ) {
			// console.log("cheeck box");
    		console.log("sub_key >> " + sub_key);

			let key_cheeck_box = document.getElementsByName(sub_key);

	        for (let izi = 0, length = key_cheeck_box.length; izi < length; izi++) { 
	            if (key_cheeck_box[izi].checked) {
	                key_cheeck_box[izi].checked = false; 
	            }
	        }


	        if ( value ) {

				let data_all_cheeck_box = value.split(",");

				for (let xxi = 0; xxi < data_all_cheeck_box.length; xxi++) {
			        document.querySelector('[data-'+sub_key+'="'+ data_all_cheeck_box[xxi] +'"]').checked = true;
			    }
			}
			
		}
		// user_name && phone_user
		else if(sub_key === 'name_user' || sub_key === 'phone_user'){
			// console.log("usera");
			document.querySelector('#'+sub_key).value = value;
			document.querySelector('#u_'+sub_key).innerHTML = value ;
		}
		// text area
		else if(sub_key === 'location_sos' || sub_key === 'symptom_other'){
			// console.log("text area");
			document.querySelector('[name="'+sub_key+'"]').value = value ;
		}
		// input general
		else{
			// console.log("input general");
			document.querySelector('#'+sub_key).value = value;
		}

		if( old ){
	    	// console.log("บันทึกข้อมูลเข้า DB");
    	    check_go_to(null,null);
		}


		// send_save_data(null , null);
		// btn_save_data_animation();
		setTimeout(function() {
	        check_color_btn(null);
        }, 1000);
    }

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

	function check_go_to(type , check_dont_save){
		// console.log(type);
		
		let active = window.location.href.split('#step-')[1];
			// console.log(active);

		check_color_btn(active);
		send_save_data(active , check_dont_save);
		btn_save_data_animation();

	}

	function go_to_form_data(click_to){
		// console.log(click_to);

		let active = window.location.href.split('#step-')[1];

		form_yellow_current_topic = click_to ;
		// console.log("ปัจจุบันอยู่ที่หน้า >> " + form_yellow_current_topic);

			// console.log("active >> " + active_sp[2]);

		// document.querySelector('#form_data_' + active_sp[2]).classList.remove('active');
		// document.querySelector('#form_data_' + click_to).classList.add('active');

		send_save_data(active, null);
		check_color_btn(active);
		btn_save_data_animation();
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

	// function check_before_save_form_yellow(active){

	// 	console.log("ตรวจสอบก่อนบันทึก form yellow");
    // 	// ---------------------------- เช็คข้อมูลก่อนอัพเดท ----------------------------//
	// 	fetch("{{ url('/') }}/api/check_update/form_yellow" + "/" + '{{ $sos_help_center->id }}')
    //         .then(response => response.json())
    //         .then(data_check_before => {

    //         	if (start_data_arr) {
    //         		for (const [key, value] of Object.entries(data_check_before)) {
	// 			  		// console.log(key + " = " + value);
	// 			  		if (data_check_before[key] === null) {
	// 			  			data_check_before[key] = '';
	// 			  		}

	// 			  		if (data_check_before[key] != start_data_arr[key] && check_start_data_arr == "Yes") {
	// 			  			// console.log(key + " ==>> ข้อมูลเปลี่ยน");
	// 			  			// console.log(start_data_arr[key] + " เปลี่ยนเป็น " + data_check_before[key]);

	//         				// แจ้งเตือนข้อมูลเปลี่ยนแปลง
	//         				// document.querySelector('#modal_alet_new_data').click();
	//         				console.log("แจ้งเตือนข้อมูลเปลี่ยนแปลง form yellow");

	// 			  		}else{
	// 						// confirm_send_save_data(active , null);
	// 			  		}
	// 				}
    //         	}
    //         });
    // }


	function send_save_data(active , check_dont_save){

		if (!active) {
			active = form_yellow_current_topic ;
		}

		// check_before_save_form_yellow(active);
		confirm_send_save_data(active , check_dont_save);
	}

	function confirm_send_save_data(active , check_dont_save){

		// console.log('----------------------------');
		// console.log("confirm_send_save_data");
		// console.log("กำลังจะบันทึกหน้าที่ >> " + active);
		// console.log("กำลังไปที่หน้า >> " + form_yellow_current_topic);
		// console.log('----------------------------');

		if(check_dont_save){
			check_dont_save = "Yes" ;
		}else{
			check_dont_save = "No" ;
		}

		// ---------------------------- ข้อใน form ----------------------------//
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

		let patient_name_3 = document.querySelector('[name="patient_name_3"]'); 
		let patient_age_3 = document.querySelector('[name="patient_age_3"]'); 
		let patient_hn_3 = document.querySelector('[name="patient_hn_3"]'); 
		let patient_vn_3 = document.querySelector('[name="patient_vn_3"]'); 
		let delivered_province_3 = document.querySelector('[name="delivered_province_3"]'); 
		let delivered_hospital_3 = document.querySelector('[name="delivered_hospital_3"]'); 

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

		switch(active) {
		  	case '1':
		    	data_arr = {
			        "sos_help_center_id" : "{{ $sos_help_center->id }}",
			        "page" : "1",
			        "start_data_arr" : start_data_arr,
			        "check_dont_save" : check_dont_save,
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
			        "page" : "2",
			        "start_data_arr" : start_data_arr,
			        "check_dont_save" : check_dont_save,
			        "symptom" : symptom_value,
			    };
		    break;
			case '3':
		    	data_arr = {
			        "sos_help_center_id" : "{{ $sos_help_center->id }}",
			        "page" : "3",
			        "start_data_arr" : start_data_arr,
			        "check_dont_save" : check_dont_save,
			        "symptom_other" : symptom_other.value,
			    };
		    break;
		    case '4':
		    	data_arr = {
			        "sos_help_center_id" : "{{ $sos_help_center->id }}",
			        "page" : "4",
			        "start_data_arr" : start_data_arr,
			        "check_dont_save" : check_dont_save,
			        "idc" : idc_value,
			    };
		    break;
		    case '5':
		    	data_arr = {
			        "sos_help_center_id" : "{{ $sos_help_center->id }}",
			        "page" : "5",
			        "start_data_arr" : start_data_arr,
			        "check_dont_save" : check_dont_save,
			        // "vehicle_type" : vehicle_type_value,
			        // "operating_suit_type" : operating_suit_type_value,
			        // "operation_unit_name" : operation_unit_name.value,
			        // "action_set_name" : action_set_name.value,
			        // "time_create_sos" : time_create_sos.value,
			        // "time_command" : time_command.value,
			        // "time_go_to_help" : time_go_to_help.value,
			        // "time_to_the_scene" : time_to_the_scene.value,
			        // "time_leave_the_scene" : time_leave_the_scene.value,
			        // "time_hospital" : time_hospital.value,
			        // "time_to_the_operating_base" : time_to_the_operating_base.value,
			        // "km_create_sos_to_go_to_help" : km_create_sos_to_go_to_help.value,
			        // "km_to_the_scene_to_leave_the_scene" : km_to_the_scene_to_leave_the_scene.value,
			        // "km_hospital" : km_hospital.value,
			        // "km_operating_base" : km_operating_base.value,
			    };

			    if (operating_suit_type_value) {
			    	document.querySelector('#input_select_level').value = operating_suit_type_value;
			    }

			    if (vehicle_type_value) {
            		document.querySelector('#input_vehicle_type').value = vehicle_type_value;
			    }
			   
		    break;
		    case '6':

		    	if ( rc_value && rc_value === "ดำ" ) {
		    		data_arr = {
				        "sos_help_center_id" : "{{ $sos_help_center->id }}",
			        	"page" : "6",
			        	"start_data_arr" : start_data_arr,
			        	"check_dont_save" : check_dont_save,
				        "rc" : rc_value,
				        "rc_black_text" : rc_black_text.value,
				    };
		    	}else{
		    		data_arr = {
				        "sos_help_center_id" : "{{ $sos_help_center->id }}",
			        	"page" : "6",
			        	"start_data_arr" : start_data_arr,
			        	"check_dont_save" : check_dont_save,
				        "rc" : rc_value,
				    };
		    	}
		    	
		    break;
		    case '7':
		    	data_arr = {
			        "sos_help_center_id" : "{{ $sos_help_center->id }}",
			        "page" : "7",
			        "start_data_arr" : start_data_arr,
			        "check_dont_save" : check_dont_save,
			        "treatment" : treatment_value,
			        "sub_treatment" : sub_treatment_value,
			    };
		    break;
		    case '8':
		    	data_arr = {
			        "sos_help_center_id" : "{{ $sos_help_center->id }}",
			        "page" : "8",
			        "start_data_arr" : start_data_arr,
			        "check_dont_save" : check_dont_save,
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
			        "patient_name_3" : patient_name_3.value,
			        "patient_age_3" : patient_age_3.value,
			        "patient_hn_3" : patient_hn_3.value,
			        "patient_vn_3" : patient_vn_3.value,
			        "delivered_province_3" : delivered_province_3.value,
			        "delivered_hospital_3" : delivered_hospital_3.value,
			        "submission_criteria" : submission_criteria_value,
			        "communication_hospital" : communication_hospital_value,
			    };
			    // console.log(data_arr);
		    break;
		    case '9':
		    	data_arr = {
			        "sos_help_center_id" : "{{ $sos_help_center->id }}",
			        "page" : "9",
			        "start_data_arr" : start_data_arr,
			        "check_dont_save" : check_dont_save,
			        "registration_category" : registration_category.value,
			        "registration_number" : registration_number.value,
			        "registration_province" : registration_province.value,
			        "owner_registration" : owner_registration_value,
			    }; 
		    break;
			
		}

		// ----------------------------------------------------------------------------

		// console.log('-------- data_arr --------');
		// console.log(data_arr);
		// console.log('--------------------------------');

		all_data_arr = {
			"sos_help_center_id" : "{{ $sos_help_center->id }}",
			"page_1" : {
				"be_notified" : be_notified_value,
				"name_user" : name_user.value,
				"phone_user" : phone_user.value,
				"lat" : lat.value,
				"lng" : lng.value,
				"location_sos" : location_sos.value,
			},
			"page_2" : {
				"symptom" : symptom_value,
			},
			"page_3" : {
				"symptom_other" : symptom_other.value,
			},
			"page_4" : {
				"idc" : idc_value,
			},
			"page_5" : {
				// "vehicle_type" : vehicle_type_value,
				// "operating_suit_type" : operating_suit_type_value,
				// "operation_unit_name" : operation_unit_name.value,
				// "action_set_name" : action_set_name.value,
				// "time_create_sos" : time_create_sos.value,
				// "time_command" : time_command.value,
				// "time_go_to_help" : time_go_to_help.value,
				// "time_to_the_scene" : time_to_the_scene.value,
				// "time_leave_the_scene" : time_leave_the_scene.value,
				// "time_hospital" : time_hospital.value,
				// "time_to_the_operating_base" : time_to_the_operating_base.value,
				// "km_create_sos_to_go_to_help" : km_create_sos_to_go_to_help.value,
				// "km_to_the_scene_to_leave_the_scene" : km_to_the_scene_to_leave_the_scene.value,
				// "km_hospital" : km_hospital.value,
				// "km_operating_base" : km_operating_base.value,
			},
			"page_6" : {
				"rc" : rc_value,
				"rc_black_text" : rc_black_text.value,
			},
			"page_7" : {
				"treatment" : treatment_value,
				"sub_treatment" : sub_treatment_value,
			},
			"page_8" : {
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
				"patient_name_3" : patient_name_3.value,
		        "patient_age_3" : patient_age_3.value,
		        "patient_hn_3" : patient_hn_3.value,
		        "patient_vn_3" : patient_vn_3.value,
		        "delivered_province_3" : delivered_province_3.value,
		        "delivered_hospital_3" : delivered_hospital_3.value,
				"submission_criteria" : submission_criteria_value,
				"communication_hospital" : communication_hospital_value,
			},
			"page_9" : {
				"registration_category" : registration_category.value,
				"registration_number" : registration_number.value,
				"registration_province" : registration_province.value,
				"owner_registration" : owner_registration_value,
			},
			
		}

		// console.log('**-- all_data_arr --**')
		// console.log(all_data_arr);

		if (operating_suit_type_value) {
	    	document.querySelector('#input_select_level').value = operating_suit_type_value;
	    }

	    if (vehicle_type_value) {
    		document.querySelector('#input_vehicle_type').value = vehicle_type_value;
	    }

		// ----------------------------------------------------------------------------
		
	  	// console.log(">>>>>>>>>> DATA ARRAY <<<<<<<<<<");

	  	start_data_arr = all_data_arr ;
		check_start_data_arr = "Yes" ;

		// for (const [key, value] of Object.entries(data_arr)) {
	  	// 	// console.log(key + ' >> ' + value);
		// }

		// ---------------------------- ส่งข้อมูลไปอัพเดท ----------------------------//
		fetch("{{ url('/') }}/api/send_save_data/form_yellow", {
            method: 'post',
            body: JSON.stringify(data_arr),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(function (response){
            return response.json();
        }).then(function(data){
            // console.log(data);
            if (data['check_data_change'] == "Yes") {
            	Stop_reface_check_form_yellow();
            	create_modal_alet_data_change(data);
            }
        }).catch(function(error){
            // console.error(error);
        });

        if (operation_unit_name.value && action_set_name.value) {
        	document.querySelector('#btn_select_unit_in_no5').classList.add('d-none');
        }else{
        	document.querySelector('#btn_select_unit_in_no5').classList.remove('d-none');
        }

	}

    function create_modal_alet_data_change(data){

    	let div_content = document.querySelector('#for_create_modal_alet_data_change');
    		div_content.innerHTML = '' ;

    	let page = data['page'];

		for (const [key, value ] of Object.entries(data[page])) {

			let name_key = change_key_to_text_key(key);
			let type_value = typeof value ;

			if(type_value == "object"){
				// console.log("หัวข้อ : " + name_key + " ==> ");
				// console.log(value);

				// สร้าง modal
		    	let html_tr = `
		    		<tr>
						<th scope="row">
							<span class="btn btn-sm btn-info" id="icon_repeat_`+key+`" onclick="document.querySelector('#input_repeat_`+key+`').click();">
								<i class="fa-duotone fa-repeat"></i> สลับข้อมูลที่เลือก
							</span>

							<input id="input_repeat_`+key+`" type="checkbox" name="select_titel_update" class="d-none"
							onchange="if(this.checked){
								document.querySelector('#data_change_`+key+`').value = '`+value.new_data+`';
								document.querySelector('#td_`+key+`_DB').classList.add('bg-danger');
								document.querySelector('#td_`+key+`_DB').classList.remove('bg-success');
								document.querySelector('#td_`+key+`_NEW').classList.remove('bg-danger');
								document.querySelector('#td_`+key+`_NEW').classList.add('bg-success');
							}else{
								document.querySelector('#data_change_`+key+`').value = '`+value.old_data_DB+`';
								document.querySelector('#td_`+key+`_NEW').classList.add('bg-danger');
								document.querySelector('#td_`+key+`_NEW').classList.remove('bg-success');
								document.querySelector('#td_`+key+`_DB').classList.remove('bg-danger');
								document.querySelector('#td_`+key+`_DB').classList.add('bg-success');
							}
							"> 
						</th>
						<td>`+name_key+`</td>
						<td id="td_`+key+`_DB" class="bg-success">`+value.old_data_DB+`</td>
						<td id="td_`+key+`_NEW" class="bg-danger">`+value.new_data+`</td>
					</tr>
					<input class="form-control d-none" type="text" data-change='Yes' id="data_change_`+key+`" name="`+key+`" value="`+value.old_data_DB+`">
		    	`;

        		div_content.insertAdjacentHTML('beforeend', html_tr); // แทรกล่างสุด

			}

		}

    	document.querySelector('#btn_modal_alet_data_change').click();
    }

    function select_titel_update_all(){

    	let select_titel_all = document.querySelector('#select_titel_all');
    	let check_other = document.querySelectorAll('[name="select_titel_update"]');

    	// let input_data_change = document.querySelectorAll('input[data-change="Yes"]');

		if(select_titel_all.checked){

			check_other.forEach(check_other => {

			    check_other.click();
			})
		}else{

			check_other.forEach(check_other => {

			    check_other.click();
			})
		}

    }

    function save_data_change_form_yellow(){

    	// console.log("-----** save_data_change_form_yellow **-----");

    	// ส่งข้อมูลทั้งหมดไปบันทึก
    	let data_arr = [] ;
    		data_arr = {
		        "sos_help_center_id" : "{{ $sos_help_center->id }}",
		    };

    	let input_data_change = document.querySelectorAll('input[data-change="Yes"]');

			input_data_change.forEach(input_data_change => {
			    // console.log(input_data_change);
			    // console.log(input_data_change.value);

		        data_arr[input_data_change.name] = input_data_change.value;
			})

		// console.log(data_arr);

		// ---------------------------- ส่งข้อมูลไปอัพเดท ----------------------------//
		fetch("{{ url('/') }}/api/save_data_change_form_yellow", {
            method: 'post',
            body: JSON.stringify(data_arr),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(function (response){
            return response.json();
        }).then(function(data){
            // console.log("UPDATE SUCCESS");
            // console.log(data);
            if (data['check'] == "OK") {
            	for (const [key, value ] of Object.entries(data['data'])) {
            		if(key != "sos_help_center_id"){
            			edit_form_yellow(null , key , value , 'save_data_change_form_yellow')
            		}
            	}
            	Loop_check_form_yellow();
            }
        }).catch(function(error){
            // console.error(error);
        });



    }

    var isModalClosed = false;

	// หากโมดัลถูกปิด
	document.getElementById("modal_alet_data_change").addEventListener("hidden.bs.modal", function () {
	    isModalClosed = true;
	});

	// เมื่อคลิกปุ่มตรวจสอบสถานะโมดัล
	function checkModalStatus() {
	    if (isModalClosed) {
	        console.log("โมดัลถูกปิดแล้ว");
	    } else {
	        console.log("โมดัลยังไม่ถูกปิด");
	    }
	}



</script>

<!-- ตำนวณข้อ 5  -->
<script>
	function time_in_no5(){

		let time_create_sos = document.querySelector('[name="time_create_sos"]'); 
		let time_command = document.querySelector('[name="time_command"]'); 
		let time_go_to_help = document.querySelector('[name="time_go_to_help"]'); 
		let time_to_the_scene = document.querySelector('[name="time_to_the_scene"]'); 
		let time_leave_the_scene = document.querySelector('[name="time_leave_the_scene"]'); 
		let time_hospital = document.querySelector('[name="time_hospital"]'); 
		let time_to_the_operating_base = document.querySelector('[name="time_to_the_operating_base"]');
		// ------------------------------------------------------------------------------------------------//

		if (time_create_sos.value){
			document.querySelector('#div_create_sos').classList.remove('d-none');
		}
		if (time_command.value){
			document.querySelector('#div_time_command').classList.remove('d-none');
			document.querySelector('#title_time_command').innerHTML = time_command.value.slice(0, 5) + " น.";
			tab_content_h100();
		}
		if (time_go_to_help.value){
			document.querySelector('#div_time_go_to_help').classList.remove('d-none');
			document.querySelector('#title_time_go_to_help').innerHTML = time_go_to_help.value.slice(0, 5) + " น.";
			tab_content_h100();
		}
		if (time_to_the_scene.value){
			document.querySelector('#div_time_to_the_scene').classList.remove('d-none');
			document.querySelector('#title_time_to_the_scene').innerHTML = time_to_the_scene.value.slice(0, 5) + " น.";
			tab_content_h100();
		}
		if (time_leave_the_scene.value){
			document.querySelector('#div_time_leave_the_scene').classList.remove('d-none');
			document.querySelector('#title_time_leave_the_scene').innerHTML = time_leave_the_scene.value.slice(0, 5) + " น.";
			tab_content_h100();
		}
		if (time_hospital.value){
			document.querySelector('#div_time_hospital').classList.remove('d-none');
			document.querySelector('#title_time_hospital').innerHTML = time_hospital.value.slice(0, 5) + " น.";
			tab_content_h100();
		}
		if (time_to_the_operating_base.value){
			document.querySelector('#div_time_to_the_operating_base').classList.remove('d-none');
			document.querySelector('#title_time_to_the_operating_base').innerHTML = time_to_the_operating_base.value.slice(0, 5) + " น.";
			tab_content_h100();
		}
		if (time_leave_the_scene.value || time_hospital.value){
			document.querySelector('#sum_time_and_distance').classList.remove('d-none');
		}

		// ------------------------------------------------------------------------------------------------//

		let time_total_help = [] ;
		let time_go_to_help_to_base = [] ;

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
			let create_to_command_Time_min =  Math.floor(create_to_command_TotalSeconds / 60);
				// console.log('Time_min >> ' + Time_min);
			let create_to_command_Time_Seconds = create_to_command_TotalSeconds - (create_to_command_Time_min*60);
				// console.log('Time_Seconds >> ' + Time_Seconds);
			let time_create_to_command;

			if (create_to_command_Time_Seconds === 0) {
				time_create_to_command = create_to_command_Time_min + " นาที" ; 
			}else if(create_to_command_Time_min === 0){
				time_create_to_command = create_to_command_Time_Seconds + " วินาที" ; 
			}else{
				time_create_to_command = create_to_command_Time_min + " นาที " + create_to_command_Time_Seconds + " วินาที";
			}
			// console.log('ระยะห่าง >> ' + time_create_to_command + " นาที");

			if (time_create_to_command != 0) {
				document.querySelector('#time_create_to_command').innerHTML = time_create_to_command ;
			}

			let min_create_to_command_to_sec = create_to_command_Time_min * 60 ;
			time_total_help[0] = min_create_to_command_to_sec + create_to_command_Time_Seconds ;
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
			let command_to_go_to_help_Time_min =  Math.floor(command_to_go_to_help_TotalSeconds / 60);
				// console.log('Time_min >> ' + Time_min);
			let command_to_go_to_help_Time_Seconds = command_to_go_to_help_TotalSeconds - (command_to_go_to_help_Time_min*60);
				// console.log('Time_Seconds >> ' + Time_Seconds);
			let time_command_to_go_to_help;

			if (command_to_go_to_help_Time_Seconds === 0) {
				time_command_to_go_to_help = command_to_go_to_help_Time_min + " นาที" ; 
			}else if(command_to_go_to_help_Time_min === 0){
				time_command_to_go_to_help = command_to_go_to_help_Time_Seconds + " วินาที" ; 
			}else{
				time_command_to_go_to_help = command_to_go_to_help_Time_min + " นาที " + command_to_go_to_help_Time_Seconds + " วินาที";
			}
			// console.log('ระยะห่าง >> ' + time_command_to_go_to_help + " นาที");

			if (time_command_to_go_to_help != 0) {
				document.querySelector('#time_command_to_go_to_help').innerHTML = time_command_to_go_to_help ;
			}

			let min_command_to_go_to_help_to_sec = command_to_go_to_help_Time_min * 60 ;
			time_total_help[1] = min_command_to_go_to_help_to_sec + command_to_go_to_help_Time_Seconds ;
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
			let go_to_help_to_scene_Time_min =  Math.floor(go_to_help_to_scene_TotalSeconds / 60);
				// console.log('Time_min >> ' + Time_min);
			let go_to_help_to_scene_Time_Seconds = go_to_help_to_scene_TotalSeconds - (go_to_help_to_scene_Time_min*60);
				// console.log('Time_Seconds >> ' + Time_Seconds);
			let time_go_to_help_to_scene;

			if (go_to_help_to_scene_Time_Seconds === 0) {
				time_go_to_help_to_scene = go_to_help_to_scene_Time_min + " นาที" ; 
			}else if(go_to_help_to_scene_Time_min === 0){
				time_go_to_help_to_scene = go_to_help_to_scene_Time_Seconds + " วินาที" ; 
			}else{
				time_go_to_help_to_scene = go_to_help_to_scene_Time_min + " นาที " + go_to_help_to_scene_Time_Seconds + " วินาที";
			}
			// console.log('ระยะห่าง >> ' + time_go_to_help_to_scene + " นาที");

			if (time_go_to_help_to_scene != 0) {
				document.querySelector('#time_go_to_help_to_scene').innerHTML = time_go_to_help_to_scene ;
			}

			let min_go_to_help_to_scene_to_sec = go_to_help_to_scene_Time_min * 60 ;
			time_total_help[2] = min_go_to_help_to_scene_to_sec + go_to_help_to_scene_Time_Seconds ;

			time_go_to_help_to_base[0] = min_go_to_help_to_scene_to_sec + go_to_help_to_scene_Time_Seconds ;
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
			let scene_to_leave_scene_Time_min =  Math.floor(scene_to_leave_scene_TotalSeconds / 60);
				// console.log('Time_min >> ' + Time_min);
			let scene_to_leave_scene_Time_Seconds = scene_to_leave_scene_TotalSeconds - (scene_to_leave_scene_Time_min*60);
				// console.log('Time_Seconds >> ' + Time_Seconds);
			let time_scene_to_leave_scene;

			if (scene_to_leave_scene_Time_Seconds === 0) {
				time_scene_to_leave_scene = scene_to_leave_scene_Time_min + " นาที" ; 
			}else if(scene_to_leave_scene_Time_min === 0){
				time_scene_to_leave_scene = scene_to_leave_scene_Time_Seconds + " วินาที" ; 
			}else{
				time_scene_to_leave_scene = scene_to_leave_scene_Time_min + " นาที " + scene_to_leave_scene_Time_Seconds + " วินาที";
			}
			// console.log('ระยะห่าง >> ' + time_scene_to_leave_scene + " นาที");

			if (time_scene_to_leave_scene != 0) {
				document.querySelector('#time_scene_to_leave_scene').innerHTML = time_scene_to_leave_scene ;
			}

			let min_scene_to_leave_scene_to_sec = scene_to_leave_scene_Time_min * 60 ;
			time_total_help[3] = min_scene_to_leave_scene_to_sec + scene_to_leave_scene_Time_Seconds ;

			time_go_to_help_to_base[1] = min_scene_to_leave_scene_to_sec + scene_to_leave_scene_Time_Seconds ;
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
			let leave_scene_to_hospital_Time_min =  Math.floor(leave_scene_to_hospital_TotalSeconds / 60);
				// console.log('Time_min >> ' + Time_min);
			let leave_scene_to_hospital_Time_Seconds = leave_scene_to_hospital_TotalSeconds - (leave_scene_to_hospital_Time_min*60);
				// console.log('Time_Seconds >> ' + Time_Seconds);
			let time_leave_scene_to_hospital;

			if (leave_scene_to_hospital_Time_Seconds === 0) {
				time_leave_scene_to_hospital = leave_scene_to_hospital_Time_min + " นาที" ; 
			}else if(leave_scene_to_hospital_Time_min === 0){
				time_leave_scene_to_hospital = leave_scene_to_hospital_Time_Seconds + " วินาที" ; 
			}else{
				time_leave_scene_to_hospital = leave_scene_to_hospital_Time_min + " นาที " + leave_scene_to_hospital_Time_Seconds + " วินาที";
			}
			// console.log('ระยะห่าง >> ' + time_leave_scene_to_hospital + " นาที");

			if (time_leave_scene_to_hospital != 0) {
				document.querySelector('#time_leave_scene_to_hospital').innerHTML = time_leave_scene_to_hospital ;
			}

			let min_leave_scene_to_hospital_to_sec = leave_scene_to_hospital_Time_min * 60 ;
			time_total_help[4] = min_leave_scene_to_hospital_to_sec + leave_scene_to_hospital_Time_Seconds ;

			time_go_to_help_to_base[2] = min_leave_scene_to_hospital_to_sec + leave_scene_to_hospital_Time_Seconds ;
		}
		// ---------------------- จบ ออกจากที่เกิดเหตุ ถึง โรงพยาบาล ---------------------- //


		// ---------------------- เวลากลับฐาน ---------------------- //
		let calculate_go_to_base_from ;
		let text_time_title_2 ;
		let class_color_title_2 ;

		if (calculate_time_hospital){
			calculate_go_to_base_from = calculate_time_hospital ;
			text_time_title_2 = "รพ." ;
			class_color_title_2 = "timeline-brown" ;
		}else if(calculate_time_leave_the_scene){
			calculate_go_to_base_from = calculate_time_leave_the_scene ;
			text_time_title_2 = "ออกจากที่เกิดเหตุ" ;
			class_color_title_2 = "timeline-lightblue" ;
		}

		document.querySelector('#text_time_title_2').innerHTML = text_time_title_2 ;
		document.querySelector('#text_time_title_2').classList.add(class_color_title_2) ;

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
			let time_title_2_Time_min =  Math.floor(time_title_2_TotalSeconds / 60);
				// console.log('Time_min >> ' + Time_min);
			let time_title_2_Time_Seconds = time_title_2_TotalSeconds - (time_title_2_Time_min*60);
				// console.log('Time_Seconds >> ' + Time_Seconds);
			let time_time_title_2;

			if (time_title_2_Time_Seconds === 0) {
				time_time_title_2 = time_title_2_Time_min + " นาที" ; 
			}else if(time_title_2_Time_min === 0){
				time_time_title_2 = time_title_2_Time_Seconds + " วินาที" ; 
			}else{
				time_time_title_2 = time_title_2_Time_min + " นาที " + time_title_2_Time_Seconds + " วินาที";
			}
			// console.log('ระยะห่าง >> ' + time_time_title_2 + " นาที");

			if (time_time_title_2 != 0) {
				document.querySelector('#time_title_2').innerHTML = time_time_title_2 ;
			}

			let min_time_title_2_to_sec = time_title_2_Time_min * 60 ;
			time_go_to_help_to_base[3] = min_time_title_2_to_sec + time_title_2_Time_Seconds ;
		}
		// ---------------------- จบ เวลาทางกลับฐาน ---------------------- //
		

		// ---------------------- TIME time_total_help ---------------------- //

		// console.log(time_total_help.length);
		let sum_time_total_help = 0 ;

		time_total_help.forEach(
			element => sum_time_total_help += element
		);

		let class_sum_time_total_help ;

		if(sum_time_total_help < 480){
            class_sum_time_total_help = "text-success";
        }else if(sum_time_total_help >= 480 && sum_time_total_help < 720){
            class_sum_time_total_help = "text-warning";
        }else if(sum_time_total_help >= 720){
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

		document.querySelector('#time_total_help').innerHTML = text_time_total_help ;
		document.querySelector('#time_total_help').classList.add(class_sum_time_total_help);
		// ---------------------- END TIME time_total_help ---------------------- //


		// ---------------------- TIME time_go_to_help_to_base ---------------------- //

		let sum_time_go_to_help_to_base = 0 ;

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

		document.querySelector('#time_go_to_help_to_base').innerHTML = text_time_go_to_help_to_base ;
		// ---------------------- ENDTIME time_go_to_help_to_base ---------------------- //

		
	}

	function distance_in_no5(){
		let num_km_1 = 0 ;
		let num_km_2 = 0 ;
		let num_km_3 = 0 ;
		let num_km_4 = 0 ;

		let distance_total_help = 0 ;

		let km_create_sos_to_go_to_help = document.querySelector('#km_create_sos_to_go_to_help');
		if (km_create_sos_to_go_to_help.value) {
			num_km_1 = km_create_sos_to_go_to_help.value ;
			document.querySelector('#show_kilometer_go_to_help').innerHTML = num_km_1 + " กม." ;
		}
		let km_to_the_scene_to_leave_the_scene = document.querySelector('#km_to_the_scene_to_leave_the_scene');
		if (km_to_the_scene_to_leave_the_scene.value) {
			num_km_2 = km_to_the_scene_to_leave_the_scene.value ;
			document.querySelector('#show_kilometer_the_scene').innerHTML = num_km_2 + " กม." ;
		}
		let km_hospital = document.querySelector('#km_hospital');
		if (km_hospital.value) {
			num_km_3 = km_hospital.value ;
			document.querySelector('#show_kilometer_hospital').innerHTML = num_km_3 + " กม." ;
		}
		let km_operating_base = document.querySelector('#km_operating_base');
		if (km_operating_base.value) {
			num_km_4 = km_operating_base.value ;
			document.querySelector('#show_kilometer_operating_base').innerHTML = num_km_4 + " กม." ;
		}

		// ------------------------------- รวมระยะ ออกจากฐาน ถึง ที่เกิดเหตุ ---------------------------------------//
		let distance_go_to_help_to_scene = 0 ;
	
		distance_go_to_help_to_scene = parseFloat(num_km_2) - parseFloat(num_km_1) ;
		distance_total_help =  parseFloat(distance_total_help) +  parseFloat(distance_go_to_help_to_scene) ;

		if (parseFloat(num_km_1) === 0 || parseFloat(num_km_2) === 0) {
			document.querySelector('#distance_go_to_help_to_scene').innerHTML = '0' ;
		}else{
			document.querySelector('#distance_go_to_help_to_scene').innerHTML = distance_go_to_help_to_scene.toFixed(2) ;
		}
		// ------------------------------- จบ รวมระยะ ออกจากฐาน ถึง ที่เกิดเหตุ ---------------------------------------//


		// ------------------------------- ระยะ ที่เกิดเหตุ ถึง รพ ---------------------------------------//
		let distance_leave_scene_to_hospital = 0 ;

		if (num_km_3) {
			distance_leave_scene_to_hospital = parseFloat(num_km_3) - parseFloat(num_km_2) ;
			distance_total_help =  parseFloat(distance_total_help) +  parseFloat(distance_leave_scene_to_hospital) ;
		}

		if (!num_km_3 && parseFloat(num_km_2) === 0 || parseFloat(num_km_3) === 0) {
			document.querySelector('#distance_leave_scene_to_hospital').innerHTML = '0' ;
		}else{
			document.querySelector('#distance_leave_scene_to_hospital').innerHTML = distance_leave_scene_to_hospital.toFixed(2) ;
		}
		// ------------------------------- จบ ที่เกิดเหตุ ถึง รพ ---------------------------------------//

		// ------------------------------- รวมระยะทางกลับ ---------------------------------------//
		let text_distance_title_1 = 0 ;

		let num_title_1 ;
		let text_title_1 ;

		if (num_km_3) {
			num_title_1 = num_km_3 ;
			text_title_1 = " รพ." ;
		}else if(!num_km_3 && num_km_2){
			num_title_1 = num_km_2 ;
			text_title_1 = " ที่เกิดเหตุ";
		}

		document.querySelector('#title_1_return_distance').innerHTML = text_title_1 ;
		text_distance_title_1 = parseFloat(num_km_4) - parseFloat(num_title_1) ;
		distance_total_help =  parseFloat(distance_total_help) +  parseFloat(text_distance_title_1) ;

		if (parseFloat(num_title_1) === 0 || parseFloat(num_km_4) === 0) {
			document.querySelector('#text_distance_title_1').innerHTML = '0' ;
		}else{
			document.querySelector('#text_distance_title_1').innerHTML = text_distance_title_1.toFixed(2) ;
		}
		// ------------------------------- จบ รวมระยะทางกลับ ---------------------------------------//


		document.querySelector('#distance_total_help').innerHTML =  parseFloat(distance_total_help).toFixed(2) ;
		
		time_in_no5();
	}
</script>
<script>
	function tab_content_h100(){
        $('.tab-content').height('100%') ;
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
			keyboardSettings: {
				keyNavigation: false, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
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

	function update_page_before_click_button(type){

		// console.log("///////////////////////////");
		// console.log("update_page_before_click_button");
		// console.log("type >> " + type);
		// console.log("///////////////////////////");

		if(type == "other"){

			page_before_click_button = form_yellow_current_topic ;

			go_to_form_data(1);

			// console.log("page_before_click_button  >> " + page_before_click_button);
			// console.log("form_yellow_current_topic  >> " + form_yellow_current_topic);

		}else{
			go_to_form_data(page_before_click_button);
			page_before_click_button = null ;
		}
		

	}

</script>

 <script>
function showFieldsets() {
  var addBtn = document.getElementById('add-btn');
  var deleteBtn = document.getElementById('delete-btn');
  var fieldset2 = document.getElementById('fieldset2');
  var fieldset3 = document.getElementById('fieldset3');
  
  if (fieldset2.classList.contains('hidden')) {
    fieldset2.classList.remove('hidden');
    deleteBtn.classList.remove('hidden');
    addBtn.classList.remove('hidden');
  } else if (fieldset3.classList.contains('hidden')) {
    fieldset3.classList.remove('hidden');
    deleteBtn.classList.remove('hidden');
    addBtn.classList.add('hidden');
  }
}


function deleteFieldsets() {
  var addBtn = document.getElementById('add-btn');
  var deleteBtn = document.getElementById('delete-btn');
  var fieldset2 = document.getElementById('fieldset2');
  var fieldset3 = document.getElementById('fieldset3');
  
  if (!fieldset3.classList.contains('hidden')) {
	let patient_name_3 = document.getElementById('patient_name_3');
    let patient_age_3 = document.getElementById('patient_age_3');
    let patient_hn_3 = document.getElementById('patient_hn_3');
    let patient_vn_3 = document.getElementById('patient_vn_3');
    let delivered_province_3 = document.getElementById('delivered_province_3');
    let delivered_hospital_3 = document.getElementById('delivered_hospital_3');
    if (patient_name_3.value !== '' || patient_age_3.value !== '' || patient_hn_3.value !== '' || patient_vn_3.value !== '' || delivered_province_3.value !== '' || delivered_hospital_3.value !== '') {
      if (confirm('ผู้ป่วย ๓ มีข้อมูลอยู่ต้องการลบใช่หรือไม่?')) {
        fieldset3.classList.add('hidden');
        patient_name_3.value = '';
        patient_age_3.value = '';
        patient_hn_3.value = '';
        patient_vn_3.value = '';
        delivered_province_3.value = '';
        delivered_hospital_3.value = '';
      }
    } else {
      fieldset3.classList.add('hidden');
    }
    
    // if (fieldset2.classList.contains('hidden') && fieldset3.classList.contains('hidden')) {
    //   deleteBtn.classList.add('hidden');
    //   addBtn.classList.remove('hidden');
    // }

	if (fieldset2.classList.contains('hidden') && fieldset3.classList.contains('hidden')) {
    addBtn.classList.remove('hidden');
    deleteBtn.classList.add('hidden');
	} else if (fieldset3.classList.contains('hidden')) {
		deleteBtn.classList.remove('hidden');
		addBtn.classList.remove('hidden');
	}

    
    return;
  }
  
  if (!fieldset2.classList.contains('hidden')) {
    let patient_name_2 = document.getElementById('patient_name_2');
    let patient_age_2 = document.getElementById('patient_age_2');
    let patient_hn_2 = document.getElementById('patient_hn_2');
    let patient_vn_2 = document.getElementById('patient_vn_2');
    let delivered_province_2 = document.getElementById('delivered_province_2');
    let delivered_hospital_2 = document.getElementById('delivered_hospital_2');
    
    if (patient_name_2.value !== '' || patient_age_2.value !== '' || patient_hn_2.value !== '' || patient_vn_2.value !== '' || delivered_province_2.value !== '' || delivered_hospital_2.value !== '') {
      if (confirm('ผู้ป่วย ๒ มีข้อมูลอยู่ต้องการลบใช่หรือไม่?')) {
        fieldset2.classList.add('hidden');
        patient_name_2.value = '';
        patient_age_2.value = '';
        patient_hn_2.value = '';
        patient_vn_2.value = '';
        delivered_province_2.value = '';
        delivered_hospital_2.value = '';
      }
    } else {
      fieldset2.classList.add('hidden');
    }
    
    if (fieldset2.classList.contains('hidden') && fieldset3.classList.contains('hidden')) {
      deleteBtn.classList.add('hidden');
      addBtn.classList.remove('hidden');
    } else if (fieldset3.classList.contains('hidden')) {
      addBtn.classList.remove('hidden'); 
    }
    
    return;
  }
}
  </script>