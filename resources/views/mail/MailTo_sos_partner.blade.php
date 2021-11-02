@extends('layouts.mail_to')

@section('content')
	<div class="container">
		<div class="row">
			<!-- คอม -->
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12" style="font-size:16px;">
						<h4>เรียน <b>{{ $data["name_partner"] }}</b></h4>
						<span>
							ทางเราได้รับการแจ้งเหตุเรียกขอความช่วยเหลือจากคุณ
							<b>{{ $data["name_user"] }}</b>
							<br><hr><br>
							<!-- ------------------------------------------------------------- -->
							เมื่อเวลา {{ $data["time_zone"] }}
							<br>
							เบอร์โทรศัพท์ติดต่อผู้แจ้ง 
							📞
							<a href="tel:{{ $data['phone_user'] }}">{{ $data["phone_user"] }}</a>
							<br><br>
							<b>ภาพสถานที่เกิดเหตุ</b>
							<img src="https://www.viicheck.com/storage/{{ $data['photo'] }}">
							<br><br>
							<a href="https://www.google.co.th/maps/search/{{ $data['lat'] }},{{ $data['lng'] }}/{{ $data['lat_mail'] }},{{ $data['lng'] }},16z">ดูสถานที่เกิดเหตุ</a>
							<br><br><hr><br>
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
	<script type="text/javascript">
              function googleTranslateElementInit() {
                new google.translate.TranslateElement({pageLanguage: 'th'}, 'google_translate_element');
              }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
@endsection
