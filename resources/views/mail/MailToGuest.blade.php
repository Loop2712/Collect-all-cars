<div class="container" style="box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.15), 0 4px 10px 0 rgba(0, 0, 0, 0.15);">
    <div class="row">
        <div class="col-12" style="border-style: solid;border-color: #ff0101;border-radius: 10px;background-color: #07375D">
        	<center>
        		<img width="80%" src="{{ asset('/img/logo/logo-flex-line.png') }}">
        		<hr>
        	</center>
			<h3 style="color: #FFFFFF">ผู้ใช้รถหมายเลขทะเบียน</h3>
			<h5 style="color: #FFFFFF">{{ $data["registration_number"] }} {{ $data["province"] }}</h5>
			<hr>
			<h3>แจ้งว่า</h3>
			<h5>
				@if($data["postback_data"] == "wait")
					กรุณารอสักครู่ / Wait a moment
				@endif

				@if($data["postback_data"] == "thx")
					ขอบคุณ / Thank you
				@endif
			</h5>
        </div>
    </div>
</div>