@extends('layouts.viicheck')

@section('content')

<br><br><br><br><br><br>
<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<img class="p-md-3 p-lg-3" style="width: 100%;object-fit: contain;" src="{{ url('storage/'.$data_condos->partner->logo )}}">
			<h1>คอนโด : {{ $data_condos->name }}</h1>
			<h3>ไลน์ : {{ $data_condos->name }}</h3>
			<a id="btn_add_line_condo" class="btn btn-success main-shadow main-radius" href="{{ $data_condos->link_line_oa }}">Add Line</a>
		</div>
	</div>
</div>

<script>
	document.addEventListener('DOMContentLoaded', (event) => {
		var delayInMilliseconds = 4000; //4 second

        setTimeout(function() {
            document.querySelector('#btn_add_line_condo').click();
        }, delayInMilliseconds);
	 });
</script>

@endsection