@extends('layouts.partners.theme_partner_new')

@section('content')

<style>

.video-container {
    width: 100%; /* ปรับขนาดตามต้องการ */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* เพิ่มเงาเล็กน้อย */
    border-radius: 10px; /* ขอบโค้ง */
    overflow: hidden; /* ป้องกันการแตกขอบ */
    justify-content: center;
    align-items: center;
}

iframe {
    width: 100%; /* ขยายให้เต็มคอนเทนเนอร์ */
    height: 400px; /* สามารถปรับขนาดสูงของ iframe */
}


</style>

<div class="row row-cols-1 row-cols-lg-2">
	<!-- Free Tier -->
	<div class="col mt-3 mb-3">
		<div class="card mb-5 mb-lg-0">
			<div class="card-body text-center">
				<div class="video-container">
				    <iframe width="560" height="315" src="https://www.youtube.com/embed/t1GEIT_x3xM?si=UDn10lsSS2FITyPB" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
				</div>
			</div>
			<div class="card-header bg-danger py-3">
				<h5 class="card-title text-white text-uppercase text-center">สอนการใช้งานดูข้อมูลบนแผนที่</h5>
			</div>
		</div>
	</div>
	<!-- Plus Tier -->
	<div class="col mt-3 mb-3">
		<div class="card mb-5 mb-lg-0">
			<div class="card-body text-center">
				<div class="video-container">
				    <iframe width="560" height="315" src="https://www.youtube.com/embed/JdJjQ3L7eGs?si=hPIJ1NgJb_HF4ZIu" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
				</div>
			</div>
			<div class="card-header bg-primary py-3">
				<h5 class="card-title text-white text-uppercase text-center">สอนใช้งานระบบวิดีโอคอล</h5>
			</div>
		</div>
	</div>
</div>

@endsection