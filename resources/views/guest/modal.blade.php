@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    	<center>
	    	<div class="col-8">
	    		<br><br>
	    		<img width="80%" src="{{ asset('/img/more/select.png') }}">
	    	</div>
	    	<div class="col-12">
	    		<br><br>
	    		<p style="color: #000;font-size: 16px;"><b>กรุณาเลือก Social ในการรับข้อความตอบกลับ</b></p>
	    		<p style="color: red;">แนะนำ Line</p>
	    		<a href="{{ url('/guest/create') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fas fa-check-circle"></i>&nbsp;&nbsp; ตกลง</button></a>
	    	</div>
    	</center>
    </div>
</div>

@endsection