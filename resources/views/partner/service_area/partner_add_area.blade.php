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
								<label for="inputEmail" class="form-label">อีเมล์</label>
								<input class="form-control" name="mail" type="mail" id="mail" value="{{ $data_partner->mail }}"  readonly>
								{!! $errors->first('mail', '<p class="help-block">:message</p>') !!}
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
						@if(Auth::user()->role == "admin-partner" or Auth::user()->id == 2 or Auth::user()->id == 1)
							<a id="btn_add_area" class="btn text-white float-right" style="background-color: #008450;" data-toggle="collapse" data-target="#div_name_partner" aria-expanded="false" aria-controls="div_name_partner">
								<i class="fadeIn animated bx bx-add-to-queue"></i>เพิ่มพื้นที่บริการใหม่
							</a>
						@endif
					@endif
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
                                <td>{{ $area->line_group }}</td>
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
									<a  type="submit" class="btn btn-warning " href="{{ url('/service_area?name_area=' . $area->name_area) }}">
										<i class="far fa-edit"></i> ดูข้อมูล / แก้ไข
									</a>
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
				document.querySelector('#submit_add_area').classList.remove('d-none');
			}else{
				document.querySelector('#submit_add_area').classList.add('d-none');
			}
		}
	</script>
@endsection