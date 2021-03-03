@foreach($data as $item)
	<h1>เรียนคุณ <span style="color: #0066FF ">{{ $item->name }}</span></h1>

	<p>ผู้ใช้รถหมายเลขทะเบียน {{ $item->registration_number }} {{ $item->province }} ที่ท่านได้ติดต่อสักครู่นี้</p>

	<p>แจ้งว่า</p><br>
	<p>
		@if($item->postback_data == "wait")
		<b>รอสักครู่ / Wait a moment</b>
		@endif

		@if($item->postback_data == "thx")
		<b>ขอบคุณ / Thank you</b>
		@endif
	</p>
@endforeach