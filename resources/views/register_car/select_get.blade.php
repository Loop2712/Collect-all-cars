<div class="container">
    <div class="row">
        <div class="col-12">
        	<center>
                <div><br><br>
                    {!! QrCode::size(300)->generate('https://car.viicheck.com/guest/create'); !!}
                </div>
	        	<a href="{{ url('/deliver/create') }}"><img width="80%" src="{{ asset('/img/icon/จัดส่ง.png') }}"></a>
	        	<br>
	        	<a href="{{ url('/') }}"><img width="80%" src="{{ asset('/img/icon/ไม่จัดส่ง.png') }}"></a>
        	</center>
        </div>
    </div>
</div>