<div class="container" style="box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.15), 0 4px 10px 0 rgba(0, 0, 0, 0.15);">
    <div class="row">
        <div class="col-12" style="border-style: solid;border-color: #ff0101;border-radius: 10px;background-color: #07375D">
        	<div class="col-8 offset-2">
        		<center>
	        		<img width="80%" src="{{ asset('/img/logo/logo-flex-line.png') }}">
	        		<hr>
	        	</center>
				<h1 style="color: #FFFFFF">ผู้ใช้รถหมายเลขทะเบียน</h1>
				<h5 style="color: #FFFFFF">{{ $data["registration_number"] }} {{ $data["province"] }}</h5>
				<hr>
				<h1 style="color: #FFFFFF">แจ้งว่า</h1>
				
				@if($data["postback_data"] == "wait")
					<h5 style="color: #FFFFFF">กรุณารอสักครู่ / Wait a moment</h5>
				@endif

				@if($data["postback_data"] == "thx")
					<h5 style="color: #FFFFFF">ขอบคุณ / Thank you</h5>
					<br><br>
					<div class="rounded-circle">
						<img width="80%" src="{{ asset('/img/icon/thx.png') }}">
					</div>
				@endif
        	</div>
        </div>
    </div>
</div>