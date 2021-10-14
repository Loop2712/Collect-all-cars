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
									@if($data["approve"] == "ได้รับการอนุมัติ")

								  	ตามที่ท่านได้ขอรับการอนุมัติการแจ้งเตือนเหตุภายในพื้นที่องค์กรของท่าน บัดนี้พื้นที่ของท่านได้รับการ อนุมัติ เป็นที่เรียบร้อยแล้ว

								  @endif

								  @if($data["approve"] == "ไม่ผ่านการอนุมัติ")
								  	ตามที่ท่านได้ขอรับการอนุมัติการแจ้งเตือนเหตุภายในพื้นที่องค์กรของท่าน บัดนี้พื้นที่ของท่าน ยังไม่ผ่านการอนุมัติ
										<br>
										@if(!empty($data["answer_reason"]))

											@if($data["answer_reason"] != '3')
											 		เนื่องจาก {{ $data["answer_reason"] }}
											@else
													เนื่องจาก {{ $data["reason_other"] }}
											@endif

										@endif
									@endif

									<!-- ------------------------------------------------------------- -->
									<br><br>
									ขอขอบคุณที่เลือกใช้บริการจาก ViiCheck ค่ะ
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
