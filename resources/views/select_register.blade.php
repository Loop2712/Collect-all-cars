@extends('layouts.viicheck')

@section('content')

<br><br><br><br><br>
<section id="services" class="services" style="padding-top:25px;">
  <div class="container">
    <h4><b>เลือกประเภทการสมัครสมาชิก</b></h4>
    <div class="row">
      	<div class="col-lg-6 col-md-6 align-items-stretch mt-4 mt-md-0">
    		<div class="icon-box">
          		<center>
	      			<img width="35%" src="{{ asset('/img/logo/logo_x-icon.png') }}" >
						<br><br>
      			</center>
        		<h4 id="h4_viicheck" class="card-title"><b>ทั่วไป</b></h4>
        		<hr>
        		<center>
        			<button type="button" class="btn btn-danger" style="width:50%;" onclick="select_register('viicheck');">เลือก</button>
        		</center>
        	</div>
      	</div>

      	<div class="col-lg-6 col-md-6  align-items-stretch mt-4 mt-md-0">
          	<div class="icon-box">
                <center>
	      			<img width="35%" src="{{ asset('/img/icon/corporation.png') }}" >
						<br><br>
      			</center>
        		<h4 id="h4_condo" class="card-title"><b>องค์กร / คอนโด / อาคารสำนักงาน</b></h4>
        		<hr>
        		<center>
        			<button type="button" class="btn btn-danger" style="width:50%;" onclick="select_register('condo');">เลือก</button>
        		</center>
          	</div>
      	</div>

      	<!-- LOGIN -->
      	<a id="to_div_login" class="d-none" href="#div_login_line"></a>
		<div id="div_login_line" class="col-12 d-none">
			<div class="row">
				<div class="col-12" style="margin-top: 10px;">
			  		<br>
			  		<center>
			  			<a class="d-none" id="btn_a_login_line"></a>

			  			<button id="btn_login_line" type="button" class="btn btn-success" style="width:80%;background-color: #28A745;" disabled="" onclick="document.querySelector('#btn_a_login_line').click();">
			  				<img width="15%" class="main-shadow" style="border-radius: 20px;background-color: #ffff;" src="{{ asset('/img/icon_login/icon-line.png') }}">&nbsp;&nbsp; Login with LINE
			  			</button>
				  		
	                    <br><br>
                        <p><b>ฉันยอมรับ</b><br></p> 
                        <!-- privacy_policy -->
                        <input type="checkbox" name="checkbox_privacy_policy" id="checkbox_privacy_policy" onclick="check_checkbox();">
                        <a class="btn btn-link" style="font-size: 13px;" target="bank" href="{{ url('/privacy_policy') }}"> 
                            <span style="color:red"><b>นโยบายเกี่ยวกับข้อมูลส่วนบุคคล</b></span>
                        </a>
                        <br>
                        <!-- terms_of_service -->
                        <input type="checkbox" name="checkbox_terms_of_service" id="checkbox_terms_of_service" onclick="check_checkbox();">
                        <a class="btn btn-link" style="font-size: 13px;" target="bank" href="{{ url('/terms_of_service') }}"> 
                            <span style="color:red"><b>ข้อกำหนดและเงื่อนไขการใช้บริการ</b></span>
                        </a>
                    </center>
			  	</div>
			</div>
		</div>
      </div>
    </div>
</section>
<br>

<script>
	
	function check_checkbox()
	{
		let checkbox_privacy_policy = document.querySelector('#checkbox_privacy_policy').checked;
		let checkbox_terms_of_service = document.querySelector('#checkbox_terms_of_service').checked;

		if(checkbox_privacy_policy === true && checkbox_terms_of_service === true){
			document.querySelector('#btn_login_line').disabled = false ;
		}else{
			document.querySelector('#btn_login_line').disabled = true ;
		}
	}

	function select_register(data)
	{
		let btn_a_login_line = document.querySelector('#btn_a_login_line');

		if (data === 'viicheck') {
			document.querySelector('#h4_viicheck').classList.add('text-white');
			document.querySelector('#h4_condo').classList.remove('text-white');
			btn_a_login_line.href = "{{ route('login.line') }}?redirectTo={{ request('redirectTo') }}" ;
		}

		if (data === 'condo') {
			document.querySelector('#h4_condo').classList.add('text-white');
			document.querySelector('#h4_viicheck').classList.remove('text-white');
			btn_a_login_line.href = "{{ route('login.line') }}?redirectTo={{ url('/select_condo') }}" ;
		}

		document.querySelector('#div_login_line').classList.remove('d-none');
		document.querySelector('#to_div_login').click();
	}

</script>

@endsection






