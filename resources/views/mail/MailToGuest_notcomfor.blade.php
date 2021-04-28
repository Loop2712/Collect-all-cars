
<h1>เรียนคุณ</h1>
<h2><span style="color: #0066FF ">{{ $data["name"] }}</span></h2>

<h4>
	ผู้ใช้รถหมายเลขทะเบียน <br>
	<span style="color: #FF0000">{{ $data["registration_number"] }} {{ $data["province"] }}</span><br>
	ที่ท่านได้ติดต่อเมื่อสักครู่นี้
</h4>
<h3>แจ้งว่า</h3>
<h2>ฉันไม่สะดวก / I'm not available</h2>
<h3>เหตุผล</h3>
<h2 style="color: #FF0000">{{ $data["content"] }}</h2>
@if( $data["want_phone"] == "Yes" )
	<h3>โปรดติดต่อ</h3>
	<h2 style="color: #0066FF ">{{ $data["phone"] }}</h2>
@endif


<div class="container" style="box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.15), 0 4px 10px 0 rgba(0, 0, 0, 0.15);border-radius: 10px;">
    <div class="row">
        <div class="col-12" style="border-style: solid;border-color: #ff0101;border-radius: 10px;background-color: #07375D;border-width: 5px;margin: 20px;padding: 20px;">
        	<div  class="col-12">
        		<center>
	        		<img width="70%" src="{{ asset('/img/logo/logo-flex-line.png') }}">
	        		<div class="col-11" style="border-style: solid;border-color: #ff0101;border-radius: 10px;background-color: #FAEBD7;border-width: 5px;padding: 20px;margin-top: -50px">
	        			<span style="color: #07375D;"><b>ฉันไม่สะดวก</b></span>
	        			<br>
	        			<span style="color: #07375D;line-height: 2;">I'm not available</span>
	        			<br><br>
	        			<img width="65%" src="{{ asset('/img/stickerline/PNG/26.png') }}">
	        		</div>
	        		<hr style="border-style: solid;border-color: #FFFFFF;margin-top: 20px;margin-bottom: 20px;">
	        	</center>
				
	        	<h3 style="color: #FFFFFF">เนื่องจาก</h3>
				<h4 style="color: #FFFFFF;line-height: 2;">{{ $data["content"] }}</h4>

				<hr style="border-style: solid;border-color: #FFFFFF;margin-top: 20px;margin-bottom: 20px;">

				<h3 style="color: #FFFFFF">เลขทะเบียน / Plate No.</h3>
				<h4 style="color: #FFFFFF;line-height: 2;">{{ $data["google_registration_number"] }} {{ $data["google_province"] }}</h4>
        	</div>
        </div>
    </div>
</div>