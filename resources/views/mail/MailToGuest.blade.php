
<div class="container" style="box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.15), 0 4px 10px 0 rgba(0, 0, 0, 0.15);border-radius: 10px;">
    <div class="row">
        <div class="col-12" style="border-style: solid;border-color: #ff0101;border-radius: 10px;background-color: #07375D;border-width: 5px;">
        	<div  class="col-12">
        		<center>
	        		<img width="80%" src="{{ asset('/img/logo/logo-flex-line.png') }}">
	        		<hr style="border-style: solid;border-color: #FFFFFF;">
	        	</center>
				<h4 style="color: #FFFFFF">ผู้ใช้รถหมายเลขทะเบียน</h4>
				<h5 style="color: #FFFFFF;line-height: 2;">{{ $data["registration_number"] }} {{ $data["province"] }}</h5>
				<hr style="border-style: solid;border-color: #FFFFFF;">
				<h4 style="color: #FFFFFF">แจ้งว่า</h4>
				@if($data["postback_data"] == "wait")
					<h5 style="color: #FFFFFF;line-height: 2;">กรุณารอสักครู่ / Wait a moment</h5>
					<br>
					<center>
						<div>
							<img style="border-radius: 70px;" width="60%" src="{{ asset('/img/icon/wait.png') }}">
						</div>
						<br>
					</center>
				@endif
				@if($data["postback_data"] == "thx")
					<h5 style="color: #FFFFFF;line-height: 2;">ขอบคุณ / Thank you</h5>
					<br>
					<center>
						<div>
							<img style="border-radius: 70px;" width="60%" src="{{ asset('/img/icon/thx.png') }}">
						</div>
						<br>
					</center>
				@endif
        	</div>
        </div>
    </div>
</div>