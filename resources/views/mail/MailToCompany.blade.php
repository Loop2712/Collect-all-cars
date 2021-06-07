@extends('layouts.mail_to')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-10">
				<div class="row">
					<div class="col-md-8">
						<div style="font-size:18px;">
							<h3>เรียน บริษัท <b>{{ $data["juristicNameTH"] }}</b></h3>
							
							ทางเราได้รับการแจ้งปัญหาการขับขี่ยานพาหนะภายในองค์กรของท่าน
							<br>
							<b>สาขา</b> {{ $data["branch"] }} <b>อำเภอ/เขต</b> {{ $data["branch_district"] }} <b>จังหวัด</b> {{ $data["branch_province"] }}
							<hr>
							เมื่อเวลา {{ $data["datetime"] }}
							<br>
							หมายเลขทะเบียน <b style="font-size:20px;">{{ $data["registration_number"] }} {{ $data["province"] }} </b>
							<br><br>
							ปัญหาการขับขี่ที่ได้รับแจ้งคือ <b style="font-size:20px;color: red;">{{ $data["masseng"] }}</b>
							<br><br>

							@if(!empty($data["phone"]))
							<div class="row">
								<div class="col-12 col-md-12" style="font-size:20px;">
									เบอร์โทรศัพท์ติดต่อผู้แจ้ง <b> {{ $data["phone"] }}</b>
									<br>
								</div>
								<div class="col-12 col-md-2">
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
					<div class="col-md-4">
						<br><br><br>
						<img width="100%" src="{{ asset('/img/stickerline/PNG/37.png') }}"> 
					</div>
				</div>
			</div>
		</div>
	</div>   
@endsection
