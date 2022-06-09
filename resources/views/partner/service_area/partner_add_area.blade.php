@extends('layouts.partners.theme_partner_new')

@section('content')
	<style>
		/* .wrapper {
		    height: 100vh;
		    display: flex;
		    justify-content: center;
		    align-items: center;
		    background-color: #eee
		} */

		.checkmark__circle {
		    stroke-dasharray: 166;
		    stroke-dashoffset: 166;
		    stroke-width: 2;
		    stroke-miterlimit: 10;
		    stroke: #7ac142;
		    fill: none;
		    animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards
		}

		.checkmark {
		    width: 26px;
		    height: 26px;
		    border-radius: 50%;
		    display: block;
		    stroke-width: 2;
		    stroke: #fff;
		    stroke-miterlimit: 10;
		    margin-left: 20px;
		    margin-top: 20px;
		    box-shadow: inset 0px 0px 0px #7ac142;
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
		        box-shadow: inset 0px 0px 0px 30px #7ac142
		    }
		}
		
	</style>
<!-- div_name_partner -->
	<div id="div_name_partner" class="collapse col-12">
		<div class="col" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
			<div class="card  border-0 border-4 border-primary">
				<div class="card-body p-md-5 p-sm-2" >
					<div class="card-title d-flex align-items-center">
						<h5 class="mb-0 " style="color:#008450;"><i class="fadeIn animated bx bx-map-alt"></i> เพิ่มพื้นที่บริการใหม่ </h5>
						<i class="fas fa-times float-right btn ms-auto" data-toggle="collapse" data-target="#div_name_partner" aria-expanded="false" aria-controls="div_name_partner"></i>
					</div>
					<hr>
					<form method="POST" action="{{ url('/partner_add_area') }}" accept-charset="UTF-8" class="row g-3 form-horizontal" enctype="multipart/form-data">
						{{ csrf_field() }}
						@foreach($data_partners as $data_partner)
							<div class="col-md-4">
								<label for="inputFirstName" class="form-label">ชื่อพาร์ทเนอร์</label>
								<input class="form-control" name="name" type="text" id="name" value="{{ $data_partner->name }}"  readonly>
								{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
							</div>
							<div class="col-md-4">
								<label for="inputLastName" class="form-label">เบอร์</label>
								<input class="form-control" name="phone" type="phone" id="phone" value="{{ $data_partner->phone }}"   readonly>
								{!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
							</div>
							<div class="col-md-4">
								<label for="inputEmail" class="form-label">อีเมล</label>
								<input class="form-control" name="mail" type="mail" id="mail" value="{{ $data_partner->mail }}"  readonly>
								{!! $errors->first('mail', '<p class="help-block">:message</p>') !!}
							</div>
							<div class="col-md-4 d-none">
								<label for="" class="form-label">type_partner</label>
								<input class="form-control" name="type_partner" type="text" id="type_partner" value="{{ $data_partner->type_partner }}"  readonly>
								{!! $errors->first('type_partner', '<p class="help-block">:message</p>') !!}
							</div>
							<div class="col-md-4">
								<label for="inputPassword" class="form-label">ชื่อพื้นที่</label>
								<input class="form-control" name="name_area" type="name_area" id="name_area" value="{{ isset($partner->name_area) ? $partner->name_area : ''}}" required>
								{!! $errors->first('name_area', '<p class="help-block">:message</p>') !!}
							</div>
							<div class="col-5">
						<div class="row">
							<div class="col-4">
								<div class="form-group {{ $errors->has('line_group') ? 'has-error' : ''}}">
									<br>
									<select id="line_group" name="line_group" class="btn btn-md text-white" style="background-color: #27CF00;margin-top: 9px;" onchange="document.querySelector('#btn_send_pass_area').classList.remove('d-none');" required>
										<option value="" selected>- เลือกกลุ่มไลน์ -</option>
										@foreach($group_line as $item)
											<option value="{{ $item->groupName }}" 
											{{ request('groupName') == $item->groupName ? 'selected' : ''   }} >
											{{ $item->groupName }} 
											</option>
											{!! $errors->first('line_group', '<p class="help-block">:message</p>') !!}
										@endforeach 
										<!-- @foreach($our_line_group as $item_our)
											<option value="{{ $item_our->groupName }}" 
											{{ request('groupName') == $item_our->groupName ? 'selected' : ''   }} >
											{{ $item_our->groupName }} 
											</option>
										@endforeach  -->
									</select>
								</div>
								<input class="form-control d-none" name="group_line_id" type="group_line_id" id="group_line_id" value="" >
								{!! $errors->first('group_line_id', '<p class="help-block">:message</p>') !!}

								<input class="form-control d-none" name="user_id_admin" type="user_id_admin" id="user_id_admin" value="{{ Auth::user()->id }}" >
								{!! $errors->first('user_id_admin', '<p class="help-block">:message</p>') !!}
							</div>
							<div class="col-5">
								<br>
								<div id="btn_send_pass_area" class="d-none text-center">
									<a class="btn text-white" style="background-color: #FA9E33;margin-top: 9px;" onclick="send_pass_area();">
										ส่งรหัสยืนยันกลุ่มไลน์
									</a>
								</div>
								<div id="spinner_send_pass" class="d-none text-center">
									<div style="margin-top: 9px;" class="spinner-border text-success"></div> &nbsp;&nbsp;กำลังส่งรหัส..
								</div>
								<div id="text_send_pass_done" class="d-none text-center">
									<div class="row">
										<div class="col-3">
											<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
												<circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
												<path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
											</svg>
										</div>
										<div class="col-9">
											<p style="margin-top: 23px;margin-left: 10px;float: left;">ส่งรหัสแล้ว</p>
										</div>
									</div>
								</div>
								
							</div>
							<div class="col-3">
								<div id="div_cf_pass_area" class="d-none">
									<label for="cf_pass_area" class="control-label">{{ 'กรุณายืนยันรหัส' }}</label>
									<input class="form-control" type="text" name="cf_pass_area" id="cf_pass_area" oninput="check_pass_area();">
								</div>
							</div>
						</div>
					</div>
					<div class="col-4">
                        <input type="text" class="form-control d-none" id="color_theme" name="color_theme" value="{{ $data_partner->color_navbar }}">

						<br>
						<a style="margin-top: 9px;" id="btn_submit_add_area" class="btn btn-primary float-right d-none" onclick="gen_qr_code();">
							ยืนยันการเพิ่มพื้นที่ใหม่
						</a>
						<input style="margin-top: 9px;" id="submit_add_area" class="btn btn-primary float-right d-none" type="submit" value="{{ 'ยืนยันการเพิ่มพื้นที่ใหม่' }}">
					</div>
						@endforeach
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="card radius-10 d-none d-lg-block" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
        <div class="card-header border-bottom-0 bg-transparent">
            <div class="d-flex align-items-center" style="margin-top:10px;">
                <div>
                    <h5 class="font-weight-bold mb-0" > รายชื่อพื้นที่บริการปัจจุบัน</h5>
                </div>
				<div class="ms-auto">
					@if(Auth::check())
						@if(Auth::user()->role == "admin-partner")
							<a id="btn_add_area" class="btn text-white float-right" style="background-color: #008450;" data-toggle="collapse" data-target="#div_name_partner" aria-expanded="false" aria-controls="div_name_partner">
								<i class="fadeIn animated bx bx-add-to-queue"></i>เพิ่มพื้นที่บริการใหม่
							</a>
						@endif
					@endif
					<a style="float: right; margin-left:10px" type="button" data-toggle="modal" data-target="#Partner_add_area">
						<button class="btn btn-primary">
							<i class="fas fa-info-circle"></i>วิธีใช้
						</button>
					</a>
                </div>
            </div>
        </div>
<!------------------------------------------- Modal เพิ่มพื้นที่บริการ ------------------------------------------->
<div class="modal fade" id="Partner_add_area" tabindex="-1" role="dialog" aria-labelledby="Partner_add_area" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="font-family: 'Prompt', sans-serif;" id="Partner_add_area">เพิ่มพื้นที่บริการ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
          <div class="row col-12 card-body" style="padding: 15px 0px 15px 0px ;">
            <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#create_line" aria-expanded="false" aria-controls="create_line">
              <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">1.สร้างไลน์กลุ่มและเพิ่มเจ้าหน้าที่เข้าภายในกลุ่ม</h5>
            </div>
            <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#create_line" aria-expanded="false" aria-controls="register">
              <i class="fas fa-angle-down"></i>
            </div>
            <div class="col-12 collapse" id="create_line">
              <br>
              <center><img src="{{ asset('/img/วิธีใช้งาน_p/add_area_1.png') }}" style="border: 2px solid #555;" width="50%" alt="Card image cap"></center>
              <br>
              <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">สร้างไลน์กลุ่มและทำการเพิ่มเจ้าหน้าที่ ที่รับผิดชอบภายในพื้นที่เข้าภายในไลน์กลุ่มนี้</h5>
            </div>
          </div>
        </div>
        <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
          <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;">
            <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#add_line_bot" aria-expanded="false" aria-controls="add_line_bot">
              <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">2.เพิ่มแชทบอทไลน์ ViiCHECK เข้าภายในกลุ่มไลน์</h5>
            </div>
            <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#add_line_bot" aria-expanded="false" aria-controls="registerline">
              <i class="fas fa-angle-down"></i>
            </div>
            <div class="col-12 collapse" id="add_line_bot">
              <br>
              <center><img src="{{ asset('/img/วิธีใช้งาน_p/add_area_2.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center>
              <br>

            </div>
          </div>
        </div>
        <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
          <div class="row col-12 card-body" style="padding: 15px 0px 15px 0px ;">
            <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#manage_area" aria-expanded="false" aria-controls="manage_area">
              <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">3.เข้าสู่หน้าจัดการพื้นที่บริการ</h5>
            </div>
            <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#manage_area" aria-expanded="false" aria-controls="manage_area">
              <i class="fas fa-angle-down"></i>
            </div>
            <div class="col-12 collapse" id="manage_area">
              <br>
              <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">3.1</h5>
              <center>
                <img src="{{ asset('/img/วิธีใช้งาน_p/add_area_3.png') }}" style="border: 2px solid #555;margin-left:15px;" width="80%" alt="Card image cap"><br>
              </center>
              <br>
              <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1).คลิกที่เมนูโปรไฟล์</h5>
              <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2).เลือกเมนู admin-partner </h5>
              <br>
              <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">3.2</h5>
              <center>
                <img src="{{ asset('/img/วิธีใช้งาน_p/add_area_4.png') }}" style="border: 2px solid #555;margin-left:15px;" width="80%" alt="Card image cap"><br>
              </center>
              <br>
              <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1).เลือกเมนูพื้นที่บริการ</h5>
              <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2).คลิกที่ปุ่ม เพิ่มพื้นที่บริการใหม่ </h5>
            </div>
          </div>
        </div>
        <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
          <div class="row col-12 card-body" style="padding: 15px 0px 15px 0px ;">
            <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#add_area" aria-expanded="false" aria-controls="add_area">
              <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">4.เพิ่มพื้นที่บริการใหม่</h5>
            </div>
            <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#add_area" aria-expanded="false" aria-controls="manage_area">
              <i class="fas fa-angle-down"></i>
            </div>
            <div class="col-12 collapse" id="add_area">
              <br>
              <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">4.1</h5>
              <center>
                <img src="{{ asset('/img/วิธีใช้งาน_p/add_area_5.png') }}" style="border: 2px solid #555;margin-left:15px;" width="80%" alt="Card image cap"><br>
              </center>
              <br>
              <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1).กรอกชื่อพื้นที่</h5>
              <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2).เลือกกลุ่มไลน์ที่จะใช้ในพื้นที่นี้ </h5>
              <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2).ส่งรหัสยืนยันไปยังกลุ่มไลน์ที่เลือก </h5>
              <br>
              <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">4.2ระบบจะทำการส่งรหัสยืนยันไปยังกลุ่มไลน์</h5>
              <center>
                <img src="{{ asset('/img/วิธีใช้งาน_p/add_area_6.png') }}" style="border: 2px solid #555;margin-left:15px;" width="40%" alt="Card image cap"><br>
              </center>
              <br>
              <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">4.3</h5>
              <center>
                <img src="{{ asset('/img/วิธีใช้งาน_p/add_area_7.png') }}" style="border: 2px solid #555;margin-left:15px;" width="80%" alt="Card image cap"><br>
              </center>
              <br>
              <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1).นำรหัสที่ได้จากกลุ่มไลน์มากรอก</h5>
              <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2).คลิกที่ปุ่มยืนยันการเพิ่มพื้นที่ใหม่ </h5>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!------------------------------------------- Modal เพิ่มพื้นที่บริการ ------------------------------------------->
        <!-- Button trigger modal -->
	    <button id="btb_modal_delete_area" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#modal_delete_area">
	    </button>

	    <!-- Modal -->
	    <div class="modal fade" id="modal_delete_area" tabindex="-1" aria-labelledby="exampleModalLabel_modal_delete_area" aria-hidden="true">
	      <div class="modal-dialog modal-lg">
	        <div class="modal-content">
	          <div class="modal-header">
	            <h5 class="modal-title" id="exampleModalLabel_modal_delete_area">ยืนยันการยกเลิกพื้นที่ ?</h5>
	          </div>
	          <div class="modal-body">
	            <div class="row text-center">
	                <div class="col-12">
	                    <img width="30%" src="{{ url('/img/stickerline/PNG/5.png') }}">
	                    <br><br><br>
	                    <h3 class="translate">
	                        คุณยืนยันการยกเลิกพื้นที่ใช่หรือไม่
	                    </h3>
	                    <br>
	                </div>
	                <div class="col-2"></div>
	                <div class="col-8">
	                	<label>กรุณาพิมพ์ <span id="text_name_and_namearea"></span> เพื่อยืนยัน</label>
	                    <input class="form-control" type="text" name="text_cf_name_area" id="text_cf_name_area" 
	                    oninput="check_text_input();">
	                </div>
	                <div class="col-2"></div>
	                <div id="div_group_line_modal" class="col-12 d-none">
	                	<br>
	                	<i class="fas fa-exclamation-triangle text-warning"></i> <span>หลังจากการยกเลิกพื้นที่แล้ว กลุ่มไลน์ </span><b><span class="text-success" id="group_line_modal"></b> ของคุณสามารถนำกลับมาใช้กับพื้นที่อื่นๆได้</span> <i class="fas fa-exclamation-triangle text-warning"></i>
	                </div>

	              </div>
	          </div>
	          <div class="modal-footer">
	            <button id="btn_cf_delete_area" data-disable-invalid="" type="submit" data-view-component="true" class="btn-danger btn" disabled="">
	            	<span>ยืนยันการยกเลิกพื้นที่</span>
				</button>
	          </div>
	        </div>
	      </div>
	    </div>

        <!-- Button trigger modal -->
	    <button id="btn_modal_edit_ok" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#modal_edit_ok">
	    </button>
	    <!-- Modal -->
	    <div class="modal fade" id="modal_edit_ok" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	      <div class="modal-dialog modal-dialog-centered">
	        <div class="modal-content">
	            <div class="modal-body text-center">
	                <div class="wrapper">
	                	<center>
	                    	<img width="80%" src="{{ url('/img/stickerline/PNG/22.png') }}">
	                	</center>
	                	<br>
	                    <h2 style="color: #7ac142;">แก้ไขข้อมูลเรียบร้อยแล้ว</h2>
	                </div>
	            </div>
	            <div class="modal-footer d-none">
	                <button id="close_madal_send_finish" type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
	            </div>
	        </div>
	      </div>
	    </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table mb-0 align-middle">
                    <thead>
                        <tr class="text-center">
                            <th>ชื่อพื้นที่บริการ</th>
                            <th>ชื่อกลุ่มไลน์</th>
                            <th>พื้นที่ปัจจุบัน</th>
                            <th>พื้นที่รอการตรวจสอบ</th>
							<th>เครื่องมือ</th>
                        </tr>
                    </thead>
                    <tbody>
					@foreach($all_area_partners as $area)
                            <tr class="text-center">
                                <td>{{ $area->name_area }}</td>
                                <td>
                                	@if(!empty($area->line_group))
                                		{{ $area->line_group }}
                                	@else
                                		<div class="form-group">
											<br>
											<select id="line_group_{{ $area->id }}" name="line_group_{{ $area->id }}" class="btn btn-md text-white" style="background-color: #27CF00;margin-top: 9px;" onchange="select_line_group_have_area('{{ $area->id }}');" required>
												<option value="" selected>- เลือกกลุ่มไลน์ -</option>
												@foreach($group_line as $item)
													<option value="{{ $item->groupName }}" 
													{{ request('groupName') == $item->groupName ? 'selected' : ''   }} >
													{{ $item->groupName }} 
													</option>
												@endforeach 
												<!-- @foreach($our_line_group as $item_our)
													<option value="{{ $item_our->groupName }}" 
													{{ request('groupName') == $item_our->groupName ? 'selected' : ''   }} >
													{{ $item_our->groupName }} 
													</option>
												@endforeach  -->
											</select>
										</div>
										<div id="btn_send_pass_area_{{ $area->id }}" class="d-none text-center">
											<span id="text_group_line_{{ $area->id }}"></span>
											<br>
											<a class="btn text-white" style="background-color: #FA9E33;margin-top: 9px;" onclick="send_pass_area_have_area('{{ $area->id }}');">
												ส่งรหัสยืนยันกลุ่มไลน์
											</a>
										</div>
										<div id="div_cf_pass_area_{{ $area->id }}" class="d-none">
											<label for="cf_pass_area" class="control-label">{{ 'กรุณายืนยันรหัส' }}</label>
											<center>
												<input class="form-control col-8" type="text" name="cf_pass_area_{{ $area->id }}" id="cf_pass_area_{{ $area->id }}" oninput="check_pass_area_have_area('{{ $area->id }}');">
											</center>
										</div>
										<a style="margin-top: 9px;" id="submit_add_area_{{ $area->id }}" class="btn btn-primary float-right d-none" onclick="submit_group_line('{{ $area->id }}')">ยืนยันการเพิ่มพื้นที่ใหม่</a>
                                	@endif
                                </td>
                                <td>
									@if(!empty($area->sos_area))
										<a href="javaScript:;" class="btn btn-sm btn-success radius-30" ><i class="bx bx-check-double"></i>Yes</a>
									@else
										<a href="javaScript:;" class="btn btn-sm btn-danger radius-30" ><i class="fadeIn animated bx bx-x"></i>No</a>
									@endif
								</td>
                                <td>
									@if(!empty($area->new_sos_area))
										<a href="javaScript:;" class="btn btn-sm btn-success radius-30" ><i class="bx bx-check-double"></i>Yes</a>
									@else
										<a href="javaScript:;" class="btn btn-sm btn-danger radius-30" ><i class="fadeIn animated bx bx-x"></i>No</a>
									@endif
                                </td>
								<td>
									@if(!empty($area->line_group))
										<a  type="submit" class="btn btn-warning " href="{{ url('/service_area?name_area=' . $area->name_area) }}">
											<i class="far fa-edit"></i> ดูข้อมูล / แก้ไข
										</a>
									@endif
									<span style="float: right;" class="btn btn-danger" onclick="click_modal_delete_area('{{ $area->id }}' , '{{ $area->name }}' , '{{ $area->name_area }}' , '{{ $area->line_group }}');">
										<i class="fas fa-trash-alt"></i> ลบ
									</span>
								</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

	<!------------------------------------------------------- mobile ------------------------------------------------------->
	<div class="container-fluid card radius-10 d-block d-lg-none" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
        <div class="row">
            <div class="card-header border-bottom-0 bg-transparent">
                <div class="col-12"  style="margin-top:10px">
                    <div>
                        <h5 class="font-weight-bold mb-0">รายชื่อพื้นที่บริการปัจจุบัน</h5>
                    </div>
					<div class="d-flex justify-content-end" style="margin-top:10px;">
						<button type="button" class="btn btn-white radius-10" data-toggle="collapse" data-target="#div_name_partner" aria-expanded="false" aria-controls="div_name_partner"><i class="fadeIn animated bx bx-add-to-queue"></i>เพิ่มพื้นที่บริการใหม่</button>
					</div><br>
				</div>
                <div class="card-body" style="padding: 0px 10px 0px 10px;">
				@foreach($all_area_partners as $area)
                    @foreach($data_partners as $data_partner)
                    @endforeach
                    <div class="card col-12 d-block d-lg-none" style="font-family: 'Prompt', sans-serif;border-radius: 25px;border-bottom-color:{{ $data_partner->color }};margin-bottom: 10px;border-style: solid;border-width: 0px 0px 4px 0px;">
					<center>
                            <div class="row col-12 card-body border border-bottom-0" style="padding:15px 0px 15px 0px ;border-radius: 25px;margin-bottom: -2px;">
                                <div class="col-2 align-self-center" style="vertical-align: middle;padding:0px" data-toggle="collapse" data-target="#Line_{{ $area->id }}" aria-expanded="false" aria-controls="form_delete_{{ $area->id }}" >
                                <a  type="submit" class="btn-sm btn-white " style="color:#0275d8;" href="{{ url('/service_area?name_area=' . $area->name_area) }}">
										<i class="far fa-edit"></i>
									</a>
                                </div>
                                <div class="col-8" style="margin-bottom:0px" data-toggle="collapse" data-target="#Line_{{ $area->id }}" aria-expanded="false" aria-controls="form_delete_{{ $area->id }}" >
									<h5 style="margin-bottom:0px;  ">{{ $area->name_area }}</h5>
                                </div> 
                                <div class="col-2 align-self-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#Line_{{ $area->id }}" aria-expanded="false" aria-controls="form_delete_{{ $area->id }}" >
                                    <i class="fas fa-angle-down" ></i>
                                </div>
                                <div class="col-12 collapse" id="Line_{{ $area->id }}"> 
                                    <hr>
                                    <p style="font-size:18px;padding:0px"> กลุ่มไลน์ <br> {{ $area->line_group }} </p> <hr>
                                    <p style="font-size:18px;padding:0px">พื้นที่ปัจจุบัน <br>
										@if(!empty($area->sos_area))
											<a href="javaScript:;" class="btn btn-sm btn-success radius-30" ><i class="bx bx-check-double"></i>Yes</a>
										@else
											<a href="javaScript:;" class="btn btn-sm btn-danger radius-30" ><i class="fadeIn animated bx bx-x"></i>No</a>
										@endif
									</p> 
									<hr>
                                    <p style="font-size:18px;padding:0px">พื้นที่รอตรวจสอบ <br> 
										@if(!empty($area->new_sos_area))
											<a href="javaScript:;" class="btn btn-sm btn-success radius-30" ><i class="bx bx-check-double"></i>Yes</a>
										@else
											<a href="javaScript:;" class="btn btn-sm btn-danger radius-30" ><i class="fadeIn animated bx bx-x"></i>No</a>
										@endif
                                    </p> 
                                </div>
                            </div>
                        </center>   
                    </div>  
                @endforeach
            </div>
        </div>
    </div>
	<!------------------------------------------------------- end mobile ------------------------------------------------------->
	
	<!-- <div class="container-fluid"> -->
		<!-- ADD NEW AREA -->
		<!-- <div class="row">
			@if(Auth::check())
				@if(Auth::user()->id == 21 or Auth::user()->id == 2)
				<div class="col-12">
					<a id="btn_add_area" class="btn text-white float-right" style="background-color: #008450;" data-toggle="collapse" data-target="#div_name_partner" aria-expanded="false" aria-controls="div_name_partner">
					<i class="fadeIn animated bx bx-add-to-queue"></i>เพิ่มพื้นที่บริการใหม่
					</a>
				</div>
				@endif
			@endif -->

			<!-- div_name_partner -->
			<!-- <div id="div_name_partner" class="collapse col-12">
				<div class="card">
					<h3 class="card-header">
						เพิ่มพื้นที่บริการใหม่ 
						<i class="fas fa-times float-right btn" data-toggle="collapse" data-target="#div_name_partner" aria-expanded="false" aria-controls="div_name_partner"></i>
					</h3>
					<div class="card-body">
						<form method="POST" action="{{ url('/partner_add_area') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

							@foreach($data_partners as $data_partner)
							<div class="row">
								<div class="col-4">
						            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
						                <label for="name" class="control-label">{{ 'ชื่อพาร์ทเนอร์' }}</label>
						                <input class="form-control" name="name" type="text" id="name" value="{{ $data_partner->name }}"  readonly>
						                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
						            </div>
						        </div>
								<div class="col-4">
				                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
				                        <label for="phone" class="control-label">{{ 'เบอร์' }}</label>
				                        <input class="form-control" name="phone" type="phone" id="phone" value="{{ $data_partner->phone }}"   readonly>
				                        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
				                    </div>
				                </div>
				                <div class="col-4">
				                    <div class="form-group {{ $errors->has('mail') ? 'has-error' : ''}}">
				                        <label for="mail" class="control-label">{{ 'เมล' }}</label>
				                        <input class="form-control" name="mail" type="mail" id="mail" value="{{ $data_partner->mail }}"  readonly>
				                        {!! $errors->first('mail', '<p class="help-block">:message</p>') !!}
				                    </div>
				                </div>
				                <div class="col-3">
				                    <div class="form-group {{ $errors->has('name_area') ? 'has-error' : ''}}">
				                        <label for="name_area" class="control-label">{{ 'ชื่อพื้นที่' }}</label>
				                        <input class="form-control" name="name_area" type="name_area" id="name_area" value="{{ isset($partner->name_area) ? $partner->name_area : ''}}" required>
				                        {!! $errors->first('name_area', '<p class="help-block">:message</p>') !!}
				                    </div>
				                </div>
				                <div class="col-5">
				                	<div class="row">
				                		<div class="col-4">
				                			<div class="form-group {{ $errors->has('line_group') ? 'has-error' : ''}}">
						                        <br>
						                        <select id="line_group" name="line_group" class="btn btn-sm text-white" style="background-color: #27CF00;margin-top: 9px;" onchange="document.querySelector('#btn_send_pass_area').classList.remove('d-none');" required>
						                            <option value="" selected>- เลือกกลุ่มไลน์ -</option>
						                            @foreach($group_line as $item)
						                                <option value="{{ $item->groupName }}" 
						                                {{ request('groupName') == $item->groupName ? 'selected' : ''   }} >
						                                {{ $item->groupName }} 
						                                </option>
						                                {!! $errors->first('line_group', '<p class="help-block">:message</p>') !!}
						                            @endforeach 
						                        </select>
						                    </div>
						                    <input class="form-control d-none" name="group_line_id" type="group_line_id" id="group_line_id" value="" >
				                        	{!! $errors->first('group_line_id', '<p class="help-block">:message</p>') !!}

				                        	<input class="form-control d-none" name="user_id_admin" type="user_id_admin" id="user_id_admin" value="{{ Auth::user()->id }}" >
				                        	{!! $errors->first('user_id_admin', '<p class="help-block">:message</p>') !!}
				                		</div>
				                		<div class="col-5">
						                    <br>
						                    <div id="btn_send_pass_area" class="d-none text-center">
						                    	<a class="btn text-white" style="background-color: #FA9E33;margin-top: 9px;" onclick="send_pass_area();">
													ส่งรหัสยืนยันกลุ่มไลน์
												</a>
						                    </div>
				                			<div id="spinner_send_pass" class="d-none text-center">
				                				<div style="margin-top: 9px;" class="spinner-border text-success"></div> &nbsp;&nbsp;กำลังส่งรหัส..
				                			</div>
											<div id="text_send_pass_done" class="d-none text-center">
												<div class="row">
													<div class="col-3">
														<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
													        <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
													        <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
													    </svg>
													</div>
													<div class="col-9">
														<p style="margin-top: 23px;margin-left: 10px;float: left;">ส่งรหัสแล้ว</p>
													</div>
												</div>
											</div>
											
				                		</div>
				                		<div class="col-3">
				                			<div id="div_cf_pass_area" class="d-none">
				                        		<label for="cf_pass_area" class="control-label">{{ 'กรุณายืนยันรหัส' }}</label>
						                    	<input class="form-control" type="text" name="cf_pass_area" id="cf_pass_area" oninput="check_pass_area();">
				                			</div>
				                		</div>
				                	</div>
				                </div>
				                <div class="col-4">
				                	<br>
									<input style="margin-top: 9px;" id="submit_add_area" class="btn btn-primary float-right d-none" type="submit" value="{{ 'ยืนยันการเพิ่มพื้นที่ใหม่' }}">
				                </div>
							</div>
							@endforeach
						</form>
					</div>
				</div>
			</div>
		</div>
		<hr> -->
		<!-- END ADD NEW AREA -->
		
		<!-- <br> -->
		<!-- AREA CURRENT -->
		<!-- <div class="card">
			<h3 class="card-header">รายชื่อพื้นที่บริการปัจจุบัน</h3>
			<div class="card-body">
				<div class="col-12">
					<div class="row alert alert-secondary text-center">
	                    <div class="col-3">
	                        <b>ชื่อพื้นที่บริการ</b>
	                    </div>
	                    <div class="col-3">
	                        <b>ชื่อกลุ่มไลน์</b>
	                    </div>
	                    <div class="col-2">
	                        <b>พื้นที่ปัจจุบัน</b>
	                    </div>
	                    <div class="col-2">
	                        <b>พื้นที่รอการตรวจสอบ</b>
	                    </div>
	                    <div class="col-2">

	                    </div>
	                </div>
					@foreach($all_area_partners as $area)
						<div class="row text-center">
							<div class="col-3">
					            <h3 class="text-info"><b>{{ $area->name_area }}</b></h3>
					        </div>
					        <div class="col-3">
					            <p>{{ $area->line_group }}</p>
					        </div>
					        <div class="col-2">
					        	@if(!empty($area->sos_area))
                                    <span class="text-success"><i class="fas fa-check te"></i> Yes</span>
                                @else
                                    <span class="text-danger"><i class="fas fa-times"></i> No</span>
                                @endif
					        </div>
					        <div class="col-2">
					        	@if(!empty($area->new_sos_area))
                                    <span class="text-success"><i class="fas fa-check te"></i> Yes</span>
                                @else
                                    <span class="text-danger"><i class="fas fa-times"></i> No</span>
                                @endif
					        </div>
					        <div class="col-2">
					        	<a  type="submit" class="btn btn-warning " href="{{ url('/service_area?name_area=' . $area->name_area) }}">
                                    <i class="far fa-edit"></i> ดูข้อมูล / แก้ไข
                                </a>
					        </div>
						</div>
					<hr>
					@endforeach
				</div>
			</div>
		</div>
	</div> -->
	<script>

		var num_pass_area ;

		function send_pass_area(){
			document.querySelector('#btn_send_pass_area').classList.add('d-none');
			document.querySelector('#spinner_send_pass').classList.remove('d-none');
			
			let line_group = document.querySelector('#line_group').value;

			num_pass_area = Math.floor(Math.random() * 10000);
			num_pass_area = num_pass_area.toString();

			fetch("{{ url('/') }}/api/send_pass_area/"+line_group+'/'+num_pass_area)
	            .then(response => response.json())
	            .then(result => {
	                // console.log(result);
	                // console.log(num_pass_area);
	                
	                let group_line_id = document.querySelector('#group_line_id');
	                	group_line_id.value = result[0]['id'];
	                document.querySelector('#spinner_send_pass').classList.add('d-none');
					document.querySelector('#text_send_pass_done').classList.remove('d-none');
					document.querySelector('#div_cf_pass_area').classList.remove('d-none');

	        });
		}

		function check_pass_area(){
			let cf_pass_area = document.querySelector('#cf_pass_area').value ;
				cf_pass_area = cf_pass_area.toString();

			if (cf_pass_area === num_pass_area) {
				document.querySelector('#btn_submit_add_area').classList.remove('d-none');
			}else{
				document.querySelector('#btn_submit_add_area').classList.add('d-none');
			}
		}

		// ------------- have area -------------

		function select_line_group_have_area(id)
		{
			let select_line_group = document.querySelector('#line_group_' + id) ;
				// console.log(select_line_group.value);
				select_line_group.classList.add('d-none');
			let btn_send_pass_area = document.querySelector('#btn_send_pass_area_'+id);
				btn_send_pass_area.classList.remove('d-none');

			document.querySelector('#text_group_line_'+id).innerHTML = select_line_group.value ;
		}

		function send_pass_area_have_area(id)
		{
			let btn_send_pass_area = document.querySelector('#btn_send_pass_area_'+id);
				btn_send_pass_area.classList.add('d-none');

			let div_cf_pass_area = document.querySelector('#div_cf_pass_area_'+id);
				div_cf_pass_area.classList.remove('d-none');

			let line_group = document.querySelector('#line_group_' + id).value; ;

				num_pass_area = Math.floor(Math.random() * 10000);
				num_pass_area = num_pass_area.toString();

			fetch("{{ url('/') }}/api/send_pass_area/"+line_group+'/'+num_pass_area)
	            .then(response => response.json())
	            .then(result => {
	                // console.log(result);
	                // console.log(num_pass_area);
	                
	                // let group_line_id = document.querySelector('#group_line_id');
	                // 	group_line_id.value = result[0]['id'];

					div_cf_pass_area.classList.remove('d-none');

	        });

		}

		function check_pass_area_have_area(id)
		{
			let cf_pass_area = document.querySelector('#cf_pass_area_'+id).value ;
				cf_pass_area = cf_pass_area.toString();

			if (cf_pass_area === num_pass_area) {
				document.querySelector('#submit_add_area_'+id).classList.remove('d-none');
				let div_cf_pass_area = document.querySelector('#div_cf_pass_area_'+id);
					div_cf_pass_area.classList.add('d-none');
			}else{
				document.querySelector('#submit_add_area_'+id).classList.add('d-none');
			}
		}

		function submit_group_line(id)
		{
			let name_line_group = document.querySelector('#line_group_' + id).value ;
			let id_partner = id ;

	        // console.log(name_line_group);
	        // console.log(id_partner);

	        fetch("{{ url('/') }}/api/submit_group_line/"+name_line_group+"/"+id_partner)
	            .then(response => response.json())
	            .then(result => {
	                // console.log(result);
	                document.querySelector('#btn_modal_edit_ok').click();

	                var delayInMilliseconds = 1500; //1.5 second

			        setTimeout(function() {
			        	window.location.reload(true);
			        }, delayInMilliseconds);

	        });
		}

		// ------------------ gen qr-code -----------------------

		function gen_qr_code(){
        
        let result = document.querySelector('#name_area') ;
        let name_new_check_in = result.value.replaceAll(' ' , '_');

        let name_partner = document.querySelector('#name') ;

        let url = "https://chart.googleapis.com/chart?cht=qr&chl=https://www.viicheck.com/check_in/create?location=" + name_new_check_in + "&chs=500x500&choe=UTF-8"

            // console.log(url);

        let data = {
            'url' : url,
            'name_partner' : name_partner.value,
            'name_new_check_in' : name_new_check_in,
        };

        fetch("{{ url('/') }}/api/save_img_url", {
            method: 'post',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(function (response){
            return response.text();
        }).then(function(text){
            // console.log(text);
            change_color_theme("check_in/" + text);


        }).catch(function(error){
            // console.error(error);
        });

    }

    function change_color_theme(url_img)
    {
        console.log('change_color_theme');

        let color_theme = document.querySelector('#color_theme') ;

        let name_partner = document.querySelector('#name') ;
        let name_new_check_in = document.querySelector('#name_area') ;

        let data = {
            'color_theme' : color_theme.value,
            'name_partner' : name_partner.value,
            'name_new_check_in' : name_new_check_in.value,
            'url_img' : url_img,
            'type_of' : "sos",
        };

        fetch("{{ url('/') }}/api/create_img_check_in", {
            method: 'post',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(function (response){
            return response.text();
        }).then(function(text){
            // console.log(text);
            click_submit();

        }).catch(function(error){
            console.error(error);
        });

    }

    function click_submit()
    {
    	let submit_add_area = document.querySelector('#submit_add_area');
    		submit_add_area.click();
    }

    function click_modal_delete_area(id , name , name_area , group_line)
    {	
    	if (group_line) {
    		document.querySelector('#group_line_modal').innerHTML = group_line ;
    		document.querySelector('#div_group_line_modal').classList.remove('d-none') ;
    	}

    	let text_name_and_namearea = document.querySelector('#text_name_and_namearea');
    		text_name_and_namearea.innerHTML = name+"/"+name_area ;

    	let btn_cf_delete_area = document.querySelector('#btn_cf_delete_area');

    	let onclick = document.createAttribute("onclick");
            onclick.value =  "delete_area(" + id +")" ;
        
        btn_cf_delete_area.setAttributeNode(onclick);
    	
    	document.querySelector('#btb_modal_delete_area').click();
    }

    function check_text_input()
    {
    	let text_cf_name_area = document.querySelector('#text_cf_name_area').value ;
    	let text_name_and_namearea = document.querySelector('#text_name_and_namearea').innerHTML;

    	if (text_cf_name_area === text_name_and_namearea) {
    		document.querySelector('#btn_cf_delete_area').disabled = false ;
    	}else{
    		document.querySelector('#btn_cf_delete_area').disabled = true ;
    	}
    }

    function delete_area(id)
    {
        fetch("{{ url('/') }}/api/delete_area/" + id )
            .then(response => response.text())
            .then(result => {
                // console.log(result);
                if (result === "OK") {
        			// console.log('delete_area ' + id);
                    window.location.reload(true);
                }
        });
    }


	</script>
@endsection