@extends('layouts.news')

@section('content')
<div class="container">
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

				@if(!empty($data["phone"]))
					เบอร์โทรศัพท์ติดต่อผู้แจ้ง {{ $data["phone"] }}
					<a href="tel:{{ $data['phone'] }}">
						<button type="button" class="btn btn-outline-success">📞 โทรออก</button>
					</a>
					
				@endif
			</div>
		</div>
	</div>
</div>
@endsection