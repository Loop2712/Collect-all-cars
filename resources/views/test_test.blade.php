
@extends('layouts.partners.theme_partner_new')

@section('content')
	
	@php
		$photo_profile = App\User::where('photo', "!=" , null)->get();

		$data_sos_photo_sos = App\Models\Sos_help_center::where('photo_sos', "!=" , null)->get();
		$data_sos_photo_succeed = App\Models\Sos_help_center::where('photo_succeed', "!=" , null)->get();
		$data_sos_photo_sos_by_officers = App\Models\Sos_help_center::where('photo_sos_by_officers', "!=" , null)->get();
	@endphp



	<h1> photo_profile {{ count($photo_profile) }}</h1>
	@foreach($photo_profile as $adsvgzd)
		{{ $adsvgzd->id }} :: {{ $adsvgzd->name }}
		<img src="{{ url('storage')}}/{{ $adsvgzd->photo }}" style="width: 20%;" class="m-3">
	@endforeach
	<br>
	<hr>
	<br>

	<!-- <h1> photo_sos </h1>
	@foreach($data_sos_photo_sos as $eiei_1)
		<img src="{{ url('storage')}}/{{ $eiei_1->photo_sos }}" style="width: 30%;" class="m-3">
	@endforeach
	<br>
	<hr>
	<br>

	<h1> photo_succeed </h1>
	@foreach($data_sos_photo_succeed as $eiei_2)
		<img src="{{ url('storage')}}/{{ $eiei_2->photo_succeed }}" style="width: 30%;" class="m-3">
	@endforeach
	<br>
	<hr>
	<br>

	<h1> photo_sos_by_officers </h1>
	@foreach($data_sos_photo_sos_by_officers as $eiei_3)
		<img src="{{ url('storage')}}/{{ $eiei_3->photo_sos_by_officers }}" style="width: 30%;" class="m-3">
	@endforeach
	<br>
	<hr>
	<br> -->

@endsection
