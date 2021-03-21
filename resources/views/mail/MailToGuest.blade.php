<div class="container" style="box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.15), 0 4px 10px 0 rgba(0, 0, 0, 0.15);">
    <div class="row">
        <div class="col-12" style="border-style: solid;border-color: #ff0101">
        	<center>
        		<h1>เรียนคุณ</h1>
				<h2><span style="color: #0066FF ">{{ $data["name"] }}</span></h2>

				<h4>
					ผู้ใช้รถหมายเลขทะเบียน <br>
					<span style="color: #FF0000">{{ $data["registration_number"] }} {{ $data["province"] }}</span><br>
					ที่ท่านได้ติดต่อเมื่อสักครู่นี้
				</h4>
				<h3>แจ้งว่า</h3>
				<h2>
					@if($data["postback_data"] == "wait")
						กรุณารอสักครู่ / Wait a moment
					@endif

					@if($data["postback_data"] == "thx")
						ขอบคุณ / Thank you
					@endif
				</h2>
        	</center>
        </div>
    </div>
</div>