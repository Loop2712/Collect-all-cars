@php
	$date_now = date("Y-m-d "); 

    $day_now = date("d");
    $month_now = date("m");
@endphp

<!-- Happy New Year -->
@if( $month_now == "01" and $day_now >= "01" and $day_now <= 14)
	<div>
		<img style="position:absolute;" src="{{ url('/') }}/img/more/giphy.gif">
		<img style="position:absolute;" src="{{ url('/') }}/img/more/1360.gif">
		<img style="position:absolute;right: 20px;" src="{{ url('/') }}/img/more/1360.gif">
	    <img width="100%" src="{{ asset('/img/festival/hero-bg_1.jpg') }}">
	    <br><br><br>
	</div>

	<!-- <div>
		<img style="position:absolute;width: 90%;" src="{{ url('/') }}/img/festival/22.webp">
		<img style="margin-top:-30px;" class="main-shadow main-radius" width="100%" src="{{ asset('/img/festival/hero-bg_22.jpg') }}">
		<br><br><br>
	</div> -->

	<!-- <div>
		<img style="position:absolute;width: 90%; top: -20px;" src="{{ url('/') }}/img/festival/10.gif">
		<img style="margin-top:-30px;" width="100%" src="{{ asset('/img/festival/hero-bg_10.jpg') }}">
		<br><br><br>
	</div> -->

	<!-- <div>
		<div id="snow"></div>
		<img style="margin-top:-30px;" width="100%" src="{{ asset('/img/festival/hero-bg_12.jpg') }}">
		<br><br><br>
	</div> -->
@endif

<!-- Valentine -->
@if( $month_now == "02" and $day_now >= "01" and $day_now <= 14)
	<div>
		<img style="position:absolute;width: 90%;" src="{{ url('/') }}/img/festival/22.webp">
		<img style="margin-top:-30px;" class="main-shadow main-radius" width="100%" src="{{ asset('/img/festival/hero-bg_22.jpg') }}">
		<br><br>
	</div>
@endif

<!-- Halloween -->
@if( $month_now == "10" and $day_now >= "15" and $day_now <= 31)
	<div>
		<img style="position:absolute;width: 90%; top: -20px;" src="{{ url('/') }}/img/festival/10.gif">
		<img style="margin-top:-30px;" width="100%" src="{{ asset('/img/festival/hero-bg_10.jpg') }}">
		<br><br><br>
	</div>
@endif

<!-- Christmas -->
@if( $month_now == "12" and $day_now >= "10" and $day_now <= 24)
	<div>
		<div id="snow"></div>
		<img style="margin-top:-30px;" width="100%" src="{{ asset('/img/festival/hero-bg_12.jpg') }}">
		<br><br><br>
	</div>
@endif

<!-- songkran -->
@if( $month_now == "4" and $day_now >= "1" and $day_now <= 16)
<div class="container " style="margin-bottom:25px;">
  <div class="card img-fluid" style="width:100%">
    <img class="card-img-top" src="{{ asset('/img/festival/bg-songkran3.jfif') }}" alt="Card image" style="width:100%">
	<div class="col-md-4">
    </div>
	<div class="card-img-overlay text-center" style="padding-top:0px;">
		<img width="60%"class="animated fadeInRight" src="{{ asset('/img/stickerline/PNG/29.png') }}">
		
		<h1 class="mb-3 h2" style="margin-top:10px;margin-bottom:0px;color:black;font-family: 'Pattaya', sans-serif;-webkit-text-stroke: 0.5px black;font-size:30px;">สวัสดีปีใหม่ไทย</h1>
	</div>
	<img style="position:absolute;width: 100%; top: 0px;" src="{{ url('/') }}/img/festival/flower2.gif">
  </div>
</div>
@endif

<script>
	$(".animated").addClass("delay-1s");
</script>