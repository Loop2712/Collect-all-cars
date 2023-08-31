
@extends('layouts.partners.theme_partner_new')

@section('content')
	
	@php
		$data_sos = App\Models\Sos_help_center::where('photo_succeed', "!=" , null)->get();
	@endphp

	@foreach($data_sos as $eiei)
		<img src="{{ url('storage')}}/{{ $eiei->photo_succeed }}" style="width: 30%;" class="m-3">
	@endforeach

@endsection
