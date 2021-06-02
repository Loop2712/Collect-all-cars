@extends('layouts.mail_to')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-4">
				<img width="50%" src="{{ asset('/img/logo/VII-check-LOGO-W-v1.png') }}">
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-md-10">
				<div>
					<h1>เรียน บริษัท <b>{{ $data["juristicNameTH"] }}</b></h1>
					<br>
					ทางเราได้รับการแจ้งปัญหาการขับขี่ยานพาหนะภายในองค์กรของท่าน
					<br>
					สาขา <b>{{ $data["branch"] }}</b> อำเภอ/เขต <b>{{ $data["branch_district"] }}</b> จังหวัด <b>{{ $data["branch_province"] }}</b>
					<br>
					เมื่อเวลา {{ $data["datetime"] }}
					<br>
					หมายเลขทะเบียน <b>{{ $data["registration_number"] }} {{ $data["province"] }} </b>
					<br>
					ปัญหาการขับขี่ที่ได้รับแจ้งคือ <b>{{ $data["masseng"] }}</b>
					<br>
					
				</div>
			</div>
		</div>
		@if(!empty($data["phone"]))
		<div class="row">
			<div class="col-12 col-md-12">
				เบอร์โทรศัพท์ติดต่อผู้แจ้ง {{ $data["phone"] }}
				<br>
			</div>
			<div class="col-12 col-md-2">
				<br>
				<button type="button" style="background-color: #69b528; color:#ffffff;text-decoration: none;width: 100%;padding: 10px;border-radius: 10px;">
					<a type="button" style="background-color: #69b528; color:#ffffff;text-decoration: none;" href="tel:{{ $data['phone'] }}">
						📞 โทรออก
					</a>
				</button>
			</div>
		</div>
		@endif
	</div>   
@endsection
