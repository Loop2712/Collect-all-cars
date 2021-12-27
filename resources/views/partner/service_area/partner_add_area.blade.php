@extends('layouts.partners.theme_partner')

@section('content')
	<div class="container-fluid">
		<!-- ADD NEW AREA -->
		<div class="row">
			@if(Auth::check())
			@if(Auth::user()->id == 21 or Auth::user()->id == 2)
			<div class="col-12">
				<a id="btn_add_area" class="btn text-white float-right" style="background-color: #008450;" data-toggle="collapse" data-target="#div_name_partner" aria-expanded="false" aria-controls="div_name_partner">
					เพิ่มพื้นที่บริการใหม่
				</a>
			</div>
			@endif
			@endif

			<!-- div_name_partner -->
			<div id="div_name_partner" class="collapse col-12">
				<div class="card">
					<h3 class="card-header">
						เพิ่มพื้นที่บริการใหม่ 
						<i class="fas fa-times float-right btn" data-toggle="collapse" data-target="#div_name_partner" aria-expanded="false" aria-controls="div_name_partner"></i>
					</h3>
					<div class="card-body">
						@foreach($data_partners as $data_partner)
						<div class="row">
							<div class="col-4">
					            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
					                <label for="name" class="control-label">{{ 'ชื่อพาร์ทเนอร์' }}</label>
					                <input class="form-control" name="name" type="text" id="name" value="{{ $data_partner->name }}" required readonly>
					                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
					            </div>
					        </div>
							<div class="col-4">
			                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
			                        <label for="phone" class="control-label">{{ 'เบอร์' }}</label>
			                        <input class="form-control" name="phone" type="phone" id="phone" value="{{ $data_partner->phone }}" required pattern="[0-9]{9-10}" readonly>
			                        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
			                    </div>
			                </div>
			                <div class="col-4">
			                    <div class="form-group {{ $errors->has('mail') ? 'has-error' : ''}}">
			                        <label for="mail" class="control-label">{{ 'เมล' }}</label>
			                        <input class="form-control" name="mail" type="mail" id="mail" value="{{ $data_partner->mail }}" required readonly>
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
					                        <select id="line_group" name="line_group" class="btn btn-sm text-white" style="background-color: #27CF00;margin-top: 9px;" onchange="document.querySelector('#btn_send_pass_area').classList.remove('d-none');">
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
											<p style="margin-top: 20px;">ส่งรหัสแล้ว</p>
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
			                    <a class="btn btn-primary text-white float-right d-" style="margin-top: 9px;">
									ยืนยันการเพิ่มพื้นที่ใหม่
								</a>
			                </div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<hr>
		<!-- END ADD NEW AREA -->
		
		<br>
		<!-- AREA CURRENT -->
		<div class="card">
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
	</div>

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
	                console.log(result);
	                document.querySelector('#spinner_send_pass').classList.add('d-none');
					document.querySelector('#text_send_pass_done').classList.remove('d-none');
					document.querySelector('#div_cf_pass_area').classList.remove('d-none');

	        });
		}

		function check_pass_area(){
			let cf_pass_area = document.querySelector('#cf_pass_area').value ;
				cf_pass_area = cf_pass_area.toString();

				console.log(cf_pass_area);
				console.log(num_pass_area);

			if (cf_pass_area === num_pass_area) {
				console.log('YES');
			}
		}
	</script>
@endsection