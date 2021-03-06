
<h1>เรียนคุณ</h1>
<h2><span style="color: #0066FF ">{{ $data["name"] }}</span></h2>

<h4>
	ผู้ใช้รถหมายเลขทะเบียน <br>
	<span style="color: #FF0000">{{ $data["registration_number"] }} {{ $data["province"] }}</span><br>
	ที่ท่านได้ติดต่อเมื่อสักครู่นี้
</h4>
<h3>แจ้งว่า</h3>
<h2>ฉันไม่สะดวก / I'm not comfortable</h2>
<h3>เหตุผล</h3>
<h2>{{ $data["content"] }}</h2>
@if( $data["want_phone"] == "Yes" )
	@if
	<h3>โปรดติดต่อ</h3>
	<h2>{{ $data["phone"] }}</h2>
@endif
