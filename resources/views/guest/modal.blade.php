@extends('layouts.app')

@section('content')

<center>
	<div class="col-12">
		<div>
			<img style="margin-top: -40px;" width="100%" src="{{ asset('/img/more/select.jpg') }}">

			<!-- LINE -->
			@if(Auth::check())
				<a style="position: absolute;right: 54%;top: 40%;" href="{{ url('/guest/create') }}"><img width="100" src="{{ asset('/img/icon/empty.png') }}"></a>
			@else
				<a style="position: absolute;right: 54%;top: 40%;" href="{{ route('login.line') }}?redirectTo={{ url('/guest/create') }}"><img width="100" src="{{ asset('/img/icon/empty.png') }}"></a>
			@endif

			<!-- FACEBOOK -->
			<a style="position: absolute;right: 39%;top: 46%;" href="#" onclick="not_ready();"><img width="70" src="{{ asset('/img/icon/empty.png') }}"></a>

			<!-- GOOGLE -->
			@if(Auth::check())
				<a style="position: absolute;right: 16%;top: 40%;" href="{{ url('/guest/create') }}" ><img width="100" src="{{ asset('/img/icon/empty.png') }}"></a>
			@else
				<a style="position: absolute;right: 16%;top: 40%;" href="{{ route('login.google') }}?redirectTo={{ url('/guest/create') }}" ><img width="100" src="{{ asset('/img/icon/empty.png') }}"></a>
			@endif
		</div>
		<div class="row">
			<!-- @if(Auth::check())
	    		<div class="col-6">
					<a href="{{ url('/guest/create') }}"><img width="160" height="60" src="{{ asset('/img/icon/line.png') }}"></a>
				</div>
				<div class="col-6">
	    			<a href="{{ url('/guest/create') }}"><img width="160" height="60" src="{{ asset('/img/icon/fb.png') }}">
	    		</div>
	    		@else
	    		<div class="col-6">
					<a href="{{ route('login.line') }}?redirectTo={{ url('/guest/create') }}"><img width="160" height="60" src="{{ asset('/img/icon/line.png') }}"></a>
				</div>
				<div class="col-6">
	    			<a href="{{ route('login.facebook') }}?redirectTo={{ url('/guest/create') }}"><img width="160" height="60" src="{{ asset('/img/icon/fb.png') }}">
	    		</div>
    		@endif -->
		</div>

		<!-- <a href="{{ url('/guest/create') }}"><button class="btn btn-primary btn-sm"><i class="fas fa-check-circle"></i>&nbsp;&nbsp; ตกลง</button></a> -->
	</div>
</center>
<script>

function not_ready() {
    alert("ขออภัย ขณะนี้ระบบยังไม่เปิดให้บริการ");
}

</script>



@endsection