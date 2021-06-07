@extends('layouts.mail_to')

@section('content')
	<div class="container">
		<div class="row">
			<!-- คอม -->
			<div class="col-md-12 d-none d-lg-block">
				<div class="row">
					<div class="col-md-8" style="font-size:18px;">
						<h3>เรียน บริษัท <b>{{ $data["juristicNameTH"] }}</b></h3>
						
						ทางเราได้รับการแจ้งปัญหาการขับขี่ยานพาหนะภายในองค์กรของท่าน
						<br>
						<b>สาขา</b> {{ $data["branch"] }} <b>อำเภอ/เขต</b> {{ $data["branch_district"] }} <b>จังหวัด</b> {{ $data["branch_province"] }}
						<br>
						<br><hr><br>
						เมื่อเวลา {{ $data["datetime"] }}
						<br>
						หมายเลขทะเบียน <b style="font-size:20px;">{{ $data["registration_number"] }} {{ $data["province"] }} </b>
						<br><br>
						ปัญหาการขับขี่ที่ได้รับแจ้งคือ <b style="font-size:20px;color: red;">{{ $data["masseng"] }}</b>
						<br><br>
					</div>
					<!{{ <div class="col-md-4">
						<br>
						<img width="300" src="{{ asset('/img/stickerline/PNG/37.png') }}"> 
					</div> {{>
				</div>
				@if(!empty($data["phone"]))
				<div class="row">
					<div class="col-md-12" style="font-size:20px;">
						เบอร์โทรศัพท์ติดต่อผู้แจ้ง <b> {{ $data["phone"] }}</b>
						<br>
					</div>
					<div class="col-md-2">
						<br>
						<button type="button" style="background-color: #69b528; color:#ffffff;text-decoration: none;padding: 10px;border-radius: 10px;">
							<a type="button" style="background-color: #69b528; color:#ffffff;text-decoration: none;" href="tel:{{ $data['phone'] }}">
								📞 โทรออก
							</a>
						</button>
					</div>
				</div>
				@endif
			</div>

			<!-- มือถือ -->
			<div class="col-12 d-block d-none">
				<div class="col-12" style="font-size:14px;">
					<img width="200" src="{{ asset('/img/stickerline/PNG/37.png') }}">
					<br><br>
					<h5>เรียน บริษัท <b>{{ $data["juristicNameTH"] }}</b></h5>
					
					ทางเราได้รับการแจ้งปัญหาการขับขี่ยานพาหนะภายในองค์กรของท่าน
					<br>
					<b>สาขา</b> {{ $data["branch"] }}
					<br>
					<b>อำเภอ/เขต</b> {{ $data["branch_district"] }}
					<br>
					<b>จังหวัด</b> {{ $data["branch_province"] }}
					<br>
					<br><hr><br>
					เมื่อเวลา {{ $data["datetime"] }}
					<br>
					หมายเลขทะเบียน <b style="font-size:17px;"><br>
					{{ $data["registration_number"] }} {{ $data["province"] }} </b>
					<br><br>
					ปัญหาการขับขี่ที่ได้รับแจ้งคือ <b style="font-size:17px;color: red;"><br>
					{{ $data["masseng"] }}</b>
					<br><br>
				</div>
				@if(!empty($data["phone"]))
				<div class="row">
					<div class="col-12" style="font-size:14px;">
						เบอร์โทรศัพท์ติดต่อผู้แจ้ง <b> {{ $data["phone"] }}</b>
						<br>
					</div>
					<div class="col-2">
						<br>
						<button type="button" style="background-color: #69b528; color:#ffffff;text-decoration: none;padding: 10px;border-radius: 10px;">
							<a type="button" style="background-color: #69b528; color:#ffffff;text-decoration: none;" href="tel:{{ $data['phone'] }}">
								📞 โทรออก
							</a>
						</button>
					</div>
				</div>
				@endif
			</div>
		</div>
	</div>   
@endsection
