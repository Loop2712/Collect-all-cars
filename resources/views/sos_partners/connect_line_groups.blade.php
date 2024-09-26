@extends('layouts.viicheck')

@section('content')

	@php
		$data_group_line = App\Models\Group_line::where('groupId' , $groupId)->first();
	@endphp
	<div class="card border-top border-0 border-4 border-primary notranslate" style="margin-top:100px;">
		<div class="card-body p-5">
			<div class="card-title">
				<center>
					<p class="mb-0 text-dark">
						ชื่อกลุ่มไลน์ : {{ $data_group_line->groupName }}
					</p>
					<br>
					<h5 class="mb-0 text-primary">
						<b>ยืนยันการผูกกลุ่มไลน์นี้</b>
						<br>
						กับองค์กรของคุณหรือไม่
					</h5>
				</center>
			</div>
			<hr>
			<div class="row g-3">
				<div class="col-md-6">
					<label for="secret_token" class="form-label">กรอกรหัสผ่าน (Secret Token)</label>
					<input type="email" class="form-control" id="secret_token">
				</div>
				<div class="col-12">
					<button type="submit" class="btn btn-primary px-5" onclick="check_secret_token();">ยืนยัน</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal CF connect_line_groups -->
	<button type="button" id="cf_connect_line_groups" class="d-none" data-toggle="modal" data-target="#connect_line_groups_Modal">
	  Launch demo modal
	</button>

	<!-- Modal -->
	<div class="modal fade notranslate" id="connect_line_groups_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  	<div class="modal-dialog">
	    	<div class="modal-content">
		      	<div class="modal-header">
		        	<h5 class="modal-title" id="exampleModalLabel">ยืนยันการผูกกลุ่มไลน์ ?</h5>
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          		<span aria-hidden="true">&times;</span>
		        	</button>
		      	</div>
		      	<div class="modal-body" id="body_modal">
		        	ยืนยันการผูกกลุ่มไลน์กับ <span id="name_partner"></span>
		      	</div>
		      	<div class="modal-footer" id="footer_modal">
		        	<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
		        	<button type="button" class="btn btn-primary" onclick="click_cf_connect();">ยืนยัน</button>
		      	</div>
	    	</div>
	  	</div>
	</div>

	<script>
		var data_partner ;
		function check_secret_token() {
			let secret_token = document.querySelector('#secret_token').value ;

			fetch("{{ url('/') }}/api/check_secret_token/" + secret_token)
                .then(response => response.json())
                .then(result => {
                	if (typeof result === 'object' && result !== null) {
			            // console.log(result);
			            data_partner = result ;
			            document.querySelector('#cf_connect_line_groups').click();
			            document.querySelector('#name_partner').innerHTML = result.name;
			        } else {
			            alert('ไม่พบข้อมูล');
			        }

                })
			    .catch(error => {
			        // console.error('Error:', error);
			        alert('ไม่พบข้อมูล');
			    });
		}

		function click_cf_connect(){
			console.log(data_partner);
			let groupId = "{{ $groupId }}";

			fetch("{{ url('/') }}/api/click_cf_connect/" + data_partner.id + "/" + data_partner.name + "/" + groupId)
                .then(response => response.text())
                .then(result => {
                	
                	if(result == "success"){
                		console.log("success");
                		document.querySelector('#footer_modal').classList.add('d-none');
                		document.querySelector('#body_modal').innerHTML = "ดำเนินการเรียบร้อย";
                	}
                })
		}
	</script>
@endsection