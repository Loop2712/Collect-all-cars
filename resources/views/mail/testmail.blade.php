
<h1>เรียนคุณ <span style="color: #0066FF ">{{ $data["name"] }}</span></h1>

<h5>
	ผู้ใช้รถหมายเลขทะเบียน
	<span style="color: #FF0000">{{ $data["registration_number"] }} {{ $data["province"] }}</span><br>
	ที่ท่านได้ติดต่อเมื่อสักครู่นี้
</h5>
<h4>แจ้งว่า</h4>
<h3>
	@if($data["postback_data"] == "wait")
		กรุณารอสักครู่ / Wait a moment
	@endif

	@if($data["postback_data"] == "thx")
		ขอบคุณ / Thank you
	@endif
</h3>