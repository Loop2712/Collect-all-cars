@php
	$date_now = date("Y-m-d "); 

    $day_now = date("d");
    $month_now = date("m");
@endphp

<!-- Happy New Year -->
@if( $month_now == "01" and $day_now >= "01" and $day_now <= 14)
	<div id="snow"></div>
	<img style="margin-top:-30px;" width="94%" src="{{ asset('/img/festival/hero-bg_1.jpg') }}">  
	<script src="{{ asset('js/PureSnow.js')}}"></script>
@endif

<!-- Valentine -->
@if( $month_now == "02" and $day_now >= "01" and $day_now <= 14)

@endif

<!-- Halloween -->
@if( $month_now == "10" and $day_now >= "15" and $day_now <= 31)

@endif

<!-- Christmas -->
@if( $month_now == "12" and $day_now >= "10" and $day_now <= 24)
	<style>
		.snowflake {
	        position: absolute;
	        width: 10px;
	        height: 10px;
	        background: linear-gradient(white, white); /* Workaround for Chromium's selective color inversion */
	        border-radius: 50%;
	        filter: drop-shadow(0 0 10px white);
	    }

	    .container { display: flex; flex-direction: column; align-items: center; justify-content: center; }
	</style>

	<div id="snow"></div>
	<img style="margin-top:-30px;" width="94%" src="{{ asset('/img/festival/hero-bg_12.jpg') }}">  
	<script src="{{ asset('js/PureSnow.js')}}"></script>
@endif

