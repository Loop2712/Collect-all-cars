<div class="container">
    <div class="row">
        <div class="col-12">
        	<center>
                <div><br><br>
                    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate('Make me into an QrCode!')) !!} ">
                    {!! QrCode::size(300)->generate('{{ $register_car->name }}'); !!}
                </div>
	        	<a href="{{ url('/deliver/create') }}"><img width="80%" src="{{ asset('/img/icon/จัดส่ง.png') }}"></a>
	        	<br>
	        	<a href="{{ url('/') }}"><img width="80%" src="{{ asset('/img/icon/ไม่จัดส่ง.png') }}"></a>
        	</center>
        </div>
    </div>
</div>