
<h1>เรียนคุณ <span style="color: #0066FF ">{{ $data["name"] }}</span></h1>

<h5>
	ผู้ใช้รถหมายเลขทะเบียน
	<b style="color: #FF0000">{{ $data["registration_number"] }} {{ $data["province"] }}</b><br>
	ที่ท่านได้ติดต่อสักครู่นี้
</h5>

<h4>แจ้งว่า</h4><br>
<h3>
	@if($data["postback_data"] == "wait")
	<b>รอสักครู่ / Wait a moment</b>
	@endif

	@if($data["postback_data"] == "thx")
	<b>ขอบคุณ / Thank you</b>
	@endif
</h3>