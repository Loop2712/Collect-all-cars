<h1>เรียนคุณ <span style="color: #0066FF ">{{ $name }}</span></h1>

@foreach($reply as $item)
	<p>ผู้ใช้รถหมายเลขทะเบียน {{ $item->registration_number }} {{ $item->province }} ที่ท่านได้ติดต่อสักครู่นี้</p>
@endforeach
<p>แจ้งว่า</p><br>
<p>
	@if(postback_data == "wait")
	<b>รอสักครู่ / Wait a moment</b>
	@endif

	@if(postback_data == "thx")
	<b>ขอบคุณ / Thank you</b>
	@endif
</p>