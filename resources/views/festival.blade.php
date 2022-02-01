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
	<!-- <div>
		<img style="position:absolute;width: 90%;" src="{{ url('/') }}/img/festival/22.webp">
		<img style="margin-top:-30px;" class="main-shadow main-radius" width="100%" src="{{ asset('/img/festival/hero-bg_22.jpg') }}">
		<br><br>
	</div> -->

	<div>
		<img style="position:absolute;width: 90%; top: -20px;" src="{{ url('/') }}/img/festival/10.gif">
		<img style="margin-top:-30px;" width="100%" src="{{ asset('/img/festival/hero-bg_10.jpg') }}">
		<br><br><br>
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

