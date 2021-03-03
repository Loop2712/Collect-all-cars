
<h1>เรียนคุณ <span style="color: #0066FF ">{{ $data["name"] }}</span></h1>

<p>ผู้ใช้รถหมายเลขทะเบียน {{ $data["registration_number"] }} {{ $data["province"] }} ที่ท่านได้ติดต่อสักครู่นี้</p>

<p>แจ้งว่า</p><br>
<p>
	@if($data["postback_data"] == "wait")
	<b>รอสักครู่ / Wait a moment</b>
	@endif

	@if($data["postback_data"] == "thx")
	<b>ขอบคุณ / Thank you</b>
	@endif
</p>