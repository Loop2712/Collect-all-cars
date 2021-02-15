@extends('layouts.app')

@section('content')

<center>
	<div class="col-12">
		<div>
			<img style="margin-top: -40px;" width="100%" src="{{ asset('/img/more/select.jpg') }}">
			@if(Auth::check())
				<a style="position: absolute;right: 35%;top: 37%;" href="{{ url('/guest/create') }}"><img width="40%" src="{{ asset('/img/icon/empty.png') }}"></a>
			@else
				<a style="position: absolute;right: 35%;top: 37%;" href="{{ route('login.line') }}?redirectTo={{ url('/guest/create') }}"><img width="40%" src="{{ asset('/img/icon/empty.png') }}"></a>
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


@endsection