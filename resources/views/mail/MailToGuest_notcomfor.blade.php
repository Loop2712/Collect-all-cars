
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
	        	<center>
	        		<h4 style="color: #FFFFFF;line-height: 2;">{{ $data["content"] }}</h4>
	        	</center>

				<hr style="border-style: solid;border-color: #FFFFFF;margin-top: 20px;margin-bottom: 20px;">

				<h3 style="color: #FFFFFF">เลขทะเบียน / Plate No.</h3>
				<h4 style="color: #FFFFFF;line-height: 2;">{{ $data["registration_number"] }} {{ $data["province"] }}</h4>

				@if( $data["want_phone"] == "Yes" )
					<div class="row">
						<center>
							<div class="col-8">
								<button type="button" style="background-color: green; color:#ffffff;text-decoration: none;width: 100%;padding: 10px;border-radius: 10px;">
									<a type="button" style="background-color: green; color:#ffffff;text-decoration: none;" href="tel:{{ $data['phone'] }}">
										{{ $data["phone"] }}
									</a>
								</button>
							</div>
						</center>
					</div>
				@endif
        	</div>
        </div>
    </div>
</div>