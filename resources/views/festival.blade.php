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
<div class="container">
  <div class="bg-image p-2 text-center shadow-1-strong rounded mb-5 text-white" 
       style="background-image: url('{{ asset('/img/festival/bg-songkran2.jpg') }}'); ">
		
	<img width="70%" src="{{ asset('/img/stickerline/PNG/29.png') }}">
	<h1 class="mb-3 h2" style="margin-bottom:0px;color:black;font-family: 'Pattaya', sans-serif;-webkit-text-stroke: 0.5px black;font-size:35px;">สวัสดีปีใหม่ไทย</h1>
  </div>
	<img style="position:absolute;width: 80%; top: 0px;" src="{{ url('/') }}/img/festival/flower2.gif">

</div>
@endif