@extends('layouts.mail_to')

@section('content')
	<div class="container">
		<div class="row">
			<!-- คอม -->
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12" style="font-size:16px;">
						<h4>เรียน <b>{{ $data["name"] }}</b></h4>
						<!-- เนื้อหาในเมล -->
						<div class="col-12">
							<span>
									ผลการตรวจสอบพื้นที่บริการของคุณคือ <b>{{ $data["approve"] }}</b>

									@if($data["answer_reason"])

										@if($data["answer_reason"] == "1")
										 		เนื่องจาก มีพื้นที่บางส่วนทับซ้อนหรือมีผู้ให้บริการพื้นที่นี้อยู่แล้ว

										@else if($data["answer_reason"] == "2")
										 		เนื่องจาก พื้นที่บริการไม่สมเหตุสมผลกับองค์กรของท่าน
										@else 
												{{ $data["reason_other"] }}
										@endif

									@endif

									<!-- ------------------------------------------------------------- -->
									สอบถามข้อมูลเพิ่มเติมและติดต่อ ViiCHECK ทางนี้ได้เลยยยย 😆
									<br><br>
									📞 : <a href="tel:020277856">02 0277856</a>
									<br>
									📩 : <a href="mailto:contact.viicheck@gmail.com">contact.viicheck@gmail.com</a>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>   
	<script type="text/javascript">
              function googleTranslateElementInit() {
                new google.translate.TranslateElement({pageLanguage: 'th'}, 'google_translate_element');
              }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
@endsection
