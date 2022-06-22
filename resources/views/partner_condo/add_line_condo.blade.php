@extends('layouts.viicheck')

@section('content')

<br><br><br><br><br><br>
<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<h1>คอนโด : {{ $data_condos->name }}</h1>
			<h3>ไลน์ : {{ $data_condos->name }}</h3>
			<a class="btn btn-success main-shadow main-radius" href="{{ $data_condos->link_line_oa }}">Add Line</a>
		</div>
	</div>
</div>

@endsection