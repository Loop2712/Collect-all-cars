
@extends('layouts.partners.theme_partner_new')

@section('content')
	
	@php
		$data_sos = App\Models\Sos_help_center::where('photo_succeed', "!=" , null)->get();
	@endphp

	@foreach
		<img src="{{ url('storage')}}/{{ $data_sos->photo_succeed }}" style="width: 30%;" class="m-3">
	@endforeach

@endsection
