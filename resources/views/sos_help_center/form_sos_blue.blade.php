
<div class="row">
	<div class="col-xl-12 mx-auto">
		<div class="card-body">
            <div id="wizard_blue_form">
				<ul class="nav">
					<!-- <li class="nav-item">
						<button style="position: relative;z-index: 999999;border-radius: 50px;" class="btn btn-info shadow" id="prev-btn-form-blue" type="button"><i class="fa-solid fa-chevron-left"></i></button>
					</li> -->
					<li class="nav-item">
						<a id="step_blue_1" class="nav-link danger" href="#blue-1" > 
							<strong>หน่วย</strong>
						</a>
					</li> 
					<li class="nav-item">
						<a class="nav-link danger" href="#blue-2" > 
							<strong>เวลา</strong>
						</a>
					</li>
                    <li class="nav-item">
						<a class="nav-link danger" href="#blue-3" > 
							<strong>ผู้เจ็บป่วย</strong>
						</a>
					</li> 
					<li class="nav-item">
						<a class="nav-link danger" href="#blue-4" > 
							<strong>เกณฑ์การตัดสินใจ</strong>
						</a>
					</li>
                    <li class="nav-item">
						<a class="nav-link danger" href="#blue-5" > 
							<strong>การประเมิน</strong>
						</a>
					</li> 
					<li class="nav-item">
						<a class="nav-link danger" href="#blue-6" > 
							<strong>ผลการรรักษา</strong>
						</a>
					</li>
				</ul>
				<style>
				.toolbar{
                    display: flex;
                    justify-content: space-between;
                }
				</style>
			

				<div class="tab-content">

					<!---------------------------------- ข้อ 1  ---------------------------------->
					<div id="blue-1" class="tab-pane" role="tabpanel" aria-labelledby="blue-1">
						<div class="card-title d-flex align-items-center">
							<div><i class="fa-solid fa-people-group me-1 font-22 text-primary"></i>
							</div>
							<h5 class="mb-0 text-primary">หน่วยปฎิบัติการ</h5>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-6">
								<label for="blue_organization_helper" class="form-label">ชื่อหน่วยปฏิบัติการ</label>
								<div class="input-group"> <span class="input-group-text bg-white radius-1" ><i class="fa-duotone fa-shield-halved"></i></span>
									<input type="text" class="form-control border-start-0 radius-2" name="blue_organization_helper" value="{{ isset($sos_help_center->organization_helper) ? $sos_help_center->organization_helper : ''}}" placeholder="หน่วยปฏิบัติการ" readonly>
								</div>
							</div>
							<div class="col-md-3">
								<label for="created_at" class="form-label">วันที่</label>
								<div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-calendar-days"></i></span>
									<input type="dateime" class="form-control border-start-0 radius-2" name="created_at" value="{{ isset($sos_help_center->created_at) ? $sos_help_center->created_at : ''}}" placeholder="วันที่" readonly>
								</div>
							</div>
                            <div class="col-md-3">
								<label for="id" class="form-label">ปฏิบัติการที่</label>
								<div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-regular fa-memo-pad"></i></span>
									<input type="text" class="form-control border-start-0 radius-2" name="id" value="{{ isset($sos_help_center->id) ? $sos_help_center->id : ''}}" placeholder="ปฏิบัติการที่" readonly>
								</div>
							</div>
                            <div class="col-12 mt-4">
								<label for="data_helper" class="form-label">เจ้าหน้าที่ผู้ให้บริการ</label>
                            </div>
                            <style>
                                .img-helper{
                                    border-radius: 10px;
                                    width: 80px;
                                    object-fit: cover;
                                }.detail-helper{
                                    white-space: nowrap;
                                    overflow: hidden;
                                    text-overflow: ellipsis;
                                    width: 100%;
                                }
                            </style>

                            <!-- /////////////////////////////////////////////// data helper ////////////////////////////////////////////// -->
                            <div class="col-6">
                                <div class="card radius-6 p-3 d-flex">
                                    <div class="row">
                                        <div class="col-3">
                                            <img class="img-helper" src="{{ url('storage')}}/{{ Auth::user()->photo }}" alt="">
                                        </div>
                                        <div class="col-9 d-flex align-items-center">
                                            <div class="p-2 detail-helper">
                                                <h4 class="p-0 m-0">ชื่อ : {{ Auth::user()->name }}</h4>
                                                <h6 class="p-0 m-0">รหัส : 60122420123</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /////////////////////////////////////////////// data helper ////////////////////////////////////////////// -->


                            <div class="col-12 mt-1">
								<label for="result" class="form-label">ผลการปฏิบัติงาน</label>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class=" col-12">
                                        <label>
                                            <input type="radio" name="blue_help_result" value="ไม่พบเหตุ"  class="card-input-red card-input-element d-none" >
                                            <div class="card card-body d-flex flex-row justify-content-between align-items-center text-danger" >
                                                <b>
                                                    ไม่พบเหตุ
                                                </b>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="">
                                        <label>
                                            <input type="radio"  name="blue_help_result" value="พบเหตุ"  class="card-input-element d-none" >
                                            <div class="card card-body d-flex flex-row-reverse  justify-content-between align-items-center">
                                                <b>
                                                    พบเหตุ
                                                </b>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
								<label for="blue_location_sos" class="form-label">สถานที่เกิดเหตุ</label>
								<div class="input-group"> <span class="input-group-text bg-white radius-1" ><i class="fa-solid fa-location-exclamation"></i></span>
									<input type="text" class="form-control border-start-0 radius-2" name="blue_location_sos" value="{{ isset($sos_help_center->location_sos) ? $sos_help_center->location_sos : ''}}" placeholder="สถานที่เกิดเหตุ">
								</div>
							</div>
							<div class="col-md-6">
								<label for="blue_dateil_sos" class="form-label">เหตุการณ์</label>
								<div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-person-burst"></i></span>
									<input type="text" class="form-control border-start-0 radius-2" name="blue_dateil_sos" value="{{ isset($sos_help_center->dateil_sos) ? $sos_help_center->dateil_sos : ''}}" placeholder="เหตุการณ์">
								</div>
							</div>
                        </div>
					</div>

					<!---------------------------------- ข้อ 2  ---------------------------------->
					<div id="blue-2" class="tab-pane" role="tabpanel" aria-labelledby="blue-2">
                        <div class="card-title d-flex align-items-center">
							<div><i class="fa-solid fa-truck-clock me-1 font-22 text-primary"></i>
							</div>
							<h5 class="mb-0 text-primary">ข้อมูลเวลา</h5>
						</div>
						<hr>
                        <div class="col-12">
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
                                                <input class="form-control" type="time" name="blue_time_create_sos" id="blue_time_create_sos" value="">
                                            </td>
                                            <td>
                                                <input class="form-control" type="time" name="blue_time_command" id="blue_time_command" value="">
                                            </td>
                                            <td>
                                                <input class="form-control" type="time" name="blue_time_go_to_help" id="blue_time_go_to_help" value="">
                                            </td>
                                            <td>
                                                <input class="form-control" type="time" name="blue_time_to_the_scene" id="blue_time_to_the_scene" value="">
                                            </td>
                                            <td>
                                                <input class="form-control" type="time" name="blue_time_leave_the_scene" id="blue_time_leave_the_scene" value="">
                                            </td>
                                            <td>
                                                <input class="form-control" type="time" name="blue_time_hospital" id="blue_time_hospital" value="">
                                            </td>
                                            <td>
                                                <input class="form-control" type="time" name="blue_time_to_the_operating_base" id="blue_time_to_the_operating_base" value="">
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
                                                <input class="form-control" type="number" min="0" name="blue_km_create_sos_to_go_to_help" id="blue_km_create_sos_to_go_to_help" value="">
                                            </td>
                                            <td colspan="2">
                                                <input class="form-control" type="number"min="0" name="blue_km_to_the_scene_to_leave_the_scene" id="blue_km_to_the_scene_to_leave_the_scene" value="">
                                            </td>
                                            <td>
                                                <input class="form-control"type="number" min="0" name="blue_km_hospital" id="blue_km_hospital" value="">
                                            </td>
                                            <td>
                                                <input class="form-control" type="number" min="0" name="blue_km_operating_base" id="blue_km_operating_base" value="">
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

					<!---------------------------------- ข้อ 3  ---------------------------------->
                    <div id="blue-3" class="tab-pane" role="tabpanel" aria-labelledby="blue-3">
                        <div class="card-title d-flex align-items-center">
							<div><i class="fa-solid fa-truck-clock me-1 font-22 text-primary"></i>
							</div>
							<h5 class="mb-0 text-primary">ผู้เจ็บป่วย</h5>
						</div>
						<hr>
                        <div class="row">
                            <div class="col-md-6">
								<label for="blue_name_title" class="form-label">คำนำหน้าชื่อผู้ป่วย</label>
								<div class="input-group"> <span class="input-group-text bg-white radius-1" ><i class="fa-solid fa-location-exclamation"></i></span>
									<input type="text" class="form-control border-start-0 radius-2" name="blue_name_title" value="" placeholder="คำนำหน้าชื่อผู้ป่วย">
								</div>
							</div>
							<div class="col-md-6">
								<label for="blue_age" class="form-label">อายุ</label>
								<div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-person-burst"></i></span>
									<input type="text" class="form-control border-start-0 radius-2" name="blue_age" value="" placeholder="อายุ">
								</div>
							</div>
                            <div class="col-12 mt-3">
								<label class="form-label">เพศ</label>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_gender" value="ชาย"  class=" card-input-element d-none" >
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                <i class="fa-solid fa-mars"></i> ชาย
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                                <style> 
                                .text-female{
                                    color:#e5518d !important;;
                                    }
                                    .card-input-female:checked+.card {
                                    border: 2px solid #e5518d !important;
                                    color: #fff !important;
                                    background-color: #e5518d !important;
                                    -webkit-transition: border .3s;
                                    -o-transition: border .3s;
                                    transition: border .3s;
                                    }
                                   
                                </style>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div>
                                    <label>
                                        <input type="radio"  name="blue_gender" value="หญิง"  class="card-input-female card-input-element d-none" >
                                        <div class="card card-body d-flex flex-row-reverse text-female justify-content-between align-items-center">
                                            <b >
                                                <i class="fa-solid fa-venus"></i> หญิง
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 mt-3">
								<label class="form-label">ประเภท</label>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_people_type" value="คนไทย"  class=" card-input-element d-none" onchange="blue_check_type_people()">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 คนไทย
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_people_type" value="แรงงานต่างด้าว"  class=" card-input-element d-none" onchange="blue_check_type_people()">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 แรงงานต่างด้าว
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_people_type" value="ชาวต่างชาติ"  class=" card-input-element d-none" onchange="blue_check_type_people()">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 ชาวต่างชาติ
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 d-none mb-3" id="blue_thai_people">
                                <label  class="form-label"> </label>
								<div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-id-card"></i></span>
                                    <input type="text" class="form-control border-start-0 radius-2" id="blue_id_card" name="blue_id_card" value="" placeholder="เลขบัตรประชาชน">
								</div>
                            </div>

                            <div class="col-12 d-none mb-3" id="blue_foreigner">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="blue_people_country" class="form-label">ประเทศ</label>
                                        <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-earth-americas"></i></span>
                                            <input type="text" class="form-control border-start-0 radius-2" id="blue_people_country" name="blue_people_country" value="" placeholder="ประเทศ">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="blue_passport" class="form-label">หนังสือเดินทาง</label>
                                        <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-passport"></i></span>
                                            <input type="text" class="form-control border-start-0 radius-2" id="blue_passport" name="blue_passport" value="" placeholder="หนังสือเดินทาง">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            
                            <div class="col-12 mt-3">
								<label class="form-label">สิทธิการรักษา</label>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_treatment_rights" value="บัตรทอง"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 บัตรทอง
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_treatment_rights" value="ข้าราชการ"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 ข้าราชการ
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_treatment_rights" value="ประกันสังคม"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 ประกันสังคม
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_treatment_rights" value="แรงงานต่างด้าวขึ้นทะเบียน"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 แรงงานต่างด้าวขึ้นทะเบียน
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_treatment_rights" value="ไม่มีหลักประกัน"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 ไม่มีหลักประกัน
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>



                            <div class="col-12 mt-3">
								<label for="result" class="form-label">ประกันอื่นๆ (ถ้ามี)</label>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_insurance" value="ประกันท่องเที่ยว"  class=" card-input-element d-none" onchange="blue_check_insurance()">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 ประกันท่องเที่ยว
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_insurance" value="ผู้ประสบภัยจากรถ"  class=" card-input-element d-none" onchange="blue_check_insurance()">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 ผู้ประสบภัยจากรถ  
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 d-none" id="blue_div_insurance_country">
                                <label for="blue_insurance_country" class="form-label">ประเทศ</label>
								<div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-earth-americas"></i></span>
                                    <input type="text" class="form-control border-start-0 radius-2" id="blue_insurance_country" name="blue_insurance_country" value="" placeholder="ประเทศ">
								</div>
                            </div>

                            <div class="row d-none" id="blue_div_insurance_car">
                                 <div class="col-3">
                                    <label for="blue_insurance_type_car" class="form-label">ประเภทรถ</label>
                                    <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-car-bus"></i></span>
                                        <input type="text" class="form-control border-start-0 radius-2" id="blue_insurance_type_car" name="blue_insurance_type_car" value="" placeholder="ประเภทรถ">
                                    </div>
                                </div>

                                <div class="col-3">
                                    <label for="blue_insurance_type_license_plate" class="form-label">ทะเบียนรถหมวด</label>
								    <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-car-rear"></i></span>
                                        <input type="text" class="form-control border-start-0 radius-2" id="blue_insurance_type_license_plate" name="blue_insurance_type_license_plate" value="" placeholder="ทะเบียนรถหมวด">
								    </div>
                                </div>

                                <div class="col-3">
                                    <label for="blue_insurance_license_plate" class="form-label">เลขทะเบียน</label>
								    <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-regular fa-input-numeric"></i></span>
                                        <input type="text" class="form-control border-start-0 radius-2" id="blue_insurance_license_plate" name="blue_insurance_license_plate" value="" placeholder="เลขทะเบียน">
								    </div>
                                </div>

                                <div class="col-3">
                                    <label for="blue_insurance_province" class="form-label">จังหวัด</label>
								    <div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-map-location"></i></span>
                                        <input type="text" class="form-control border-start-0 radius-2" id="blue_insurance_province" name="blue_insurance_province" value="" placeholder="จังหวัด">
								    </div>
                                </div>
                            </div>


                            <div class="col-12 d-flex justify-content-center">
                                <div class="card-title d-flex align-items-center text-center mt-3">
                                    <h5 class="mb-0 text-primary">สภาพผู้ป่วย</h5>
                                </div>
                            </div>
                            <hr>
                           
                            <div class="col-12 ">
								<label class="form-label"> <b>ประเภทผู้ป่วย</b> </label>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_type_patient" value="บาดเจ็บ/อุบัติเหตุ"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 บาดเจ็บ/อุบัติเหตุ
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_type_patient" value="ป่วยฉุกเฉิน"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 ป่วยฉุกเฉิน  
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="col-12 ">
								<label class="form-label"> <b>สัญญาณชีพ และความรู้สึกตัว</b> </label>
                            </div>
                            <div class="col-2">
                                <div class="mb-3">
                                    <label class="form-label">เวลา:</label>
                                    <input type="datetime-local" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">ระดับน้ำตาล</label>
                                    <input type="text" class="form-control">
                                </div>
                           </div>
                           <div class="col-5">
                                <div class="card  p-3">
                                    <h6 class="text-center">
                                        Vital Signs
                                    </h6>
                                    <div class="mb-3">
                                        <label for="temperature" class="form-label">อุณหภูมิ</label>
                                        <div class="input-group"> <span class="input-group-text bg-white radius-1" ><i class="fa-regular fa-temperature-three-quarters"></i></span>
                                            <input type="text" class="form-control border-start-0 radius-2" name="blue_temperature" value="" placeholder="อุณหภูมิ">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="blood_pressure" class="form-label">ความดันโลหิต</label>
                                        <div class="input-group"> <span class="input-group-text bg-white radius-1" ><i class="fa-solid fa-droplet"></i></span>
                                            <input type="text" class="form-control border-start-0 radius-2" name="blue_blood_pressure" value="" placeholder="ความดันโลหิต">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pulse" class="form-label">ชีพจร</label>
                                        <div class="input-group"> <span class="input-group-text bg-white radius-1" ><i class="fa-regular fa-wave-pulse"></i></span>
                                            <input type="text" class="form-control border-start-0 radius-2" name="blue_pulse" value="" placeholder="ชีพจร">
                                        </div>
                                    </div>
                                    <div>
                                        <label for="respiration" class="form-label">อัตราหายใจ</label>
                                        <div class="input-group"> <span class="input-group-text bg-white radius-1" ><i class="fa-solid fa-lungs"></i></span>
                                            <input type="text" class="form-control border-start-0 radius-2" name="blue_respiration" value="" placeholder="อัตราหายใจ">
                                        </div>
                                    </div>
                                </div>
                           </div>
                           <div class="col-5">
                                <div class="card p-3">
                                    <h6 class="text-center">
                                        Neoru Signs
                                    </h6>
                                    <div class="mb-3">
                                        <label for="name_title" class="form-label">ประเมินการลืมตา (E)</label>
                                        <div class="input-group"> <span class="input-group-text bg-white radius-1" ><i class="fa-solid fa-eye"></i></span>
                                            <input type="text" class="form-control border-start-0 radius-2" name="blue_name_title" value="" placeholder="ระดับการลืมตา">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name_title" class="form-label">ประเมินการสื่อภาษา (V)</label>
                                        <div class="input-group"> <span class="input-group-text bg-white radius-1" ><i class="fa-solid fa-comment-lines"></i></span>
                                            <input type="text" class="form-control border-start-0 radius-2" name="blue_name_title" value="" placeholder="ระดับการสื่อสาร">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name_title" class="form-label">ประเมินการเคลื่อนไหว  (M)</label>
                                        <div class="input-group"> <span class="input-group-text bg-white radius-1" ><i class="fa-solid fa-child-reaching"></i></span>
                                            <input type="text" class="form-control border-start-0 radius-2" name="blue_name_title" value="" placeholder="ระดับการเคลื่อนไหว">
                                        </div>
                                    </div>
                                </div>
                           </div>
                            

                            <div class="col-12 mt-3">
								<label class="form-label"> <b>ความรู้สึกตัว</b> </label>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_consciousness" value="รู้สึกตัวดี"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 รู้สึกตัวดี
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_consciousness" value="ซึม"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 ซึม 
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_consciousness" value="หมดสติปลุกตื่น"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 หมดสติปลุกตื่น
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_consciousness" value="หมดสติปลุกไม่ตื่น"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 หมดสติปลุกไม่ตื่น  
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_consciousness" value="แอะอะโวยวาย"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 แอะอะโวยวาย
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>


                            <div class="col-12 mt-3">
								<label class="form-label"> <b>การหายใจ</b> </label>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_breathing" value="ปกติ"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 ปกติ
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_breathing" value="เร็ว"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 เร็ว 
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_breathing" value="ช้า"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 ช้า
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_breathing" value="ไม่สม่ำเสมอ"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 ไม่สม่ำเสมอ  
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_breathing" value="ไม่หายใจ"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 ไม่หายใจ
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 mt-3">
								<label class="form-label"> <b>บาดแผล</b> </label>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="checkbox" name="blue_wound" value="ไม่มี"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 ไม่มี
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="checkbox" name="blue_wound" value="แผลถลอก"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 แผลถลอก 
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="checkbox" name="blue_wound" value="ฉีกขาด/ตัด"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 ฉีกขาด/ตัด
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="checkbox" name="blue_wound" value="แผลฝกช้ำ"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 แผลฝกช้ำ  
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="checkbox" name="blue_wound" value="แผลไหม้"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 แผลไหม้
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="checkbox" name="blue_wound" value="ถูกยิง"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 ถูกยิง 
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="checkbox" name="blue_wound" value="ถูกแทง"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 ถูกแทง
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_wound" value="อวัยวะตัดขาด"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 อวัยวะตัดขาด  
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_wound" value="ถูกระเบิด"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 ถูกระเบิด
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 mt-3">
								<label class="form-label"> <b>กระดูกผิดรูป</b> </label>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_deformed_bone" value="ไม่มี"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 ไม่มี
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_deformed_bone" value="ผิดรูป"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 ผิดรูป 
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>


                            <div class="col-12 mt-3">
								<label class="form-label"> <b>อวัยวะ</b> </label>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="checkbox" name="blue_organ" value="ศรีษะ/คอ"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 ศรีษะ/คอ
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="checkbox" name="blue_organ" value="ใบหน้า"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 ใบหน้า
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="checkbox" name="blue_organ" value="สันหลัง/หลัง"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 สันหลัง/หลัง
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="checkbox" name="blue_organ" value="หน้าอก/ไหปลาร้า"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 หน้าอก/ไหปลาร้า
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="checkbox" name="blue_organ" value="ช่องท้อง"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 ช่องท้อง
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="checkbox" name="blue_organ" value="เชิงกราน"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 เชิงกราน
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="checkbox" name="blue_organ" value="Extremities"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 Extremities
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="checkbox" name="blue_organ" value="ผิวหนัง"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 ผิวหนัง
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="checkbox" name="blue_organ" value="Multiple injury back"  class=" card-input-element d-none">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                 Multiple injury back
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-center">
                                <div class="card-title d-flex align-items-center text-center mt-3">
                                    <h5 class="mb-0 text-primary">การช่วยเหลือ</h5>
                                </div>
                            </div>
                            <hr>
                            
                            <div class="col-12 mt-3">
								<label class="form-label"> <b>ทางเดินหายใจ</b> </label>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <label>
                                    <input type="checkbox" name="blue_respiratory_tract" value="ไม่ได้ทำ"  class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                        <b>
                                            ไม่ได้ทำ
                                        </b>
                                    </div>
                                </label>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <label>
                                    <input type="checkbox" name="blue_respiratory_tract" value="จัดท่าผู้ป่วย"  class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                        <b>
                                            จัดท่าผู้ป่วย
                                        </b>
                                    </div>
                                </label>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <label>
                                    <input type="checkbox" name="blue_respiratory_tract" value="เปิดทางเดินหายใจ"  class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                        <b>
                                            เปิดทางเดินหายใจ
                                        </b>
                                    </div>
                                </label>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <label>
                                    <input type="checkbox" name="blue_respiratory_tract" value="ช่วยหายใจ"  class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                        <b>
                                            ช่วยหายใจ
                                        </b>
                                    </div>
                                </label>
                            </div>

                            <div class="col-12 mt-3">
								<label class="form-label"> <b>การห้ามเลือด</b> </label>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <label>
                                    <input type="checkbox" name="blue_hemostasis" value="ไม่ได้ทำ"  class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                        <b>
                                            ไม่ได้ทำ
                                        </b>
                                    </div>
                                </label>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <label>
                                    <input type="checkbox" name="blue_hemostasis" value="การกดห้ามเลือด"  class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                        <b>
                                            การกดห้ามเลือด
                                        </b>
                                    </div>
                                </label>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <label>
                                    <input type="checkbox" name="blue_hemostasis" value="ทำแผล"  class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                        <b>
                                            ทำแผล
                                        </b>
                                    </div>
                                </label>
                            </div>

                            <div class="col-12 mt-3">
								<label class="form-label"> <b>การดามกระดูก</b> </label>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <label>
                                    <input type="checkbox" name="blue_bone_splint" value="ไม่ได้ทำ"  class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                        <b>
                                            ไม่ได้ทำ
                                        </b>
                                    </div>
                                </label>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <label>
                                    <input type="checkbox" name="blue_bone_splint" value="เฝือกลม/ไม้ดาม"  class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                        <b>
                                            เฝือกลม/ไม้ดาม
                                        </b>
                                    </div>
                                </label>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <label>
                                    <input type="checkbox" name="blue_bone_splint" value="เฝือกดามคอและกระดานรองหลังยาว"  class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                        <b>
                                            เฝือกดามคอและกระดานรองหลังยาว
                                        </b>
                                    </div>
                                </label>
                            </div>

                            <div class="col-12 mt-3">
								<label class="form-label"> <b>ช่วยฟื้นคืนชีพ</b> </label>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <label>
                                    <input type="checkbox" name="blue_help_revive" value="ไม่ได้ทำ"  class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                        <b>
                                            ไม่ได้ทำ
                                        </b>
                                    </div>
                                </label>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <label>
                                    <input type="checkbox" name="blue_help_revive" value="ทำ"  class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                        <b>
                                           ทำ
                                        </b>
                                    </div>
                                </label>
                            </div>


                            <div class="col-12 mt-3">
								<label class="form-label"> <b>ผลการดูแลรักษาเบื้องต้น</b> </label>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <label>
                                    <input type="checkbox" name="blue_results_of_care" value="ไม่ยอมให้รักษา"  class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                        <b>
                                        ไม่ยอมให้รักษา
                                        </b>
                                    </div>
                                </label>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <label>
                                    <input type="checkbox" name="blue_results_of_care" value="ทุเลา"  class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                        <b>
                                           ทุเลา
                                        </b>
                                    </div>
                                </label>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <label>
                                    <input type="checkbox" name="blue_results_of_care" value="คงเดิม"  class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                        <b>
                                           คงเดิม
                                        </b>
                                    </div>
                                </label>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <label>
                                    <input type="checkbox" name="blue_results_of_care" value="ทรุดหนัก"  class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                        <b>
                                           ทรุดหนัก
                                        </b>
                                    </div>
                                </label>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <label>
                                    <input type="checkbox" name="blue_results_of_care" value="เสียชีวิต ณ จุดเกิดเหตุ"  class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                        <b>
                                           เสียชีวิต ณ จุดเกิดเหตุ
                                        </b>
                                    </div>
                                </label>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <label>
                                    <input type="checkbox" name="blue_results_of_care" value="เสียชีวิตขณะนำส่ง"  class=" card-input-element d-none">
                                    <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                        <b>
                                           เสียชีวิตขณะนำส่ง
                                        </b>
                                    </div>
                                </label>
                            </div>

                            <div style="margin-top: 150px;"></div>
                            
                        </div>
					</div>

                    <!---------------------------------- ข้อ 4  ---------------------------------->
					<div id="blue-4" class="tab-pane" role="tabpanel" aria-labelledby="blue-4">
                        <div class="card-title d-flex align-items-center">
							<div><i class="fa-solid fa-truck-clock me-1 font-22 text-primary"></i>
							</div>
							<h5 class="mb-0 text-primary">เกณฑ์การตัดสินใจส่งโรงพยาบาล(โดยหัวหน้าทีมและ/ผ่านการเห็นชอบของศูนย์ฯ)</h5>
						</div>
						<hr>
                        <div class="row">
                            <div class="col-md-4">
								<label for="blue_name_hospital" class="form-label">นำส่งห้องฉุกเฉินโรงพยาบาล</label>
								<div class="input-group"> <span class="input-group-text bg-white radius-1" ><i class="fa-solid fa-hospital"></i></span>
									<input type="text" class="form-control border-start-0 radius-2" name="blue_name_hospital" value="" placeholder="ชื่อโรงพยาบาล">
								</div>
							</div>
							<div class="col-md-2">
								<label for="blue_time_go_to_hospital" class="form-label">เวลา</label>
								<div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-clock"></i></span>
									<input type="datetime-local" class="form-control border-start-0 radius-2" name="blue_time_go_to_hospital" value="" placeholder="วันที่/เวลา">
								</div>
							</div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_type_hospital" value="ชาย"  class=" card-input-element d-none" >
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                โรงพยาบาลรัฐ
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_type_hospital" value="ชาย"  class=" card-input-element d-none" >
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                โรงพยาบาลเอกชน
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 mt-3">
								<label for="result" class="form-label">เหตุผล</label>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="checkbox" name="blue_reason_choosing_hospital" value="เหมาะสม/รักษาได้"  class=" card-input-element d-none" >
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                เหมาะสม/รักษาได้
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="checkbox" name="blue_reason_choosing_hospital" value="อยู่ใกล้"  class=" card-input-element d-none" >
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                อยู่ใกล้
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="checkbox" name="blue_reason_choosing_hospital" value="มีหลักประกัน"  class=" card-input-element d-none" >
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                มีหลักประกัน
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="checkbox" name="blue_reason_choosing_hospital" value="เป็นผู้ป่วยเก่า"  class=" card-input-element d-none" >
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                เป็นผู้ป่วยเก่า
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="checkbox" name="blue_reason_choosing_hospital" value="เป็นความประสงค์"  class=" card-input-element d-none" >
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                เป็นความประสงค์
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6">
								<label for="blue_recorder" class="form-label">ผู้สรุปรายงาน</label>
								<div class="input-group"> <span class="input-group-text bg-white radius-1" ><i class="fa-solid fa-user-pen"></i></span>
									<input type="text" class="form-control border-start-0 radius-2" name="blue_recorder" value="" placeholder="ชื่อผู้สรุปรายงาน">
								</div>
							</div>
							<div class="col-md-6">
								<label for="blue_id_recorder" class="form-label">รหัส</label>
								<div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-regular fa-id-card-clip"></i></span>
									<input type="text" class="form-control border-start-0 radius-2" name="blue_id_recorder" value="" placeholder="รหัส">
								</div>
							</div>
                        </div>
					</div>

                    <!---------------------------------- ข้อ 5  ---------------------------------->
					<div id="blue-5" class="tab-pane" role="tabpanel" aria-labelledby="blue-5">
                        <div class="card-title d-flex align-items-center">
							<div><i class="fa-solid fa-truck-clock me-1 font-22 text-primary"></i>
							</div>
							<h5 class="mb-0 text-primary">การประเมิน/รับรองการนำส่ง(โดยแพทย์ พยาบาล ประจำโรงพยาบาลที่รับดูแลต่อ)</h5>
						</div>
						<hr>
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-6">
								<label for="blue_hospital_number" class="form-label">HN</label>
								<div class="input-group"> <span class="input-group-text bg-white radius-1" ><i class="fa-duotone fa-id-card"></i></span>
									<input type="text" class="form-control border-start-0 radius-2" name="blue_hospital_number" value="" placeholder="หมายเลขของผู้ป่วยนอก">
								</div>
							</div>
							<div class="col-md-6 col-lg-6 col-6">
								<label for="blue_diagnosis" class="form-label">การวินิจฉัยโรค</label>
								<div class="input-group"> <span class="input-group-text bg-white radius-1"><i class="fa-solid fa-person-burst"></i></span>
									<input type="text" class="form-control border-start-0 radius-2" name="blue_diagnosis" value="" placeholder="การวินิจฉัยโรค">
								</div>
							</div>
                            
                            <div class="col-12 mt-3">
								<label class="form-label">ระดับการคัดแยก(ER Triage)</label>
                            </div>

                            <div class="col-12 col-md-3 col-lg-3">
                                <label>
                                    <input type="radio" name="er" value="แดง(วิกฤติ)"  class="card-input-red card-input-element d-none" >
                                    <div class="card card-body text-danger d-flex flex-row justify-content-between align-items-center">
                                        <b>
                                            แดง(วิกฤติ)  
                                        </b>
                                    </div>
                                </label>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <label>
                                    <input type="radio" name="er" value="ขาว(ทั่วไป)"  class="card-input-element d-none" >
                                    <div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
                                        <b>
                                            ขาว(ทั่วไป)    
                                        </b>
                                    </div>
                                </label>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <label>
                                    <input type="radio" name="blue_er" value="เหลือง(เร่งด่วน)"  class="card-input-warning card-input-element d-none" >
                                    <div class="card card-body text-warning d-flex flex-row justify-content-between align-items-center">
                                        <b>
                                            เหลือง(เร่งด่วน)  
                                        </b>
                                    </div>
                                </label>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <label>
                                    <input type="radio" name="blue_er" value="ดำ(รับบริการสาธารณสุขอื่น)"  class="card-input-dark card-input-element d-none" >
                                    <div class="card card-body  text-dark d-flex flex-row justify-content-between align-items-center">
                                        <b>
                                            ดำ(รับบริการสาธารณสุขอื่น)  
                                        </b>
                                    </div>
                                </label>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <label>
                                    <input type="radio" name="blue_er" value="แดง(วิกฤติ)"  class="card-input-success card-input-element d-none" >
                                    <div class="card card-body text-success d-flex flex-row justify-content-between align-items-center">
                                        <b>
                                            เขียว(ไม่รุนแรง)
                                        </b>
                                    </div>
                                </label>
                            </div>

                            <div class="col-12 mt-3">
								<label class="form-label">ทางเดินหายใจ</label>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_respiratory_tract_by_doctor" value="ไม่จำเป็น"  class=" card-input-element d-none" onchange="blue_check_respiratory_tract_by_doctor()">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                ไม่จำเป็น
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_respiratory_tract_by_doctor" value="ไม่ได้ทำ"  class=" card-input-element d-none" onchange="blue_check_respiratory_tract_by_doctor()">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                ไม่ได้ทำ
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_respiratory_tract_by_doctor" value="ทำและเหมาสม"  class=" card-input-element d-none" onchange="blue_check_respiratory_tract_by_doctor()">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                ทำและเหมาะสม
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" id="blue_respiratory_tract_by_doctor" name="blue_respiratory_tract_by_doctor" value="ทำแต่ไม่เหมาะ"  class="card-input-element d-none" onchange="blue_check_respiratory_tract_by_doctor()">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                ทำแต่ไม่เหมาะสม
                                                <button type="button" id="blue_btn_respiratory_tract_by_doctor" class="btn btn-primary d-none" data-toggle="modal" data-target="#blue_modal_respiratory_tract_by_doctor">
                                                    แก้ไข
                                                </button>
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <!-- Modal ทำแต่ไม่เหมาะสม ทางเดินหายใจ-->
                            <div class="modal fade" id="blue_modal_respiratory_tract_by_doctor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">รายะละเอียดเพิ่มเติม การรักษาทางเดินหายใจ</h5>
                                        <button type="button" class="close btn h6" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <textarea  class="form-control radius-4" id="blue_respiratory_tract_by_doctor_detail" name="blue_respiratory_tract_by_doctor_detail" value="" placeholder="ระบุ" rows="4" cols="100%"></textarea >
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">บันทึก</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            


                            <div class="col-12 mt-3">
								<label  class="form-label">การห้ามเลือด</label>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_hemostasis_by_doctor" value="ไม่จำเป็น"  class=" card-input-element d-none" onchange="blue_check_hemostasis_by_doctor();">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                ไม่จำเป็น
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_hemostasis_by_doctor" value="ไม่ได้ทำ"  class=" card-input-element d-none" onchange="blue_check_hemostasis_by_doctor();">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                ไม่ได้ทำ
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_hemostasis_by_doctor" value="ทำและเหมาสม"  class=" card-input-element d-none" onchange="blue_check_hemostasis_by_doctor();">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                ทำและเหมาะสม
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" id="blue_hemostasis_by_doctor" name="blue_hemostasis_by_doctor" value="ทำแต่ไม่เหมาะ"  class=" card-input-element d-none" onchange="blue_check_hemostasis_by_doctor();">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                ทำแต่ไม่เหมาะสม
                                                <button type="button" id="blue_btn_hemostasis_by_doctor" class="btn btn-primary d-none" data-toggle="modal" data-target="#blue_modal_hemostasis_by_doctor">
                                                    แก้ไข
                                                </button>
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <!-- Modal ทำแต่ไม่เหมาะสม การห้ามเลือด-->
                            <div class="modal fade" id="blue_modal_hemostasis_by_doctor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">รายะละเอียดเพิ่มเติม การห้ามเลือด</h5>
                                        <button type="button" class="close btn h6" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <textarea  class="form-control radius-4" id="blue_hemostasis_by_doctor_detail" name="blue_hemostasis_by_doctor_detail" value="" placeholder="ระบุ" rows="4" cols="100%"></textarea >
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">บันทึก</button>
                                    </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-12 mt-3">
								<label for="result" class="form-label">การดามกระดูก</label>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_splint_by_doctor" value="ไม่จำเป็น"  class=" card-input-element d-none" onchange="blue_check_splint_by_doctor()">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                ไม่จำเป็น
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_splint_by_doctor" value="ไม่ได้ทำ"  class=" card-input-element d-none" onchange="blue_check_splint_by_doctor()">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                ไม่ได้ทำ
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_splint_by_doctor" value="ทำและเหมาสม"  class=" card-input-element d-none" onchange="blue_check_splint_by_doctor()">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                ทำและเหมาะสม
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" id="blue_splint_by_doctor" name="blue_splint_by_doctor" value="ทำแต่ไม่เหมาะ"  class=" card-input-element d-none" onchange="blue_check_splint_by_doctor()">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                ทำแต่ไม่เหมาะสม
                                                <button type="button" id="blue_btn_splint_by_doctor" class="btn btn-primary d-none" data-toggle="modal" data-target="#blue_modal_splint_by_doctor">
                                                    แก้ไข
                                                </button>
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <!-- Modal ทำแต่ไม่เหมาะสม การดามกระดูก-->
                            <div class="modal fade" id="blue_modal_splint_by_doctor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">รายะละเอียดเพิ่มเติม การดามกระดูก</h5>
                                        <button type="button" class="close btn h6" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <textarea  class="form-control radius-4" id="blue_splint_by_doctor_detail" name="blue_splint_by_doctor_detail" value="" placeholder="ระบุ" rows="4" cols="100%"></textarea >
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">บันทึก</button>
                                    </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-12 mb-5"></div>
                            <div class="col-md-3 col-lg-3 col-12">
								<label for="blue_name_doctor" class="form-label">ชื่อผู้ประเมิน</label>
								<div class="input-group"> <span class="input-group-text bg-white radius-1" ><i class="fa-solid fa-user-doctor"></i></span>
									<input type="text" class="form-control border-start-0 radius-2" name="blue_name_doctor" value="" placeholder="ชื่อผู้ประเมิน">
								</div>
							</div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_role_doctor" value="แพทย์"  class=" card-input-element d-none" onchange="blue_check_role_doctor();">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                แพทย์
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="blue_role_doctor" value="พยาบาล"  class=" card-input-element d-none" onchange="blue_check_role_doctor();">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                พยาบาล
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" id="blue_role_doctor" name="blue_role_doctor" value="อื่นๆ"  class=" card-input-element d-none" onchange="blue_check_role_doctor();">
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                อื่นๆ
                                            </b><br>
                                            <input type="text" id="blue_role_other" disabled class="form-control border-start-0 radius-4" name="blue_role_other" value="" placeholder="ตำแหน่ง">
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
					</div>
                    
                    <!---------------------------------- ข้อ 6  ---------------------------------->
					<div id="blue-6" class="tab-pane" role="tabpanel" aria-labelledby="blue-4">
                        <div class="card-title d-flex align-items-center">
							<div><i class="fa-solid fa-truck-clock me-1 font-22 text-primary"></i>
							</div>
							<h5 class="mb-0 text-primary">ผลการรักษาที่/ในโรงพยาบาล(ติดตามผลในวันสิ้นเดือน)</h5>
						</div>
						<hr>
                        <div class="row">
                            <div class="col-12 mt-3">
								<label for="result" class="form-label">Admitted</label>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="admitted" value="Yes"  class=" card-input-element d-none" >
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                Yes
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="admitted" value="No"  class=" card-input-element d-none" >
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                No
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="col-12 mt-3">
								<label class="form-label">อาการ</label>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="treatment_effect" value="ทุเลา"  class=" card-input-element d-none" >
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                ทุเลา
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="treatment_effect" value="รักษาต่อที่อื่น"  class=" card-input-element d-none" >
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                รักษาต่อที่อื่น
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="treatment_effect" value="ยังรักษาต่อในรพ."  class=" card-input-element d-none" >
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                ยังรักษาต่อในรพ.  
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="treatment_effect" value="เสียชีวิตใน รพ."  class=" card-input-element d-none" >
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                เสียชีวิตใน รพ.
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="treatment_effect" value="ปฎิเสธการรักษา/หนีกลับ"  class=" card-input-element d-none" >
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                ปฎิเสธการรักษา/หนีกลับ
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="treatment_effect" value="กลับไปตายบ้าน"  class=" card-input-element d-none" >
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                กลับไปตายบ้าน
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class=" col-12">
                                    <label>
                                        <input type="radio" name="treatment_effect" value="ตามแล้วไม่ทราบผล"  class=" card-input-element d-none" >
                                        <div class="card card-body d-flex flex-row justify-content-between align-items-center " >
                                            <b>
                                                ตามแล้วไม่ทราบผล
                                            </b>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
					</div>

				</div>
				
			</div>
        </div>
    </div>
</div>


<script>
	$(document).ready(function() {
		// Step show event
		$("#wizard_blue_form").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
			$("#prev-btn-form-blue").removeClass('disabled');
			$("#next-btn-form-blue").removeClass('disabled');
			if (stepPosition === 'first') {
				$("#prev-btn-form-blue").addClass('disabled');
			} else if (stepPosition === 'last') {
				$("#next-btn-form-blue").addClass('disabled');
			} else {
				$("#prev-btn-form-blue").removeClass('disabled');
				$("#next-btn-form-blue").removeClass('disabled');
			}
		});
		// Smart Wizard
		$('#wizard_blue_form').smartWizard({
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
				toolbarPosition: 'bottom', // both bottom
			},
		});
		// External Button Events
		$("#reset-btn").on("click", function() {
			// Reset wizard
			$('#wizard_blue_form').smartWizard("reset");
			return true;
		});
		$("#prev-btn-form-blue").on("click", function() {
			// Navigate previous
			$('#wizard_blue_form').smartWizard("prev");
			return true;
		});
		$("#next-btn-form-blue").on("click", function() {
			// Navigate next
			$('#wizard_blue_form').smartWizard("next");
			return true;
		});
	});
</script>

<script>
    function blue_check_type_people() {
        var check_people_type = document.getElementsByName('blue_people_type');
        var id_card = document.querySelector('#blue_id_card');
        var people_country = document.querySelector('#blue_people_country');
        var passport = document.querySelector('#blue_passport');

        // เช็คว่าเลือกคนประเทศใด แล้วเปิดช่อง input -> หน้า 3
        for (var i = 0, length = check_people_type.length; i < length; i++) {
            if (check_people_type[i].checked) {
                if(check_people_type[i].value == "คนไทย"){
                    document.querySelector('#foreigner').classList.add('d-none');
                    people_country.value = null ;
                    passport.value = null ;
                    document.querySelector('#blue_thai_people').classList.remove('d-none');
                    document.querySelector('#blue_thai_people').classList.add('show-data');
                }else if(check_people_type[i].value == "ชาวต่างชาติ"){
                    document.querySelector('#blue_thai_people').classList.add('d-none');
                    id_card.value = null ;
                    document.querySelector('#blue_foreigner').classList.remove('d-none');
                    document.querySelector('#blue_foreigner').classList.add('show-data');
                }else{
                    document.querySelector('#blue_foreigner').classList.add('d-none');
                    document.querySelector('#blue_thai_people').classList.add('d-none');
                    people_country.value = null ;
                    passport.value = null ;
                    id_card.value = null ;
                }
                break;
            } 
        }
    }

    function blue_check_insurance() {
        var check_insurance = document.getElementsByName('blue_insurance');

        var insurance_country = document.querySelector('#blue_insurance_country');

        var insurance_type_car = document.querySelector('#blue_insurance_type_car');
        var insurance_type_license_plate = document.querySelector('#blue_insurance_type_license_plate');
        var insurance_license_plate = document.querySelector('#blue_insurance_license_plate');
        var insurance_province = document.querySelector('#blue_insurance_province');
        // เช็คว่าเลือกคนประเทศใด หัวข้อประกันอื่นๆ ->หน้า 3
        for (var i = 0, length = check_insurance.length; i < length; i++) {
            if (check_insurance[i].checked) {
                if(check_insurance[i].value == "ประกันท่องเที่ยว"){
                    document.querySelector('#blue_div_insurance_country').classList.remove('d-none');
                    document.querySelector('#blue_div_insurance_car').classList.add('d-none');
                    document.querySelector('#blue_div_insurance_country').classList.add('show-data');
                    insurance_type_car.value = null ;
                    insurance_type_license_plate.value = null ;
                    insurance_license_plate.value = null ;
                    insurance_province.value = null ;

                }else{
                    document.querySelector('#blue_div_insurance_country').classList.add('d-none');
                    document.querySelector('#blue_div_insurance_car').classList.add('show-data');
                    document.querySelector('#blue_div_insurance_car').classList.remove('d-none');
                    insurance_country.value = null ;
                }
                break;
            } 
        }
    }
</script>

<script>

    // ถ้าเลือก ทำแต่ไม่เหมาะสม หัวข้อทางเดินหายใจ เปิดmodal ให้กรอก รายละเอียด -> อยู่หน้า 6
    function blue_check_respiratory_tract_by_doctor() { 
        var respiratory_tract_by_doctor = document.querySelector('#blue_respiratory_tract_by_doctor');
        var detail = document.querySelector('#blue_respiratory_tract_by_doctor_detail');

        if (respiratory_tract_by_doctor.checked) {
            document.querySelector('#blue_btn_respiratory_tract_by_doctor').classList.remove('d-none');
            document.querySelector('#blue_btn_respiratory_tract_by_doctor').click();
        }else{
            document.querySelector('#blue_btn_respiratory_tract_by_doctor').classList.add('d-none');
            detail.value = null ;

        }
    }

    // ถ้าเลือก ทำแต่ไม่เหมาะสม หัวข้อการห้ามเลือด เปิดmodal ให้กรอก รายละเอียด -> อยู่หน้า 6
    function blue_check_hemostasis_by_doctor() { 
        var hemostasis_by_doctor = document.querySelector('#blue_hemostasis_by_doctor');
        var detail = document.querySelector('#blue_hemostasis_by_doctor_detail');

        if (hemostasis_by_doctor.checked) {
            document.querySelector('#blue_btn_hemostasis_by_doctor').classList.remove('d-none');
            document.querySelector('#blue_btn_hemostasis_by_doctor').click();
        }else{
            document.querySelector('#blue_btn_hemostasis_by_doctor').classList.add('d-none');
            detail.value = null ;

        }
    }
    // ถ้าเลือก ทำแต่ไม่เหมาะสม หัวข้อดามกระดูก เปิดmodal ให้กรอก รายละเอียด -> อยู่หน้า 6
    function blue_check_splint_by_doctor() { 
        var splint_by_doctor = document.querySelector('#blue_splint_by_doctor');
        var detail = document.querySelector('#blue_splint_by_doctor_detail');

        if (splint_by_doctor.checked) {
            document.querySelector('#blue_btn_splint_by_doctor').classList.remove('d-none');
            document.querySelector('#blue_btn_splint_by_doctor').click();
        }else{
            document.querySelector('#blue_btn_splint_by_doctor').classList.add('d-none');
            detail.value = null ;

        }
    }

    // ถ้าเลือก ตำแหน่งอื่นๆ เปิดช่อง input ให้กรอก -> อยู่ข้อ 6
    function blue_check_role_doctor() { 
        var role_doctor = document.querySelector('#blue_role_doctor');
        var role_other = document.querySelector('#blue_role_other');

        if (role_doctor.checked) {
            role_other.disabled = false;

        }else{
            role_other.disabled = true;
            role_other.value = null ;
        }
    }
</script>