@extends('layouts.partners.theme_partner_new')

@section('content')
<style>
	*:not(i) {
		font-family: 'Kanit', sans-serif;
	}

	.btn-save-data {
		border-radius: 10px;
		padding: 10px 50px;
		width: 150px;
	}

	.spinner {
		display: inline-block;
		margin: 0 8px;
		border-radius: 50%;
		width: 1.5em;
		height: 1.5em;
		border: .215em solid transparent;
		vertical-align: middle;
		font-size: 16px;
		border-top-color: white;
		animation: spiner 1s cubic-bezier(.55, .15, .45, .85) infinite;
	}

	@keyframes spiner {
		0% {
			transform: rotate(0deg);
		}

		100% {
			transform: rotate(360deg);
		}
	}

	.v-btn-label-enter-active {
		animation: slide-in-down 260ms cubic-bezier(.0, .0, .2, 1);
	}

	.v-btn-label-leave-active {
		animation: slide-out-down 260ms cubic-bezier(.4, .0, 1, 1);
	}

	.icon-save-btn {
		display: inline-block;

	}

	@keyframes slide-in-down {
		0% {
			transform: translateY(-20px);
			opacity: 0;
		}

		50% {
			opacity: .8;
		}

		100% {
			transform: translateY(0);
			opacity: 1;
		}
	}

	@keyframes slide-out-down {
		0% {
			transform: translateY(0);
			opacity: 1;
		}

		40% {
			opacity: .2;
		}

		100% {
			transform: translateY(20px);
			opacity: 0;
		}
	}

	.img-sos-map {
		object-fit: cover !important;
	}

	.title-sos-map {
		position: relative;
		width: 100%;
	}

	.badge-status {
		position: absolute;
		right: 0;
		top: 0;
	}

	.badge {
		font-size: 17px;
	}

	#status {
		border-radius: 5px;
		padding: 10px 10px;
	}

	.option-group {
		/* font-size: 2em; */
		text-align: center;

	}

	SELECT#status {
		background: url("data:image/svg+xml,<svg height='10px' width='10px' viewBox='0 0 16 16' fill='%23FFFFFF' xmlns='http://www.w3.org/2000/svg'><path d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/></svg>") no-repeat;
		background-position: calc(100% - 8%) center !important;
		-moz-appearance: none !important;
		-webkit-appearance: none !important;
		appearance: none !important;
		padding-right: 2rem !important;
	}

	SELECT#status option {
		margin: 100px;
	}#status option:checked {
    display: none;
}
</style>

<div class="container-partner-sos row">
	<div class="card">
		<div class="row g-0">
			<div class="col-md-4 border-end text-center">
				@if (!empty($data_report->sos_map->photo))
				<img src="{{ asset('/storage').'/' }}{{ $data_report->sos_map->photo}}" class="p-1 img-sos-map img-fluid" alt="">
				@else
				<img src="{{ asset('/img/stickerline/Flex/15.png') }}" class="p-0 img-sos-map img-fluid d-block w-100" alt="">
				<h6 class="text-danger w-100">*ผู้ใช้ไม่ได้เพิ่มรูปภาพ</h6>

				@endif
			</div>
			<div class="col-md-8">
				<div class="card-body">
					<div class="title-sos-map">
						<h3 class="card-title"> <b>หัวข้อ : {{$data_report->sos_map->title_sos}}</b></h3>
						<dd class="badge-status">
							@php
							$class_select_status = '' ;
							switch ($data_report->sos_map->status) {
							case 'รับแจ้งเหตุ':
							$class_select_status = 'bg-danger text-white' ;
							break;
							case 'กำลังไปช่วยเหลือ':
							$class_select_status = 'bg-warning text-dark' ;
							break;
							case 'เสร็จสิ้น':
							$class_select_status = 'bg-success text-white' ;
							break;
							}
							@endphp
							<select id="status" name="status" class="{{$class_select_status}} w-100">
								<option class="option-group text-center bg-danger" @if($data_report->sos_map->status === "รับแจ้งเหตุ") selected @endif value="รับแจ้งเหตุ">รอดำเนินการ</option>
								<option class="option-group text-center bg-warning text-dark" @if($data_report->sos_map->status === "กำลังไปช่วยเหลือ") selected @endif value="กำลังไปช่วยเหลือ">อยู่ระหว่างดำเนินการ</option>
								<option class="option-group text-center bg-success" @if($data_report->sos_map->status === "เสร็จสิ้น") selected @endif value="เสร็จสิ้น">เสร็จสิ้น</option>
							</select>
						</dd>
					</div>

					<p class="card-text fs-6">
						รายละเอียด : {{$data_report->sos_map->title_sos_other}}
					</p>
					<dl class="row mt-5">
						<dt class="col-sm-3">ชื่อผู้แจ้ง</dt>
						<dd class="col-sm-9">{{ $data_report->sos_map->name }}</dd>

						<!-- <dt class="col-sm-3">เจ้าหน้าที่</dt>
						<dd class="col-sm-9"></dd> -->

						<dt class="col-sm-3">แจ้งวันที่</dt>
						<dd class="col-sm-9">{{ thaidate("lที่ j F Y" , strtotime($data_report->sos_map->created_at)) }} ({{ \Carbon\Carbon::parse($data_report->sos_map->created_at)->locale('th')->diffForHumans() }})</dd>

						<dt class="col-sm-3">ลิงก์ (คู่มือหรือวีดีโอ)</dt>
						<dd class="col-sm-9">
							<input class="form-control mb-3" type="text" name="link" id="link" placeholder="แนบลิงก์ (คู่มือหรือวีดีโอ)" value="{{ isset($data_report->link) ? $data_report->link : ''}}">
						</dd>

						<dt class="col-sm-3">วิธีแก้ไขเบื้องต้น</dt>
						<dd class="col-sm-9">
							<textarea class="form-control" id="how_to_fix" placeholder="กรอกวิธีการแก้ไขเบื้องต้น" rows="3">{{ isset($data_report->how_to_fix) ? $data_report->how_to_fix : ''}}</textarea>
						</dd>
					</dl>
					<hr>
					<button class="btn btn-success btn-save-data float-end" id="saveButton" onclick="save_data()">
						<span class="text-save-btn d-non" style="display: inline-block;">ยืนยัน</span>

						<div class="spinner-save-btn d-none">
							<span class="spinner"></span>
						</div>

						<span class="icon-save-btn d-none">
							<i class="fa-solid fa-check"></i>
						</span>
					</button>
				</div>
			</div>
		</div>
		<hr>

	</div>
</div>
<script>
	let isAnimating = true;

	function save_data() {
		if (isAnimating) {
			let data_arr = [];

			let status = document.querySelector('.badge-status select').value;
			let link = document.querySelector('#link').value;
			let how_to_fix = document.querySelector('#how_to_fix').value;

			data_arr = {
				"sos_map_id": "{{$data_report->sos_map_id}}",
				"status": status,
				"link": link,
				"how_to_fix": how_to_fix,
				"user_id": "{{$data_report->sos_map->user_id}}",
			};

			// console.log(data_arr);

			fetch("{{ url('/') }}/api/update_data_report_repair", {
				method: 'post',
				body: JSON.stringify(data_arr),
				headers: {
					'Content-Type': 'application/json'
				}
			}).then(function(response) {
				return response.text();
			}).then(function(data) {
				// console.log(data);
				animation_save_data();
			}).catch(function(error) {
				// console.error(error);
			});
		}
	}

	function animation_save_data() {
		if (isAnimating) {
			isAnimating = false;

			document.querySelector('.text-save-btn').classList.remove('v-btn-label-enter-active');
			document.querySelector('.text-save-btn').classList.add('v-btn-label-leave-active');

			setTimeout(() => {
				document.querySelector('.text-save-btn').classList.add('d-none');


				document.querySelector('.text-save-btn').classList.remove('v-btn-label-leave-active');
				document.querySelector('.spinner-save-btn').classList.remove('d-none');
				document.querySelector('.spinner-save-btn').classList.add('v-btn-label-enter-active');
			}, 200);

			setTimeout(() => {
				document.querySelector('.spinner-save-btn').classList.add('v-btn-label-leave-active');
			}, 1280);

			setTimeout(() => {
				document.querySelector('.spinner-save-btn').classList.add('d-none');
				document.querySelector('.spinner-save-btn').classList.remove('v-btn-label-enter-active');
				document.querySelector('.spinner-save-btn').classList.remove('v-btn-label-leave-active');

				document.querySelector('.icon-save-btn').classList.add('v-btn-label-enter-active');
				document.querySelector('.icon-save-btn').classList.remove('d-none');
			}, 1500);

			setTimeout(() => {
				document.querySelector('.icon-save-btn').classList.add('v-btn-label-leave-active');
			}, 2000);

			setTimeout(() => {
				document.querySelector('.icon-save-btn').classList.add('d-none');
				document.querySelector('.icon-save-btn').classList.remove('v-btn-label-enter-active');
				document.querySelector('.icon-save-btn').classList.remove('v-btn-label-leave-active');
				document.querySelector('.text-save-btn').classList.remove('d-none');
				document.querySelector('.text-save-btn').classList.add('v-btn-label-enter-active');
				isAnimating = true;
			}, 2200);
		}
	}
</script>

<script>
	const selectElement = document.getElementById('status');

	// เพิ่ม event listener เมื่อมีการเปลี่ยนเลือก
	selectElement.addEventListener('change', (event) => {
		// ดึงค่าที่เลือก
		const selectedValue = event.target.value;

		// กำหนดสีพื้นหลังตามค่าที่เลือก
		if (selectedValue === 'รับแจ้งเหตุ') {
			selectElement.classList.remove('bg-warning', 'text-dark');
			selectElement.classList.remove('bg-success');
			selectElement.classList.add('bg-danger', 'text-white');
		} else if (selectedValue === 'กำลังไปช่วยเหลือ') {
			selectElement.classList.add('bg-warning', 'text-dark');
			selectElement.classList.remove('bg-success');
			selectElement.classList.remove('bg-danger', 'text-white');
		} else if (selectedValue === 'เสร็จสิ้น') {
			selectElement.classList.remove('bg-warning', 'text-dark');
			selectElement.classList.add('bg-success');
			selectElement.classList.remove('bg-danger', 'text-white');
		} else {
			selectElement.style.backgroundColor = 'white'; // สีพื้นหลังเริ่มต้น
		}
	});
</script>
@endsection