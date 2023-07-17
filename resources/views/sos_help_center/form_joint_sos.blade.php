<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!-- //////////////////// Modal อุบัติเหตุร่วม //////////////////// -->
<div class="modal fade" id="Modal-Mass-casualty-incident" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <button id="btn_close_casualty_incident" type="button" class="close d-none" data-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-8">
                        <div id="map_joint_sos_1669"></div>
                    </div>
                    <div class="col-4" style="display: flex;flex-direction: column;">
                        <div class="card radius-10 w-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h5 class="mb-0">ข้อมูลเจ้าหน้าที่ (รัศมี 10 กม.)</h5>
                                    </div>
                                </div>
                            </div>
                            <!-- BTN Select Level -->
                            <div class="chat-tab-menu ">
                                <ul class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link  menu-select-lv-all" href="javascript:;" onclick="document.querySelector('#joint_sos_input_select_level').value = 'all';joint_sos_select_level();">
                                            <div class="font-24">ALL
                                            </div>
                                            <div><small>ทั้งหมด</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link  menu-select-lv-fr" href="javascript:;" onclick="document.querySelector('#joint_sos_input_select_level').value = 'fr';joint_sos_select_level()">
                                            <div class="font-24">FR
                                            </div>
                                            <div>
                                                <small>เบื้องต้น</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link menu-select-lv-bls" href="javascript:;" onclick="document.querySelector('#joint_sos_input_select_level').value = 'bls';joint_sos_select_level()">
                                            <div class="font-24">BLS
                                            </div>
                                            <div><small>ทั่วไป</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link menu-select-lv-ils" href="javascript:;" onclick="document.querySelector('#joint_sos_input_select_level').value = 'ils';joint_sos_select_level()">
                                            <div class="font-24">ILS
                                            </div>
                                            <div><small>กลาง</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link menu-select-lv-als" href="javascript:;" onclick="document.querySelector('#joint_sos_input_select_level').value = 'als';joint_sos_select_level()">
                                            <div class="font-24">ALS
                                            </div>
                                            <div><small>สูง</small>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <input class="d-none" type="text" name="joint_sos_input_select_level" id="joint_sos_input_select_level" value="{{ isset($data_form_yellow->operating_suit_type) ? $data_form_yellow->operating_suit_type : 'all'}}">
                            </div>

                            <!-- BTN Select vehicle  -->
                            <div class="owl-carousel owl-theme owlmenu-vehicle p-3">
                                <div class="item" style="width:100%">
                                    <a class="btn menu-select-vehicle-all" href="javascript:;" onclick="document.querySelector('#joint_sos_input_vehicle_type').value = 'all';joint_sos_select_level();">
                                        ทั้งหมด
                                    </a>
                                </div>
                                <div class="item" style="width:100%">
                                    <a class="btn menu-select-vehicle-car" href="javascript:;" onclick="document.querySelector('#joint_sos_input_vehicle_type').value = 'รถ';joint_sos_select_level();">
                                        รถ
                                    </a>
                                </div>
                                <div class="item" style="width:100%">
                                    <a class="btn menu-select-vehicle-aircraft" href="javascript:;" onclick="document.querySelector('#joint_sos_input_vehicle_type').value = 'อากาศยาน';joint_sos_select_level();">
                                        อากาศยาน
                                    </a>
                                </div>
                                <div class="item" style="width:100%">
                                    <a class="btn menu-select-vehicle-boat-1" href="javascript:;" onclick="document.querySelector('#joint_sos_input_vehicle_type').value = 'เรือ ป.1';joint_sos_select_level();">
                                        เรือ ป.1
                                    </a>
                                </div>
                                <div class="item" style="width:100%">
                                    <a class="btn menu-select-vehicle-boat-2" href="javascript:;" onclick="document.querySelector('#joint_sos_input_vehicle_type').value = 'เรือ ป.2';joint_sos_select_level();">
                                        เรือ ป.2
                                    </a>
                                </div>
                                <div class="item" style="width:100%">
                                    <a class="btn menu-select-vehicle-boat-3" href="javascript:;" onclick="document.querySelector('#joint_sos_input_vehicle_type').value = 'เรือ ป.3';joint_sos_select_level();">
                                        เรือ ป.3
                                    </a>
                                </div>
                                <div class="item" style="width:100%">
                                    <a class="btn  menu-select-vehicle-boat-other" href="javascript:;" onclick="document.querySelector('#joint_sos_input_vehicle_type').value = 'เรือประเภทอื่นๆ';joint_sos_select_level();">
                                        เรืออื่นๆ
                                    </a>
                                </div>
                            </div>

                            <input class="d-none" type="text" name="joint_sos_input_vehicle_type" id="joint_sos_input_vehicle_type" value="{{ isset($data_form_yellow->vehicle_type) ? $data_form_yellow->vehicle_type : 'all'}}">

                            <input class="d-none" type="text" id="list_joint_sos_officer">

                            <div class="data-officer p-3 mb-3 ps ps--active-y" id="joint_sos_card_data_operating">
                                <!-- ข้อมูลหน่วยปฏิบัติการในพื้นที่ -->
                            </div>

                            <!-- <div class="data-officer p-3 mb-3 ps ps--active-y">
                                <div id="div_operating_id_1" onclick="joint_sos_view_data_marker(1,'กู้ภัยมืดแบบมืดเลยมืดมาก มืดจริงๆนะ ไม่ได้โม้ มืดตืดตื๋อ',2.07,'FR',14.187535,101.164581);">
                                    <div class="data-officer-item d-flex align-items-center border-top border-bottom p-2 cursor-pointer">
                                        <div class="d-md-flex align-items-center email-message px-3 py-1">
                                            <div class="d-flex align-items-center">
                                                <input class="form-check-input" id="test" type="checkbox" value=""> 
                                            </div>
                                            <div class="ms-auto">
                                                <div class="d-flex align-items-center p-2 cursor-pointer">
                                                    <div class="level FR d-flex align-items-center m-2">
                                                        <center> FR </center>
                                                    </div>
                                                    <div style="margin-left: 10px;">
                                                        <h6 class="mb-1 font-14">กู้ภัยมืดแบบมืดเลยมืดมาก มืดจริงๆนะ ไม่ได้โม้ มืดตืดตื๋อ (เรือ ป.1)</h6>
                                                        <p class="mb-0 font-14">เจ้าหน้าที่ : TEERASAK3</p>
                                                        <p class="mb-0 font-13 text-secondary">ระยะห่าง(รัศมี) ≈ 2.07 กม. </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="div_bottom" style="margin-top: auto;">
                                <center>
                                    <!-- <h5>
                                        ทั้งหมด : <b><span id="show_count_select_operating">0</span></b> หน่วยปฏิบัติการ
                                    </h5> -->
                                    <p id="show_error_noselect" class="text-danger d-none">กรุณาเลือกหน่วยปฏิบัติการ</p>
                                    <span id="btn_send_data_joint_sos" class="mt-3 btn btn-primary main-shadow main-radius" style="width: 60%;" onclick="send_data_joint_sos('{{ $sos_1669_id }}');">
                                        เลือก <b><span id="show_count_select_operating">0</span></b> หน่วย
                                    </span>
                                </center>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //////////////////// END Modal อุบัติเหตุร่วม //////////////////// -->
<style>
	.btnCloseModalOfficer {
		position: absolute;
		top: 5px;
		right: -5rem;
		font-size: 12px;
		background-color: #25548F;
		color: #fff !important;
		font-weight: bolder;
		width: 3rem;
		height: 3rem;
		border-radius: 50%;
		transition: all .15s ease-in-out;
        outline: 2px solid #fff;
        display: flex;
        justify-content: center;
        align-items: center;
	}
    .btnCloseModalOfficer i{
        margin-left: .3rem;
    }
	.btnCloseModalOfficer:hover {
		background-color: #6aa5ed;
		color: #fff;
		font-size: 18px;
        
	}

	.cardWaitOfficer {
		padding: 15px;
		max-width: 349px;
		border-radius: 18px;
		width: 100%;
		overflow: hidden;
	}

	.modalWaitofficer .modal-content,
	.modalWaitofficer .modal-content .modal-body {
		background-color: hsl(0, 0%, 0%, 0);
		border: none;
		border-radius: 20px;
		padding: 20px;
		font-family: 'Mitr', sans-serif;
	}

	.headerWaitOfficer {
		margin: 5px;
		display: flex;
		white-space: nowrap;
		overflow: hidden;
		text-overflow: ellipsis;
		width: 100%;
		align-items: center;

	}

	.imgOfficerWait {
		width: 70px !important;
		height: 80px !important;
		object-fit: cover;
		border: 1px solid #4d4d4d;
		border-radius: 5px;
		margin-right: 1rem;
	}

	.countTimeWaitOfficer {
		background-color: red;
		color: white;
		position: absolute;
		top: 10px;
		right: 10px;
		font-size: .8rem;
		border-radius: 10px;
		padding: 1px 8px;
	}

	/* pc */
	@media screen and (min-width: 1024px) {
		.colOfficer {
			margin-top: 1rem;
			max-width: 100%;
			flex-basis: 0;
			flex-grow: 1;
			display: flex;
			justify-content: center;
		}
	}

	/* taplet */
	@media screen and (min-width: 768px) and (max-width: 1023px) {
		.colOfficer {
			margin-top: 1rem;
			max-width: 100%;
			flex-basis: 0;
			flex-grow: 1;
		}
	}

	/* mobile */
	@media screen and (max-width: 767px) {
		.colOfficer {
			margin-top: 1rem;
			width: 100% !important;
		}
	}

	.bodyWaitOfficer {
		margin-top: 1rem;
		display: block;
	}

	.itemWaitOfficerItem {
		margin-top: .8rem;
		display: flex;
		align-items: center !important;
	}

	.itemWaitOfficerItem i {
		font-size: 1.2rem;
		margin-right: 1.2rem;
	}

	.btnSelectOfficerAgain {
		padding: .5rem 1rem;
		display: flex;
		align-items: center;
		justify-content: center;
		background-color: #25548F;
		color: #fff;
		margin-top: 1rem;
		width: 100%;
		transition: all .15s ease-in-out;
	}

	.btnSelectOfficerAgain:hover {
		background-color: #6aa5ed;
		color: #fff;
		font-size: 18px;
	}

	.btnSelectOfficerAgain:active {
		background-color: #25548F;
		color: #fff;
		outline: 3px solid #6aa5ed;
	}

    .btnWaitOfficerSuccess {
		padding: .5rem 1rem;
		display: flex;
		align-items: center;
		justify-content: center;
		background-color: #428442;
		color: #fff;
		margin-top: 1rem;
		width: 100%;
		transition: all .15s ease-in-out;
	}

	.btnWaitOfficerSuccess:hover {
		background-color: #7fff7f;
		color: #fff;
		font-size: 18px;
	}

	.btnWaitOfficerSuccess:active {
		background-color: #428442;
		color: #fff;
		outline: 3px solid #7fff7f;
	}
    
	.text-orange {
		color: #f6411b;
	}

	.officer-success {
		background: linear-gradient(to bottom right, #B0DB7D 40%, #99DBB4 100%);
		border-radius: 20px;
		box-shadow: 5px 5px 20px rgba(203, 205, 211, 0.1);
		border: 1px solid #1fb52e !important;
	}
	.officer-success p i{
		margin-top: 1rem;
		color:#4ec45e ;
	}
	
	.officer-danger {
		background: linear-gradient(to bottom left, #EF8D9C 40%, #FFC39E 100%);
		border-radius: 20px;
		box-shadow: 5px 5px 20px rgba(203, 205, 211, 0.1);
		border: 1px solid #b22c23 !important;
	}
	.officer-danger p i{
		margin-top: 1rem;
		color:#ff3535 ;
	}
    .officer-warning{
        background: linear-gradient(to bottom left, #DBA530 40%, #F7D389 100%);
		border-radius: 20px;
		box-shadow: 5px 5px 20px rgba(203, 205, 211, 0.1);
		border: 1px solid #DBA530 !important;
        color:#212121;
    }.officer-warning p i{
        margin-top: 1rem;
		color:#DBA530 ;
    }

	.officer-success *:not(i),
	.officer-danger *:not(i) {
		color: #fff !important;
	}

	/*Description */
	.card-description {
		display: flex;
		position: absolute;
		gap: .5em;
		flex-direction: column;
		background-color: #f5f5f5;
		color: #212121;
		height: 30%;
		bottom: 0;
		border-radius: 16px;
		transition: all .7s cubic-bezier(0.645, 0.045, 0.355, 1);
		padding: 1rem;
		width: 100%;
		left: 0;
		justify-content: center;
		text-align: center;
	}

	/*Text*/
	.text-title {
		font-size: 3rem;
		font-weight: 700;
		margin: 0 0 5px;
	}

	.text-body {
		font-size: 1rem;
		line-height: 130%;
	}


	/* Hover states */
	.card:hover .card-description {
		transform: translateY(100%);
	}
    #modal_show_officer_joint *:not(i){
		font-family: 'Mitr', sans-serif !important;

    }
</style>
<!-- //////////////////// Modal แสดงเจ้าหน้าที่ ที่เลือก //////////////////// -->
<!-- Button trigger modal -->
<button id="btn_open_modal_show_officer_joint" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#modal_show_officer_joint">
    Modal แสดงเจ้าหน้าที่ ที่เลือก
</button>

<!-- Modal -->
<div class="modal fade" id="modal_show_officer_joint" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="Label_modal_show_officer_joint" aria-hidden="true">
	<div class="modal-dialog modalWaitofficer modal-xl">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" id="btn_close_modal_show_officer_joint" class="btnCloseModalOfficer btn" data-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
				<div class="row d-flex justify-content-center d-none">
					<div class="row d-flex justify-content-center">
						<div class="colOfficer">
							<div class="card cardWaitOfficer">
								<span class="countTimeWaitOfficer">รอการยืนยัน 10 นาที</span>
								<div class="headerWaitOfficer">
									<img src="{{ asset('/img/stickerline/PNG/1.png') }}">
									<div class="dataHeaderOfficer">
										<h4 class="m-0">LUCKY</h4>
										<p class="m-0">2305-2601-007</p>
									</div>
								</div>
								<div class="bodyWaitOfficer">
									<span><b>ข้อมูล</b> </span>
									<div class="itemWaitOfficerItem">
										<i class="fa-solid fa-phone text-primary"></i>
										<span>081-234-5678</span>
									</div>
									<div class="itemWaitOfficerItem">
										<i class="fa-duotone fa-car-building text-success"></i>
										<span>กู้ภัยสว่าง</span>
									</div>
									<div class="itemWaitOfficerItem">
										<i class="fa-duotone fa-siren-on text-danger"></i>
										<span>FR</span>
									</div>
									<div class="itemWaitOfficerItem">
										<i class="fa-duotone fa-truck-medical text-orange"></i>
										<span>รถยนต์</span>
									</div>
									<hr>
									<button class="btn btnSelectOfficerAgain">
										เลือกใหม่
									</button>
								</div>
								<div class="card-description officer-success">
									<p class="text-title">
										<i class="fa-sharp fa-solid fa-circle-check"></i>
									</p>
									<p class="text-body">เจ้าหน้าที่รับเคสแล้ว</p>
								</div>
							</div>
						</div>
					</div>
				</div>

                <div id="show_officer_joint_content" class="row d-flex justify-content-center">
                    <!-- Modal แสดงเจ้าหน้าที่ ที่เลือก -->
                </div>
			</div>
		</div>
	</div>
</div>

 
<!-- <div class="modal fade" id="modal_show_officer_joint" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="Label_modal_show_officer_joint" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <button id="btn_close_modal_show_officer_joint" type="button" class="close d-none" data-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row d-none">
                    <div id="mock_up_test">
                        <div class="col-4">
                            <div class="card" style="background-color: #ffbfc3;transition: 0.5;">
                                <div class="card-body">
                                    <h4 class="card-title text-center">
                                        <b>2305-1406-0000</b>
                                    </h4>
                                    <div class="row mt-3">
                                        <div class="col-12 text-center">
                                            <h5>
                                                <i class="fa-duotone fa-spinner fa-spin-pulse"></i> รอการยืนยัน จากหน่วยปฏิบัติการ
                                            </h5>
                                        </div>
                                        <hr class="mt-3">
                                        <div class="col-3">
                                            <img src="assets/images/products/01.png" class="card-img-top" alt="...">
                                        </div>
                                        <div class="col-9">
                                            <b>เจ้าหน้าที่ : </b>
                                            <br>
                                            <b>หน่วยปฏิบัติการ : </b>
                                            <br>
                                            <b>ระดับ : </b>
                                            <br>
                                            <b>ประเภท : </b>
                                        </div>
                                        <hr class="mt-3">
                                    </div>
                                    <div class="mt-3">
                                        <center>
                                            โปรดรอสักครู่... (<span id="timer_wait_officer_id_1"></span>)
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                        </div>
                        <div class="col-4">
                        </div>
                    </div>
                </div>

                <div id="show_officer_joint_content" class="row">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div> -->
<!-- //////////////////// END Modal แสดงเจ้าหน้าที่ ที่เลือก //////////////////// -->


<!-- //////////////////// Modal new select officer of id sos //////////////////// -->
<!-- Button trigger modal -->
<button id="btn_open_modal_new_select_officer_of_id_sos" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#modal_new_select_officer_of_id_sos">
    Modal new select officer of id sos
</button>

<!-- Modal -->
<div class="modal fade" id="modal_new_select_officer_of_id_sos" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="Label_modal_new_select_officer_of_id_sos" aria-hidden="true">
    <div class="modal-dialog modal-xl" >
        <div class="modal-content" style="height:95vh !important">
        <button type="button" class="btnCloseModalOfficer btn" data-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>

            <div class="modal-body" style="height:95vh !important;overflow:auto;">
                <div class="row">
                    <div class="col-12" id="wait_for_loadMap">
                        <div class="card card">
                            <div class="cardLoader">
                                <div class="race-by"></div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-7">
                        <!-- <center>
                            <h3 id="h3_เลือกหน่วยปฏิบัติการใหม่" class="d-none mt-3"><u>เลือกหน่วยปฏิบัติการใหม่</u></h3>
                        </center> -->
                        <div id="map_new_select_officer" class="mt-3"></div>
                    </div>

                    <style>
                        .cardLoader{
                            width: 100%;
                            height: 95vh !important;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                        }
                        .race-by {
                        position: relative;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        height: 5px;
                        width: 80px;
                        border-radius: calc(5px / 2);
                        overflow: hidden;
                        transform: translate3d(0, 0, 0);
                        }

                        .race-by::before {
                        content: '';
                        position: absolute;
                        top: 50%;
                        left: 0;
                        height: 100%;
                        width: 100%;
                        background-color: black;
                        opacity: 0.1;
                        }

                        .race-by::after {
                        content: '';
                        height: 100%;
                        width: 100%;
                        border-radius: calc(5px / 2);
                        animation: raceBy 1.4s ease-in-out infinite;
                        transform: translateX(-100%);
                        background-color: black;
                        }

                        @keyframes raceBy {
                        0% {
                            transform: translateX(-100%);
                        }
                        100% {
                            transform: translateX(100%);
                        }
                        }

                        #map_new_select_officer{
                            height: 85vh !important;
                        }
                       .modalselectOfficerAgain *:not(i) {
                            font-family: 'Mitr', sans-serif;
                        }
                        .carSelectNewOfficer {
                            padding: 15px 15px 0 15px;
                            width:85%;
                            overflow: hidden;
                            border: none;
                            margin-bottom: 0;
                        }
                        
                        .headerSelectNewOfficer {
                            margin: 5px;
                            display: flex;
                            white-space: nowrap;
                            overflow: hidden;
                            text-overflow: ellipsis;
                            width: 100%;
                            align-items: center;

                        }

                        .imgSelectNewOfficer {
                            width: 70px !important;
                            height: 80px !important;
                            object-fit: cover;
                            border: 1px solid #4d4d4d;
                            border-radius: 5px;
                            margin-right: 1rem;
                        }.bodySelectNewOfficer {
                            margin-top: 1rem;
                            display: block;
                        }.itemSelectNewOfficerItem {
                            margin-top: .8rem;
                            display: flex;
                            align-items: center !important;
                            justify-content: space-between;
                            flex-wrap: wrap;
                            row-gap: 1rem;
                        }

                        .itemSelectNewOfficerItem i {
                            font-size: 1.2rem;
                            margin-right: .5rem;
                        }
                        .containerItem{
                            overflow: auto !important;
		                    height: 85vh !important;
                        }.bodySelectNewOfficer *:not(i){
                            font-family: 'Mitr', sans-serif !important;

                        }
                    </style>
                    <div class="col-5" style="position: relative !important;" style="height:50vh !important">

                        <!-- รายชื่อเจ้าหน้าที่ -->
                        <div id="div_for_carousel_new_select_officer" style="display:flex;align-items: center;">

                        </div>
                        <style>
							.btnOfficerprev,
							.btnOfficerNext {
								display: flex;
								justify-content: center;
								align-items: center;
								height: 2rem;
								width: 2rem;
								border-radius: 50%;
								position: absolute;
								top: 50%;
								z-index: 999;
							}

							.btnOfficerprev {
								left: 0;
							}

							.btnOfficerNext {
								right: 0;
							}
						</style>
						<button class="btn btnOfficerprev owl-prev d-none">
							<i class="fa-solid fa-chevron-left"></i>
						</button>
						<button class="btn btnOfficerNext owl-prev d-none">
							<i class="fa-solid fa-chevron-right"></i>
						</button>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>

<!-- //////////////////// END Modal new select officer of id sos //////////////////// -->

<script>
    const image_sos_joint_sos = "{{ url('/img/icon/operating_unit/sos.png') }}";

    //////////////////// open_map_joint_sos_1669 ////////////////////
    let map_joint_sos_1669;
    let joint_sos_location_unit_markers = [];

    let joint_sos_directionsDisplay;
    let joint_sos_view_infoWindow = "";
    let joint_sos_start_infoWindow = [];
    let joint_sos_marker;

    
  
    //////////////////// END open_map_joint_sos_1669 ////////////////////
   


    function open_map_joint_sos_1669() {

        joint_sos_set_active_btn_menu_select('all', 'all');

        let sos_lat = document.querySelector('#lat');
        let sos_lng = document.querySelector('#lng');
        // console.log(parseFloat(sos_lat.value));
        // console.log(parseFloat(sos_lng.value));

        if (sos_lat.value && sos_lng.value) {

            let m_lat = parseFloat(sos_lat.value);
            let m_lng = parseFloat(sos_lng.value);
            let m_numZoom = parseFloat('14');

            map_joint_sos_1669 = new google.maps.Map(document.getElementById("map_joint_sos_1669"), {
                center: {
                    lat: m_lat,
                    lng: m_lng
                },
                zoom: m_numZoom,
                icon: image_sos_joint_sos,
            });

            if (joint_sos_marker) {
                joint_sos_marker.setMap(null);
            }

            joint_sos_marker = new google.maps.Marker({
                position: {
                    lat: parseFloat(m_lat),
                    lng: parseFloat(m_lng)
                },
                map: map_joint_sos_1669,
                icon: image_sos_joint_sos,
            });


            let level_start = document.querySelector('#joint_sos_input_select_level').value;
            let vehicle_type_start = document.querySelector('#joint_sos_input_vehicle_type').value;

            // console.log('open_map');
            joint_sos_operating_unit(m_lat, m_lng, level_start, vehicle_type_start, 'open_map');

        }
    }

    function joint_sos_operating_unit(m_lat, m_lng, level, vehicle_type, check_click) {
        // console.log("level >> " + level);
        // console.log("vehicle_type >> " + vehicle_type);

        level = level.toLowerCase();

        let check_forward = "{{ $sos_help_center->forward_operation_from }}";
        let forward_level = "{{ $sos_help_center->form_yellow->idc }}";

        if (forward_level) {
            forward_level = forward_level;
        } else {
            forward_level = "null";
        }

        if (check_forward && check_click == "open_map") {
            set_active_btn_menu_select_forward(forward_level);
        } else {
            joint_sos_set_active_btn_menu_select(level, vehicle_type);
            forward_level = "null";
        }

        // ------------------------------------------------------------------------------------------
        let data_arr = [];
        let text_data_arr = [];

        fetch("{{ url('/') }}/api/get_location_operating_unit" + "/" + m_lat + "/" + m_lng + "/" + level + "/" + vehicle_type + "/" + forward_level)
            .then(response => response.json())
            .then(result => {
                console.log('------ get_location_operating_unit -------');
                console.log(result);
                console.log('----------------------');
                let list_joint_sos_officer = document.querySelector('#list_joint_sos_officer').value;
                list_arr = list_joint_sos_officer.split(',');

                for (var i = 0; i < result.length; i++) {

                    let joint_sos_card_data_operating = document.querySelector('#joint_sos_card_data_operating');

                    // add div in to joint_sos_card_data_operating
                    let div_operating = document.createElement("div");
                    let div_operating_id = document.createAttribute("id");
                    div_operating_id.value = "div_operating_id_" + result[i]['id'];
                    div_operating.setAttributeNode(div_operating_id);
                    joint_sos_card_data_operating.appendChild(div_operating);

                    switch (result[i]['level']) {
                        case "FR":
                            location_unit_marker = new google.maps.Marker({
                                position: {
                                    lat: parseFloat(result[i]['lat']),
                                    lng: parseFloat(result[i]['lng'])
                                },
                                map: map_joint_sos_1669,
                                icon: image_operating_unit_green,
                            });
                            joint_sos_location_unit_markers.push(location_unit_marker);
                            break;
                        case "BLS":
                            location_unit_marker = new google.maps.Marker({
                                position: {
                                    lat: parseFloat(result[i]['lat']),
                                    lng: parseFloat(result[i]['lng'])
                                },
                                map: map_joint_sos_1669,
                                icon: image_operating_unit_yellow,
                            });
                            joint_sos_location_unit_markers.push(location_unit_marker);
                            break;
                        default:
                            location_unit_marker = new google.maps.Marker({
                                position: {
                                    lat: parseFloat(result[i]['lat']),
                                    lng: parseFloat(result[i]['lng'])
                                },
                                map: map_joint_sos_1669,
                                icon: image_operating_unit_red,
                            });
                            joint_sos_location_unit_markers.push(location_unit_marker);
                    }

                    let myLatlng = {
                        lat: parseFloat(result[i]['lat']),
                        lng: parseFloat(result[i]['lng'])
                    };

                    let round_i = i + 1;

                    let checked_officer;

                    if (list_arr.includes(result[i]['user_id'].toString() + '-' + result[i]['distance'].toFixed(2) + '-' + result[i]['operating_unit_id'])) {
                        checked_officer = 'checked';
                        // console.log('มีค่า '+result[i]['id']+' ในอาร์เรย์');
                    } else {
                        checked_officer = '';
                        // console.log('ไม่มีค่า '+result[i]['id']+' ในอาร์เรย์');
                    }

                    let text_data_operating = `
                        <div class="data-officer-item d-flex align-items-center border-top border-bottom p-2 cursor-pointer">
                            <div class="d-md-flex align-items-center email-message px-3 py-1">
                                <div class="d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" ` + checked_officer + ` name="select_joint_sos_officer" id="select_joint_sos_officer_id_` + result[i]['id'] + `_user_id_` + result[i]['user_id'] + `" value="` + result[i]['id'] + `" onclick="select_joint_sos_officer('` + result[i]['user_id'] + `','` + result[i]['distance'].toFixed(2) + `','` + result[i]['operating_unit_id'] + `','` + result[i]['id'] + `');">
                                </div>
                                <div class="ms-auto">
                                    <div class="d-flex align-items-center p-2 cursor-pointer">
                                        <div class="level ` + result[i]['level'] + ` d-flex align-items-center m-2"">
                                            <center> ` + result[i]['level'] + ` </center>
                                        </div>
                                        <div style="margin-left: 10px;">
                                            <h6 class="mb-1 font-14">` + result[i]['name'] + ` (` + result[i]['vehicle_type'] + `</h6>
                                            <p class="mb-0 font-14">เจ้าหน้าที่ : ` + result[i]['name_officer'] + `</p>
                                            <p class="mb-0 font-13 text-secondary">ระยะห่าง(รัศมี) ≈ ` + result[i]['distance'].toFixed(2) + ` กม. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    
                                
                    // div_operating_id_
                    document.querySelector('#div_operating_id_' + result[i]['id']).innerHTML = text_data_operating;

                    // ------------------------------------------
                    // add onclick to btn_marker_id_
                    let btn_marker_id = document.querySelector('#div_operating_id_' + result[i]['id']);
                    btn_marker_id.setAttribute('onclick', "joint_sos_view_data_marker(" + result[i]['id'] + ",'" + result[i]['name'] + "'," + result[i]['distance'].toFixed(2) + ",'" + result[i]['level'] + "'," + result[i]['lat'] + "," + result[i]['lng'] + ");");

                }

            });

    }

    function joint_sos_view_data_marker(id, name, distance, level, lat, lng) {

        if (joint_sos_directionsDisplay) {
            joint_sos_directionsDisplay.setMap(null);
            // document.querySelector('#div_text_Directions').classList.add('d-none');
        }

        if (joint_sos_view_infoWindow) {
            joint_sos_view_infoWindow.setMap(null);
        }
        if (joint_sos_start_infoWindow[0]) {
            joint_sos_start_infoWindow[0].setMap(null);
            joint_sos_start_infoWindow[1].setMap(null);
            joint_sos_start_infoWindow[2].setMap(null);
        }
        const myLatlng = {
            lat: parseFloat(lat),
            lng: parseFloat(lng)
        };

        let contentString =
            '<div id="content data_sos_map">' +
            '<div  class="data-officer-item d-flex align-items-center  p-2 cursor-pointer">' +
            ' <div class="level  ' + level + ' d-flex align-items-center ">' +
            ' <center> ' + level + '</center>' +
            '</div>' +
            '<div class="ms-2">' +
            '<h6 class="mb-1 font-14">' + name + '</h6>' +
            '<p class="mb-0 font-13 text-secondary">ระยะห่าง(รัศมี) ≈ ' + distance + ' กม. </p>' +
            '</div>' +
            '</div>' +
            '</div>';

        joint_sos_view_infoWindow = new google.maps.InfoWindow({
            content: contentString,
            position: myLatlng,
        });

        joint_sos_view_infoWindow.open(map_joint_sos_1669);

    }

    function joint_sos_set_active_btn_menu_select(level, vehicle_type) {
        //  LEVEL
        document.querySelector('.menu-select-lv-all').classList.remove("all-active");
        document.querySelector('.menu-select-lv-fr').classList.remove("fr-active");
        document.querySelector('.menu-select-lv-bls').classList.remove("bls-active");
        document.querySelector('.menu-select-lv-ils').classList.remove("ils-active");
        document.querySelector('.menu-select-lv-als').classList.remove("als-active");

        document.querySelector('.menu-select-lv-' + level).classList.add(level + "-active");

        // VEHICLE TYPE
        document.querySelector('.menu-select-vehicle-all').classList.remove("vehicle-one-officer-active");
        document.querySelector('.menu-select-vehicle-car').classList.remove("vehicle-one-officer-active");
        document.querySelector('.menu-select-vehicle-aircraft').classList.remove("vehicle-one-officer-active");
        document.querySelector('.menu-select-vehicle-boat-1').classList.remove("vehicle-one-officer-active");
        document.querySelector('.menu-select-vehicle-boat-2').classList.remove("vehicle-one-officer-active");
        document.querySelector('.menu-select-vehicle-boat-3').classList.remove("vehicle-one-officer-active");
        document.querySelector('.menu-select-vehicle-boat-other').classList.remove("vehicle-one-officer-active");

        let text_vehicle_type;

        switch (vehicle_type) {
            case 'all':
                text_vehicle_type = "all";
                break;
            case 'รถ':
                text_vehicle_type = "car";
                break;
            case 'อากาศยาน':
                text_vehicle_type = "aircraft";
                break;
            case 'เรือ ป.1':
                text_vehicle_type = "boat-1";
                break;
            case 'เรือ ป.2':
                text_vehicle_type = "boat-2";
                break;
            case 'เรือ ป.3':
                text_vehicle_type = "boat-3";
                break;
            case 'เรือประเภทอื่นๆ':
                text_vehicle_type = "boat-other";
                break;
        }
        document.querySelector('.menu-select-vehicle-' + text_vehicle_type).classList.add("vehicle-one-officer-active");
    }

    function joint_sos_select_level() {

        let level = document.querySelector('#joint_sos_input_select_level').value;
        level = level.toLowerCase();
        let vehicle_type = document.querySelector('#joint_sos_input_vehicle_type').value;

        level = level.toLowerCase();
        // set_active_btn_menu_select(level , vehicle_type);
        // ------------------------------------------------------------------------------

        document.querySelector('#joint_sos_card_data_operating').innerHTML = "";

        for (var select_level_i = 0; select_level_i < joint_sos_location_unit_markers.length; select_level_i++) {
            joint_sos_location_unit_markers[select_level_i].setMap(null);
        }

        let sos_lat = document.querySelector('#lat');
        let sos_lng = document.querySelector('#lng');
        // console.log(parseFloat(lat.value));
        // console.log(parseFloat(lng.value));

        let m_lat = "";
        let m_lng = "";
        let m_numZoom = "";

        if (sos_lat.value && sos_lng.value) {
            m_lat = parseFloat(sos_lat.value);
            m_lng = parseFloat(sos_lng.value);
            m_numZoom = parseFloat('14');
        } else {
            m_lat = parseFloat('12.870032');
            m_lng = parseFloat('100.992541');
            m_numZoom = parseFloat('6');
        }

        // console.log('select_level');
        joint_sos_operating_unit(m_lat, m_lng, level, vehicle_type, 'select_level');

    }

    function select_joint_sos_officer(select_id, distance, operating_unit_id,officer_id) {

        // console.log(select_id);
        document.querySelector('#show_error_noselect').classList.add('d-none');

        let list_joint_sos_officer = document.querySelector('#list_joint_sos_officer');
        let check_checkbox = document.querySelector('#select_joint_sos_officer_id_'+ officer_id + '_user_id_' + select_id).checked;

        let arr_id;

        if (check_checkbox) {
            // true
            if (list_joint_sos_officer.value) {
                list_joint_sos_officer.value = list_joint_sos_officer.value + ',' + select_id + '-' + distance + '-' + operating_unit_id;
            } else {
                list_joint_sos_officer.value = select_id + '-' + distance + '-' + operating_unit_id;
            }

        } else {
            // false
            arr_id = list_joint_sos_officer.value.split(',');

            let index = arr_id.indexOf(select_id.toString() + '-' + distance + '-' + operating_unit_id);

            if (index !== -1) {
                // ลบค่าออกจากตัวแปร values
                arr_id.splice(index, 1);
                // อัปเดตค่าใหม่ใน input
                list_joint_sos_officer.value = arr_id.join(',');
            }
        }

        let new_list_joint_sos_officer = document.querySelector('#list_joint_sos_officer');
        if (new_list_joint_sos_officer.value) {
            let count_select = new_list_joint_sos_officer.value.split(',');
            document.querySelector('#show_count_select_operating').innerHTML = count_select.length;
        } else {
            document.querySelector('#show_count_select_operating').innerHTML = '0';
        }

    }

    function send_data_joint_sos(sos_1669_id) {

        // console.log("sos_1669_id >> " + sos_1669_id);

        let list_joint_sos_officer = document.querySelector('#list_joint_sos_officer');
        // console.log(list_joint_sos_officer.value);

        if (list_joint_sos_officer.value) {

            document.querySelector('#show_error_noselect').classList.add('d-none');
            document.querySelector('#btn_send_data_joint_sos').innerHTML = 'ยืนยัน ' + `<i class="fa-duotone fa-spinner fa-spin-pulse"></i>`;
            let list = list_joint_sos_officer.value.replaceAll(',', '_');
            // console.log(list);

            fetch("{{ url('/') }}/api/create_joint_sos_1669" + "?sos_1669_id=" + sos_1669_id + "&list=" + list)
                .then(response => response.text())
                .then(result => {
                    // console.log(result);

                    if (result == "OK") {
                        document.querySelector('#btn_close_casualty_incident').click();
                        document.querySelector('#btn_open_modal_show_officer_joint').click();
                        document.querySelector('#btn_send_data_joint_sos').innerHTML = 'ยืนยัน';
                        document.querySelector('#list_joint_sos_officer').value = '';
                        document.querySelector('#btn_select_case_sos_joint').classList.add('d-none');
                        document.querySelector('#btn_select_operating_unit').classList.add('d-none');
                        document.querySelector('#btn_show_wait_officer_joint').classList.remove('d-none');

                        show_wait_officer_joint();
                        
                    }

                });
        } else {
            document.querySelector('#show_error_noselect').classList.remove('d-none');

        }
    }

    var count_status_officer = 0;
    var all_officer_wait_status = 0;

    function show_wait_officer_joint() {

        let sos_id = '{{ $sos_help_center->id }}';

        fetch("{{ url('/') }}/api/check_sos_joint_case" + "?sos_1669_id=" + sos_id)
            .then(response => response.json())
            .then(result => {
             	// console.log('-------------- show_wait_officer_joint ---------------');
	            // console.log('check_sos_joint_case');
	            // console.log(result);
	            // console.log(result.length);
	            // console.log('-----------------------------');

                let count_all_refuse = 0 ;
                let count_all_wait = 0 ;
	            document.querySelector('#span_warning_status_joint').classList.add('d-none');
	            document.querySelector('#span_danger_status_joint').classList.add('d-none');

	            if(result.length != 0){
	            	// console.log('result.length != 0');

	                all_officer_wait_status = result.length;
	                count_status_officer = 0;

	                let show_officer_joint_content = document.querySelector('#show_officer_joint_content');
	                show_officer_joint_content.innerHTML = '';

	                let arr_sos_id_count_time = [];
	                
	                for (let item of result) {
	                    let html_of_result = '';

	                    // console.log("id >> " + item.id);
	                    // console.log("status >> " + item.status);
	                    // console.log("wait >> " + item.wait);
	                    // console.log("operating_code >> " + item.operating_code);
	                    // console.log("time_command >> " + item.time_command);
	                    // console.log("name_wait_officer >> " + item.name_wait_officer);
	                    // console.log("name_wait_phone >> " + item.name_wait_phone);
	                    // console.log("name_wait_photo >> " + item.name_wait_photo);
	                    // console.log("name_wait_operating >> " + item.name_wait_operating);
	                    // console.log("name_wait_vehicle_type >> " + item.name_wait_vehicle_type);
	                    // console.log("name_wait_level >> " + item.name_wait_level);
	                    // console.log("joint_case >> " + item.joint_case);
	                    // console.log('--------------------');

	                    let html_footer;
	                    let html_div_class_card;
	                    let html_div_head;
	                    let status_officer;
	                    let btn_wait_officer


	                    if (item.helper_id) {
	                        count_status_officer += 1;
	                    }

	                    // console.log(item.status);
	                    
	                    if (item.status == "ปฏิเสธ") {

	                    	count_all_refuse = count_all_refuse + 1 ;

	                     	status_officer = `
		                        <span class="countTimeWaitOfficer officer-danger" >เจ้าหน้าที่ปฏิเสธเคส
		                        </span>
		                        `;

		                    btn_wait_officer = `
		                        <button class="btn btnSelectOfficerAgain" onclick="select_new_officer_sos_id(`+item.joint_case+`,`+item.id+`);">
		                            เลือกใหม่
		                        </button>
		                        `;

		                    document.querySelector('#span_danger_status_joint').classList.remove('d-none');
		                    document.querySelector('#span_text_danger_status_joint').innerHTML = count_all_refuse ;

	                    } else if (item.status == "รอการยืนยัน") {

	                    	count_all_wait = count_all_wait + 1 ;

	                        let arr_id_of_case = {};
	                        arr_id_of_case.id = item.id;
	                        arr_id_of_case.time_command = item.time_command;

	                        arr_sos_id_count_time.push(arr_id_of_case);

	                       status_officer = `
	                        <span class="countTimeWaitOfficer officer-warning" >รอการยืนยัน 
	                            <span id="timer_wait_officer_id_` + item.id + `"></span> 
	                        </span>
	                        `;

	                        btn_wait_officer = `
	                        <button class="btn btnSelectOfficerAgain" onclick="select_new_officer_sos_id(`+item.joint_case+`,`+item.id+`);">
	                            เลือกใหม่
	                        </button>
	                        `;

	                        document.querySelector('#span_warning_status_joint').classList.remove('d-none');
		                    document.querySelector('#span_text_warning_status_joint').innerHTML = count_all_wait ;

	                    } else {
	                        status_officer = `
	                        <span class="countTimeWaitOfficer officer-success" >เจ้าหน้าที่รับเคสแล้ว 
	                        </span>
	                        `;

	                        btn_wait_officer = `
	                        <a class="btn btnWaitOfficerSuccess" href="{{ url("/") }}/sos_help_center/` +  item.id+ `/edit#step-1" >
	                            ไปที่เคสนี้
	                        </a>
	                        `;

	                    }

	                    let photo_officer;
	                    if (item.name_wait_photo) {
	                        photo_officer = '{{ url("/") }}/storage/' + item.name_wait_photo;
	                    } else {
	                        photo_officer = '{{ url("/") }}/img/stickerline/Flex/9.png';
	                    }

	                    html_of_result = `
	                    <div class="colOfficer">
								<div class="card cardWaitOfficer">
									 ` + status_officer + `
									<div class="headerWaitOfficer">
										<img class="imgOfficerWait" src="{{ asset('/img/stickerline/PNG/1.png') }}">
										<div class="dataHeaderOfficer">
											<h4 class="m-0">` + item.name_wait_officer + `</h4>
											<p class="m-0"> ` + item.operating_code + `</p>
										</div>
									</div>
									<div class="bodyWaitOfficer">
										<span><b>ข้อมูล</b> </span>
										<div class="itemWaitOfficerItem">
											<i class="fa-solid fa-phone text-primary"></i>
											<span>` + item.name_wait_phone + `</span>
										</div>
										<div class="itemWaitOfficerItem">
											<i class="fa-duotone fa-car-building text-success"></i>
											<span>` + item.name_wait_operating + `</span>
										</div>
										<div class="itemWaitOfficerItem">
											<i class="fa-duotone fa-siren-on text-danger"></i>
											<span>` + item.name_wait_level + `</span>
										</div>
										<div class="itemWaitOfficerItem">
											<i class="fa-duotone fa-truck-medical text-orange"></i>
											<span>` + item.name_wait_vehicle_type + `</span>
										</div>
										<hr>
										` + btn_wait_officer + `
									</div>
								</div>
							</div>
	                    `;
	                    show_officer_joint_content.insertAdjacentHTML('beforeend', html_of_result); // แทรกล่างสุด

	                }
	                
	                startTimer_wait_officer_joint(arr_sos_id_count_time);
	                stop_loop_check_data()

     			}

            });

    }

    function stop_loop_check_data(){
         if (count_status_officer === all_officer_wait_status) {
            clearInterval(interval_check_status_officer); // หยุดการวนลูป
        }
        
    }

    let interval_check_status_officer = setInterval(() => {
        // console.log("count>>>" + count_status_officer);
        // console.log("all>>" + all_officer_wait_status);
         show_wait_officer_joint();
    }, 5000);

    // Function to start the timer
    function startTimer_wait_officer_joint(arr_sos_id_count_time) {
        let timerInterval_wait_officer_joint = [];
        let startTime_wait_officer_joint = [];

        for (let iii = 0; iii < arr_sos_id_count_time.length; iii++) {
            let timerElem_joint = document.getElementById('timer_wait_officer_id_' + arr_sos_id_count_time[iii].id);

            if (timerInterval_wait_officer_joint[iii]) {
                clearInterval(timerInterval_wait_officer_joint[iii]);
                startTime_wait_officer_joint[iii] = null;
            }

            startTime_wait_officer_joint[iii] = Date.parse(arr_sos_id_count_time[iii].time_command);

            let updateTimer_wait_officer_joint = function() {
                let elapsedTime_joint = Date.now() - startTime_wait_officer_joint[iii];
                let minutes_joint = Math.floor(elapsedTime_joint / 60000);
                let seconds_joint = Math.floor((elapsedTime_joint % 60000) / 1000);
                let timeString_joint = (minutes_joint < 10 ? '0' : '') + minutes_joint + ':' + (seconds_joint < 10 ? '0' : '') + seconds_joint;
                timerElem_joint.innerText = timeString_joint;

                timerInterval_wait_officer_joint[iii] = setTimeout(updateTimer_wait_officer_joint, 1000);
            };

            updateTimer_wait_officer_joint();
        }
    }
</script>

<!-- /////////////////////////// -->
<!-- // JS NEW SELECT OFFICER // -->
<!-- /////////////////////////// -->
<script>
    function select_new_officer_sos_id(data , click_id) {

        // console.log('*******************************************************');
        // console.log('select_new_officer_sos_id');
        // console.log('click_id >> '+ click_id);
        // console.log(data);

        document.querySelector('#btn_close_modal_show_officer_joint').click();
        document.querySelector('#btn_open_modal_new_select_officer_of_id_sos').click();

        document.querySelector('#div_for_carousel_new_select_officer').innerHTML = '';
        document.querySelector('#div_for_carousel_new_select_officer').innerHTML =
            `<div id="data_by_js_new_select_officer" class="owl-carousel owl-new_select_officer_joint owl-theme">
                <!-- data -->
            </div>
            `;

        fetch("{{ url('/') }}/api/check_sos_joint_case" + "?sos_1669_id=" + data[0])
            .then(response => response.json())
            .then(result => {
                console.log(result)
                // console.log(result.length);

                if(result.length != 0){

	                for (let xxi = 0; xxi < result.length; xxi++) {

	                    // //// แสดงข้อมูลเดิม //// //
	                    let data_by_js_new_select_officer = document.querySelector('#data_by_js_new_select_officer');

	                    let html_div_head;
	                    if (result[xxi]['status'] == "ปฏิเสธ") {
	                        html_div_head = `
	                            <span class="countTimeWaitOfficer officer-danger" >หน่วยปฏิบัติการ ปฏิเสธ 
	                            </span>
	                        `;
	                    } else if (result[xxi]['status'] == "รอการยืนยัน") {
	                        html_div_head = `
	                        <span class="countTimeWaitOfficer officer-warning" >รอการยืนยัน 
	                        </span>
	                        `;
	                    } else {
	                        html_div_head = `
	                             <span class="countTimeWaitOfficer officer-success" >เจ้าหน้าที่รับเคสแล้ว 
	                            </span>
	                        `;
	                    }

	                    let html_name_wait_level;
	                    if (result[xxi]['name_wait_level'] == "FR") {
	                        html_name_wait_level = `
	                            <span class="btn btn-sm btn-success main-radius main-shadow mt-1">
	                                FR
	                            </span>
	                        `;
	                    } else if (result[xxi]['name_wait_level'] == "BLS") {
	                        html_name_wait_level = `
	                            <span class="btn btn-sm btn-warning main-radius main-shadow mt-1">
	                                BLS
	                            </span>
	                        `;
	                    } else {
	                        html_name_wait_level = `
	                            <span class="btn btn-sm btn-danger main-radius main-shadow mt-1">
	                                ` + result[xxi]['name_wait_level'] + `
	                            </span>
	                        `;
	                    }

	                    // `+ result[xxi]['xxx'] +`
	                    let html_of_old_officer = `
	                        <div class="item containerItem">
	                            <div class="d-flex align-items-center justify-content-center ">
	                                <div class="card carSelectNewOfficer ">
	                                   ` + html_div_head + `
	                                    <div class="headerSelectNewOfficer">
	                                        <img class="imgSelectNewOfficer" src="{{ asset('/img/stickerline/PNG/1.png') }}">
	                                        <div class="dataHeaderOfficer">
	                                            <h4 class="m-0">` + result[xxi]['name_wait_officer'] + `</h4>
	                                            <p class="m-0">` + result[xxi]['operating_code'] + `</p>
	                                        </div>
	                                    </div>
	                                    <div class="bodySelectNewOfficer">
	                                        <span><b>ข้อมูล</b> </span>
	                                        <div class="itemSelectNewOfficerItem ">
	                                            <div>
	                                                <i class="fa-solid fa-phone text-primary"></i>
	                                                <span>` + result[xxi]['name_wait_phone'] + `</span>
	                                            </div>

	                                            <div>
	                                                <i class="fa-duotone fa-truck-medical text-orange"></i>
	                                                <span>` + result[xxi]['name_wait_vehicle_type'] + `</span>
	                                            </div>
	                                            <div>
	                                                <i class="fa-duotone fa-siren-on text-danger"></i>
	                                                <span>` + result[xxi]['name_wait_level'] + `</span>
	                                            </div>
	                                            <div>
	                                                <i class="fa-duotone fa-car-building text-success"></i>
	                                                <span>` + result[xxi]['name_wait_operating'] + `</span>
	                                            </div>
	                                        </div>
	                                    </div>
	                                `;

	                    let html_of_list_name_officer = `<!-- รายชื่อหน่วยปฏิบัติการ -->
	                                <div class="col-12">
	                                    <div class=" radius-10 w-100 mt-3">
	                                        <!-- BTN Select Level -->
	                                        <div class="chat-tab-menu ">
	                                            <ul class="nav nav-pills nav-justified">
	                                                <li class="nav-item">
	                                                    <a class="nav-link menu-select-lv-all all-sos_id_` + result[xxi]['id'] + `" href="javascript:;" 
	                                                    onclick="document.querySelector('#new_select_officer_input_select_level_id_` + result[xxi]['id'] + `').value = 'all';new_select_officer_level('` + result[xxi]['id'] + `');">
	                                                        <div class="font-24">ALL
	                                                        </div>
	                                                        <div><small>ทั้งหมด</small>
	                                                        </div>
	                                                    </a>
	                                                </li>
	                                                <li class="nav-item">
	                                                    <a class="nav-link  menu-select-lv-fr fr-sos_id_` + result[xxi]['id'] + `" href="javascript:;" 
	                                                    onclick="document.querySelector('#new_select_officer_input_select_level_id_` + result[xxi]['id'] + `').value = 'fr';new_select_officer_level('` + result[xxi]['id'] + `')">
	                                                        <div class="font-24">FR
	                                                            </div>
	                                                        <div>
	                                                            <small>เบื้องต้น</small>
	                                                        </div>
	                                                    </a>
	                                                </li>
	                                                <li class="nav-item">
	                                                    <a class="nav-link menu-select-lv-bls bls-sos_id_` + result[xxi]['id'] + `" href="javascript:;" 
	                                                    onclick="document.querySelector('#new_select_officer_input_select_level_id_` + result[xxi]['id'] + `').value = 'bls';new_select_officer_level('` + result[xxi]['id'] + `')">
	                                                        <div class="font-24">BLS
	                                                        </div>
	                                                        <div><small>ทั่วไป</small>
	                                                        </div>
	                                                    </a>
	                                                </li>
	                                                <li class="nav-item">
	                                                    <a class="nav-link menu-select-lv-ils ils-sos_id_` + result[xxi]['id'] + `" href="javascript:;" 
	                                                    onclick="document.querySelector('#new_select_officer_input_select_level_id_` + result[xxi]['id'] + `').value = 'ils';new_select_officer_level('` + result[xxi]['id'] + `')">
	                                                        <div class="font-24">ILS
	                                                        </div>
	                                                        <div><small>กลาง</small>
	                                                        </div>
	                                                    </a>
	                                                </li>
	                                                <li class="nav-item">
	                                                    <a class="nav-link menu-select-lv-als als-sos_id_` + result[xxi]['id'] + `" href="javascript:;" 
	                                                    onclick="document.querySelector('#new_select_officer_input_select_level_id_` + result[xxi]['id'] + `').value = 'als';new_select_officer_level('` + result[xxi]['id'] + `')">
	                                                        <div class="font-24">ALS
	                                                        </div>
	                                                        <div><small>สูง</small>
	                                                        </div>
	                                                    </a>
	                                                </li>
	                                            </ul>
	                                            <input class="d-none" type="text" name="new_select_officer_input_select_level_id_` + result[xxi]['id'] + `" id="new_select_officer_input_select_level_id_` + result[xxi]['id'] + `" value="{{ isset($data_form_yellow->operating_suit_type) ? $data_form_yellow->operating_suit_type : 'all'}}">
	                                        </div>

	                                        <!-- BTN Select vehicle  -->
	                                        <div class="owl-carousel owl-theme owlmenu-vehicle-new_select_officer p-3">
	                                            <div class="item" style="width:100%">
	                                                <a class="btn menu-select-vehicle-all vehicle-all-sos_id_` + result[xxi]['id'] + `" href="javascript:;" 
	                                                    onclick="document.querySelector('#new_select_officer_input_vehicle_type_id_` + result[xxi]['id'] + `').value = 'all';new_select_officer_level('` + result[xxi]['id'] + `');">
	                                                ทั้งหมด
	                                                </a>
	                                            </div>
	                                            <div class="item" style="width:100%">
	                                                <a class="btn menu-select-vehicle-car vehicle-car-sos_id_` + result[xxi]['id'] + `" href="javascript:;" 
	                                                    onclick="document.querySelector('#new_select_officer_input_vehicle_type_id_` + result[xxi]['id'] + `').value = 'รถ';new_select_officer_level('` + result[xxi]['id'] + `');">
	                                                รถ
	                                                </a>
	                                            </div>
	                                            <div class="item" style="width:100%">
	                                                <a class="btn menu-select-vehicle-aircraft vehicle-aircraft-sos_id_` + result[xxi]['id'] + `" href="javascript:;" 
	                                                    onclick="document.querySelector('#new_select_officer_input_vehicle_type_id_` + result[xxi]['id'] + `').value = 'อากาศยาน';new_select_officer_level('` + result[xxi]['id'] + `');">
	                                                อากาศยาน
	                                                </a>
	                                            </div>
	                                            <div class="item" style="width:100%">
	                                                <a class="btn menu-select-vehicle-boat-1 vehicle-boat-1-sos_id_` + result[xxi]['id'] + `" href="javascript:;" 
	                                                    onclick="document.querySelector('#new_select_officer_input_vehicle_type_id_` + result[xxi]['id'] + `').value = 'เรือ ป.1';new_select_officer_level('` + result[xxi]['id'] + `');">
	                                                เรือ ป.1
	                                                </a>
	                                            </div>
	                                            <div class="item" style="width:100%">
	                                                <a class="btn menu-select-vehicle-boat-2 vehicle-boat-2-sos_id_` + result[xxi]['id'] + `" href="javascript:;" 
	                                                    onclick="document.querySelector('#new_select_officer_input_vehicle_type_id_` + result[xxi]['id'] + `').value = 'เรือ ป.2';new_select_officer_level('` + result[xxi]['id'] + `');">
	                                                เรือ ป.2
	                                                </a>
	                                            </div>
	                                            <div class="item" style="width:100%">
	                                                <a class="btn menu-select-vehicle-boat-3 vehicle-boat-3-sos_id_` + result[xxi]['id'] + `" href="javascript:;" 
	                                                    onclick="document.querySelector('#new_select_officer_input_vehicle_type_id_` + result[xxi]['id'] + `').value = 'เรือ ป.3';new_select_officer_level('` + result[xxi]['id'] + `');">
	                                                เรือ ป.3
	                                                </a>
	                                            </div>
	                                            <div class="item" style="width:100%">
	                                                <a class="btn  menu-select-vehicle-boat-other vehicle-boat-other-sos_id_` + result[xxi]['id'] + `" href="javascript:;" 
	                                                onclick="document.querySelector('#new_select_officer_input_vehicle_type_id_` + result[xxi]['id'] + `').value = 'เรือประเภทอื่นๆ';new_select_officer_level('` + result[xxi]['id'] + `');">
	                                                    เรืออื่นๆ
	                                                </a>
	                                            </div>
	                                        </div>
	                                    
	                                        <input class="d-none" type="text" name="new_select_officer_input_vehicle_type_id_` + result[xxi]['id'] + `" id="new_select_officer_input_vehicle_type_id_` + result[xxi]['id'] + `" value="{{ isset($data_form_yellow->vehicle_type) ? $data_form_yellow->vehicle_type : 'all'}}" >

	                                        <input class="d-none" type="text" id="new_select_officer_of_sos_id_` + result[xxi]['id'] + `" >

	                                        <!-- ตรงนี้เลื่อนได้ -->
	                                        <div style="">
	                                            <div class="data-officer p-3 mb-3 ps ps--active-y" id="new_select_officer_card_data_operating_id_` + result[xxi]['id'] + `">
	                                                <!-- ข้อมูลหน่วยปฏิบัติการในพื้นที่ -->
	                                            </div>
	                                        </div>
	                                        <!-- จบ ตรงนี้เลื่อนได้ -->

	                                        <div class="div_bottom" style="margin-top: auto;">
	                                            <center>
	                                                <br>
	                                                <div class="row d-none" id="div_show_officer_select_sos_id_` + result[xxi]['id'] + `">
	                                                    <div class="col-9">
	                                                        <h5 id="show_officer_select_sos_id_` + result[xxi]['id'] + `">
	                                                            เลือก : <b></b> 
	                                                        </h5>
	                                                    </div>
	                                                    <div class="col-3">
	                                                        <span class="btn btn-sm btn-danger" onclick="cancel_select_sos_id('` + result[xxi]['id'] + `');">
	                                                            ยกเลิก
	                                                        </span>
	                                                    </div>
	                                                </div>
	                                                <button id="btn_send_new_select_officer_sos_id_` + result[xxi]['id'] + `" class="mt-3 btn btn-primary main-shadow main-radius" style="width: 60%;" disabled 
	                                                onclick="send_data_new_select_officer('` + result[xxi]['id'] + `');">
	                                                    ยืนยัน
	                                                </button>
	                                            </center>
	                                            <br>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                    `;

	                    if (result[xxi]['status'] == "ปฏิเสธ" || result[xxi]['status'] == "รอการยืนยัน") {
	                        html_of_old_officer = html_of_old_officer + html_of_list_name_officer;
	                    }

	                    if(result[xxi]['id'] == click_id){
		                    data_by_js_new_select_officer.insertAdjacentHTML('afterbegin', html_of_old_officer); // แทรกล่างสุด
	                    }else{
		                    data_by_js_new_select_officer.insertAdjacentHTML('beforeend', html_of_old_officer); // แทรกล่างสุด
	                    }
	                    
	                }
	            }

            });

        setTimeout(() => {
            let owl_new_select = $(".owl-new_select_officer_joint");
            owl_new_select.owlCarousel({
                items: 1,
                margin: 10,
                loop: false,
                nav: false,
                dots: false,
                autoplay: false,
                mouseDrag: false,
            });

            $('.btnOfficerNext').click(function() {
                owl_new_select.trigger('next.owl.carousel');
            })
            // Go to the previous item
            $('.btnOfficerprev').click(function() {
                owl_new_select.trigger('prev.owl.carousel', [300]);
            })

            let owl_vehicle = $(".owlmenu-vehicle-new_select_officer");
            owl_vehicle.owlCarousel({
                margin: 5,
                loop: false,
                autoWidth: true,
                nav: false,

                dots: false
            });

            open_map_new_select_officer(data);
        }, 2000);
    }

    //////////////////// open_map_new_select_officer ////////////////////
    let map_new_select_officer;
    let new_select_officer_location_unit_markers = [];

    let new_select_officer_directionsDisplay;
    let new_select_officer_view_infoWindow = "";
    let new_select_officer_start_infoWindow = [];
    let new_select_officer_marker;
    //////////////////// END open_map_new_select_officer ////////////////////

    function open_map_new_select_officer(data) {

        let sos_lat = document.querySelector('#lat');
        let sos_lng = document.querySelector('#lng');
        // console.log(parseFloat(sos_lat.value));
        // console.log(parseFloat(sos_lng.value));

        if (sos_lat.value && sos_lng.value) {

            let m_lat = parseFloat(sos_lat.value);
            let m_lng = parseFloat(sos_lng.value);
            let m_numZoom = parseFloat('14');

            map_new_select_officer = new google.maps.Map(document.getElementById("map_new_select_officer"), {
                center: {
                    lat: m_lat,
                    lng: m_lng
                },
                zoom: m_numZoom,
                icon: image_sos_joint_sos,
            });

            if (new_select_officer_marker) {
                new_select_officer_marker.setMap(null);
            }

            new_select_officer_marker = new google.maps.Marker({
                position: {
                    lat: parseFloat(m_lat),
                    lng: parseFloat(m_lng)
                },
                map: map_new_select_officer,
                icon: image_sos_joint_sos,
            });

            for (let iix = 0; iix < data.length; iix++) {
                // console.log('open_map');
                setTimeout(() => {

                    if (document.querySelector('#new_select_officer_input_select_level_id_' + data[iix])) {

                        let level_start = document.querySelector('#new_select_officer_input_select_level_id_' + data[iix]).value;
                        let vehicle_type_start = document.querySelector('#new_select_officer_input_vehicle_type_id_' + data[iix]).value;

                        // console.log('new_select_officer_search >> ' + data[iix]);
                        new_select_officer_search(m_lat, m_lng, level_start, vehicle_type_start, 'open_map', data[iix]);

                    }


                }, 1000);
            }

            document.querySelector('#wait_for_loadMap').classList.add('d-none');
            document.querySelector('.btnOfficerNext').classList.remove('d-none');
            document.querySelector('.btnOfficerprev').classList.remove('d-none');
        }


    }

    function new_select_officer_search(m_lat, m_lng, level, vehicle_type, check_click, sos_id) {
        // console.log("level >> " + level);
        // console.log("vehicle_type >> " + vehicle_type);

        level = level.toLowerCase();

        let check_forward = "{{ $sos_help_center->forward_operation_from }}";
        let forward_level = "{{ $sos_help_center->form_yellow->idc }}";

        if (forward_level) {
            forward_level = forward_level;
        } else {
            forward_level = "null";
        }

        if (check_forward && check_click == "open_map") {
            set_active_btn_menu_select_forward(forward_level);
        } else {
            new_select_officer_set_active_btn_menu_select(level, vehicle_type, sos_id)
            forward_level = "null";
        }

        // ------------------------------------------------------------------------------------------
        let data_arr = [];
        let text_data_arr = [];

        fetch("{{ url('/') }}/api/get_location_operating_unit" + "/" + m_lat + "/" + m_lng + "/" + level + "/" + vehicle_type + "/" + forward_level)
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                // console.log('result.length >> ' + result.length);

                for (let i = 0; i < result.length; i++) {
                    // for (let i = 0; i < 2; i++) {

                    // //// รายชื่อเจ้าหน้าที่ //// //
                    let new_select_officer_card_data_operating =
                        document.querySelector('#new_select_officer_card_data_operating_id_' + sos_id);

                    // add div in to new_select_officer_card_data_operating
                    let div_operating = document.createElement("div");
                    let div_operating_id = document.createAttribute("id");
                    div_operating_id.value = 'new_select_officer_sos_id_' + sos_id + '_div_operating_id_' + result[i]['id'];
                    div_operating.setAttributeNode(div_operating_id);
                    new_select_officer_card_data_operating.appendChild(div_operating);

                    switch (result[i]['level']) {
                        case "FR":
                            location_unit_marker = new google.maps.Marker({
                                position: {
                                    lat: parseFloat(result[i]['lat']),
                                    lng: parseFloat(result[i]['lng'])
                                },
                                map: map_new_select_officer,
                                icon: image_operating_unit_green,
                            });
                            joint_sos_location_unit_markers.push(location_unit_marker);
                            break;
                        case "BLS":
                            location_unit_marker = new google.maps.Marker({
                                position: {
                                    lat: parseFloat(result[i]['lat']),
                                    lng: parseFloat(result[i]['lng'])
                                },
                                map: map_new_select_officer,
                                icon: image_operating_unit_yellow,
                            });
                            joint_sos_location_unit_markers.push(location_unit_marker);
                            break;
                        default:
                            location_unit_marker = new google.maps.Marker({
                                position: {
                                    lat: parseFloat(result[i]['lat']),
                                    lng: parseFloat(result[i]['lng'])
                                },
                                map: map_new_select_officer,
                                icon: image_operating_unit_red,
                            });
                            joint_sos_location_unit_markers.push(location_unit_marker);
                    }

                    let myLatlng = {
                        lat: parseFloat(result[i]['lat']),
                        lng: parseFloat(result[i]['lng'])
                    };

                    let round_i = i + 1;

                    let check_input = document.querySelector('#new_select_officer_of_sos_id_' + sos_id);
                    let text_check_input =
                        result[i]['user_id'] + '-' + result[i]['operating_unit_id'] + '-' + result[i]['distance'].toFixed(2);

                    let html_check_input;
                    if (check_input.value == text_check_input) {
                        html_check_input = 'checked';
                    } else {
                        html_check_input = '';
                    }
 
                    let text_data_operating = `
                        <div class="data-officer-item d-flex align-items-center border-top border-bottom p-2 cursor-pointer">
                            <div class="d-md-flex align-items-center email-message px-3 py-1">
                                <div class="d-flex align-items-center">
                                    <input class="form-check-input" type="radio" ` + html_check_input + ` name="new_select_officer_sos_id_` + sos_id + `" id="new_select_officer_user_id` + result[i]['user_id'] + `" value="` + result[i]['id'] + `" onclick="new_select_officer(` + result[i]['id'] + `,'` + result[i]['user_id'] + `','` + result[i]['distance'].toFixed(2) + `','` + result[i]['operating_unit_id'] + `','` + sos_id + `','` + result[i]['name_officer'] + `');">
                                </div>
                                <div class="ms-auto">
                                    <div class="d-flex align-items-center p-2 cursor-pointer">
                                        <div class="level ` + result[i]['level'] + ` d-flex align-items-center m-2"">
                                            <center> ` + result[i]['level'] + ` </center>
                                        </div>
                                        <div style="margin-left: 10px;">
                                            <h6 class="mb-1 font-14">` + result[i]['name'] + ` (` + result[i]['vehicle_type'] + `</h6>
                                            <p class="mb-0 font-14">เจ้าหน้าที่ : ` + result[i]['name_officer'] + `</p>
                                            <p class="mb-0 font-13 text-secondary">ระยะห่าง(รัศมี) ≈ ` + result[i]['distance'].toFixed(2) + ` กม. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;

                    // new_select_officer_sos_id_'+sos_id+'_div_operating_id_
                    document.querySelector('#new_select_officer_sos_id_' + sos_id + '_div_operating_id_' + result[i]['id']).innerHTML = text_data_operating;

                    // ------------------------------------------
                    // add onclick to btn_marker_id_
                    let btn_marker_id = document.querySelector('#new_select_officer_sos_id_' + sos_id + '_div_operating_id_' + result[i]['id']);

                    btn_marker_id.setAttribute('onclick', "new_select_officer_view_data_marker(" + result[i]['id'] + ",'" + result[i]['name'] + "'," + result[i]['distance'].toFixed(2) + ",'" + result[i]['level'] + "'," + result[i]['lat'] + "," + result[i]['lng'] + ");");

                }

            });

    }

    function new_select_officer(id_officer, user_id, distance, operating_unit_id, sos_id, name_officer) {

        sos_id = sos_id.toString();

        // console.log("sos_id >> " + sos_id);
        // console.log("id_officer >> " + id_officer);
        // console.log("user_id >> " + user_id);
        // console.log("distance >> " + distance);
        // console.log("operating_unit_id >> " + operating_unit_id);
        // console.log("name_officer >> " + name_officer);
        // console.log("Oo---------------oO");

        let new_select_officer = document.querySelectorAll('input[name="new_select_officer_sos_id_' + sos_id + '"]');
        new_select_officer.forEach(new_select_officer => {

            // console.log("CHECK >> new_select_officer");
            // console.log(new_select_officer.checked);

            if (new_select_officer.checked) {
                document.querySelector('#new_select_officer_of_sos_id_' + sos_id).value =
                    user_id + '-' + operating_unit_id + '-' + distance.toString();;
                document.querySelector('#btn_send_new_select_officer_sos_id_' + sos_id).disabled = false;

                document.querySelector('#div_show_officer_select_sos_id_' + sos_id).classList.remove('d-none');
                document.querySelector('#show_officer_select_sos_id_' + sos_id).innerHTML = `เลือก : <b>` + name_officer + `</b> `;
            }

        })

    }

    function new_select_officer_level(sos_id) {

        let level = document.querySelector('#new_select_officer_input_select_level_id_' + sos_id).value;
        level = level.toLowerCase();
        let vehicle_type = document.querySelector('#new_select_officer_input_vehicle_type_id_' + sos_id).value;

        level = level.toLowerCase();
        // set_active_btn_menu_select(level , vehicle_type);
        // ------------------------------------------------------------------------------

        document.querySelector('#new_select_officer_card_data_operating_id_' + sos_id).innerHTML = "";

        for (var select_level_i = 0; select_level_i < joint_sos_location_unit_markers.length; select_level_i++) {
            joint_sos_location_unit_markers[select_level_i].setMap(null);
        }

        let sos_lat = document.querySelector('#lat');
        let sos_lng = document.querySelector('#lng');
        // console.log(parseFloat(lat.value));
        // console.log(parseFloat(lng.value));

        let m_lat = "";
        let m_lng = "";
        let m_numZoom = "";

        if (sos_lat.value && sos_lng.value) {
            m_lat = parseFloat(sos_lat.value);
            m_lng = parseFloat(sos_lng.value);
            m_numZoom = parseFloat('14');
        } else {
            m_lat = parseFloat('12.870032');
            m_lng = parseFloat('100.992541');
            m_numZoom = parseFloat('6');
        }

        // console.log('select_level');
        new_select_officer_search(m_lat, m_lng, level, vehicle_type, 'select_level', sos_id);

    }

    function new_select_officer_set_active_btn_menu_select(level, vehicle_type, sos_id) {
        //  LEVEL
        document.querySelector('.all-sos_id_' + sos_id).classList.remove("all-active");
        document.querySelector('.fr-sos_id_' + sos_id).classList.remove("fr-active");
        document.querySelector('.bls-sos_id_' + sos_id).classList.remove("bls-active");
        document.querySelector('.ils-sos_id_' + sos_id).classList.remove("ils-active");
        document.querySelector('.als-sos_id_' + sos_id).classList.remove("als-active");

        document.querySelector('.' + level + '-sos_id_' + sos_id).classList.add(level + "-active");

        // VEHICLE TYPE
        document.querySelector('.vehicle-all-sos_id_' + sos_id).classList.remove("vehicle-all-active");
        document.querySelector('.vehicle-car-sos_id_' + sos_id).classList.remove("vehicle-car-active");
        document.querySelector('.vehicle-aircraft-sos_id_' + sos_id).classList.remove("vehicle-aircraft-active");
        document.querySelector('.vehicle-boat-1-sos_id_' + sos_id).classList.remove("vehicle-boat-1-active");
        document.querySelector('.vehicle-boat-2-sos_id_' + sos_id).classList.remove("vehicle-boat-2-active");
        document.querySelector('.vehicle-boat-3-sos_id_' + sos_id).classList.remove("vehicle-boat-3-active");
        document.querySelector('.vehicle-boat-other-sos_id_' + sos_id).classList.remove("vehicle-boat-other-active");

        let text_vehicle_type;

        switch (vehicle_type) {
            case 'all':
                text_vehicle_type = "all";
                break;
            case 'รถ':
                text_vehicle_type = "car";
                break;
            case 'อากาศยาน':
                text_vehicle_type = "aircraft";
                break;
            case 'เรือ ป.1':
                text_vehicle_type = "boat-1";
                break;
            case 'เรือ ป.2':
                text_vehicle_type = "boat-2";
                break;
            case 'เรือ ป.3':
                text_vehicle_type = "boat-3";
                break;
            case 'เรือประเภทอื่นๆ':
                text_vehicle_type = "boat-other";
                break;
        }
        document.querySelector('.vehicle-' + text_vehicle_type + '-sos_id_' + sos_id).classList.add("vehicle-" + text_vehicle_type + "-active");
    }

    function new_select_officer_view_data_marker(id, name, distance, level, lat, lng) {

        if (new_select_officer_directionsDisplay) {
            new_select_officer_directionsDisplay.setMap(null);
            // document.querySelector('#div_text_Directions').classList.add('d-none');
        }

        if (new_select_officer_view_infoWindow) {
            new_select_officer_view_infoWindow.setMap(null);
        }
        if (new_select_officer_start_infoWindow[0]) {
            new_select_officer_start_infoWindow[0].setMap(null);
            new_select_officer_start_infoWindow[1].setMap(null);
            new_select_officer_start_infoWindow[2].setMap(null);
        }
        const myLatlng = {
            lat: parseFloat(lat),
            lng: parseFloat(lng)
        };

        let contentString =
            '<div id="content data_sos_map">' +
            '<div  class="data-officer-item d-flex align-items-center  p-2 cursor-pointer">' +
            ' <div class="level  ' + level + ' d-flex align-items-center ">' +
            ' <center> ' + level + '</center>' +
            '</div>' +
            '<div class="ms-2">' +
            '<h6 class="mb-1 font-14">' + name + '</h6>' +
            '<p class="mb-0 font-13 text-secondary">ระยะห่าง(รัศมี) ≈ ' + distance + ' กม. </p>' +
            '</div>' +
            '</div>' +
            '</div>';

        new_select_officer_view_infoWindow = new google.maps.InfoWindow({
            content: contentString,
            position: myLatlng,
        });

        new_select_officer_view_infoWindow.open(map_new_select_officer);

    }


    function cancel_select_sos_id(sos_id) {

        // console.log('cancel_select_sos_id >> ' + sos_id);
        document.querySelector('#new_select_officer_of_sos_id_' + sos_id).value = '';
        document.querySelector('#btn_send_new_select_officer_sos_id_' + sos_id).disabled = true;
        document.querySelector('#div_show_officer_select_sos_id_' + sos_id).classList.add('d-none');

        let new_select_officer = document.querySelectorAll('input[name="new_select_officer_sos_id_' + sos_id + '"]');
        new_select_officer.forEach(new_select_officer => {

            if (new_select_officer.checked) {
                new_select_officer.checked = false;
            }

        })

    }

    function send_data_new_select_officer(sos_id) {

        document.querySelector('#btn_send_new_select_officer_sos_id_' + sos_id).innerHTML = `
            <i class="fa-duotone fa-spinner fa-spin-pulse"></i> กำลังส่งข้อมูล
        `;

        let new_select_officer_of_sos_id = document.querySelector('#new_select_officer_of_sos_id_' + sos_id);
        let arr_input = new_select_officer_of_sos_id.value.split('-');

        let officer_id = arr_input[0];
        let operating_unit_id = arr_input[1];
        let distance = arr_input[2];

        // console.log("sos_id >> " + sos_id);
        // console.log("officer_id >> " + officer_id);
        // console.log("operating_unit_id >> " + operating_unit_id);
        // console.log("distance >> " + distance);

        fetch("{{ url('/') }}/api/send_data_new_select_officer" + "?sos_id=" + sos_id + "&officer_id=" + officer_id + "&operating_unit_id=" + operating_unit_id + "&distance=" + distance)
            .then(response => response.text())
            .then(result => {
                // console.log(result);
                if (result == 'OK') {
                    document.querySelector('#btn_send_new_select_officer_sos_id_' + sos_id).innerHTML = `
                        <i class="fa-solid fa-check fa-beat"></i> ส่งข้อมูลเรียบร้อยแล้ว
                    `;
                    document.querySelector('#btn_send_new_select_officer_sos_id_' + sos_id).setAttribute('class', 'mt-3 btn btn-success main-shadow main-radius');
                    document.querySelector('#btn_send_new_select_officer_sos_id_' + sos_id).setAttribute('onclick', '');
                }
            });

    }
</script>